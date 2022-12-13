<?php
declare(strict_types=1);
$lat_center="10.880811555222712";
$lon_center="106.80534451065286";
function distance($lat_center,$lon_center,$lat,$lon) : float {
    $lat_center_float=(float)$lat_center;
    $lon_center_float=(float)$lon_center;
    $lat_float=(float)$lat;
    $lon_float=(float)$lon;
    return sqrt(($lat_float-$lat_center_float)**2-($lat_float-$lat_center_float)**2);
}
$fruits = array();

$lat1="10.8784";
$lon1="106.806";
$lat2="10.7723";
$lon2="106.658";
$ShowRoute="https://www.google.com/maps/dir";
$ShowRoute=$ShowRoute . "/" . $lat1 . "," . $lon1 . "/" . $lat2 . "," . $lon2;
header("location:$ShowRoute");
?>