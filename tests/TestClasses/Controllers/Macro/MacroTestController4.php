<?php

namespace Spatie\RouteAttributes\Tests\TestClasses\Controllers\Macro;

use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Macro;

class MacroTestController4 extends MacroTestController
{
    #[Get(MacroTestController::ROUTE_TESTE_ROUTE_URL, name: MacroTestController::ROUTE_TESTE_ROUTE_NAME)]
    #[Macro('testMacro1', MacroTestController4::class . '|testMacro1')]
    #[Macro('testMacro2', MacroTestController4::class . '|testMacro2')]
    public function testRoute()
    {
    }
}
