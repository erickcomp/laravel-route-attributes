<?php

namespace Spatie\RouteAttributes\Tests\TestClasses\Controllers\Macro;

use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Macro;

class MacroTestController3 extends MacroTestController
{
    #[Get(MacroTestController::ROUTE_TESTE_ROUTE_URL, name: MacroTestController::ROUTE_TESTE_ROUTE_NAME)]
    #[Macro('testMacro1', MacroTestController3::class . '|testMacro1')]
    public function testRoute()
    {
    }
}
