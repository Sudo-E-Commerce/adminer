<?php
 
namespace Sudo\Adminer\Providers;
 
use Illuminate\Support\ServiceProvider;
use File;
class AdminerServiceProvider extends ServiceProvider
{
    /**
     * Register config file here
     * alias => path
     */
    private $configFile = [
        'SudoAdminer' => 'SudoAdminer.php'
    ];

    /**
     * Register commands file here
     * alias => path
     */
    protected $commands = [
        //
    ];

	/**
     * Register bindings in the container.
     */
    public function register()
    {
        // Đăng ký config cho từng Module
        $this->mergeConfig();
        // boot commands
        $this->commands($this->commands);
    }

	public function boot()
	{
		$this->registerModule();

        $this->publish();
	}

	private function registerModule() {
		$modulePath = __DIR__.'/../../';
        $moduleName = 'Adminer';

        // boot route
        if (File::exists($modulePath."routes/routes.php")) {
            $this->loadRoutesFrom($modulePath."/routes/routes.php");
        }

        // boot migration
        if (File::exists($modulePath . "migrations")) {
            $this->loadMigrationsFrom($modulePath . "migrations");
        }

        // boot languages
        if (File::exists($modulePath . "resources/lang")) {
            $this->loadTranslationsFrom($modulePath . "resources/lang", $moduleName);
            $this->loadJSONTranslationsFrom($modulePath . 'resources/lang');
        }

        // boot views
        if (File::exists($modulePath . "resources/views")) {
            $this->loadViewsFrom($modulePath . "resources/views", $moduleName);
        }

	    // boot all helpers
        if (File::exists($modulePath . "helpers")) {
            // get all file in Helpers Folder 
            $helper_dir = File::allFiles($modulePath . "helpers");
            // foreach to require file
            foreach ($helper_dir as $key => $value) {
                $file = $value->getPathName();
                require $file;
            }
        }
	}

    /*
    * publish dự án ra ngoài
    * publish config File
    * publish assets File
    */
    public function publish()
    {
        if ($this->app->runningInConsole()) {
            // Chạy riêng log
            $this->publishes([
                __DIR__.'/../../config/SudoAdminer.php' => config_path('SudoAdminer.php'),
            ], 'sudo/adminer');
            $this->publishes([
                __DIR__.'/../../config/SudoAdminer.php' => config_path('SudoAdminer.php'),
            ], 'sudo/adminer/config');
            // Khởi chạy chung theo core
            $this->publishes([
                __DIR__.'/../../config/SudoAdminer.php' => config_path('SudoAdminer.php'),
            ], 'sudo/core');
            $this->publishes([
                __DIR__.'/../../config/SudoAdminer.php' => config_path('SudoAdminer.php'),
            ], 'sudo/core/config');
        }
    }

    /*
    * Đăng ký config cho từng Module
    * $this->configFile
    */
    public function mergeConfig() {
        foreach ($this->configFile as $alias => $path) {
            $this->mergeConfigFrom(__DIR__ . "/../../config/" . $path, $alias);
        }
    }
}