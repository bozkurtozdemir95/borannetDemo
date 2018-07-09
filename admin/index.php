<?php
    include("components/header.php");
    include_once("includes/dbh.php");
?>
    <div class="page-content">
        <div class="panel sub-header">
            <h1 class="sub-title">Dashboard</h1>
        </div>
        <div class="dashboard">
            <div class="panel dashboardPanel">
                <div class="dashboard-title">
                    <span class="title">Toplam Mesaj Sayısı:</span>
                </div>
                <div class="panel-content">
                    <i class="far fa-envelope"></i>
                    <div class="value">
                        <span>
                            <?php 
                            $sql = "SELECT COUNT(1) FROM messages";
                            $result = mysqli_query($conn, $sql);
                            $resultCheck = mysqli_fetch_array($result);
                            
                            $total = $resultCheck[0];
                            echo $total;
                        ?>
                        </span>
                    </div>
                </div>
                <div class="panel-footer">
                    <a href="messages.php">Tümünü gör..</a>
                </div>

            </div>
            <div class="panel dashboardPanel">
                <div class="dashboard-title">
                    <span class="title">Toplam Turnuva Sayısı:</span>
                </div>
                <div class="panel-content">
                    <i class="fas fa-trophy"></i>
                    <div class="value">
                        <span>
                            <?php 
                            $sql = "SELECT COUNT(1) FROM tournaments";
                            $result = mysqli_query($conn, $sql);
                            $resultCheck = mysqli_fetch_array($result);
                            
                            $total = $resultCheck[0];
                            echo $total;
                        ?>
                        </span>
                    </div>
                </div>
                <div class="panel-footer">
                    <a href="tournaments.php">Tümünü gör..</a>
                </div>

            </div>
            <div class="panel dashboardPanel">
                <div class="dashboard-title">
                    <span class="title">Toplam Haber Sayısı:</span>
                </div>
                <div class="panel-content">
                    <i class="far fa-newspaper"></i>
                    <div class="value">
                        <span>
                            <?php 
                            $sql = "SELECT COUNT(1) FROM news";
                            $result = mysqli_query($conn, $sql);
                            $resultCheck = mysqli_fetch_array($result);
                            
                            $total = $resultCheck[0];
                            echo $total;
                        ?>
                        </span>
                    </div>
                </div>
                <div class="panel-footer">
                    <a href="news.php">Tümünü gör..</a>
                </div>

            </div>
            <div class="panel dashboardPanel">
                <div class="dashboard-title">
                    <span class="title">Toplam Parça Sayısı:</span>
                </div>
                <div class="panel-content">
                    <i class="fas fa-headphones-alt"></i>
                    <div class="value">
                        <span>
                            <?php 
                            $sql = "SELECT COUNT(1) FROM pc_parts";
                            $result = mysqli_query($conn, $sql);
                            $resultCheck = mysqli_fetch_array($result);
                            
                            $total = $resultCheck[0];
                            echo $total;
                        ?>
                        </span>
                    </div>
                </div>
                <div class="panel-footer">
                    <a href="computer-parts.php">Tümünü gör..</a>
                </div>

            </div>
            <div class="panel dashboardPanel">
                <div class="dashboard-title">
                    <span class="title">Toplam Rezervasyon Sayısı:</span>
                </div>
                <div class="panel-content">
                    <i class="far fa-address-card"></i>
                    <div class="value">
                        <span>
                            <?php 
                            $sql = "SELECT COUNT(1) FROM reservations";
                            $result = mysqli_query($conn, $sql);
                            $resultCheck = mysqli_fetch_array($result);
                            
                            $total = $resultCheck[0];
                            echo $total;
                        ?>
                        </span>
                    </div>
                </div>
                <div class="panel-footer">
                    <a href="reservations.php">Tümünü gör..</a>
                </div>

            </div>
            <div class="panel dashboardPanel">
                <div class="dashboard-title">
                    <span class="title">Toplam Fotoğraf Sayısı:</span>
                </div>
                <div class="panel-content">
                    <i class="far fa-images"></i>
                    <div class="value">
                        <span>
                            <?php 
                            $sql = "SELECT COUNT(1) FROM album";
                            $result = mysqli_query($conn, $sql);
                            $resultCheck = mysqli_fetch_array($result);
                            
                            $total = $resultCheck[0];
                            echo $total;
                        ?>
                        </span>
                    </div>
                </div>
                <div class="panel-footer">
                    <a href="album.php">Tümünü gör..</a>
                </div>

            </div>


        </div>

    </div>

    <?php
    include("components/footer.php");
?>