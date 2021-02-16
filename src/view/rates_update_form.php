<?php 
include("header.php");
?>
<body>
    <div class="container update-container">
        <div class="row">
            <div class="col">
                <a href="index.php?action=logout">
                    <button class="btn btn-danger float-right" style="margin-top:10px; margin-left : 10px">Déconnexion</button>
                </a>
                <a href="index.php?action=rates_student_view">
                    <button class="btn btn-primary float-right" style="margin-top:10px;">retour</button>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-10 offset-1">
                <div class="card-body">
                    <h5 class="card-header">Votre avis</h5>
                    <form action="index.php?action=update" method="post">
                        <?php
                            if(isset($_GET['message']))
                            {
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
                                            <label for='note'>Donner un nombre d'étoiles</label>
                                            <input class='form-control' name='note' type='number'  required min='1'  step='1' max='5' value=\"$note\" >
                                    </div>
                                    <div class='form-group'>
                                            <label for='avis'>Remarques</label>
                                            <textarea class='form-control' name='text' maxlength='150'  rows='5' >$comment</textarea>
                                    </div>
                                    <div class='form-group'>
                                            <input type='hidden' name='prof' value=\"$idProf \">
                                            <center><button  type='submit' class='btn btn-primary' name='Envoyer'>Envoyer</button></center>
                                    </div>";           
                            }   
                        ?>                    
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
	include("footer.php");
	?>
</body>
</html>
