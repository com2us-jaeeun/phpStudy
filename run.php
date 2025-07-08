<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Services\ProductService;

$service = new ProductService();
$product = $service->getProduct(1);

echo $product->id . ' : ' . $product->name . PHP_EOL;
