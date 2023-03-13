<?php

namespace App\Models\PageElements\OtherElements;

class Footer
{
    public static function generate(): string
    {
        return <<<EOF
                </body>
            </html>
            EOF;
    }
}