<?php

namespace App\Models\Forms;

abstract class Form
{
    protected static function generateOuterForm(string $class, string $content): string
    {
        sprintf('<form class="%s">%s</form>', $class, $content);
    }
}