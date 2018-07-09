<?php
    include_once("admin/includes/dbh.php");
?>


    <div class="container">
        <a name="games">

            <div id="games" style="margin-bottom: 120px;" class="large-margin">
                <a href="games"></a>
                <!-- Nav Anchor -->
                <div class="row heading tiny-margin">
                    <div class="col-md-auto">
                        <h1 class="animation-element slide-down">TURNUVALAR
                            <span class="colored"></span>
                        </h1>
                    </div>
                    <div class="col">
                        <hr class="animation-element extend">
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-11 small-margin">
                        <p>Here at Strider games we pride ourselves in delivering rich and polished experiences that our fanbase
                            can enjoy and immerse themselve into. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Suspendisse facilisis rhoncus nibh.</p>
                    </div>
                    <!--
                <div class="col-md-12">
                    <ul class="game-tags">
                        <li>Oyun Türü Seçiniz :</li>
                        <li>
                            <a href="#" data-filter="*">Hepsi</a>
                        </li>
                        <li>
                            <a href="#" data-filter=".pc">MOBA</a>
                        </li>
                        <li>
                            <a href="#" data-filter=".mobile">FPS</a>
                        </li>
                    </ul>
                </div>
                -->
                </div>
                <div class="games-portfolio ">
                    <?php 
                    $sql = "SELECT * FROM tournaments";
                     $result = mysqli_query($conn, $sql);

                     while($row = mysqli_fetch_assoc($result)){
                         
                 ?>
                    <div class="row game-card pc">
                        <!-- Game Card -->
                        <div class="col-lg-12 col-xl-5 game-card-left">
                            <picture>

                                <img src="admin/<?php echo $row['img_url'];?>" class="img-fluid" alt="lolimage">

                            </picture>
                        </div>
                        <div class="col-lg-12 col-xl-7 game-card-right">
                            <h2 class="short-hr-left">
                                <?php echo $row['name'];?>
                            </h2>
                            <p class="tags">
                                <span class="subtle">Tarih: </b>
                                    <?php echo $row['date'];?>
                                    </b>
                                </span>
                                <br>
                                <span class="subtle">Giriş Ücreti :
                                    <b>
                                        <?php echo $row['enter_price'];?> TL</b>
                                </span>
                                <br>
                                <span class="subtle">Turnuva Ödülü
                                    <b>
                                        <?php echo $row['award'];?> TL</b>
                                </span>
                            </p>
                            <p class="game-description">
                                <?php echo $row['description'];?>
                                <br>
                                <button type="button" class="button secondary short-hr-center" data-toggle="modal" data-target="#tModal<?php echo $row['id'];?>">Turnuvaya Katıl</button>

                            </p>

                        </div>
                        <!-- Modal -->
                        <div class="modal fade game-modal" id="tModal<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="aurora"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title" id="aurora">
                                            <?php echo $row['name'];?>
                                        </h1>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="reservationForm" action="admin/php/reservation.php" method="POST">
                                            <input type="text" name="game_name" style="display: none;" value="<?php echo $row['name'];?>">
                                            <div class="form-group">
                                                <label for="name" class="col-form-label">İsim / Soyisim</label>
                                                <input name="name" type="text" class="form-control" id="name">
                                            </div>
                                            <div class="form-group">
                                                <label for="phone" class="col-form-label">Telefon Numarası</label>
                                                <input name="phone" type="text" class="form-control" id="phone">
                                            </div>
                                            <div class="form-group">
                                                <label for="nickname" class="col-form-label">Oyuncu Adınız</label>
                                                <input name="nickname" type="text" class="form-control" id="nickname">
                                            </div>
                                            <div class="form-group">
                                                <label for="mail" class="col-form-label">E-posta Adresiniz</label>
                                                <input name="mail" type="text" class="form-control" id="mail">
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="col-form-label">Açıklama</label>
                                                <textarea name="message" class="form-control" id="message-text"></textarea>
                                            </div>
                                            <button name="submit" type="submit" class="button secondary">Gönder</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="button secondary" data-dismiss="modal">Kapat</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <?php  }                  
                        ?>

                    <!-- Game Card End -->
                </div>
            </div>
        </a>
    </div>