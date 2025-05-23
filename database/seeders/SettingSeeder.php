<?php

namespace Database\Seeders;

use Botble\Setting\Facades\Setting;
use Botble\Theme\Facades\Theme;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            'show_admin_bar' => '1',
            'theme' => Theme::getThemeName(),
            'media_random_hash' => md5(time()),
            'admin_favicon' => 'general/favicon.png',
            'admin_logo' => 'general/logo-light.png',
            'payment_cod_status' => 1,
            'payment_cod_description' => 'Please pay money directly to the postman, if you choose cash on delivery method (COD).',
            'payment_bank_transfer_status' => 1,
            'payment_bank_transfer_description' => 'Please send money to our bank account: ACB - 69270 213 19.',
            'payment_stripe_payment_type' => 'stripe_checkout',
            'plugins_ecommerce_customer_new_order_status' => 0,
            'plugins_ecommerce_admin_new_order_status' => 0,
            'ecommerce_is_enabled_support_digital_products' => 1,
            'ecommerce_load_countries_states_cities_from_location_plugin' => 0,
        ];

        Setting::delete(array_keys($settings));

        Setting::set($settings)->save();
    }
}
