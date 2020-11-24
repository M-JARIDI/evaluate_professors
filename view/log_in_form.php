<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etudiant</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
    <main >
		<div class="container">
			<div class="row">
				<img class="img-fluid" src="public/img/eilco.png" alt="EILCO"/>
			</div>
			<div class="row">
					<div class="card-body">
					  <h5 class="card-header"> Se connecter </h5>
						<form class="myform" action="index.php?action=login" method="post">
						<?php 
							if(isset($_GET['message']))
								if(!empty($_GET['message']))
									if($_GET['message']=="connexion")
										echo"<div class='alert-warning'>Vous devez d'abord vous connecter</div>";
							if($erreur)
								echo"<div class='alert-warning'>Username or password Incorrecte</div>";
						?>
						  <div class="form-group">
						    <label> <b>Identifiant</b> </label>
						    <input type="text" name="username" class="form-control" placeholder="Entrez votre pseudo">
						  </div>
						  <div class="form-group">
						    <label><b>Password</b></label>
						    <input type="password" name="password" class="form-control" placeholder="Password">
						  </div>
						
							<div>
						  <center> <button  type="submit" class="btn btn-primary" name="login">Login</button></center>
						  
						</div>
						</form>
					  </div>
					</div>
				</div>
			</div>
		</div>
	</main> 
</body>
</html>