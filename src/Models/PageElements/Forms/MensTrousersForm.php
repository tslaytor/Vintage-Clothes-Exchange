<?php

namespace App\Models\PageElements\Forms;

class MensTrousersForm extends OuterForm
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
            
            <label for='waist' class="form-label">Please select  waist size (inches)</label><br>
            <select id='waist' name="waist" class="form-control" required $disableControl>
                <option value="">--Please choose an option--</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
                <option value="32">32</option>
                <option value="33">33</option>
                <option value="34">34</option>
                <option value="35">35</option>
                <option value="36">36</option>
                <option value="37">37</option>
                <option value="38">38</option>
            </select>
            
            <label for='leg' class="form-label">Please select leg length (inches)</label><br>
            <select id='leg' name="leg" class="form-control" required $disableControl>
                <option value="">--Please choose an option--</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
                <option value="32">32</option>
                <option value="33">33</option>
                <option value="34">34</option>
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

