<?php

namespace App\Models\PageElements\Forms;

class LogoutForm extends OuterForm
{
    public static function generate(): string
    {
        $content = <<<EOF
            <input type="submit" class="btn btn-primary" value="Log Out">
        EOF;
        return OuterForm::generateOuterForm('POST','','LogoutForm', $content);
    }
}
?>

