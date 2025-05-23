<?php

namespace Database\Seeders;

use Botble\Base\Supports\BaseSeeder;

class DatabaseSeeder extends BaseSeeder
{
    public function run(): void
    {
        $this->prepareRun();

        $this->call([
            UserSeeder::class,
            LanguageSeeder::class,
            PageSeeder::class,
            BlogSeeder::class,
            ContactSeeder::class,
            TestimonialSeeder::class,
            FaqSeeder::class,
            BrandSeeder::class,
            CurrencySeeder::class,
            ProductCategorySeeder::class,
            ProductCollectionSeeder::class,
            ProductLabelSeeder::class,
            ProductSeeder::class,
            ProductAttributeSeeder::class,
            CustomerSeeder::class,
            ReviewSeeder::class,
            TaxSeeder::class,
            ProductTagSeeder::class,
            FlashSaleSeeder::class,
            ShippingSeeder::class,
            StoreLocatorSeeder::class,
            ProductOptionSeeder::class,
            OrderEcommerceSeeder::class,
            SettingSeeder::class,
            ThemeOptionSeeder::class,
            CareerSeeder::class,
            MenuSeeder::class,
            WidgetSeeder::class,
        ]);

        $this->finished();
    }
}
