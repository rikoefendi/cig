<?php

namespace CIG;

use Illuminate\Database\Capsule\Manager as Capsule;
/**
 *
 */
class User
{

    public $capsule;

    public function __construct()
    {
        $capsule = new Capsule;

        $capsule->addConnection([
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'dev_news',
            'username'  => 'root',
            'password'  => 'root',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]);


        // Make this Capsule instance available globally via static methods... (optional)
        $capsule->setAsGlobal();

        // Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
        $capsule->bootEloquent();
        $this->capsule = $capsule;
    }

    public function getCapsule()
    {
        return $this->capsule;
    }

    public function getUser()
    {
        return Capsule::table('users')->get();
    }
}
