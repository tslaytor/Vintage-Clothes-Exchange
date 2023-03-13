<?php

namespace App\Models\PageElements\OtherElements;

class ProductTile
{
    public static function generate($product): string
    {
        $userListing = '';
        if (isset($_SESSION['USER'])){
            if ($product->getSellerId() === $_SESSION['USER']->getId()){
                $userListing = 'user-listing';
            }
        }
        $title = $product->getTitle();
        $gender = $product->getGender();
        $image = $product->getImage();
        $typeName = $product->getTypeName();
        $size = $product->getSize();
        $condition = $product->getConditionText();
        $price = $product->getPrice();
        $seller = $product->getSeller();


        return <<<EOF
            <div class="product-listing $userListing">
            <div class="listing-title">$title</div>
            <div class="listing-gender">$gender</div>
            <div class="image-container"><img class="listing-image" src="$image"></div>
            <div class="listing-condition">Type: $typeName</div>
            <div class="listing-condition">Size: $size</div>
            <div class="listing-condition">Condition: $condition</div>
            <div class="listing-price">Price: £$price</div>
            <div class="listing-sold-by">Sold by: $seller</div>
            </div>
            EOF;
    }
}