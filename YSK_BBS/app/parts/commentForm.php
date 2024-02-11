<?php

$position = 0;


if (isset($_POST["submitButton"])) {
    $position = $_POST["position"];
}

?>

<form class="formWrapper" method="POST">
    <div>
        <input class="laberlsubmit" type="submit" value="投稿" name="submitButton">

        <label for="anonymous-<?php echo $thread["id"]; ?>" style="font-size:13px; color:gray;">匿名で投稿</label>
        <input class="check" type="checkbox" id="anonymous-<?php echo $thread["id"]; ?>" name="anonymous" onchange="toggleNameField('<?php echo $thread["id"]; ?>')" checked>

        <label for="username-<?php echo $thread["id"]; ?>" style="font-size:13px; color:gray;">名前:</label>
        <input class="input" type="text" id="username-<?php echo $thread["id"]; ?>" name="username">
        <input type="hidden" name="threadID" value="<?php echo $thread["id"]; ?>">
        
    </div>
    <div>
        <textarea class="commentTextArea" name="body"></textarea>
    </div>
    <input type="hidden" name="position" value="0">
</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>

    $(document).ready(() => {
    // すべてのチェックボックスに対して処理を実行
    $("input[type='checkbox'][id^='anonymous-']").each(function() {
        var threadId = this.id.split('-')[1];
        toggleNameField(threadId);
    });
    
    $("input[type=submit]").click(() => {
        let position = $(window).scrollTop();
        $("input:hidden[name=position]").val(position);
    });
    $(window).scrollTop(<?php echo $position; ?>);
});



    function toggleNameField(threadId) {
    var checkBox = document.getElementById("anonymous-" + threadId);
    var nameField = document.getElementById("username-" + threadId);

    if (checkBox.checked) {
        nameField.style.display = "none";
        nameField.value = '匿名';
    } else {
        nameField.style.display = "block";
        nameField.value = '';
    }
}
history.pushState(null, null, location.href);
window.addEventListener('popstate', (e) => {
    history.go(1);
});

</script>

