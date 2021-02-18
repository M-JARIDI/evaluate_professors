
<?php include("header.php");?>
<body>
    <div class="container rates-container">
        <div class="row">
            <div class="col">
                <a href="index.php?action=logout">
                    <button class="btn btn-danger float-right" style="margin-top:10px; margin-left : 10px">Déconnexion</button>
                </a>
                <a href="index.php?action=rates_student_view">
                    <button class="btn btn-primary float-right" style="margin-top:10px;">Avis donnés</button>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-10 offset-1">
              <div style="height:524px; width:482px">
                <div class="card-body">
                    <h5 class="card-header">Votre avis</h5>
                    <form action="index.php?action=save_rate" method="post">
                        <?php
                            if($message=='failed')
                                echo "<div class=\"alert-danger mt-2\"> Votre avis n'a pas été sauvegardé,vous avez déja donné un avis pour ce prof</div>";
                            else if($message=='successfull')
                                echo "<div class=\"alert-success mt-2\"> Votre avis a été sauvegardé</div>";
                        ?>
                        <div class="form-group">
                                <label for="note">Professeur à noter</label>
                                <?php
                                    //session_start();
                                    echo "<select name=\"prof\" class=\"form-control\">";
                                            for($i=0;$i<count($profs);$i++)
                                            {
                                                $nom=$profs[$i]['nom'];
                                                $prenom=$profs[$i]['prenom'];
                                                $id=$profs[$i]['num_prof'];
                                                $nom_complet=$nom." ".$prenom;
                                                echo "<option value=\"$id \">$nom_complet</option>";
                                            }
                                    echo" </select>";
                                ?>
                            
                            <div class="form-group">
                                <label for="note">Note</label>
                            <input class="form-control" name="note" type="number" placeholder="0 < note < 5" required min="1"  step="1" max="5" >
                            </div>
                            </div>
                            <div class="form-group">
                                <label for="text">Commentaire</label>
                                <textarea class="form-control" name="text" maxlength="150" rows="5" placeholder="saisissez votre avis"></textarea>
                            </div>
                                <center> <button  type="submit" class="btn btn-primary" name="Envoyer">Envoyer</button></center>
                    </form>
                        </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>
    <?php include("footer.php");?>
</body>
</html>
