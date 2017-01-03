<?php
   if($_SERVER['REQUEST_METHOD']=='POST'){
        include_once('connect.php');
        insertData();
   }
    
    
    function insertData()
    {
        global $bdd;
        $nom = $_POST['nom_groupe'];
        $districtNom =$_POST['dictrictNom'];
        $dateReconnaissance =$_POST['dReconnaissance'];
        $couleur =$_POST['couleur_groupe'];
        $login =$_POST['login_groupe'];
        $password =$_POST['password_groupe'];
        $password_conf =$_POST['password_groupe_conf'];
        
        if($password == $password_conf){
            
            $bdd->exec('INSERT INTO groupe (login,password,Nom,DistrictID,Couleur,Date_reconnaissance)
                            VALUES (\''.htmlspecialchars($login).'\',\''.htmlspecialchars($password).'\',\''.htmlspecialchars($nom).'\',(SELECT ID FROM district WHERE Nom = \''.htmlspecialchars($districtNom).'\'),\''.htmlspecialchars($couleur).'\',\''.htmlspecialchars($dateReconnaissance).'\');'
                         );
            
            print_r($bdd->errorInfo());
        }
        
    }


?>