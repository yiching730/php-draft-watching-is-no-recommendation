<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        label {
            color: blue;
        }
    </style>
</head>

<body>
    <form action="board.php" method="POST">
        <label for="title" style="color: blue;">留言者：</label>
        <input type="text" readonly id="title" value="<?= $_SESSION['user']['name'] ?>"><br>

        <label for="title2" style="color: blue;">標題：</label>
        <input type="text" name="title2" placeholder="內容" id="title"><br>

        <label for="message2" style="color: blue;">內容：</label>
        <textarea name="message2" id="message2" cols="30" rows="10" placeholder="請輸入留言"></textarea><br>

        <input type="submit" name="submit" id="" value="送出">
    </form>


</body>

</html>