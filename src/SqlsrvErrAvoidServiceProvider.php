<?php

namespace SqlsrvErrAvoid;

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
            'db.connector.sqlsrv',
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
