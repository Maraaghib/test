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
                <div classe ="table">
                <ul class="nav navbar-nav">
                     <li><a href="client">GESTION DES CLIENTS</a></li>
                    <li><a href="compte">GESTION DES COMPTES CLIENTS</a></li>
                </ul></div>
            </div>

            <div class="container col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">lISTE DES CLIENTS</div>
                    <br>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th ">ID</th>
                                <th>NOM</th>
                                <th >PRENOM</th>
                                <th >ADRESSE</th>
                                <th >TÉLÉPHONE</th>
                                <th colspan="2">ACTIONS</th>
                            </tr>

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
                    <div class="panel-heading">GESTION DES CLIENTS</div>
                    <br>
                        <div class="panel-body">
                            <form action="clientController" method="POST">
                                <div class="form-group">
                                    <label  class="control-label" for="nom">Nom du client</label>
                                    <input class="form-control" type="text" name="nom" id="nom">
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="prenom">Prenom du client</label>
                                    <input class="form-control" type="text" name="prenom" id="prenom">
                                <div/>
                                    <div class="form-group">
                                    <label class="control-label" for="adresse">Adresse du client</label>
                                    <input class="form-control" type="text" name="adresse" id="adresse">
                                </div>
                                    <div class="form-group">
                                    <label class="control-label" for="tel">Téléphone du client</label>
                                    <input class="form-control" type="number" name="tel" id="tel">
                                </div>
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