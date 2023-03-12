<?php

namespace App\Models\PageElements\Forms;

class WomensTrousersForm extends OuterForm
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
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
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
?>

