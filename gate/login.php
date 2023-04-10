<?php 
 require '../config.php';



 if(isset($_POST['submit']))
 {
    if(login($_POST) > 0)
    {
        echo "
            <script>
                alert('Login Berhasil');
                document.location.href = '../user/profile.php';
            </script>
        ";
    }
    else
    {
        echo "
            <script>
                alert('Login Gagal');
                document.location.href = 'login.php';
            </script>
        ";
    }
 }


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login Form</title>
</head>
<body>
    <section>
        <div class ="login">
             <div class="content">
                <h2>Login</h2>
                <form action="" method="post">
                <div class="form">
                    <div class="inputBx">
                        <input type="text" name="nim" required>
                         <i>Masukan NIM</i>
                    </div>
                    <div class="inputBx">
                        <input type="password" name="password" required>
                         <i>Masukan Password</i>
                    </div>
                    <div class="inputBx">
                        <input type="submit" name="submit" value="login">
                    </div>
                 </div>
                </form>
            </div>
        </div>          
    </section>

</body>
</html>