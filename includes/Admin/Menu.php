<?php

namespace WeDevs\Academy\Admin;

/**
 * The Manu handler class
 */
class Menu
{
    public $addressbook;

    public function __construct($addressbook)
    {
        $this->addressbook = $addressbook;
        add_action('admin_menu', [$this , 'admin_menu']);
    }

    public function admin_menu()
    {
        $parent_slug = 'wedevs-academy';
        $capability = 'manage_options';


        $hook = add_menu_page(
            __('weDevs Academy', 'wedevs-academy'),
            __('Academy', 'wedevs-academy'),
            $capability,
            $parent_slug,
            [$this->addressbook, 'plugin_page'],
            'dashicons-album'
        );

        add_submenu_page(
            $parent_slug,
            __('Address Book', 'wedevs-academy'),
            __('Address Book', 'wedevs-academy'),
            $capability,
            $parent_slug,
            [$this->addressbook, 'plugin_page'],
        );

        add_submenu_page(
            $parent_slug,
            __('Settings', 'wedevs-academy'),
            __('Settings', 'wedevs-academy'),
            $capability,
            'wedevs-academy-settings',
            [$this, 'settings_page'],
        );


        add_action( 'admin_head-' . $hook, [ $this, 'enqueue_assets' ] );    
    }

    
    /**
     * Setting sub menu page
     * @return [type]
     */
    public function settings_page()
    {
        echo 'Hello setting page';
    }
    /**
     * Enqueue scripts and styles
     *
     * @return void
     */
    public function enqueue_assets() {
        wp_enqueue_style( 'academy-admin-style' );
        wp_enqueue_script( 'academy-admin-script' );

    }
}
