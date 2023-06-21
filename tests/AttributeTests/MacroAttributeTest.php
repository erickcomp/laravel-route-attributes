<?php

namespace Spatie\RouteAttributes\Tests\AttributeTests;

use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Route;
use Spatie\RouteAttributes\Tests\TestCase;
use Spatie\RouteAttributes\Tests\TestClasses\Controllers\Macro\MacroTestController1;
use Spatie\RouteAttributes\Tests\TestClasses\Controllers\Macro\MacroTestController2;
use Spatie\RouteAttributes\Tests\TestClasses\Controllers\Macro\MacroTestController3;
use Spatie\RouteAttributes\Tests\TestClasses\Controllers\Macro\MacroTestController4;
use Spatie\RouteAttributes\Tests\TestClasses\Controllers\Macro\MacroTestController5;

class MacroAttributeTest extends TestCase
{
    protected const MACRO_NAME_PREFIX = 'testMacro';
    protected const MACRO_OUT_FILE_FILENAME_PREFIX = 'tmp/SpatieRouteAttributesTest_';
    
    public function setUp(): void
    {
        parent::setUp();
        $this->setupMacrosOnRouteClass();
    }

    /** @test */
    public function it_can_add_single_macro_to_a_class()
    {
        $this->routeRegistrar->registerClass(MacroTestController1::class);

        $this->assertRouteExecutedMacro(
            __FUNCTION__,
            MacroTestController1::ROUTE_TESTE_ROUTE_NAME,
            'testMacro1',
            MacroTestController1::ROUTE_TESTE_MACRO_1_PARAM_1,
        );
    }

    /** @test */
    public function it_can_add_multiple_macros_to_a_class()
    {
        $this->routeRegistrar->registerClass(MacroTestController2::class);

        $this->assertRouteExecutedMacro(
            __FUNCTION__,
            MacroTestController1::ROUTE_TESTE_ROUTE_NAME,
            'testMacro1',
            MacroTestController1::ROUTE_TESTE_MACRO_1_PARAM_1,
        );

        $this->assertRouteExecutedMacro(
            __FUNCTION__,
            MacroTestController2::ROUTE_TESTE_ROUTE_NAME,
            'testMacro2',
            MacroTestController2::ROUTE_TESTE_MACRO_2_PARAM_1,
        );
    }

    /** @test */
    public function it_can_add_single_macro_to_a_method()
    {
        $this->routeRegistrar->registerClass(MacroTestController3::class);

        $this->assertRouteExecutedMacro(
            __FUNCTION__,
            MacroTestController3::ROUTE_TESTE_ROUTE_NAME,
            'testMacro1',
            MacroTestController3::ROUTE_TESTE_MACRO_1_PARAM_1,
        );
    }

    public function it_can_add_multiple_macros_to_a_method()
    {
        
    }

    public function it_uses_macros_registered_in_class_and_in_method()
    {

    }

    public function it_executed_all_macros_registered_into_route()
    {
        $this->routeRegistrar->registerClass(MacroTestController1::class);
        $this->assertRouteExecutedMacro('teste-route-2', 'testMacro2', );

    }

    /** @test */
    // public function it_can_add_a_route_name_to_a_method()
    // {
    //     $this->routeRegistrar->registerClass(RouteNameTestController::class);

    //     $this->assertRouteRegistered(
    //         controller: RouteNameTestController::class,
    //         name: 'test-name',
    //     );
    // }

    // /** @test */
    // public function it_can_add_a_route_for_an_invokable()
    // {
    //     $this->routeRegistrar->registerClass(InvokableRouteGetTestController::class);

    //     $this
    //         ->assertRegisteredRoutesCount(1)
    //         ->assertRouteRegistered(
    //             controller: InvokableRouteGetTestController::class,
    //             controllerMethod: InvokableRouteGetTestController::class,
    //             uri: 'my-invokable-route'
    //         );
    // }

    protected function setupMacrosOnRouteClass()
    {
        for($i = 1; $i < 6; $i++) {
            $macroName = self::MACRO_NAME_PREFIX . $i;
            $macroOutFile = self::MACRO_OUT_FILE_FILENAME_PREFIX . $macroName;

            Storage::disk('local')->delete($macroOutFile);

            \Illuminate\Routing\Route::macro($macroName, function(string $test) use ($macroOutFile) {
                Storage::disk('local')->put($macroOutFile, $test);
            });
        }
    }

    protected function assertRouteExecutedMacro(string $testName, string $routeName, string $macroName, string $macroTestParam)
    {
        $macroOutFile = self::MACRO_OUT_FILE_FILENAME_PREFIX . $macroName;

        foreach ($this->getRouteCollection()->getRoutes() as $route) {
            if($route->getName() === $routeName) {
                $routeExecutedFileContent = Storage::disk('local')->get($macroOutFile);

                $errMsg = \sprintf('Failed test "%s": macro "%s" did not get executed on route "%s"', $testName, $macroName, $routeName);
                $this->assertSame($macroTestParam, $routeExecutedFileContent, $errMsg);

                return;
            }
        }

        $this->fail(\sprintf('Failed test "%s": Route "%s" did not get registered', $testName, $routeName));
    }
}
