
<?php
    include_once("admin/includes/dbh.php");
?>
<div class="container mobile-off">
        <!--SALE SECTİON-->
        <section id="satis">
            <div class="container">
                <div class="row heading tiny-margin">
                    <div class="col-md-auto">
                        <h1 class="animation-element slide-down">PC
                            <span class="colored">PARÇALARI</span>
                        </h1>
                    </div>
                    <div class="col">
                        <hr class="animation-element extend">
                    </div>
                </div>
                <div class="row product-wrapper">
                <?php 
                    $sql = "SELECT * FROM pc_parts";
                     $result = mysqli_query($conn, $sql);

                     while($row = mysqli_fetch_assoc($result)){
                         
                 ?>
                    <div class="product col-md-4">
                        <img src="admin/<?php echo $row['product_img'];?>" style="height:150px;">
                        <h2><?php echo $row['product_name'];?></h2>
                        <p><?php echo $row['product_desc'];?></p>
                        <span class="product-price"><?php echo $row['product_price'];?> ₺</span>
                        <br>
                    </div>            
                    <?php  }                  
                        ?>
                </div>
            </div>
    </div>
    </div>
    </section>