<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Search Results</title>
</head>
<body>
    <h1>Search Results</h1>

    <?php
    // データベースへの接続情報
    $servername = "momodatabase.database.windows.net";
    $username = "sqladmintest";
    $password = "Admintest1";
    $dbname = "momoDataBase";

    // ユーザーが送信した検索クエリを取得
    $searchQuery = $_POST['searchQuery'];

    // データベースに接続
    $conn = new mysqli($servername, $username, $password, $dbname);

    // 接続エラーの確認
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // 検索結果の取得
    $sql = "SELECT * FROM your_table WHERE column_name LIKE '%$searchQuery%'";
    $result = $conn->query($sql);

    // 検索結果の表示
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "ID: " . $row["id"]. " - Name: " . $row["name"]. "<br>";
        }
    } else {
        echo "0 results";
    }

    // データベース接続のクローズ
    $conn->close();
    ?>

</body>
</html>
