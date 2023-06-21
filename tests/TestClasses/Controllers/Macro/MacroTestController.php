<?php

namespace Spatie\RouteAttributes\Tests\TestClasses\Controllers\Macro;

use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Macro;

#[Macro('testMacro1', MacroTestController1::ROUTE_TESTE_ROUTE_1_MACRO_PARAM)]
class MacroTestController
{
    public const ROUTE_TESTE_ROUTE_URL = 'teste-route-url';
    public const ROUTE_TESTE_ROUTE_NAME = 'teste-route-name';
}
