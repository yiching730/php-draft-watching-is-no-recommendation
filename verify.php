<?php
$dbms = 'mysql';     //数据库类型
$host = 'localhost'; //数据库主机名
$dbName = 'message_board';    //使用的数据库
$user = 'root';      //数据库连接用户名
$pass = '';          //对应的密码
$dsn = "$dbms:host=$host;dbname=$dbName";

session_start();

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


echo 'Hello ' . $_POST['username'];
echo 'Hello ' . $_POST['password'];
echo '<hr>';

$username = $_POST['username'];
$password = $_POST['password'];


$sql = "SELECT * FROM `users` WHERE `account`='$username'";

echo $sql;


echo '<hr>';

$result = $dbh->query($sql);
echo '<pre>';
var_dump($result);
echo '</pre>';
echo '<hr>';
$userDataInDatabase = $result->fetch();

echo '<pre>';
var_dump($userDataInDatabase);
echo '</pre>';

$hashedPassword = $userDataInDatabase['password'];

if (password_verify($password, $hashedPassword)) {
    $_SESSION['user'] = $userDataInDatabase;
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}
