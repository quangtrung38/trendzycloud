<?php

namespace quangtrung38\trendzycloud\Facades;

use Illuminate\Support\Facades\Facade;

class TrendzyCloud extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'TrendzyCloud';
    }
}