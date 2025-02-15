<?php

namespace Spatie\RouteAttributes\Tests\TestClasses\Controllers\Macro;

use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Macro;

#[Macro('testMacro1', MacroTestController2::class . '|testMacro1')]
#[Macro('testMacro2', MacroTestController2::class . '|testMacro2')]
class MacroTestController2 extends MacroTestController
{
    #[Get(MacroTestController::ROUTE_TESTE_ROUTE_URL, name: MacroTestController::ROUTE_TESTE_ROUTE_NAME)]
    public function testRoute()
    {
    }
}
