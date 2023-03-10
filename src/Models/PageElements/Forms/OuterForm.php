<?php

namespace App\Models\Forms;

abstract class OuterForm
{
    protected static function generateOuterForm(string $method, string $action, string $class, string $content): string
    {
        return sprintf('<form method="%s" action="%s" class="%s">%s</form>', $method, $action, $class, $content);
    }
}