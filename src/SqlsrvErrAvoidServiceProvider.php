<?php

namespace SqlsrvErrAvoid;

use Illuminate\Database\Connectors\SqlServerConnector;
use Illuminate\Support\ServiceProvider;

class SqlsrvErrAvoidServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            SqlServerConnector::class,
            SqlServerErrAvoidConnector::class,
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        // do nothing
    }
}