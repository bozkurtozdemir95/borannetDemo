<?php
    include_once("admin/includes/dbh.php");
?>

    <div id="resimler" class="row tiny-margin mobile-off">
        <div class="container">
            <div class="row heading tiny-margin">
                <div class="col-md-auto">
                    <h1 class="animation-element slide-down"> ALBÜM
                        <span class="colored"> </span>
                    </h1>
                </div>
                <div class="col">
                    <hr class="animation-element extend">
                </div>
            </div>
        </div>
    </div>
    <div class="grid-gallery">
        <div class="row gallery-wrapper">
            <?php 
                    $sql = "SELECT * FROM album";
                     $result = mysqli_query($conn, $sql);

                     while($row = mysqli_fetch_assoc($result)){
                         
                 ?>
            <div class="col-md-4 gallery-item">
                <a href="admin/<?php echo $row['photo_url'];?>" data-lightbox="studio_gallery">
                    <div class="overlay gallery">
                        <h3 class="overlay-hover"><?php echo $row['photo_name'];?></h3>
                    </div>
                    <img src="admin/<?php echo $row['photo_url'];?>" class="img-fluid" alt="Borannet Galeri">
                </a>
            </div>
            <?php  }                  
        ?>
        </div>
    </div>
    </div>