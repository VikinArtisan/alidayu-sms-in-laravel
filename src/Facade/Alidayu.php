<?php

namespace Vikin\Alidayu\Facade;

use Illuminate\Support\Facades\Facade;

class Alidayu extends Facade
{
    protected static function getFacadeAccessor ()
    {
        return 'alidayu';
    }
}