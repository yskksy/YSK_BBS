<?php
include_once("../database/connect.php");
include("../../app/functions/thread_add.php");
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規スレッド作成ページ</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>

<body>
    <!-- ボタン要素を追加 -->
    <button id="scrollTopButton" onclick="scrollToTop()">⬆️</button>

    <?php include("../parts/validation.php"); ?>
    <?php include("../../app/parts/header.php"); ?>
    <?php include("../parts/newThreadButton.php"); ?>


    <div class="navi">
        <a class="rank" href="http://localhost:8888/2chan-bbs-udemy-main/index.php">
            人気
        </a>
        
        <a class="new" href="http://localhost:8888/2chan-bbs-udemy-main/app/pages/new.php">
            新着
        </a>
        
        <a class="all" href="http://localhost:8888/2chan-bbs-udemy-main/app/pages/allThread.php">
            一覧
        </a>
    
    </div>

    <?php include("../parts/threads.php"); ?>

    <script>
    window.onload = function() {
        //URLからハッシュタグ以降の部分を取得
        var hash = window.location.hash;

        if (hash && document.getElementById(hash.substring(1))) {
            setTimeout(function() {
                document.getElementById(hash.substring(1)).scrollIntoView({ behavior: 'smooth' });
            }, 0);
        }
    };
    // ボタンが表示されるスクロール位置の閾値（ピクセル単位）
    var scrollThreshold = 1000;
    
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
    

</body>
</html>


