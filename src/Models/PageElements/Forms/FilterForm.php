<?php

namespace App\Models\PageElements\Forms;

class FilterForm extends OuterForm
{
    public static function generate($function, $category): string
    {
        $content = <<<EOF
            <input type="hidden" name="function" value="$function">
            <input type="submit" class="filter-form" value="$category">
        EOF;
        return OuterForm::generateOuterForm('POST','','filter-form', $content);
    }
}
?>

