<?php
    require_once('../Classes/Usuari.php');
    //Requiered inputs
    $newSaldo = 500; //Saldo inicial
    $newUser = $_POST['user'];
    $newPass = md5($_POST['pass']);
    $newEmail = $_POST['email'];
    
    //optional inputs
    $newNom = null;
    $newCognom = null;
    $newDni = null;
    $newPhone = null;
    $newAdreça = null;
    $newPais = null;
    $newPoble = null;
    $newProvincia = null;
    $newPostal = null;
    
    //Tipus d'usuari >> User = 2<<
    $newId_Tipus = 2;
    
    //Afegir Usuari a la BD.
    $newUsuari = new Usuari($newSaldo, $newUser, $newEmail, $newPass, $newNom, $newCognom, $newDni, $newPhone, $newAdreça, $newPais, $newPoble, $newProvincia, $newPostal, $newId_Tipus);
    $test = $newUsuari->add();
    
    //Comprobació de si s'ha afegit l'usuari i loggin
    if($test != false){
        $usuari = $newUsuari->verificar_login($newUser,$newPass);
        if( $usuari != null){ 
            session_start();
            $_SESSION['usuari'] = $usuari;
            header('Location: ../../user/index.php');
        }
    }else{
        echo '<br><form><input type="button" value="Torna atras" name="Torna atras" onclick="history.back()" /></form>';
    }
?>