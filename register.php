<?php require('./templates/header.php'); ?>
<?php require('./db/connect.php'); ?>
<?php
    $action = $_GET['action'];
    if($action === 'register') {
        $username = $_POST['username'];
        $passowrd = $_POST['password'];
        $name = $_POST['name'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $encryptPassword = md5($passowrd);

        $sqlInsertMember = "INSERT INTO 
                            table_member 
                            (member_username, 
                            member_password, 
                            member_role, 
                            member_name, 
                            member_lastName,
                            member_email,
                            member_gender) VALUES 
                            ('$username', 
                            '$encryptPassword', 
                            '1', 
                            '$name', 
                            '$lastName', 
                            '$email', 
                            '$gender')";
        $resultInsertMember = $conn->exec($sqlInsertMember);

        if ($resultInsertMember) {
            // Alert to user
            echo "<script>alert('คุณสมัครสำเร็จ 😁')</script>";
            // Redirect to login page
            echo "<script>window.location.href='login.php'</script>";
            // header('Location: login.php'); 
        }
    }
?>
<div class="container">
    <h2>Register page.</h2>
    <form action="register.php?action=register" method="post">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control" id="username" placeholder="Insert username">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Insert password">
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Insert name">
        </div>
        <div class="form-group">
            <label for="lastName">Lastname</label>
            <input type="text" name="lastName" class="form-control" id="lastName" placeholder="Insert lastname">
        </div>
        <div class="form-group">
            <label for="email">email</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Insert email">
        </div>
        <div class="form-group">
            <div class="custom-control custom-radio">
                <input type="radio" id="customRadio1" name="gender" value="m" class="custom-control-input">
                <label class="custom-control-label" for="customRadio1">Male</label>
            </div>
            <div class="custom-control custom-radio">
                <input type="radio" id="customRadio2" name="gender" value="f" class="custom-control-input">
                <label class="custom-control-label" for="customRadio2">Female</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>

<?php require('./templates/footer.php'); ?>