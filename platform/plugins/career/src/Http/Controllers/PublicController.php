<?php

namespace Botble\Career\Http\Controllers;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Career\Actions\IncrementCareerViews;
use Botble\Career\Models\Career;
use Botble\SeoHelper\Facades\SeoHelper;
use Botble\SeoHelper\SeoOpenGraph;
use Botble\Slug\Facades\SlugHelper;
use Botble\Theme\Facades\Theme;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class PublicController extends Controller
{
    public function careers(): Response
    {
        SeoHelper::setTitle(__('Careers'));

        Theme::breadcrumb()
            ->add(__('Home'), route('public.index'))
            ->add(__('Careers'), route('public.careers'));

        $careers = Career::query()
            ->where('status', BaseStatusEnum::PUBLISHED)
            ->latest()
            ->paginate(10);

        return Theme::scope('career.careers', compact('careers'))->render();
    }

    public function career(string $key, IncrementCareerViews $incrementCareerViews): Response
    {
        $slug = SlugHelper::getSlug($key, SlugHelper::getPrefix(Career::class));

        if (! $slug) {
            abort(404);
        }

        $career = Career::query()
            ->where('status', BaseStatusEnum::PUBLISHED)
            ->findOrFail($slug->reference_id);

        $incrementCareerViews($career);

        SeoHelper::setTitle($career->name)
            ->setDescription($career->description);

        SeoHelper::setSeoOpenGraph(
            (new SeoOpenGraph())
                ->setDescription($career->description)
                ->setUrl($career->url)
                ->setTitle($career->name)
                ->setType('article')
        );

        Theme::breadcrumb()
            ->add(__('Home'), route('public.index'))
            ->add($career->name, $career->url);

        return Theme::scope('career.career', compact('career'))->render();
    }
}
