<?php

namespace App\Models;

use App\Models\Product;
use Server\Base\Singleton;

class MemoryProductRepository implements ProductRepository {
    use Singleton;
    
    private array $products = [];
    
    public function findById(int $id) {
        return $this->products[$id] ?? null;
    }
    
    public function save($product) {
        $this->products[$product->id] = $product;
    }
    
    public function delete(int $id) {
        unset($this->products[$id]);
    }
}