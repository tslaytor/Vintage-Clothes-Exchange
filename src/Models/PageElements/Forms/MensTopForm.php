<?php

namespace App\Models\PageElements\Forms;

class MensTopForm extends OuterForm
{
    public static function generate(): string
    {
        $content = <<<EOF
            <label for='title' class="form-label">Item Title + Description</label><br>
            <input type='text' id='title' name="title" class="form-control" required><br>
            
            <label for='image' class="form-label">Image URL</label><br>
            <input type='text' id='image' name="image" class="form-control" required><br>
            
            <label for='size' class="form-label">Please select size</label><br>
            <select id='size' name="size" class="form-control" required>
                <option value="">--Please choose an option--</option>
                <option value="XS">XS</option>
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
            </select>
            
            <label for='condition' class="form-label">Please select condition</label><br>
            <select id='condition' name="condition" class="form-control" required>
                <option value="">--Please choose an option--</option>
                <option value="3">Brand new!</option>
                <option value="2">Excellent</option>
                <option value="1">Good</option>
                <option value="0">OK</option>
            </select>
            
            <label for='price' class="form-label">Price</label><br>
            <span>£</span><input type='number' id='price' name="price" step="0.01" class="form-control currency-input" required><br>
            
            <input type="submit" class="btn btn-primary" value="Sell Item">
        EOF;

        return OuterForm::generateOuterForm('POST','','sellClothes', $content);
    }
}
?>

