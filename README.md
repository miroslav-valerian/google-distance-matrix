# Google Distance Matrix API
Estimate travel time and distance for multiple destinations.

Requirements
============
Requires PHP 5.5.0 or higher.


Installation
=============

The best way to install valerian/google-distance-matrix is using  [Composer](http://getcomposer.org/):

```sh
$ composer require valerian/google-distance-matrix
```

Getting Started
===============

```php

$distanceMatrix = new GoogleDistanceMatrix('YOUR API KEY');
$distance = $distanceMatrix->setLanguage('cs')
    ->addOrigin('49.950096, 14.668544')
    ->addOrigin('49.950096, 15.668544')
    ->addDestination('50.031817, 14.490880')
    ->addDestination('51.031817, 14.490880')
    ->sendRequest();

```

```php
$distanceMatrix = new GoogleDistanceMatrix('YOUR API KEY');
$distance = $distanceMatrix->setLanguage('cs')
    ->setOrigin('K Habrovci 447, 251 63 Strančice, Česká republika')
    ->setDestination('Roztylská 2321/19, Chodov, 148 00 Praha-Praha 11, Česká republika')
    ->setMode(GoogleDistanceMatrix::MODE_WALKING)
    ->setLanguage('en-GB')
    ->setUnits(GoogleDistanceMatrix::UNITS_IMPERIAL)
    ->setAvoid(GoogleDistanceMatrix::AVOID_HIGHWAYS)
    ->sendRequest();
```
    
For more info, please visit https://developers.google.com/maps/documentation/distance-matrix/