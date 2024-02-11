<?php

include_once("./app/database/connect.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>２ちゃんねる掲示板</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <!-- ボタン要素を追加 -->
    <button id="scrollTopButton" onclick="scrollToTop()">⬆️</button>
    <?php include("app/parts/header.php"); ?>
    <?php include("app/parts/newThreadButton.php"); ?>
    <?php include("app/pages/rank.php"); ?>
    <!-- include("app/parts/thread.php"); -->
    <?php include("app/parts/validation.php"); ?>
</body>

</html>

<script>
    // ボタンが表示されるスクロール位置の閾値（ピクセル単位）
    var scrollThreshold = 100;
    
    // ボタン要素を取得
    var scrollTopButton = document.getElementById("scrollTopButton");
    
    // スクロールイベントリスナーを追加
    window.addEventListener("scroll", function() {
        if (window.scrollY > scrollThreshold) {
            // スクロール位置が閾値を超えたらボタンを表示
            scrollTopButton.style.display = "block";
        } else {
            // スクロール位置が閾値以下ならボタンを非表示
            scrollTopButton.style.display = "none";
        }
    });
    
    // ボタンがクリックされたときのスクロール処理
    function scrollToTop() {
        window.scrollTo({
            top: 0,
            behavior: "smooth" // スムーズなスクロール
        });
    }
</script>