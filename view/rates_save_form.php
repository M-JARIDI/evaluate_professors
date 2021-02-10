
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
    <link rel="stylesheet" href="public/style.css" />
</head>
<body>
    <main >
		<div class="container">
            <a style="float: right;" href="index.php?action=logout">
                <button  type="" class="btn btn-danger" name="deconnexion" style="margin-top:10px">Déconnexion</button>
            </a>
            <a style="float: right; margin-right: 10px;" href="index.php?action=rates_student_view">
                <button  type="" class="btn btn-primary" name="deconnexion" style="margin-top:10px">Avis donnés</button>
            </a>
            <div class="row">
                <a href="index.html"><img id="eilco-logo" class="img-fluid" src="public/img/eilco.png" alt="EILCO"/></a>
			</div>
			<div class="row">
					<div class="card-body">
					  <h5 class="card-header"> Votre avis  </h5>
						<form class="myform" action="index.php?action=save_rate" method="post">
            <?php
                if($message=='failed')
                    echo "<div class=\"alert-danger mt-2\"> Votre avis n'a pas été sauvegardé,vous avez déja donné un avis pour ce prof</div>";
                else if($message=='successfull')
                    echo "<div class=\"alert-success mt-2\"> Votre avis a été sauvegardé</div>";

            ?>
            <div class="form-group">
                 <label for="note">Professeur à noter:</label>
                 
                    <?php
                        //session_start();
                        echo "<select name=\"prof\" class=\"form-control\">";
                                for($i=0;$i<count($profs);$i++){
                                    $nom=$profs[$i]['nom'];
                                    $prenom=$profs[$i]['prenom'];
                                    $id=$profs[$i]['num_prof'];
                                    $nom_complet=$nom." ".$prenom;
                                    echo "<option value=\"$id \">$nom_complet</option>";
                                }
                        echo" </select>";
                    ?>
                
              <div class="form-group">
                  <label for="note">Note:</label>
              <input class="form-control" name="note" type="number" placeholder="0<note<5" required min="1"  step="1" max="5" >
              </div>
              </div>
						  <div class="form-group">
                 <label for="text">Commentaire:</label>
                 <textarea class="form-control" name="text" maxlength="150" id="" rows="5" placeholder="saisissez votre avis "></textarea>
              </div>
					   <center> <button  type="submit" class="btn btn-primary" name="Envoyer">Envoyer</button></center>
						</form>
					  </div>
					</div>
				</div>
			</div>
		</div>
	</main>
</body>
</html>
