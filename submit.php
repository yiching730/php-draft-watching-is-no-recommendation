<?php
$dbms = 'mysql';     //数据库类型
$host = 'localhost'; //数据库主机名
$dbName = 'message_board';    //使用的数据库
$user = 'root';      //数据库连接用户名
$pass = '';          //对应的密码
$dsn = "$dbms:host=$host;dbname=$dbName";


try {
    $dbh = new PDO($dsn, $user, $pass); //初始化一个PDO对象
    echo "连接成功<br/>";
    /*你还可以进行一次搜索操作
    foreach ($dbh->query('SELECT * from FOO') as $row) {
        print_r($row); //你可以用 echo($GLOBAL); 来看到这些值
    }
    */
} catch (PDOException $e) {
    die("Error!: " . $e->getMessage() . "<br/>");
}



echo 'Hello ' . $_POST['name'];
echo 'Hello ' . $_POST['username'];
echo 'Hello ' . $_POST['password'];
echo '<hr>';

$name = $_POST['name'];
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = "INSERT INTO `users`
(`name`, `account`, `password`) 
VALUES 
('$name','$username','$password')";

echo $sql;



$dbh->query($sql);
