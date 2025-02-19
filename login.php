<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="main.css">
    </head>
    <body>
        <form method="post" action="login.php">
            <h1>Login</h1>
            <div class="textBtn">
                <input type="text" placeholder="Username" name="username">
            </div>
            <div class="textBtn">
                <input type="password" placeholder="Password" name="password">
            </div>
            <input type="submit" value="Login" class="LoginBtn" name="login_btn">
            <div class="signup">
                Don't have an account ?
            </br>
            <a href="#">Sign up</a>
            </div>
        </form>
    </body>
</html>

<?php
$conn = mysqli_connect("localhost","root","");
if(isset($_POST['login_btn'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $sql = "SELECT * FROM websitelogin.logindetails WHERE username = '$username'";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)){
        $resultpassword = $row["password"];
        if($password == $resultpassword){
            header('Location:index.html');
        }else{
            echo "<script>
                  alert('Login unsuccessful');
                  </script>";
        }
    }
}
?>