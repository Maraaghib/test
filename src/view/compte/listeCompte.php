<!DOCTYPE HTML>
<html>
<head>
    <meta charset=UTF-8">
    <title>GestionClient</title>
    <link rel="stylesheet" href="public/css/bootstrap.min.css" type="text/css" media="screen">
    <script src="main.js"></script>
</head>
<body>
<div class="nav navbar-primary">
    <ul class="nav navbar-nav">
        <li><a href="client">Gestion des clients</a></li>
        <li><a href="compte">Gestion des comptes clients</a></li>
    </ul>
</div>
<div class="container col-md-6">
    <div class="panel panel-primary">
        <div class="panel-heading">liste des règlements</div>
        <div class="panel-body">
            <table class="table">
                <tr>
                    <td>NUMÉRO</td>
                    <td>SOLDE</td>
                </tr>
                <?php
                    require_once '../../model/comptedb.php';
                    $compte = listCompte()->fetchAll();
                    foreach ($compte as $key => $value){
                    echo "<tr>
                              <td>$value[0]</td>
                              <td>$value[1]</td>
                          </tr>";
                }
                ?>

                <?php
                require_once '../../model/clientdb.php';
                $client = listClient()->fetchAll();
                foreach ($client as $key => $value){
                    echo "<tr>
                                            <td>".$value[0]."</td>
                                            <td>$value[1]</td>
                                            <td>$value[2]</td>
                                            <td>$value[3]</td>
                                            <td>$value[4]</td>
                                            <td><a href='editController?idCli=$value[0]'>Editer</a></td>
                                            <td><a href='deleteController?idCli=$value[0]'>Supprimer</a></td>
                                          </tr>";
                }
                ?>
            </table>
        </div>
    </div>
</div>
<div class="container col-md-6">
    <div class="panel panel-primary">
        <div class="panel-heading">FORMULAIRE DE GESTION DES COMPTES</div>
        <div class="panel-body">
            <form action="compteController" method="POST">
                <div class="form-group">
                    <label  class="control-label" for="numero">Numéro du compte</label>
                    <input class="form-control" type="number" name="numero" id="numero">
                </div>
                <div class="form-group">
                    <label class="control-label" for="solde">Solde du compte</label>
                        <input class="form-control" type="number" name="solde" id="solde">
                    </div>

                    <div/>


                    <div class="form-group">
                        <input class="btn-success" type="submit" name="envoyer" id="envoyer" value="Envoyer">
                        <input class="btn-danger" type="reset" name="annuler" id="annuler" value="Anuler ">
                    </div>
            </form>
        </div>
    </div>

</div>
</body>
</html>
