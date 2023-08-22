@forelse($reviews as $review)
    <div class="single-comment justify-content-between mb-30">
        <div class="user d-flex justify-content-start">
            <div class="thumb text-center">
                <img src="{{ $review->user->avatar_url }}" alt="{{ $review->user->name }}">
                <p class="font-heading text-brand">{{ $review->user->name }}</p>
            </div>
            <div class="desc w-full">
                <div class="d-flex justify-content-between mb-10">
                    <div class="d-flex align-items-center">
                        <span class="font-xs text-muted" datetime="{{ $review->created_at->translatedFormat('Y-m-d\TH:i:sP') }}">{{ $review->created_at->diffForHumans() }}</span>
                    </div>
                    <div class="product-rate d-inline-block">
                        <div class="product-rating" style="width: {{ $review->star * 20 }}%;"></div>
                    </div>
                </div>
                <div>
                    <p class="mb-10 color-gray-500">{{ $review->comment }}</p>
                </div>
                @if($review->images && count($review->images))
                    <div class="review-images">
                        @foreach($review->images as $image)
                            <a href="{{ RvMedia::getImageUrl($image) }}">
                                <img src="{{ RvMedia::getImageUrl($image, 'thumb') }}" alt="{{ $review->comment }}" class="img-fluid rounded h-100">
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
@empty
    <div class="text-center">
        <p>{{ __('No reviews!') }}</p>
    </div>
@endforelse

{{ $reviews->links(Theme::getThemeNamespace('partials.pagination')) }}
