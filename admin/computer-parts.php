<?php
    include("components/header.php");
    include_once("includes/dbh.php");
?>

    <div class="page-content">
        <div class="panel sub-header">
            <h1 class="sub-title">PC Parçaları</h1>
        </div>
        <div class="panel page-form">
            <h3 class="panel-title">PC Parçası Ekleme Formu</h3>
            <form id="parts-form" class="container" enctype="multipart/form-data" action="php/createPart.php" method="POST">
                <div class="form-group">
                    <label class="col-lg-4" for="partsTitle">Ürün Adı:</label>
                    <input name="partsTitle" type="text" class="form-control col-lg-8" id="partsTitle" placeholder="Ürün Adı">
                </div>
                <div class="form-group">
                    <label class="col-lg-4" for="partsImg">Ürün Görseli:</label>
                    <input name="partsImg" type="file" class="form-control col-lg-8" id="partsImg" placeholder="Ürün Görseli">
                </div>
                <div class="form-group">
                    <label class="col-lg-4" for="partsDesc">Ürün Açıklaması:</label>
                    <textarea name="partsDesc" class="form-control col-lg-8" id="partsDesc" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label class="col-lg-4" for="partsPrice">Ürün Fiyatı:</label>
                    <input name="partsPrice" type="text" class="form-control col-lg-8" id="partsPrice" placeholder="Ürün Fiyatı">
                </div>
                <div class="form-button">
                    <button name="submit" type="submit" class="btn btn-primary mainbutton">Parça Ekle</button>
                </div>

            </form>
        </div>
        <div class="panel page-table table-responsive">
            <h3 class="panel-title">Parça Listesi</h3>
            <table class="table table-striped parts">
                <thead>
                    <tr>
                        <th scope="col">Ürün Görseli</th>
                        <th scope="col">Ürün Adı</th>
                        <th scope="col">Ürün Açıklaması</th>
                        <th scope="col">Ürün Fiyatı</th>
                        <th scope="col">İşlem</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                            $sql = "SELECT * FROM pc_parts";
                            $result = mysqli_query($conn, $sql);
                            $resultCheck = mysqli_num_rows($result);

                            if($resultCheck > 0) {
                                while($row = mysqli_fetch_assoc($result)){ ?>
                                    <tr>
                                        <td class="table-img"><img src="<?php echo $row['product_img']?>"></img></td>
                                        <td><?php echo $row['product_name']?></td>
                                        <td><?php echo $row['product_desc']?></td>
                                        <td><?php echo $row['product_price']?></td>
                                        <td class="table-buttons">
                                            <a href="php/deleteParts.php?id=<?php echo $row['id'];?>&delete=ok" class="btn btn-primary delete">Sil</a>
                                        </td>
                                    </tr>
                               <?php }
                            }                          
                        ?>
                </tbody>
            </table>
        </div>

    </div>
    <?php
    include("components/footer.php");
?>