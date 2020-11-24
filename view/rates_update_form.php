
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avis</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
    <main >
		<div class="container">
            <a style="float: right;" href="deconnexion.php">  <button  type="" class="btn btn-primary" name="deconnexion">Déconnexion </button></a>
            <a style="float: right;" href="student_avis.php">  <button  type="" class="btn btn-primary" name="deconnexion">Avis donnés </button></a>
            <div class="row">
                <img class="img-fluid" src="public/img/eilco.png" alt="EILCO"/>


			</div>
			<div class="row">
					<div class="card-body">
					  <h5 class="card-header"> Votre avis  </h5>
						<form class="myform" action="index.php?action=update" method="post">
                                <?php
                                    if(isset($_GET['message'])){
                                        if($_GET['message']=="success")
                                            echo "<div class=\"alert-success mt-2 mb-2 \"> Votre avis a été sauvegardé</div>";
                                        else if ($_GET['message']=="echec")
                                        echo "<div class=\"alert-danger mt-2  mb-2 \"> Votre avis n'a pas été sauvegardé,vous avez déja donné un avis pour ce prof</div>";

                                    }
    
                
                                            if(count($prof)!=1)
                                                header("location:student_avis.php?message=erreur");
                                            else
                                            {
                                                $nom=$prof[0]['nom'];
                                                $prenom=$prof[0]['prenom'];   
                                                $nomComplet=$nom." ".$prenom;
                                                $comment=$prof[0]['text'];
                                                $note=$prof[0]['note'];
                                                $idProf=$prof[0]['num_prof'];
                                                echo "<div class='form-group mt-2'>
                                                            <label for='profname'>Professeur à noter:</label>
                                                            <input type='text' name='profname' value=\"$nomComplet\" disabled>
                                                    </div>
                                                    <div class='form-group'>
                                                            <label for='note'>Professeur à noter:</label>
                                                            <input class='form-control' name='note' type='number'  required min='1'  step='1' max='5' value=\"$note\" >
                                                    </div>
                                                    <div class='form-group'>
                                                            <label for='avis'>Professeur à noter:</label>
                                                            <textarea class='form-control' name='text' maxlength='150'  rows='5' >$comment</textarea>
                                                    </div>
                                                    <div class='form-group'>
                                                            <input type='hidden' name='prof' value=\"$idProf \">
                                                            <center> <button  type='submit' class='btn btn-primary' name='Envoyer'>Envoyer</button></center>
                                                    </div>";           
                                        }   
                                ?>                    
						</form>
					  </div>
					</div>
				</div>
			</div>
		</div>
	</main>
</body>
</html>
