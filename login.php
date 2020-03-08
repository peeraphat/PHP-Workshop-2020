<?php require('./templates/header.php'); ?>
<?php require('./db/connect.php'); ?>
<?php 
  if(!empty($_SESSION['memberId'])) {
    header('Location: index.php');
  }
?>
<?php
    $action = $_GET['action'];
    if($action === 'login') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $encryptPassword = md5($password);

        $sqlLogin = "SELECT * FROM table_member 
                     WHERE member_username = '$username' 
                     AND member_password = '$encryptPassword'";
        $queryLogin = $conn->query($sqlLogin);
        $resultLogin = $queryLogin->fetch();
        // var_dump($resultLogin);
        // print("<pre>".print_r($resultLogin, true)."</pre>");
        
        if ($resultLogin) {
          $_SESSION['memberId'] = $resultLogin['member_id'];
          $_SESSION['username'] = $resultLogin['member_username'];
          echo "<script>alert('เข้าสู่ระบบสำเร็จ')</script>";
          echo "<script>window.location.href= 'index.php'</script>";
        } else {
          echo "<script>alert('ใส่ข้อมูลไม่ถูกต้อง')</script>";
          echo "<script>window.history.back()</script>";
        }

    }
?>

<link rel="stylesheet" href="styles/login.css">

<div class="container">
<form action="login.php?action=login" method="post" class="form-signin" >
  <h1 class="h3 mb-3 font-weight-normal">Please log in</h1>
  <label for="inputEmail" class="sr-only">Username</label>
  <input type="text" name="username" id="inputEmail" class="form-control" placeholder="Username" required autofocus>
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
</form>

</div>

<?php require('./templates/footer.php'); ?>