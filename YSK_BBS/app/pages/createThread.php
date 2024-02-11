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
    <?php include("../../app/parts/header.php"); ?>
    <?php include("../parts/validation.php"); ?>

    <div style="padding-left: 36px; color: #46ADC2;">
        <h2 style="margin-top: 20px; margin-bottom: 0;">新規スレッド立ち上げ</h2>
    </div>
    <form method="POST" class="formWrapper">
        <div>
            <label>スレッド名</label>
            <input type="text" name="title">
            <label>名前</label>
            <input type="text" name="username">
        </div>
        <div>
            <textarea name="body" class="commentTextArea"></textarea>
        </div>
        <input type="submit" value="立ち上げ" name="threadSubmitButton">
    </form>
    <button onclick="back()">戻る</button>
    <script>
    function back() {
        // トップページにリダイレクト
        window.location.href = 'http://localhost:8888/2chan-bbs-udemy-main';
    }
    </script>
    
</body>

</html>