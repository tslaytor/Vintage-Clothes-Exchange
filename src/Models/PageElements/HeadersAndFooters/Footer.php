<?php

namespace App\Models\PageElements\HeadersAndFooters;

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