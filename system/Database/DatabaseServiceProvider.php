<?php
/**
 * DatabaseServiceProvider - Implements a Service Provider for Database.
 *
 * @author Virgil-Adrian Teaca - virgil@giulianaeassociati.com
 * @version 3.0
 */

namespace Database;

use Database\ORM\Model;
use Database\ConnectionFactory;
use Database\DatabaseManager;
use Database\Model as BasicModel;
use Support\ServiceProvider;


class DatabaseServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the Application events.
     *
     * @return void
     */
    public function boot()
    {
        $db = $this->app['db'];

        $events = $this->app['events'];

        // Setup the ORM Model.
        Model::setConnectionResolver($db);

        Model::setEventDispatcher($events);

        // Setup the (basic) Model.
        BasicModel::setConnectionResolver($db);
    }

    /**
     * Register the Service Provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bindShared('db.factory', function($app)
        {
            return new ConnectionFactory($app);
        });

        $this->app->bindShared('db', function($app)
        {
            return new DatabaseManager($app, $app['db.factory']);
        });
    }

}
