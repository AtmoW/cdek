<?php
    include 'cdek.php';


    if(isset($_POST['city_name'])){
        $city_name = $_POST['city_name'];
        unset($_POST['city_name']);

        $points = getPointsByCity($city_name,$client);

        echo json_encode($points);
    }


?>