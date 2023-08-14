<?php

namespace SqlsrvErrAvoid;

use Illuminate\Database\Connectors\ConnectionFactory;
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
            ConnectionFactory::class,
            SqlServerErrAvoidConnectionFactory::class,
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