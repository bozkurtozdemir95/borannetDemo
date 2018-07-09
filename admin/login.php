<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>LOGIN</title>
</head>

<body>
    <div class="panel login-form col-lg-4 offset-lg-4 col-md-4 offset-md-4 col-sm-12 col-xs-12">
        <h1 class="sub-title">Admin Girişi</h1>
        <form class="loginForm" action="php/login.php" method="POST" autocomplete="off">
            <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="Kullanıcı Adı">
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Şifre">
            </div>
            <div class="form-button">
                <button type="submit" class="btn btn-primary mainbutton" name="submit">Giriş Yap</button>
            </div>
        </form>
    </div>

</body>

</html>