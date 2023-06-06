<?php

$comment_array = array();
$pdo = null;
$stmt = null;
   //DB接続
   try{
    $pdo = new PDO('mysql:host=localhost;dbname=bbs-yt', "root", "");

   } catch (PDOException $e) {
       echo $e->getMessage();
   }

//フォームを打ち込んだとき
    if(!empty( $_POST["submitButton"])) {
$postData = date("Y-m-d H:i:s");

        try {
            $stmt = $pdo->prepare("INSERT INTO `bbs-table` (`username`, `comment`, `postData`) VALUES (:username, :comment, :postData);");
            $stmt->bindParam(':username', $_POST['username'], PDO::PARAM_STR);
            $stmt->bindParam(':comment', $_POST["comment"], PDO::PARAM_STR);
            $stmt->bindParam(':postData', $postData, PDO::PARAM_STR);
            
            $stmt->execute();

        }catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
   

   //DBからコメントデータを取得する
   $sql = "SELECT `id`, `username`, `comment`, `postData` FROM `bbs-table`;";
   $comment_array = $pdo->query($sql);

   //DBの接続を閉じる
   $pdo = null;

   ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP掲示板</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1 class="title">お笑い掲示板</h1>
    <hr>
    <div clas="boardWrapper">
       <section>
        <?php foreach($comment_array as $comment): ?>
        <article>
        <div class="wrapper">
            <div class="nameArea">
                <span>名前:
                <p class="username"><?php echo $comment["username"]; ?></p>
                <time>:<?php echo $comment["postData"]; ?></time>
            </div>
            <p></p>
            <p class="comment"><?php echo $comment["comment"]; ?></p>
        </div>
        </article>
        <?php endforeach; ?>
        </section>

        <form class="formWrapper" method="POST">
            <div>
                <input type="submit" value="書き込む" name="submitButton">
                <label for="">名前:</label>
                <input type="text" name="username">

            </div>
            <div>
                <textarea class="commentTextArea" name="comment"></textarea>
            </div>
         </form>
    </div>
</body>

</html>
