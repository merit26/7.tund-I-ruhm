<?php
    require_once("edit_functions.php");
     
    //kas muutuja on aadressireal
    if(isset($_GET["edit_id"])){
        //tr�kin aadressirealt muutuja
        echo $_GET["edit_id"];
        
        //k�sin andmed
        $car = getSingleCarData($_GET["edit_id"]);
        var_dump($car);
        
    }else{
        
        //kui muutujat ei ole,
        // ei ole m�tet siia lehele tulla
        // suunan tagasi table.php
        header("Location: table.php");
        
    }

?>