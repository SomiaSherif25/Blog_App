<?php 

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class StateFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'StateService';
    }
}