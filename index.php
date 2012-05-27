<?php 
require('frontend.php'); 
/*
$directory = Ort der im frontend angegeben wurde
$data =  Array mit den Daten von heute
$previous_data = Array mit den Daten von gestern
$description = Beschreibung der Temperatur
$color = Farbe die zur Temperatur passt
$comparison = Vergleichstext zwischen gestern und heute
$versioning = Versionierungsschema f�r ganz unten
$end_time und $cur_time sind die Zeitstempel
*/
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Wasser</title>

<!-- iOS Dinge -->
<meta name="apple-mobile-web-app-capable" content="yes" /> 
<meta name="viewport" content="width = 480px, inital-scale = 1.0, user-scalable=no"> 
<meta name="apple-mobile-web-app-status-bar-style" content="transparent">
<link rel="apple-touch-icon" href="<?php echo $directory; ?>/apple-touch-icon.png"/>
<link rel="apple-touch-startup-image" href="<?php echo $directory; ?>/startup.png">

<!-- Google Font -->
<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>

<!-- RSS Database.xml integration -->
<link rel="alternate" type="application/rss+xml" title="Wassertemperatur" href="<?php echo $directory; ?>/database.xml" />

<!-- Computer Stylesheet -->
<link rel="stylesheet" href="<?php echo $directory; ?>/standard2.css" type="text/css" />


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $directory; ?>jquery.countdown.js"></script>
<script type="text/javascript">
$(function () {
    var openingDay = new Date(2012, 05-1, 24);
    $('#defaultCountdown').countdown({until: openingDay});
});
</script>



<style type="text/css">
h1.today {
    font-size: 100pt;
    padding:50px 0px 0px 0px;
    font-weight: lighter;
    text-shadow: 1px 1px 5px grey;
    
    opacity: 0.9;
    margin:0;
    color:<?php echo $color; ?>;
    -webkit-mask-image: -webkit-gradient(linear, left top,
    left bottom, from(rgba(0,0,0,1)), to(rgba(0,0,0,0.8))); 
}

h1.yesterday {
    font-size: 65pt;
    padding:50px 0px 0px 0px;
    opacity: 0.9;
    margin:0;
    color:<?php echo $previous_color; ?>;
    -webkit-mask-image: -webkit-gradient(linear, left top,
    left bottom, from(rgba(0,0,0,0.1)), to(rgba(0,0,0,1)));
}

h2 {
    font-size: 30pt;
    opacity: 0.9;
    font-weight: lighter;
}

p.version {
    font-size: 8pt;
    margin-top: 110px;
}

p{
    line-height: 21px;
    opacity: 0.9;
}
</style>

</head>
<body>


<?php
// Sieht nach ob wir uns in der Saison befinden oder nicht. Wenn nicht wird das Script per exit beendet. (das Ende des Scripts ganz unten beachten!)
if($days_left and $hours_left != 0) {
    echo $end_html;
    exit();
} else { ?>
<div id="wrap">        
                <div class="layer">
                <div id="status_bar"> <p class="date"><?php echo $data['site_date']; ?></p> <p class="time"><?php echo $data['site_time']; ?></p> </div> 
                    <h1 class="today"><?php echo $data['temperature']; ?>&deg;C</h1>
                    <h2><?php echo $description; ?></h2>
                   <!-- <p>Gemessen am <b><?php echo $data['site_date']; ?></b> <br /> um <b><?php echo $data['site_time']; ?></b>.</p> -->
                    <p class="version"><?php echo $versioning; ?></p>
                </div>

            <!--     <div class="layer"><br />
                    <h2>R&uuml;ckblick</h2>
                    <p><div id="chart_div"></div></p>
                 </div> -->
               <!--   <div style="height:50px;"></div>   -->     
</div>
<!-- Daemon war zuletzt da: <?php echo $data['cur_timestamp']; ?> -->
</body>
</html>
<?php }; ?>