<?php 
include_once("../database/connect.php");

//コメントデータをテーブルから取得してくる.
$sql = "SELECT * FROM thread ORDER BY id DESC";
$statement = $pdo->prepare($sql);
$statement->execute();

$thread_data = $statement;

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>２ちゃんねる掲示板</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>

<body>
    <?php include("../parts/validation.php"); ?>
    <?php include("../../app/parts/header.php"); ?>
    <?php include("../../app/parts/newThreadButton.php"); ?>
    
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
    
    <div class="mainWrapper">
        <?php foreach ($thread_data as $thread) : ?>
            <div class="threadWrapper">
                <div class="childWrapper">
                    <div class="threadTitle">
                        <h2><a class="threadlink" href="http://localhost:8888/2chan-bbs-udemy-main/app/pages/allThread.php#thread_<?php echo $thread["id"];?>">
                        <?php echo htmlspecialchars($thread["title"]); ?></a><h2>

                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</body>