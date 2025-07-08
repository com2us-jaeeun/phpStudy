<?php

require __DIR__ . '/vendor/autoload.php';

use App\Models\MemoryProductRepository;
use App\Models\Product;

$product = new Product();
$product->id = 1;
$product->name = "삼겹살";

$repo = MemoryProductRepository::getInstance();
$repo->save($product);

echo $repo->findById(1)->name; // 삼겹살
