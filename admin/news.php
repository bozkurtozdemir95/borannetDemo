<?php
    include("components/header.php");
    include_once("includes/dbh.php");
?>

    <div class="page-content">
        <div class="panel sub-header">
            <h1 class="sub-title">Haberler</h1>
        </div>
        <div class="panel page-form">
            <h3 class="panel-title">Haber Ekleme Formu</h3>
            <form id="news-form" class="container" action="php/createNews.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="col-lg-4" for="newsTitle">Haber Başlığı:</label>
                    <input name="newsTitle" type="text" class="form-control col-lg-8" id="newsTitle" placeholder="Haber Başlığı">
                </div>
                <div class="form-group">
                    <label class="col-lg-4" for="newsImg">Haber Görseli:</label>
                    <input name="newsImg" type="file" class="form-control col-lg-8" id="newsImg" placeholder="Haber Görseli">
                </div>
                <div class="form-group">
                    <label class="col-lg-4" for="newsDesc">Haber Açıklaması:</label>
                    <textarea name="newsDesc" class="form-control col-lg-8" id="newsDesc" rows="3"></textarea>
                </div>
                <div class="form-button">
                    <button name="submit" type="submit" class="btn btn-primary mainbutton">Haber Oluştur</button>
                </div>
            </form>
        </div>
        <div class="panel page-table table-responsive">
            <h3 class="panel-title">Haber Listesi</h3>
            <table class="table table-striped news">
                <thead>
                    <tr>
                        <th scope="col">Haber Görseli</th>
                        <th scope="col">Haber Başlığı</th>
                        <th scope="col">Haber Detayı</th>
                        <th scope="col">İşlem</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                            $sql = "SELECT * FROM news";
                            $result = mysqli_query($conn, $sql);
                            $resultCheck = mysqli_num_rows($result);

                            if($resultCheck > 0) {
                                while($row = mysqli_fetch_assoc($result)){?>
                                    <tr>
                                        <td class="table-img"><img src="<?php echo $row['img_url']?>"></img></td>
                                        <td><?php echo $row['title']?></td>
                                        <td><?php echo $row['description']?></td>
                                        <td class="table-buttons">
                                            <a href="php/deleteNews.php?id=<?php echo $row['id'];?>&delete=ok" class="btn btn-primary delete">Sil</a>
                                        </td>
                                    </tr>
                               <?php
                                }
                            }    
                        ?>                      
                        
                </tbody>
            </table>
        </div>

    </div>
    <?php
    include("components/footer.php");
?>