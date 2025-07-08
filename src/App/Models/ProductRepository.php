<?php

namespace App\Models;

use App\Models\Product;
use Server\Base\Singleton;

interface ProductRepository {
    public function findById(int $id);
    public function save($product);
    public function delete(int $id);
}