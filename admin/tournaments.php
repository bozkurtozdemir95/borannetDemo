<?php
    include("components/header.php");
    include_once("includes/dbh.php");
?>

    <div class="page-content">
        <div class="panel sub-header">
            <h1 class="sub-title">Turnuvalar</h1>
        </div>
        <div class="panel page-form">
            <h3 class="panel-title">Turnuva Oluştur</h3>
            <form id="tournaments-form2" action="php/createTournament.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <input name="tournamentName" type="text" class="form-control" id="tournamentName2" placeholder="Turnuva Adı">
                </div>
                <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <input type="file" name="tournamentImg" class="form-control" id="tournamentImg" placeholder="Turnuva Görseli">
                </div>
                <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <select name="gameName" id="game" class="form-control">
                        <option selected>Oyun Adı</option>
                        <option>League of Legends</option>
                        <option>CS:GO</option>
                    </select>
                </div>
                <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div name="date" class="input-group date" data-provide="datepicker">
                    <input name="date" type="text" class="form-control">
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                    </div>
                </div>
                </div>
                <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <input name="enterPrice" type="text" class="form-control" id="enterPrice" placeholder="Giriş Ücreti">
                </div>
                <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <input name="award" type="text" class="form-control" id="award" placeholder="Ödül">
                </div>
                <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <textarea name="tournamentDesc" class="form-control" id="tournamentDesc" rows="3"></textarea>
                </div>
                <div class="form-button">
                    <button name="submit" type="submit" class="btn btn-primary main-button">Turnuva Oluştur</button>
                </div>

            </form>
        </div>
        <div class="panel page-filter">
            <h3 class="panel-title">Turnuva Arama</h3>
            <form id="tournaments-form">
                <div class="form-group col-lg-2 col-md-4 col-sm-6 col-xs-12">
                    <input type="text" class="form-control" id="tournamentName" placeholder="Turnuva Adı">
                </div>
                <div class="form-group col-lg-2 col-md-4 col-sm-6 col-xs-12">
                    <select id="game" class="form-control">
                        <option selected>Oyun Adı</option>
                        <option>League of Legends</option>
                        <option>CS:GO</option>
                    </select>
                </div>
                <div class="form-group col-lg-2 col-md-4 col-sm-6 col-xs-12">
                    <input type="text" class="form-control" id="date" placeholder="Tarih">
                </div>
                <div class="form-group col-lg-2 col-md-4 col-sm-6 col-xs-12">
                    <select id="status" class="form-control">
                        <option selected>Durum</option>
                        <option>Başlayacak</option>
                        <option>Biten</option>
                    </select>
                </div>
                <div class="form-button col-lg-4 col-md-8 col-sm-12 col-xs-12">
                    <button type="submit" class="btn btn-primary search">Ara</button>
                </div>
            </form>
        </div>
        <div class="panel page-table table-responsive">
            <h3 class="panel-title">Turnuva Listesi</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Turnuva Görseli</th>
                        <th scope="col">Turnuva Adı</th>
                        <th scope="col">Oyun</th>
                        <th scope="col">Tarih</th>
                        <th scope="col">Giriş Ücreti</th>
                        <th scope="col">Ödül</th>
                        <th scope="col">Açıklama</th>
                        <th scope="col">İşlem</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php 
                            $sql = "SELECT * FROM tournaments";
                            $result = mysqli_query($conn, $sql);
                            $resultCheck = mysqli_num_rows($result);

                            if($resultCheck > 0) {
                                while($row = mysqli_fetch_assoc($result)){?>
                                    <tr>
                                        <td class="table-img"><img src="<?php echo $row['img_url']?>"></img></td>
                                        <td><?php echo $row['name']?></td>
                                        <td><?php echo $row['game_name']?></td>
                                        <td><?php echo $row['date']?></td>
                                        <td><?php echo $row['enter_price']?></td>
                                        <td><?php echo $row['award']?></td>
                                        <td><?php echo $row['description']?></td>
                                        <td class="table-buttons">
                                            <a href="php/deleteTournament.php?id=<?php echo $row['id'];?>&delete=ok" class="btn btn-primary delete">Sil</a>
                                        </td>
                                    </tr>
                              <?php
                              }
                            }      
                              ?>                      
                        
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
    <?php
    include("components/footer.php");
?>