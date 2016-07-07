# i2geo
Collection of Google Maps API Web Services for Laravel
#Dependency
<a href="http://docs.guzzlephp.org/en/latest/" target="_blank">guzzlehttp/guzzle</a>
#Installation
edit composer.json by adding following line and run `composer update`
```
"require": { 
        ....,
        "iyexpert/i2geo":"*",

    },
```
#Configuration
Register package service provider and facade in 'config/app.php'
```
'providers' => [
    ...
    Iyexpert\I2Geo\I2GeoServiceProvider::class,
]
```
```
'aliases' => [
    ...
    'i2Geo' => Iyexpert\I2Geo\I2GeoFacade::class,
]
```
Publish configuration file using `php artisan vendor:publish --provider="iyexpert/i2geo"` or simply copy package configuration file and paste into config/i2geo.php

Open configuration file config/i2geo.php and add your Google Maps Geocoding API KEY
```
/**
 * 
 * Google Maps Geocoding API KEY
 * 
 * */
    
'api_key' => env('GOOGLE_API_KEY', '')
```
#Usage
Here is an example of making request to Geocoding API:
```
i2Geo::resolveAddress('Соборна 185', 'UK');
```
or
```
i2Geo::resolveLatLng('50.6174815', '26.2692579', 'UK');
```
#License
Collection is released under the MIT License.
