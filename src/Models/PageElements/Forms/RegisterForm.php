<?php

namespace App\Models\Forms;

class RegisterForm extends OuterForm
{
    public static function generate(){
        $content = <<<EOF
            <label for='username' class="form-label">User Name</label><br>
            <input type='text' id='username' name="username" class="form-control"><br>
            <label for='password' class="form-label">Password</label><br>
            <input type='password' id='password' name="password" class="form-control"><br>
            <label for='confirmPassword' class="form-label">Confirm Password</label><br>
            <input type='password' id='confirmPassword' name="confirmPassword" class="form-control"><br>
            <input type="submit" class="btn btn-primary" value="Register">
        EOF;

        return OuterForm::generateOuterForm('POST','','registerForm', $content);
    }
}
?>

