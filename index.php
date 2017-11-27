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
            $reponse =  getResult('
SELECT * 
FROM etudiants');

            foreach ($reponse as $value) {
                //
                echo '<h4>  Numéro:'.$value -> num_etu.',    Nom :'.$value -> nom_etu.',    Date de naissance :'.$value -> date_naiss.', sexe :'.$value -> sexe.' </h4><br>';
//
            }

            ?>
            <li class="list-group-item"><b>2 -</b> Nom, numéro et date de naissance des étudiants.</li>
            <?php
            $reponse =  getResult('
SELECT nom_etu, num_etu, date_naiss 
FROM etudiants');
            foreach ($reponse as $value) {
                //
                echo '<h4>  Nom:'.$value -> nom_etu.',    Numéro :'.$value -> num_etu.',    Date de naissance :'.$value -> date_naiss.'</h4><br>';
//
            }

            ?>

            <li class="list-group-item"><b>3 -</b> Liste des étudiantes.</li>
            <?php
            $reponse =  getResult('
SELECT * 
FROM etudiants 
WHERE sexe = "F"');

            foreach ($reponse as $value) {
                //
                echo '<h4>  Numéro:'.$value -> num_etu.',    Nom :'.$value -> nom_etu.',    Date de naissance :'.$value -> date_naiss.', sexe :'.$value -> sexe.' </h4><br>';
//
            }
            ?>

            <li class="list-group-item"><b>4 -</b> Liste des enseignants par ordre alphabétique des noms.</li>
            <?php
            $reponse =  getResult('
SELECT * 
FROM enseignants 
ORDER BY nom_ens 
ASC');

            foreach ($reponse as $value) {
                //
                echo '<h4>   Nom Enseignant:'.$value -> nom_ens.'</h4><br>';
//
            }
            ?>

            <li class="list-group-item"><b>5 -</b> Liste des enseignants par grade et par ordre alphabétique décroissant des noms.</li>
            <?php
            $reponse =  getResult('
SELECT nom_ens, grade 
FROM enseignants 
ORDER BY nom_ens 
DESC');

            foreach ($reponse as $value) {
                //
                echo '<h4>   grade:'.$value -> grade.', Nom Enseignant:'.$value -> nom_ens.'</h4><br>';
//
            }
            ?>

            <li class="list-group-item"><b>6 -</b> Nom, grade et ancienneté des enseignants qui ont strictement plus de 2 ans d'ancienneté.</li>
            <?php
            $reponse =  getResult('
SELECT nom_ens, grade, anciennete 
FROM enseignants 
WHERE anciennete > 2');

            foreach ($reponse as $value) {
                //
                echo '<h4>   grade:'.$value -> grade.', Nom Enseignant:'.$value -> nom_ens.'</h4><br>';
//
            }
            ?>

            <li class="list-group-item"><b>7 -</b> Nom, grade et ancienneté des maîtres de conférences(MCF) qui ont 3 ans d'ancienneté ou plus.</li>
            <?php
            $reponse =  getResult('
SELECT nom_ens, grade, anciennete 
FROM enseignants 
WHERE grade = "MCF" 
AND anciennete >= 3');

            foreach ($reponse as $value) {
                //
                echo '<h4>   grade:'.$value -> grade.', Nom Enseignant:'.$value -> nom_ens.'</h4><br>';
//
            }
            ?>
            <li class="list-group-item"><b>8 -</b> Nom et date de naissance des étudiants masculins nés après 1990.</li>
            ?>
            <?php
            $reponse = getResult('
SELECT * 
FROM notes 
WHERE note 
IS NULL');

            foreach ($reponse as $data) {
            ?>
            <p>Note NULL :
                Numéro étudiants:
                <?php echo ($data->_num_etu);?>
                Numéro matière:
                <?php echo ($data->_num_mat);?>
            </p>

            <li class="list-group-item"><b>9 -</b> Lignes de la table notes correspondant à une note inconnue.</li>
            <?php
            $reponse =  getResult('
SELECT * 
FROM notes 
WHERE note 
IS NULL ');

            foreach ($reponse as $value) {
                //
                echo '<h4>  Numéro:'.$value -> num_etu.',    Note :'.$value -> note.' </h4><br>';
                //
            }
            ?>

            <li class="list-group-item"><b>10 -</b> Nom des enseignants professeurs(PR) ou associés(ASS), en utilisant l'opérateur IN.</li>
            <?php
            $reponse = getResult('
SELECT nom_ens, grade 
FROM enseignants 
WHERE grade 
IN ("PR","ASS")');
            foreach ($reponse as $value) {

                echo '<h4>   grade:'.$value -> grade.', Nom Enseignant:'.$value -> nom_ens.'</h4><br>';
            }
            ?>

            <li class="list-group-item"><b>11 -</b> Nom des enseignants dont le nom ou le prénom contiennent un J.</li>
            <?php
            $reponse =  getResult('
SELECT nom_ens 
FROM enseignants 
WHERE nom_ens 
LIKE "%J%"');

            foreach ($reponse as $value) {

                echo '<h4>   grade:'.$value -> grade.', Nom Enseignant:'.$value -> nom_ens.'</h4><br>';
            }
            ?>

            <li class="list-group-item"><b>12 -</b> Nom et date de naissance des étudiants nés en 1990.</li>
            <?php
            $reponse = getResult('
SELECT nom_etu, date_naiss 
FROM etudiants 
WHERE YEAR(date_naiss) = 1990');
//            $reponse =  getResult('SELECT * FROM etudiants WHERE date_naiss LIKE "%1990%"');

            foreach ($reponse as $value) {

                echo '<h4> Nom :'.$value -> nom_etu.', Date de naissance :'.$value -> date_naiss.'</h4><br>';
            }
            ?>

            <li class="list-group-item"><b>13 -</b> Nom et âge (en années) des étudiants de 23 ans ou plus.</li>
            <?php
            $reponse = getResult('
SELECT nom_etu, 
YEAR(date_naiss) 
AS annee 
FROM etudiants 
WHERE (YEAR(CURRENT_DATE) - YEAR(date_naiss)) >= 23');

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
            $reponse = getResult('
SELECT * 
FROM notes 
INNER JOIN etudiants 
ON _num_etu = num_etu 
WHERE num_etu = 1 ');
            //CI DESSOUS MARCHE AUSSI MAIS PLUS LOURD ET MOINS PRECIS
            //            $reponse =  getResult('SELECT * FROM notes JOIN etudiants WHERE nom_etu LIKE "%CHARLES%"');


            foreach ($reponse as $value) {

                echo '<h4>   nom: '.$value -> nom_etu.', note:'.$value -> note.'</h4><br>';
            }
            ?>


            <li class="list-group-item"><b>2 -</b> Note obtenue par l'étudiant Dupont, Charles en G.P.A.O.</li>
            <?php
            $reponse = getResult('
SELECT note, nom_etu, nom_mat 
FROM notes 
INNER JOIN etudiants 
ON _num_etu = num_etu
INNER JOIN matieres 
ON _num_mat = num_mat 
WHERE num_etu = 1 
AND num_mat = 3');
//            $reponse =  getResult('SELECT DISTINCT * FROM matieres JOIN notes  JOIN etudiants WHERE nom_etu LIKE "%CHARLES%" AND  nom_mat LIKE "%G.P.A.O.%"');


            foreach ($reponse as $value) {

                echo '<h4>   nom: '.$value -> nom_etu.', note:'.$value -> note.'</h4><br>';
            }
                       ?>


            <li class="list-group-item"><b>3 -</b> Nom et date de naissance des étudiants plus jeunes(en années) que l'étudiant Dupont, Charles.</li>
            <?php
            $reponse =  getResult('
SELECT * 
FROM etudiants 
WHERE date_naiss > 1991');

            foreach ($reponse as $value) {

                echo '<h4>   nom: '.$value -> nom_etu.', date de naissance:'.$value -> date_naiss.'</h4><br>';
            }
            ?>

            <li class="list-group-item"><b>4 -</b> Nom des étudiants ayant eu la moyenne dans une des matières enseignées par Simon, Etienne.</li>
            <?php
            $reponse =  getResult('
SELECT nom_etu, note 
FROM etudiants 
INNER JOIN matieres 
ON _num_mat = num_mat
INNER JOIN enseignants
ON _num_ens = num_ens
WHERE num_ens = 15 
AND note >= 10');

            foreach ($reponse as $data){
            ?>
            <p>
                Nom des étudiants ayant la moyenne ou plus: <?php echo ($data->nom_etu);?>
                Note : <?php echo ($data->note);?>
            </p>
            }


<!--//            foreach ($reponse as $value) {-->
<!--//-->
<!--//                echo '<h4>   nom: '.$value -> nom_etu.', note:'.$value -> note.'</h4><br>';-->
<!--//            }-->
<!--//            ?>-->



            <li class="list-group-item"><b>5 -</b> Nom des étudiants qui ont eu une note dans en "Logique" inférieure à celle de "Statistiues".</li>
            <?php
//            il y a ici creation de tab;es virtuelles pour effectuer les calculs
            $reponse = getResult('
SELECT nom_etu, n1._num_etu 
FROM notes n1, notes n2 
INNER JOIN etudiants 
ON _num_etu = num_etu 
WHERE n1._num_etu=n2._num_etu 
AND n1._num_mat=4 
AND n2._num_mat=5 
AND n1.note<n2.note');

            foreach ($reponse as $data){
            ?>
            <p>
                Numero des étudiants : <?php echo ($data->_num_etu);?>
                Nom des étudiants: <?php echo ($data->nom_etu);?>

            </p>

            <li class="list-group-item"><b>6 -</b> Nom des étudiants ayant eu une plus mauvaise note en Programmation qu'en Bases de données.</li>
            <?php
            $reponse = getResult('
SELECT nom_etu, n1._num_etu 
FROM notes n1, notes n2 
INNER JOIN etudiants 
ON _num_etu = num_etu 
WHERE n1._num_etu=n2._num_etu 
AND n1._num_mat=1 
AND n2._num_mat=2 
AND n1.note<n2.note');

            foreach ($reponse as $data){
                ?>
                <p>
                    Numero des étudiants : <?php echo ($data->_num_etu);?>
                    Nom des étudiants: <?php echo ($data->nom_etu);?>

                </p>
                <?php
            }
            ?>

            <li class="list-group-item"><b>7 -</b> Nom et numéro des étudiants n'ayant eu aucune note.</li>
            <?php

            $reponse = getResult('
SELECT nom_etu, num_etu 
FROM etudiants 
INNER JOIN notes 
ON num_etu = _num_etu
WHERE note IS NULL');

            foreach ($reponse as $data){
                ?>
                <p>
                    Nom des étudiants ayant pas eu de note: <?php echo ($data->nom_etu);?>

                </p>
                <?php
            }
            ?>

        </ul>
        <hr>

        <h2 class="title" ><b>3 - Regroupements</b></h2>
        <hr>
        <ul class="list-group">
            <li class="list-group-item"><b>1 -</b> Grades différents existant dans la table des enseignants.</li>
            <?php

            $reponse = getResult('
              SELECT grade
                FROM enseignants 
                 GROUP BY grade');

            foreach ($reponse as $data){
                ?>
                <p>
                    Grade différent existant: <?php echo ($data->grade);?>

                </p>
                <?php
            }
            ?>

            <li class="list-group-item"><b>2 -</b> Par sexe, afficher les différents âges (en années) représentés parmi les étudiants.</li>
            <?php

            $reponse = getResult('
            SELECT sexe, YEAR(date_naiss) AS annee 
              FROM etudiants 
                GROUP BY annee, sexe 
                    ORDER BY sexe');

            foreach ($reponse as $data){
                $age = date("Y")-($data->annee);

                ?>
                <p>
                    Sexe: <?php echo ($data->sexe);?>
                    Age: <?php echo ($age);?>

                </p>
                <?php
            }
            ?>

            <li class="list-group-item"><b>3 -</b> Nombre total d'étudiants.</li>
            <?php

            $reponse = getResult('
            SELECT COUNT(*) AS nb_etu 
              FROM etudiants');

            foreach ($reponse as $data){

                ?>
                <p>
                    Nombre: <?php echo ($data->nb_etu);?>

                </p>
                <?php
            }
            ?>

            <li class="list-group-item"><b>4 -</b> Date de naissance de l'étudiant le plus jeune et de celui le plus âgé.</li>
            <?php

            $reponse = getResult('
            SELECT MIN(date_naiss) AS jeune, MAX(date_naiss) AS vieux 
              FROM etudiants');

            foreach ($reponse as $data){

                ?>
                <p>
                    Date naissance Etudiant le plus jeune: <?php echo ($data->jeune);?>
                    Date naissance Etudiant le plus vieux: <?php echo ($data->vieux);?>
                </p>
                <?php
            }
            ?>

            <li class="list-group-item"><b>5 -</b> Pour chaque matière identifiée par son numéro, nombre d'étudiants qui ont une note.</li>
            <?php

            $reponse = getResult('
            SELECT nom_mat, COUNT(*) AS mat_note 
              FROM notes 
                INNER JOIN matieres 
                  ON _num_mat = num_mat 
                    WHERE note IS NOT NULL 
                      GROUP BY nom_mat');

            foreach ($reponse as $data){

                ?>
                <p>
                    Nom matière: <?php echo ($data->nom_mat);?>
                    Nombre de note:<?php echo ($data->mat_note);?>
                </p>
                <?php
            }
            ?>

            <li class="list-group-item"><b>6 -</b> Pour chaque étudiant identifié par son numéro, moyenne obtenue (avec 2 décimales).</li>
            <?php

            $reponse = getResult('
            SELECT nom_etu, AVG(note) AS moy_note 
              FROM etudiants
                INNER JOIN notes 
                  ON num_etu = _num_etu 
                    GROUP BY nom_etu');

            foreach ($reponse as $data){

                ?>
                <p>
                    Nom étudiant: <?php echo ($data->nom_etu);?>
                    Moyenne:<?php echo ($data->moy_note);?>
                </p>
                <?php
            }
            ?>
            <li class="list-group-item"><b>7 -</b> Numéro des étudiants n'ayant eu que 4 notes ou moins.</li>
            <?php

            $reponse = getResult('
            SELECT nom_etu, num_etu, COUNT(*) 
              FROM etudiants
                INNER JOIN notes 
                  ON num_etu = _num_etu 
                    GROUP BY num_etu 
                      HAVING COUNT(note) <= 4');

            foreach ($reponse as $data){

                ?>
                <p>
                    Numéro étudiant: <?php echo ($data->num_etu);?>
                    Nom étudiant:<?php echo ($data->nom_etu);?>
                </p>
                <?php
            }
            ?>
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
                <?php

                $reponse = getResult('
                SELECT e1.nom_etu AS e1_nom_etu, COUNT(*) as nombre
                  FROM etudiants e1, etudiants e2
                    WHERE e1.nom_etu>e2.nom_etu
                      GROUP BY e1.nom_etu
                        ORDER BY e1.nom_etu');

                foreach ($reponse as $data){

                    ?>
                    <p>
                        Nom étudiant par ordre alphabétique:<?php echo ($data->e1_nom_etu);?>
                        Nombre avant lui:<?php echo ($data->nombre);?>
                    </p>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>

</div>
</body>
</html>