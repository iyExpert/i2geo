<?php

namespace Iyexpert\I2Geo;


use Illuminate\Support\Facades\Facade;

class I2GeoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'i2geo';
    }
}