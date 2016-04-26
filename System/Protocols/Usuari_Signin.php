<?php
    require_once('../Classes/Usuari.php');
    //Requiered inputs
    $newUser = $_POST['user'];
    $newPass = md5($_POST['pass']);
    $newEmail = $_POST['email'];
    $newNom = $_POST['nom'];
    $newCognom = $_POST['cognom'];
    $newTelefon = $_POST['telefon'];
    $newPais = $_POST['pais'];
    $newImatge = $_POST['imatge'];
    
    //Tipus d'usuari >> User = 2<<
    $newId_Tipus = 2;
    
    //Afegir Usuari a la BD.
    $newUsuari = new Usuari($newUser, $newEmail, $newPass, $newNom, $newCognom, $newTelefon, $newPais, $newId_Tipus, $newImatge);
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