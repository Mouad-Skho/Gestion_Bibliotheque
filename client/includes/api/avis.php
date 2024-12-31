<?php

header('Content-Type: application/json');


include("../../../shared/libs/bd.php");

// التحقق من وجود id_livre
if (!isset($_GET['id_livre'])) {
    echo json_encode(['error' => 'معرف الكتاب غير موجود']);
    exit;
}

$idLivre = (int) $_GET['id_livre'];

// جلب التقييمات بناءً على id_livre
$stmt = $pdo->prepare("SELECT note FROM avis WHERE id_livre = :id_livre");
$stmt->bindParam(':id_livre', $idLivre, PDO::PARAM_INT);
$stmt->execute();
$reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (!$reviews) {
    echo json_encode(['reviews' => []]); // إذا لم تكن هناك تقييمات
    exit;
}

// حساب التقييمات
$ratings = array_column($reviews, 'note');
$averageRating = array_sum($ratings) / count($ratings);

// إرسال البيانات بصيغة JSON
echo json_encode([
    'reviews' => array_map(function($rating) {
        return ['rating' => (int)$rating['note']];
    }, $reviews),
    'average_rating' => number_format($averageRating, 1)
]);
exit;

?>