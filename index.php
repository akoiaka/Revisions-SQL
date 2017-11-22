<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Exo SQL</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body>
<div class="container">
    <div class="container">
        <div class="jumbotron">
            <h1>Révisions SQL</h1>
            <h2>Consignes pour réaliser les exercices</h2>

            <p>* Créer un fichier index.php et un fichier connexion php contenant une fonction GetResult effectuant une requète SELECT prenant en paramètre une variable $result </p>

            <p>* Pour chaque question, il s'agit de trouver la requête SQL permettant d'afficher le résultat énoncé.</p>
            <p>* Pour chaque question, créer une variable “$result” dans laquelle vous stockerez votre
                requête afin d'executer la fonction GetResult </p>
        </div>
        <hr>
        <h2 class="title"><b>1 - Sélection de données</b></h2>
        <hr>
        <ul class="list-group">
            <li class="list-group-item"><b>1 -</b> Toute la table etudiants.</li>
            <?php
            include ("connection.php");
            $reponse =  getResult('SELECT * FROM etudiants');

            foreach ($reponse as $value) {
                //
                echo '<h4>  Numéro:'.$value -> num_etu.',    Nom :'.$value -> nom_etu.',    Date de naissance :'.$value -> date_naiss.', sexe :'.$value -> sexe.' </h4><br>';
//
            }

            ?>
            <li class="list-group-item"><b>2 -</b> Nom, numéro et date de naissance des étudiants.</li>
            <?php
            $reponse =  getResult('SELECT nom_etu, num_etu, date_naiss FROM etudiants');
            foreach ($reponse as $value) {
                //
                echo '<h4>  Nom:'.$value -> nom_etu.',    Numéro :'.$value -> num_etu.',    Date de naissance :'.$value -> date_naiss.'</h4><br>';
//
            }

            ?>

            <li class="list-group-item"><b>3 -</b> Liste des étudiantes.</li>
            <?php
            $reponse =  getResult('SELECT * FROM etudiants WHERE sexe = "F"');

            foreach ($reponse as $value) {
                //
                echo '<h4>  Numéro:'.$value -> num_etu.',    Nom :'.$value -> nom_etu.',    Date de naissance :'.$value -> date_naiss.', sexe :'.$value -> sexe.' </h4><br>';
//
            }
            ?>

            <li class="list-group-item"><b>4 -</b> Liste des enseignants par ordre alphabétique des noms.</li>
            <?php
            $reponse =  getResult('SELECT * FROM enseignants ORDER BY nom_ens');

            foreach ($reponse as $value) {
                //
                echo '<h4>   Nom Enseignant:'.$value -> nom_ens.'</h4><br>';
//
            }
            ?>

            <li class="list-group-item"><b>5 -</b> Liste des enseignants par grade et par ordre alphabétique décroissant des noms.</li>
            <?php
            $reponse =  getResult('SELECT * FROM enseignants GROUP BY grade ORDER BY nom_ens');

            foreach ($reponse as $value) {
                //
                echo '<h4>   grade:'.$value -> grade.', Nom Enseignant:'.$value -> nom_ens.'</h4><br>';
//
            }
            ?>

            <li class="list-group-item"><b>6 -</b> Nom, grade et ancienneté des enseignants qui ont strictement plus de 2 ans d'ancienneté.</li>
            <?php
            $reponse =  getResult('SELECT * FROM enseignants WHERE anciennete > 2 GROUP BY grade ORDER BY nom_ens');

            foreach ($reponse as $value) {
                //
                echo '<h4>   grade:'.$value -> grade.', Nom Enseignant:'.$value -> nom_ens.'</h4><br>';
//
            }
            ?>

            <li class="list-group-item"><b>7 -</b> Nom, grade et ancienneté des maîtres de conférences(MCF) qui ont 3 ans d'ancienneté ou plus.</li>
            <?php
            $reponse =  getResult('SELECT * FROM enseignants WHERE grade = "MCF" AND anciennete >= 3');

            foreach ($reponse as $value) {
                //
                echo '<h4>   grade:'.$value -> grade.', Nom Enseignant:'.$value -> nom_ens.'</h4><br>';
//
            }
            ?>
            <li class="list-group-item"><b>8 -</b> Nom et date de naissance des étudiants masculins nés après 1990.</li>
            ?>
            <?php
            $reponse =  getResult('SELECT * FROM etudiants WHERE sexe = "M" AND date_naiss > "1990"');

            foreach ($reponse as $value) {
            //
            echo '<h4>  Numéro:'.$value -> num_etu.',    Nom :'.$value -> nom_etu.',    Date de naissance :'.$value -> date_naiss.', sexe :'.$value -> sexe.' </h4><br>';
            //
            }
            ?>

            <li class="list-group-item"><b>9 -</b> Lignes de la table notes correspondant à une note inconnue.</li>
            <?php
            $reponse =  getResult('SELECT * FROM notes WHERE note IS NULL ');

            foreach ($reponse as $value) {
                //
                echo '<h4>  Numéro:'.$value -> num_etu.',    Note :'.$value -> note.' </h4><br>';
                //
            }
            ?>

            <li class="list-group-item"><b>10 -</b> Nom des enseignants professeurs(PR) ou associés(ASS), en utilisant l'opérateur IN.</li>
            <?php
            $reponse =  getResult('SELECT * FROM enseignants WHERE grade = "MCF" AND anciennete >= 3');

            foreach ($reponse as $value) {

                echo '<h4>   grade:'.$value -> grade.', Nom Enseignant:'.$value -> nom_ens.'</h4><br>';
            }
            ?>

            <li class="list-group-item"><b>11 -</b> Nom des enseignants dont le nom ou le prénom contiennent un J.</li>
            <?php
            $reponse =  getResult('SELECT * FROM enseignants WHERE nom_ens LIKE "%J%"');

            foreach ($reponse as $value) {

                echo '<h4>   grade:'.$value -> grade.', Nom Enseignant:'.$value -> nom_ens.'</h4><br>';
            }
            ?>

            <li class="list-group-item"><b>12 -</b> Nom et date de naissance des étudiants nés en 1990.</li>
            <?php
            $reponse =  getResult('SELECT * FROM etudiants WHERE date_naiss LIKE "%1990%"');

            foreach ($reponse as $value) {

                echo '<h4> Nom :'.$value -> nom_etu.', Date de naissance :'.$value -> date_naiss.'</h4><br>';
            }
            ?>

            <li class="list-group-item"><b>13 -</b> Nom et âge (en années) des étudiants de 23 ans ou plus.</li>
            <?php
            $reponse =  getResult('SELECT * FROM etudiants WHERE (CURRENT_DATE - date_naiss) > 23');
            // il manque ici un AS pour pouvoir afficher le resultat du calcul de l'Age.

            foreach ($reponse as $value) {

                echo '<h4>   Nom:'.$value -> nom_etu.'</h4><br>';
            }
            ?>


        </ul>
        <hr>
        <h2 class="title" ><b>2 - Jointures</b></h2>
        <hr>
        <ul class="list-group">
            <li class="list-group-item"><b>1 -</b> Notes obtenues par l'étudiant Dupont, Charles.</li>
            <?php
            $reponse =  getResult('SELECT Dupont, Charles FROM etudiants');

            foreach ($reponse as $value) {

                echo '<h4>   note:'.$value -> note.'</h4><br>';
            }
            ?>


            <li class="list-group-item"><b>2 -</b> Note obtenue par l'étudiant Dupont, Charles en G.P.A.O.</li>
            <?php
            $reponse =  getResult('SELECT Dupont, Charles FROM etudiants JOIN matieres SELECT');

            foreach ($reponse as $value) {

                echo '<h4>   note:'.$value -> note.'</h4><br>';
            }
            ?>


            <li class="list-group-item"><b>3 -</b> Nom et date de naissance des étudiants plus jeunes(en années) que l'étudiant Dupont, Charles.</li>
            <li class="list-group-item"><b>4 -</b> Nom des étudiants ayant eu la moyenne dans une des matières enseignées par Simon, Etienne.</li>
            <li class="list-group-item"><b>5 -</b> Nom des étudiants qui ont eu une note dans en "Logique" inférieure à celle de "Statistiues".</li>
            <li class="list-group-item"><b>6 -</b> Nom des étudiants ayant eu une plus mauvaise note en Programmation qu'en Bases de données.</li>
            <li class="list-group-item"><b>7 -</b> Nom et numéro des étudiants n'ayant eu aucune note.</li>
        </ul>
        <hr>
        <h2 class="title" ><b>3 - Regroupements</b></h2>
        <hr>
        <ul class="list-group">
            <li class="list-group-item"><b>1 -</b> Grades différents existant dans la table des enseignants.</li>
            <li class="list-group-item"><b>2 -</b> Par sexe, afficher les différents âges (en années) représentés parmi les étudiants.</li>
            <li class="list-group-item"><b>3 -</b> Nombre total d'étudiants.</li>
            <li class="list-group-item"><b>4 -</b> Date de naissance de l'étudiant le plus jeune et de celui le plus âgé.</li>
            <li class="list-group-item"><b>5 -</b> Pour chaque matière identifiée par son numéro, nombre d'étudiants qui ont une note.</li>
            <li class="list-group-item"><b>6 -</b> Pour chaque étudiant identifié par son numéro, moyenne obtenue (avec 2 décimales).</li>
            <li class="list-group-item"><b>7 -</b> Numéro des étudiants n'ayant eu que 4 notes ou moins.</li>
        </ul>
        <hr>
        <h2 class="title" ><b>BONUS</b></h2>
                <div class="jumbotron">
            <h2><b>Le Frih deh Bi De Uh</b></h2>
            <p><a href="https://www.youtube.com/watch?v=D4w4dNy01ZM" target="_blank">Mais qu'est-ce que c'est !?</a></p>

            <ul class="list-group">
                <li class="list-group-item"><b>1 -</b> Noms des matières (et de leur enseignant) pour lesquelles la moyenne (non coefficientée) des notes est inférieure à 10.</li>
                <li class="list-group-item"><b>2 -</b> Pour chaque étudiant ayant eu une note dans chacune des 5 matières, le nom (par ordre alphabétique), le numéro et la moyenne coefficientée obtenue.</li>
                <li class="list-group-item"><b>3 -</b> Nom des enseignants ayant le même grade que Bertrand, Pierre.</li>
                <li class="list-group-item"><b>4 -</b> Pour chaque étudiant, nom et nombre d'étudiants se trouvant avant lui sur la liste alphabétique des noms.</li>
            </ul>
        </div>
    </div>

</div>

</body>
</html>

