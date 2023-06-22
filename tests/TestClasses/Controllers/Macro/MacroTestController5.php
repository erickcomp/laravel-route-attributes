<?php

namespace Spatie\RouteAttributes\Tests\TestClasses\Controllers\Macro;

use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Macro;

#[Macro('testMacro1', MacroTestController5::class . '|testMacro1')]
class MacroTestController5 extends MacroTestController
{
    #[Get(MacroTestController::ROUTE_TESTE_ROUTE_URL, name: MacroTestController::ROUTE_TESTE_ROUTE_NAME)]
    #[Macro('testMacro2', MacroTestController5::class . '|testMacro2')]
    public function testRoute()
    {
    }
}
