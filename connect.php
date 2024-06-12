<?php
$host = 'koko.database.windows.net';
$db = 'kokoDataBase';
$user = 'koko-sql';
$pass = 'Admintest1';
$charset = 'utf8mb4';

$dsn = "sqlsrv:server=$host;database=$db";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

$query = $_POST['query'];

// 検索結果を生成（実際には外部APIや内部ロジックで生成）
$result = "Dummy result for query: " . htmlspecialchars($query);

// データベースに検索結果を格納
$sql = "INSERT INTO SearchResults (search_query, result) VALUES (:query, :result)";
$stmt = $pdo->prepare($sql);
$stmt->execute(['query' => $query, 'result' => $result]);

// 検索結果を表示
echo '<p>Search query: ' . htmlspecialchars($query) . '</p>';
echo '<p>Search result: ' . htmlspecialchars($result) . '</p>';
?>



