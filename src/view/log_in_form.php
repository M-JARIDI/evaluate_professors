<?php 
include("header.php");
?>
<body>
	<div class="form-container">
		<div class="row">
			<div class="col-4 offset-4">
				<div class="card-body form-card-body">
						<h5 class="card-header"><b>Se connecter</b></h5>
						<form action="index.php?action=login" method="post">
							<?php 
								if(isset($_GET['message']))
									if(!empty($_GET['message']))
										if($_GET['message']=="connexion")
											echo"<div class='alert-warning'>Vous devez d'abord vous connecter</div>";
								if($erreur)
									echo"<div class='alert-warning'>Username or password Incorrecte</div>";
							?>
							<div class="form-group form-login">
								<label><b>Identifiant</b> </label>
								<div class="form-input">
									<input type="text" id="text" name="username" class="form-control" placeholder="pseudo" required>
								</div>
							</div>
							<div class="form-group form-login">
								<label><b>Mot de passe</b></label>
								<div class="form-input">
									<input type="password" class="form-control pwd" id="password" name="password" placeholder="mot de passe" required>
								</div>
								<i class="fa fa-eye eye text-secondary"></i>
							</div>
							<center><button type="submit" id="submitButton" class="btn btn-primary" name="login">Login</button></center>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	include("footer.php");
	?>
</body>
</html>