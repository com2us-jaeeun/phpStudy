<?php

trait Cacheable {
    private array $cache = [];
    
    public function cacheGet(string $key) {
        return $this->cache[$key] ?? null;
    }
    
    public function cacheSet(string $key, $value): void {
        $this->cache[$key] = $value;
    }
    
    public function cacheHas(string $key): bool {
        return isset($this->cache[$key]);
    }
    
    public function cacheClear(): void {
        $this->cache = [];
    }
}

class ProductService {
    use Cacheable;
    
    public function getProduct(int $id) {
        $cacheKey = "product_{$id}";
        
        if ($this->cacheHas($cacheKey)) {
            return $this->cacheGet($cacheKey);
        }
        
        // 데이터베이스에서 상품 조회 (예시)
        $product = ['id' => $id, 'name' => "Product {$id}"];
        
        $this->cacheSet($cacheKey, $product);
        return $product;
    }
}