<?php
    // on simule une base de données
    $users = array(
    // login => password
    'riri' => 'fifi',
    'yoda' => 'maitrejedi' );
    $login = "anonymous";
    $password = "anonymous";
    $errorText = "";
    $successfullyLogged = false;
    if(isset($_POST['login']) && isset($_POST['password'])) {
        $tryLogin=$_POST['login'];
        $tryPwd=$_POST['password'];
        // si login existe et password correspond
        if( array_key_exists($tryLogin,$users) && $users[$tryLogin]==$tryPwd ) {
            $successfullyLogged = true;
            $login = $tryLogin;
            $password = $tryPwd;
            session_start();
            $login_session = $_SESSION['PHPSESSID'];
        } else {
            $errorText = "Erreur de login/password";
        }
    } else
    $errorText = "Merci d'utiliser le formulaire de login";
    if(!$successfullyLogged) {
        echo $errorText;
    } 
    else {
        echo "<h1>Bienvenu ".$login.". Ton mdp est " . $password . "</h1>";
        echo "<h1>Ton login de session est " .$login_session. "</h1>";
    }
?>