<?php

namespace ArielMejiaDev\FilamentPrintable\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \ArielMejiaDev\FilamentPrintable\FilamentPrintable
 */
class FilamentPrintable extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \ArielMejiaDev\FilamentPrintable\FilamentPrintable::class;
    }
}
