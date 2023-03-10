<?php

namespace App\Models\PageElements\Forms;

class CreditForm extends OuterForm
{
    public static function generate(): string
    {
        $content = <<<EOF
            <label for='amount' class="form-label">Enter amount below</label><br>
            <span>£</span><input type='number' id='amount' name="amount" step="0.01" class="form-control currency-input"><br>
            <input type="submit" class="btn btn-primary" value="Add Credit">
        EOF;

        return OuterForm::generateOuterForm('POST','','CreditForm', $content);
    }
}
?>

