<?php
    include_once("admin/includes/dbh.php");
?>


    <!-- News Section-->
    <section style="padding-top: 120px;" id="news" class=" mobile-off">
        <div class="container">
            <div class="row heading tiny-margin">
                <div class="col-md-auto">
                    <h1 class="animation-element slide-down">HABERLER
                    </h1>
                </div>
                <div class="col">
                    <hr class="animation-element extend">
                </div>
            </div>
            <div class="owl-carousel owl-theme">

                <?php 
                    $sql = "SELECT * FROM news";
                     $result = mysqli_query($conn, $sql);

                     while($row = mysqli_fetch_assoc($result)){
                         
                            ?>
                <div class="item">
                    <div class="row">
                        <div class="col-md-6 slider-image">
                            <img src="admin/<?php echo $row['img_url'];?>" alt="NEWS">
                        </div>
                        <div class="col-md-6 slider-text">
                            <h3>
                                <?php echo $row['title'];?>
                            </h3>
                            <p>
                                <?php echo $row['description'];?>
                            </p>
                        </div>
                    </div>
                </div>
                <?php  }                  
                    ?>
            </div>
        </div>
    </section>