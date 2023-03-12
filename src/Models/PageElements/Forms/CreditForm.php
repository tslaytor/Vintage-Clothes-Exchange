<?php

namespace App\Models\PageElements\Forms;

class CreditForm extends OuterForm
{
    public static function generate(): string
    {
        $disableControl = '';
        if  (!isset($_SESSION['USER'])){
            $disableControl = 'disabled';
        }
        $content = <<<EOF
            <label for='amount' class="form-label">Enter amount below</label><br>
            <span>£</span><input type='number' id='amount' name="amount" step="0.01" class="form-control currency-input" $disableControl><br>
            <input type="submit" class="btn btn-primary" value="Add Credit" $disableControl>
        EOF;

        return OuterForm::generateOuterForm('POST','','CreditForm', $content);
    }
}
?>

