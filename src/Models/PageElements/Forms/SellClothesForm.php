<?php

namespace App\Models\PageElements\Forms;

class SellClothesForm extends OuterForm
{
    public static function generate(): string
    {
        $content = <<<EOF
            <label for='title' class="form-label">Item Title + Description</label><br>
            <input type='text' id='title' name="title" class="form-control"><br>
            
            <label for='image' class="form-label">Image URL</label><br>
            <input type='text' id='image' name="image" class="form-control"><br>
            
            <label for='type' class="form-label">What type of clothing item are you selling?</label><br>
            <select id='type' name="type" class="form-control">
                <option value="">--Please choose an option--</option>
                <option value="0">T-Shirt</option>
                <option value="1">Jumper</option>
                <option value="2">Trousers</option>
                <option value="3">Shoes</option>
            </select>
            
            <label for='gender' class="form-label">Please select gender</label><br>
            <select id='gender' name="gender" class="form-control">
                <option value="">--Please choose an option--</option>
                <option value="0">Mens</option>
                <option value="1">Womens</option>
                <option value="2">Unisex</option>
            </select>
            
            <label for='size' class="form-label">Size</label><br>
            <input type='text' id='size' name="size" class="form-control"><br>
            
            <label for='condition' class="form-label">Please select gender</label><br>
            <select id='condition' name="condition" class="form-control">
                <option value="">--Please choose an option--</option>
                <option value="3">Brand new!</option>
                <option value="2">Excellent</option>
                <option value="1">Good</option>
                <option value="0">OK</option>
            </select>
            
            <input type="submit" class="btn btn-primary" value="Sell Item">
        EOF;

        return OuterForm::generateOuterForm('POST','','sellClothes', $content);
    }
}
?>

