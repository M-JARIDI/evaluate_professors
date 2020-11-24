
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avis</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style text="css">
        .center {
            width: 50%;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <main >
		<div class="container">
            <a style="float: right;" href="deconnexion.php">  <button  type="" class="btn btn-primary" name="deconnexion">Déconnexion </button></a>
			<div class="row">
                <img class="img-fluid" src="public/img/eilco.png" alt="EILCO"/>
			</div>
			<div class="row">
					<div class="card-body">
					  <h5 class="card-header"> Les avis que vous avez saisi </h5>
					</div>
			</div>
            <?php 
                        if($message=="failed")
                            echo"<div class='alert-warning'>Une erreur est survenue</div>";
                        else if($message=="successfull")
                            echo"<div class='alert-success'>l'avis à été modifié</div>";
            
            ?>

            <table class="table table-striped">
			<thead class = "thead-light">
		        <tr>
		            <th class="text-left">Professeur</th>
		            <th class="text-left">note</th>
		            <th class="text-left">Commentaire</th>
		            <th class="text-left"></th>
		        </tr>
		    </thead>
			<tbody>
                <?php
                        for($i=0;$i<count($rates);$i++){
                            $avis=$rates[$i]["text"];
                            $note=$rates[$i]["note"];
                            $nom=$rates[$i]['nom'];
                            $prenom=$rates[$i]['prenom'];
                            $nom_complet=$nom." ".$prenom;
                            $id_prof=$rates[$i]['num_prof'];
                            echo '<tr >';
                                echo"<td > $nom_complet </td>";
                                echo "<td>";
                                for($j=0; $j<$note; $j++)
                                    echo '<img src="public/img/star.png" height="40" width="40">';
                                echo "</td>";
                                echo"<td > $avis </td>";
                                echo"<td ><a href=\"index.php?action=update_form&id=$id_prof\"><button class='btn-primary'>Update</button></a></td>";
                            echo"</tr>";
                        }
                ?>
			</tbody>
		</table>
		</div>
	</main>
</body>
</html>
















