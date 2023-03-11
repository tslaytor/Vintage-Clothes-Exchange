<?php

namespace App\Models\PageElements\Forms;

class LoginForm extends OuterForm
{
    public static function generate(): string
    {
        $content = <<<EOF
            <label for='username' class="form-label">User Name</label><br>
            <input type='text' id='username' name="username" class="form-control"><br>
            <label for='password' class="form-label">Password</label><br>
            <input type='password' id='password' name="password" class="form-control"><br>
            <input type="submit" class="btn btn-primary" value="Register">
        EOF;

        return OuterForm::generateOuterForm('POST','','LoginForm', $content);
    }
}
?>

