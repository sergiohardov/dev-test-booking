<?php

/**
 * Plugin Name: Lookway Booking
 * Description: Plugin for booking.
 * Version: 1.0
 * Author: Sergio Hardov
 * Author URI: https://t.me/sergiohardov
 * License: GPLv2 or later
 * Text Domain: lookway-booking
 */

if (!defined('ABSPATH')) {
    die;
}

class LookwayBooking
{

    public function register()
    {
        add_action('init', [$this, 'custom_post_type']);
    }

    public function custom_post_type()
    {
        register_post_type('booking', [
            'public' => true,
            'has_archive' => true,
            'rewrite' => ['slug' => 'bookings'],
            'label' => 'Booking',
            'supports' => ['title', 'editor', 'thumbnail']
        ]);
    }

    static function activation()
    {
        flush_rewrite_rules();
    }

    static function deactivation()
    {
        flush_rewrite_rules();
    }
}

if (class_exists('LookwayBooking')) {
    $lookwayBooking = new LookwayBooking();
    $lookwayBooking->register();
}


register_activation_hook(__FILE__, [$lookwayBooking, 'activation']);
register_deactivation_hook(__FILE__, [$lookwayBooking, 'deactivation']);
