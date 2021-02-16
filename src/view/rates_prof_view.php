<?php 
session_start();
    if(!isset($_SESSION['user'])) header("Location:index.php?action=login");

include("header.php");
?>
<body>
    <div class="container prof-view-container">
        <div class="row">
            <div class="col">
                <a href="index.php?action=logout">
                    <button class="btn btn-danger float-right" style="margin-top:10px; margin-left : 10px">Déconnexion</button>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card-body">
                    <h5 class="card-header"> avis Sur vous </h5>
                    <?php
                        for($i=count($rates)-1;$i>=0;$i--){
                            $avis=$rates[$i]["text"];
                            $note=$rates[$i]["note"];
                            $divclass="";
                            if($note==1 || $note==2) $divclass="alert-danger";
                            else if($note==3) $divclass="alert-warning";
                            else $divclass="alert-success";
                            echo '<div class="center mb-5">';
                                echo "<div>";
                                for($j=0; $j<$note; $j++)
                                    echo '<img src="src/public/img/star.png" height="40" width="40">';
                                echo "</div>";
                                echo"<div class='mb-2 $divclass'>$avis</div>";  
                            echo"</div>";
                        }
                    ?>
                </div>
            </div>        
        </div>
    </div>
    <?php
    include("footer.php");
    ?>
</body>
</html>
















