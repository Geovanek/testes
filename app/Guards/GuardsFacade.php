<?php

namespace App\Guards;

use Illuminate\Support\Facades\Facade;

class GuardsFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return GuardsManager::class;
    }

}