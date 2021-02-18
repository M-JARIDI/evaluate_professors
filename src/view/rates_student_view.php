<?php include("header.php");?>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="index.php?action=logout">
                    <button class="btn btn-danger float-right" style="margin-top:10px; margin-left : 10px">Déconnexion</button>
                </a>
                <a href="index.php?action=rates_save_form">
                    <button class="btn btn-primary float-right" style="margin-top:10px;">retour</button>
                </a>
            </div>
        </div>
        <div style="width: 100%; height: 599px">
            <div class="row">
                <div class="card-body">
                    <h5 class="card-header">Les avis que vous avez saisi</h5>
                </div>
            </div>
            <?php 
                if($message=="failed")
                    echo"<div class='alert-warning'>Une erreur est survenue</div>";
                else if($message=="successfull")
                    echo"<div class='alert-success'>l'avis à été modifié</div>";
            ?>
            <div id="rates-table">
                <table class="table table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-left">Professeur</th>
                            <th class="text-left">note</th>
                            <th class="text-left">Commentaire</th>
                            <th class="text-left"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            for($i=0;$i<count($rates);$i++)
                            {
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
                                    echo '<img src="src/public/img/star.png" height="40" width="40">';
                                echo "</td>";
                                echo"<td > $avis </td>";
                                echo"<td ><a href=\"index.php?action=update_form&id=$id_prof\"><button class='btn btn-primary'>Update</button></a></td>";
                                echo"<td ><a href=\"#\"><button class='btn btn-danger'>delete</button></a></td>";
                                echo"</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php include("footer.php");?>
</body>
</html>
















