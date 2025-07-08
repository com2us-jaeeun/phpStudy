<?php

namespace App\Services;

use App\Models\Product;

class ProductService {
    public function getProduct(int $id): Product {
        $product = new Product();
        $product->id = $id;
        $product->name = "제품 {$id}";
        return $product;
    }
}