<?php

//Adapte l'affichage de la date aux normes européennes jj-mm-aaaa
date_default_timezone_set('Europe/Paris');

//Connexion à la base de données
$cnx = new PDO('mysql:host=localhost;dbname=collect','root','root');


//Création de la requête pour insérer les données du formulaire
$dbInsertValues = 'INSERT INTO dealing SET date="'.date('d/m/Y').'", amount="'.$_POST['amount'].'"';
//Insertion des données reçues par le formulaire
$cnx->query($dbInsertValues);


//Requête pour sélectionner toute la bdd
$dbSelectAll = 'SELECT * FROM dealing ORDER BY id DESC';
//Requête pour ne sélectionner que les montants
$dbSelectAmount = 'SELECT SUM(amount) AS totalAmount FROM dealing';


//Exécuter la requête $dbSelectAll
$searchValues = $cnx->prepare($dbSelectAll);
$searchValues->execute();
$resultDateAmount = $searchValues->fetchAll();


//Somme de toutes les transactions passées
$searchValues2 = $cnx->prepare($dbSelectAmount);
$searchValues2->execute();
$resultAmount = $searchValues2->fetch();
$currentValue = $resultAmount['totalAmount'];

//Calul du pourcentage d'avancement
//Valeur à atteindre
$valueToReach = 3000;

?>