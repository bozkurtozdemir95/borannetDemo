<?php
    include("components/header.php");
    include_once("includes/dbh.php");
?>

    <div class="page-content">
        <div class="panel sub-header">
            <h1 class="sub-title">Albüm</h1>
        </div>
        <div class="panel page-form">
            <h3 class="panel-title">Fotoğraf Ekleme Formu</h3>
            <form id="album-form" class="container" action="php/addPhoto.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="col-lg-4" for="albumTitle">Fotoğraf Başlığı:</label>
                    <input name="photoTitle" type="text" class="form-control col-lg-8" id="photoTitle" placeholder="Fotoğraf Başlığı">
                </div>
                <div class="form-group">
                    <label class="col-lg-4" for="albumImg">Fotoğraf Görseli:</label>
                    <input name="albumImg" type="file" class="form-control col-lg-8" id="albumImg" placeholder="Fotoğraf">
                </div>
                <div class="form-button">
                    <button name="submit" type="submit" class="btn btn-primary addPhoto">Fotoğraf Ekle</button>
                </div>

            </form>
        </div>
        <div class="panel page-table table-responsive">
            <h3 class="panel-title">Fotoğraf Listesi</h3>
            <table class="table table-striped news">
                <thead>
                    <tr>
                        <th scope="col">Fotoğraf</th>
                        <th scope="col">Fotoğraf Başlığı</th>
                        <th scope="col">İşlem</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                            $sql = "SELECT * FROM album";
                            $result = mysqli_query($conn, $sql);
                            $resultCheck = mysqli_num_rows($result);

                            if($resultCheck > 0) {
                                while($row = mysqli_fetch_assoc($result)){?>
                                    <tr>
                                        <td class="table-img"><img src="<?php echo $row['photo_url']?>"></img></td>
                                        <td><?php echo $row['photo_name']?></td>
                                        <td class="table-buttons">
                                            <a href="php/deletePhoto.php?id=<?php echo $row['id'];?>&delete=ok" class="btn btn-primary delete">Sil</a>
                                        </td>
                                    </tr>
                            <?php    }
                            }    
                        ?>                      
                </tbody>
            </table>
        </div>

    </div>
    <?php
    include("components/footer.php");
?>