<?php
    session_start();
    ini_set('display_startup_errors',1);
    ini_set('display_errors',1);
    error_reporting(-1);
    require('../../Backend/php/profile.php');

    $profile = new profile();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="http://roobique.com/Data/css/profile.css">
    <meta charset="UTF-8">
    <title>Profile Page</title>
</head>
<body>
    <div class="navigation">
        <img class="NavLogo" src="http://roobique.com/Data/Images/Logo.png">
    </div>

    <div class="lab_item">
        <div class="hexagon hexagon2">
            <div class="hexagon-in1">
                <div class="hexagon-in2" style="background-image: url('<?php echo $profile->getProfile($_SESSION['InstaID']); ?>');"></div>
            </div>
        </div>
    </div>

    <div class="backgroundPic">


    </div>


</body>
</html>