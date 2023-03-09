<?php

namespace App\Models\Forms;

class RegisterForm extends OuterForm
{
    public static function generate(){
        $content = <<<EOF
            <label for='userNameInput'>User Name</label><br>
            <input type='text' id='userNameInput'><br>
            <label for='password'>Password</label><br>
            <input type='password' id='password'><br>
            <label for='confirmPassword'>Confirm Password</label><br>
            <input type='password' id='confirmPassword'><br>
            <input type="submit">
        EOF;

        return OuterForm::generateOuterForm('POST','../../Controllers/RegisterUser.php','registerForm', $content);
    }
}
?>

