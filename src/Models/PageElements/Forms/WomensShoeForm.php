<?php

namespace App\Models\PageElements\Forms;

class WomensShoeForm extends OuterForm
{
    public static function generate(): string
    {
        $disableControl = '';
        if  (!isset($_SESSION['USER'])){
            $disableControl = 'disabled';
        }

        $content = <<<EOF
            <label for='title' class="form-label">Item Title + Description</label><br>
            <input type='text' id='title' name="title" class="form-control" required $disableControl><br>
            
            <label for='image' class="form-label">Image URL</label><br>
            <input type='text' id='image' name="image" class="form-control" required $disableControl><br>
            
            <label for='size' class="form-label">Please select size</label><br>
            <select id='size' name="size" class="form-control" required $disableControl>
                <option value="">--Please choose an option--</option>
                <option value="2">2</option>
                <option value="2.5">2.5</option>
                <option value="3">3</option>
                <option value="3.5">3.5</option>
                <option value="4">4</option>
                <option value="4.5">4.5</option>
                <option value="5">5</option>
                <option value="5.5">5.5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
            </select>
            
            <label for='condition' class="form-label">Please select condition</label><br>
            <select id='condition' name="condition" class="form-control" required $disableControl>
                <option value="">--Please choose an option--</option>
                <option value="3">Brand new!</option>
                <option value="2">Excellent</option>
                <option value="1">Good</option>
                <option value="0">OK</option>
            </select>
            
            <label for='price' class="form-label">Price</label><br>
            <span>£</span><input type='number' id='price' name="price" step="0.01" class="form-control currency-input" required $disableControl><br>
            
            <input type="submit" class="btn btn-primary" value="Sell Item" $disableControl>
        EOF;

        return OuterForm::generateOuterForm('POST','','sellClothes', $content);
    }
}