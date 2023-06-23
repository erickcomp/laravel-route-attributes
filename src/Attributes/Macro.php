<?php

namespace Spatie\RouteAttributes\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS | Attribute::TARGET_METHOD | Attribute::IS_REPEATABLE)]
class Macro implements RouteAttribute
{
    protected string $macro;
    protected array $macroParams;

    public function __construct(string $macro, mixed...$macroParams)
    {
        $this->macro = $macro;
        $this->macroParams = $macroParams;
    }

    /**
     * This accessor was created to keep consistency with the "getMacroParams" accessor
     *
     * @return string
     */
    public function getMacro(): string
    {
        return $this->macro;
    }

    /**
     * The reason to creating this accessor is to make possible to make computations
     * before returning the macro parameters when extending Macro Attributes for specific tasks
     *
     * @return array
     */
    public function getMacroParams(): array
    {
        return $this->macroParams;
    }
}