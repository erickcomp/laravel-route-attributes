<?php

namespace Spatie\RouteAttributes\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS | Attribute::TARGET_METHOD | Attribute::IS_REPEATABLE)]
class Macro implements RouteAttribute
{
    public string $macro;
    public array $macroParams;

    public function __construct(string $macro, mixed...$macroParams)
    {
        $this->macro = $macro;
        $this->macroParams = $macroParams;
    }

    /**
     * This method is entended to facilitate the usage inside the ```\Spatie\RouteAttributes\Attributes\Route``` constructor
     *
     * @param string $macro
     * @param mixed ...$macroParams
     * 
     * @return static
     */
    public static function new(string $macro, mixed...$macroParams): static
    {
        return new static($macro, ...$macroParams);
    }
}