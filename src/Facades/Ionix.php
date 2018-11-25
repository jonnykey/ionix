<?php

namespace JohnnyC\Ionix\Facades;

use Illuminate\Support\Facades\Facade;

class Ionix extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'ionix';
    }
}
