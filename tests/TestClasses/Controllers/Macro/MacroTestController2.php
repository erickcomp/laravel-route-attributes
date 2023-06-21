<?php

namespace Spatie\RouteAttributes\Tests\TestClasses\Controllers\Macro;

use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Macro;

#[Macro('testMacro1', MacroTestController2::ROUTE_TESTE_MACRO_1_PARAM_1)]
#[Macro('testMacro2', MacroTestController2::ROUTE_TESTE_MACRO_2_PARAM_1)]
class MacroTestController2 extends MacroTestController
{
    public const ROUTE_TESTE_MACRO_1_PARAM_1 = 'macro-1-param-1';
    public const ROUTE_TESTE_MACRO_2_PARAM_1 = 'macro-2-param-1';

    #[Get(MacroTestController::ROUTE_TESTE_ROUTE_URL, name: MacroTestController::ROUTE_TESTE_ROUTE_NAME)]
    public function testRoute()
    {
    }
}
