<?php
    include("components/header.php");
?>

    <div class="page-content">
        <div class="panel sub-header">
            <h1 class="sub-title">Ayarlar</h1>
        </div>
        <div class="panel page-form">
            <h3 class="panel-title">Kullanıcı Adı / Şifre Değiştirme</h3>
            <form id="settings-form" class="container" action="php/changePassword.php" method="POST">
                <div class="form-group">
                    <label class="col-lg-4" for="username">Kullanıcı Adı:</label>
                    <input name="username" type="text" class="form-control col-lg-8" id="username" placeholder="Kullanıcı Adı" value="<?php echo $_SESSION['u_id'];?>" disabled="">
                </div>
                <div class="form-group">
                    <label class="col-lg-4" for="oldPwd">Şuanki Şifre:</label>
                    <input name="oldPassword" type="password" class="form-control col-lg-8" id="oldPwd" placeholder="Şuanki Şifreniz">
                </div>
                <div class="form-group">
                    <label class="col-lg-4" for="adminPwd">Yeni Şifre:</label>
                    <input name="password" type="password" class="form-control col-lg-8" id="adminPwd" placeholder="Yeni Şifreniz">
                </div>
                <div class="form-group">
                    <label class="col-lg-4" for="adminPwd2">Yeni Şifre (Tekrar):</label>
                    <input name="password2" type="password" class="form-control col-lg-8" id="adminPwd2" placeholder="Yeni Şifreniz (Tekrar)">
                </div>
                <div class="form-button">
                    <button name="submit" type="submit" class="btn btn-primary changePwd">Bilgileri Değiştir</button>
                </div>
            </form>
        </div>
    </div>
    <?php
    include("components/footer.php");
?>