<?php

namespace Iyexpert\I2Geo;

use GuzzleHttp\Client;
use Illuminate\Cache\Repository;

class I2Geo implements I2GeoInterface
{
    private $client;
    
    private $cache;

    public function __construct(Client $client, Repository $cache)
    {
        $this->client = $client;
        $this->cache = $cache;
    }

    public function resolveAddress($address, $language)
    {
        return $this->cache->remember($address, 24 * 60, function () use ($address, $language) {
            $response = $this->client->get('https://maps.googleapis.com/maps/api/geocode/json', ['query' => [
                'address' => $address,
                'language' => $language,
                'key' => config('i2geo.api_key')
            ]]);

            return json_decode($response->getBody()->getContents());
        });
    }

    public function resolveLatLng($lat, $lng, $language)
    {
        return $this->cache->remember($lat.','.$lng, 24 * 60, function () use ($lat, $lng, $language) {
            $response = $this->client->get('https://maps.googleapis.com/maps/api/geocode/json', ['query' => [
                'latlng' => $lat.','.$lng,
                'language' => $language,
                'key' => config('i2geo.api_key')
            ]]);

            return json_decode($response->getBody()->getContents());
        });
    }
    
}