<?php

namespace Spatie\RouteAttributes\Tests\TestClasses\Controllers\Macro;

use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Macro;

class MacroTestController3 extends MacroTestController
{
    public const ROUTE_TESTE_MACRO_1_PARAM_1 = 'macro-1-param-1';

    #[Get(MacroTestController::ROUTE_TESTE_ROUTE_URL, name: MacroTestController::ROUTE_TESTE_ROUTE_NAME)]
    #[Macro('testMacro1', MacroTestController3::ROUTE_TESTE_MACRO_1_PARAM_1)]
    public function testRoute()
    {
    }
}
