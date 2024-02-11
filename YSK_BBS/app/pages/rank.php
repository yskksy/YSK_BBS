<?php 
include_once("app/database/connect.php");

//スレッドデータをテーブルから取得してくる.
$sql = "SELECT * FROM thread";
$statement = $pdo->prepare($sql);
$statement->execute();
$thread_data = $statement;

// thread テーブルから全ての id と title を取得
$sql2 = "SELECT thread_id FROM comment";
$statement2 = $pdo->prepare($sql2);
$statement2->execute();
$threads = $statement2->fetchAll(PDO::FETCH_ASSOC);

// $threads から thread_id のみを取り出す
$thread_ids = array_column($threads, 'thread_id');

// 各 thread_id の出現回数をカウント
$thread_id_counts = array_count_values($thread_ids);

// 出現回数が多い順に並べ替え
arsort($thread_id_counts);

// カウント配列のキー（ユニークな数字）を取得
$sorted_numbers = array_keys($thread_id_counts);

// id をキーとして title を値に持つ連想配列を作成
$thread_titles = [];
foreach ($thread_data as $thread) {
    $thread_titles[$thread['id']] = $thread['title'];
}
// print_r($thread_titles);
echo "<br>";

// 新しい連想配列を作成
$new_array = [];
foreach ($sorted_numbers as $id) {
    if (array_key_exists($id, $thread_titles)) {
        $new_array[$id] = $thread_titles[$id];
    }
}
?>



<div class="navi">
    <!-- <div class="crown"></div> -->
    <a class="rank" href="index.php">人気</a>
    <!-- <div class="clock icon"></div> -->
    <a class="new" href="app/pages/new.php">新着</a>
    <!-- <div class="more icon"></div> -->
    <a class="all" href="app/pages/allThread.php">一覧</a>
</div>

<div class="mainWrapper">
    <?php $number = 0; ?>
    <?php foreach ($new_array as $id => $title): ?>
    <div class="threadWrapper">
        <div class="rankicon">
            <div class="bookmark-solid icon">
                <?php $number += 1; ?>
                <p class="threadInformation"><?php echo $number; ?>位</p>
            </div>
        </div>
        <div class="chat icon"></div>
        <?php if (isset($thread_id_counts[$id])): ?>
            <p class="threadPostCount"><?php echo $thread_id_counts[$id]; ?>コメント</p>
        <?php endif; ?>
        <div class="childWrapper">
            <div class="threadTitle">
                <br>
                <h2>
                    <a class="threadlink" href="app/pages/allThread.php#thread_<?php echo $id; ?>">
                        <?php echo htmlspecialchars($title); ?>
                    </a>
                    <p class="commentnumber"></p>
                </h2>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>





