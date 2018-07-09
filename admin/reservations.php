<?php
    include("components/header.php");
    include_once("includes/dbh.php");
?>

    <div class="page-content">
        <div class="panel sub-header">
            <h1 class="sub-title">Turnuva Rezervasyonları</h1>
        </div>
        <div class="panel page-filter">
            <h3 class="panel-title">Rezervasyon Arama</h3>
            <form id="reservations-form">
                <div class="form-group col-lg-2 col-md-4 col-sm-6 col-xs-12">
                    <input type="text" class="form-control" id="playerName" placeholder="İsim Soyisim">
                </div>
                <div class="form-group col-lg-2 col-md-4 col-sm-6 col-xs-12">
                    <input type="text" class="form-control" id="nickName" placeholder="Nickname">
                </div>
                <div class="form-group col-lg-2 col-md-4 col-sm-6 col-xs-12">
                    <input type="text" class="form-control" id="playerMail" placeholder="E-Mail Adresi">
                </div>
                <div class="form-group col-lg-2 col-md-4 col-sm-6 col-xs-12">
                    <select id="resTournament" class="form-control">
                        <option selected>Başvurduğu Turnuva</option>
                        <option>Shards of War</option>
                        <option>CS:GO Turnuvası</option>
                    </select>
                </div>
                <div class="form-button col-lg-4 col-md-8 col-sm-12 col-xs-12">
                    <button type="submit" class="btn btn-primary search">Ara</button>
                </div>
            </form>
        </div>
        <div class="panel page-table table-responsive">
            <h3 class="panel-title">Rezervasyon Listesi</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">İsim Soyisim</th>
                        <th scope="col">Nickname</th>
                        <th scope="col">Telefon Numarası</th>
                        <th scope="col">E-Posta Adresi</th>
                        <th scope="col">Başvurduğu Turnuva</th>
                        <th scope="col">Açıklama</th>
                        <th scope="col">İşlem</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                            $sql = "SELECT * FROM reservations";
                            $result = mysqli_query($conn, $sql);
                            $resultCheck = mysqli_num_rows($result);

                            if($resultCheck > 0) {
                                while($row = mysqli_fetch_assoc($result)){?>
                    <tr>
                        <td><?php echo $row['name']?></td>
                        <td> <?php echo $row['nickname']?></td>
                        <td> <?php echo $row['phone']?></td>
                        <td> <?php echo $row['mail']?></td>
                        <td> <?php echo $row['game_name']?></td>
                        <td> <?php echo $row['description']?></td>
                        <td class="table-buttons">
                            <a href="php/deleteReservation.php?id=<?php echo $row['id'];?>&delete=ok" class="btn btn-primary delete">Sil</a>
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