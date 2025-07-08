<?php

// 연결 생성
$dsn = "mysql:host=localhost;port=3306;dbname=gameserver;charset=utf8mb4";
$username = "root";
$password = "wodmsql1!";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];
$pdo = new PDO($dsn, $username, $password, $options);

$userId = 1;
$productId = 123512;

// 쿼리 실행
try {
    // 준비된 구문
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->bindValue(':id', $userId, PDO::PARAM_INT);
    $stmt->execute();
    
    $user = $stmt->fetch();
} catch (PDOException $e) {
    // 데이터베이스 오류 처리
}

// 트랜잭션
try {
    $pdo->beginTransaction();
    
    // 여러 쿼리 실행
    $stmt1 = $pdo->prepare("INSERT INTO orders (user_id, product_id) VALUES (:user_id, :product_id)");
    $stmt1->execute([':user_id' => $userId, ':product_id' => $productId]);
    
    $orderId = $pdo->lastInsertId();
    
    $stmt2 = $pdo->prepare("UPDATE inventory SET quantity = quantity - 1 WHERE product_id = :product_id");
    $stmt2->execute([':product_id' => $productId]);
    
    $pdo->commit();
} catch (PDOException $e) {
    $pdo->rollBack();
    throw $e;
}