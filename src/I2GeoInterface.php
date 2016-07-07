<?php

namespace Iyexpert\I2Geo;


interface I2GeoInterface
{

    public function resolveAddress($address, $language);

    public function resolveLatLng($lat, $lng, $language);

}