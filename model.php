<?php

require_once 'src/connec.php';

//connect to database
$pdo = new PDO(DSN, USER, PASS);

//select
$query = "SELECT * FROM friend";
$statement = $pdo->query($query);

//associative array
$friendsArray = $statement->fetchAll(PDO::FETCH_ASSOC);

//insert form
$errors = [];

if(!isset($_POST['user_firstname']) || strlen($_POST['user_firstname'] > 45) || trim($_POST['user_firstname']) == ''){
    $errors[] = "Le nom est obligatoire et doit moins 45 caractères";
}
if(!isset($_POST['user_lastname']) || strlen($_POST['user_lastname'] > 45) || trim($_POST['user_lastname']) == ''){
    $errors[] = "Le prénom est obligatoire et doit mois  45 caractères";
}

if(empty($errors)){
    $firstname = $_POST['user_firstname']; 
    $lastname = $_POST['user_lastname'];

    // prepare the request
    $query = 'INSERT INTO friend (firstname, lastname) VALUES (:user_firstname, :user_lastname)';
    $statement = $pdo->prepare($query);

    //placeholders
    $statement->bindValue(':user_firstname', $firstname, \PDO::PARAM_STR);
    $statement->bindValue(':user_lastname', $lastname, \PDO::PARAM_STR);

    $statement->execute();

    //retarget
    header('location: index.php');
}


