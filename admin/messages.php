<?php
    include("components/header.php");
    include_once("includes/dbh.php");
?>

    <div class="page-content">
        <div class="panel sub-header">
            <h1 class="sub-title">Mesajlar</h1>
        </div>
        <div class="panel page-table table-responsive">
        <h3 class="panel-title">Mesaj Listesi</h3>
            <table class="table table-striped news">
                <thead>
                    <tr>
                        <th scope="col">İsim Soyisim</th>
                        <th scope="col">E-Mail Adresi</th>
                        <th scope="col">Mesajı</th>
                        <th scope="col">İşlem</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <?php 
                            $sql = "SELECT * FROM messages";
                            $result = mysqli_query($conn, $sql);
                            $resultCheck = mysqli_num_rows($result);

                            if($resultCheck > 0) {
                                while($row = mysqli_fetch_assoc($result)){?>
                                    <tr>
                                        <td><?php echo $row['name']?></td>
                                        <td><?php echo $row['mail']?></td>
                                        <td><?php echo $row['message']?></td>
                                        <td class="table-buttons">
                                            <a href="php/deleteMessage.php?id=<?php echo $row['id'];?>&delete=ok" class="btn btn-primary delete">Sil</a>
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