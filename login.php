<?php
echo "<link rel='stylesheet' href='style.css'>";
header('Content-Type: text/html; charset=UTF-8');
session_start();
if (!empty($_SESSION['login'])) {
    header('Location: index.php');
}
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
?>
<form action="login.php" method="post">
  <input name="login" />
  <input name="password" type ="password"/>
  <input type="submit" value="Войти" />
</form>


<?php
}
else {
    $login=$_POST['login'];
    $pswrd=$_POST['password'];
    $uid=0;
    $error=TRUE;
    $user = 'u52806';
    $pass = '7974759';
    $db1 = new PDO('mysql:host=localhost;dbname=u52806', $user, $pass, array(PDO::ATTR_PERSISTENT => true));
    if(!empty($login) and !empty($pswrd)){
        
      
      try{
            $check=$db1->prepare("SELECT * FROM login WHERE login=?");
            $check->bindParam(1,$login);
            $check->execute();
            $username=$check->fetchALL();
            if(password_verify($pswrd,$username[0][2])){
                $uid=$username[0]['id'];
                $error=FALSE;
            }
        }
        catch(PDOException $e){
            print('Error : ' . $e->getMessage());
            exit();
        }
    }
  
  
  
    if($error==TRUE){
        print('Неправильные логин или пароль <br> Создайте новый <a href="index.php"> аккаунт </a> или <a href="login.php"> повторите поытку входа </a> ');
        session_destroy();
        exit();
    }


  $_SESSION['login'] = $login;
  $_SESSION['uid'] = $uid;
  header('Location: index.php');
}
