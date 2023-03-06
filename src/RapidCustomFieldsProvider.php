<?php

namespace Crankd\RapidCustomFields;

use Illuminate\Support\Collection;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;


class RapidCustomFieldsProvider extends ServiceProvider
{

    private const CONFIG_FILE = __DIR__ . '/../config/rapid-custom-fields.php';

    private const PATH_VIEWS = __DIR__ . '/../resources/views';

    private const PATH_ASSETS = __DIR__ . '/../resources/js';


    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->offerPublishing(); // Publish the config file

        $this->loadViewsFrom(self::PATH_VIEWS, 'rapid-custom-fields'); // Load the views

        $this->registerComponents(); // Register the components


        // resource_path js
        $this->publishes([
            self::PATH_ASSETS => resource_path('js/crankd/rapid-custom-fields/js'), // Publish the assets
        ], 'rapid-custom-fields-publishes');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(self::CONFIG_FILE, 'rapid-custom-fields');
    }

    protected function offerPublishing()
    {
        if (!function_exists('config_path')) {
            // function not available and 'publish' not relevant in Lumen
            return;
        }

        $this->publishes([
            self::CONFIG_FILE => config_path('rapid-custom-fields.php'),
        ], 'rapid-custom-fields-config');
    }


    /**
     * Register the Blade form components.
     *
     * @return $this
     */
    private function registerComponents(): self
    {

        // Blade::component('manage-fields', 'manage-fields');

        return $this;
    }
}
