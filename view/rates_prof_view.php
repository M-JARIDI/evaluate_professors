<?php 
session_start();
    if(!isset($_SESSION['user'])) header("Location:index.php?action=login");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avis</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
          crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" 
            crossorigin="anonymous"></script>
    <style text="css">
        .center {
            width: 50%;
            margin: 0 auto;
        }
    </style>
    <link rel="stylesheet" href="public/style.css" />
</head>

<body>
    <main >
		<div class="container">
            <a style="float: right;" href="index.php?action=logout">
            <button  type="" class="btn btn-danger" name="deconnexion" style="margin-top:10px">Déconnexion</button>
            </a>
			<div class="row">
                <a href="index.html"><img id="eilco-logo" class="img-fluid" src="public/img/eilco.png" alt="EILCO"/></a>
			</div>
			<div class="row">
					<div class="card-body">
					  <h5 class="card-header"> avis Sur vous </h5>
					</div>
			</div>
            <div >
                <?php
                    for($i=count($rates)-1;$i>=0;$i--){
                        $avis=$rates[$i]["text"];
                        $note=$rates[$i]["note"];
                        $divclass="";
                        if($note==1 || $note==2) $divclass="alert-danger";
                        else if($note==3) $divclass="alert-warning";
                        else $divclass="alert-success";
                        echo '<div class="center mb-5 ">';
                            echo "<div>";
                            for($j=0; $j<$note; $j++)
                                echo '<img src="public/img/star.png" height="40" width="40">';
                            echo "</div>";
                            echo"<div class='mb-2 $divclass'> $avis </div>";  
                        echo"</div>";
                    }
                ?>
            </div>
		</div>
	</main>
</body>
</html>
















