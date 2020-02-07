<?php
    include 'cdek.php';
    $cities_list = getCities();


    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>СДЭК</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <select name="cities" id="cities">
        <?php foreach ($cities_list as $city):?>
            <option value="<?php echo $city;?>"><?php echo $city;?></option>
        <?php endforeach; ?>    
    </select>



    <div class="points">
        
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="main.js"></script>
</body>
</html>