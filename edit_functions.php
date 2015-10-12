<?php
    //edit_functions.php

    require_once("../config_global.php");
    $database = "if15_romil_1";
    
    function getSingleCarData($id){
        
        $mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);

        $stmt = $mysqli->prepare("SELECT number_plate, color FROM car_plates WHERE id=? AND deleted IS NULL");
        $stmt->bind_param("i", $id);
        $stmt->bind_result($number_plate, $color);
        $stmt->execute();
        
        // auto objekt
        $car = new StdClass();
        
        // kas sain rea andmeid
        if($stmt->fetch()){
            
            $car->number_plate = $number_plate;
            $car->color = $color;
            
        }else{
            // ei tulnud 
            // kui id ei olnud (vale id)
            // v�i on kustutatud (deleted ei ole null)
            header("Location: table.php");
        }
        
        $stmt->close();
        $mysqli->close();
        
        return $car;
        
    }
    
    
?>