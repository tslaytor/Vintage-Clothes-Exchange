<?php

namespace App\Models\PageElements\Forms;

abstract class OuterForm
{
    protected static function generateOuterForm(
        string $method,
        string $action,
        string $class,
        string $generatedContent): string
    {
        return sprintf(
            '<form method="%s" action="%s" class="%s">%s</form>',
            $method, $action, $class, $generatedContent);
    }

//    abstract public static function generate(): string;
}