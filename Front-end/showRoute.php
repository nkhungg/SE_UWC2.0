<?php
$ID=$_GET['ID'];
$lat_center="10.880811555222712";
$lon_center="106.80534451065286";
function distance($lat_center,$lon_center,$lat,$lon) : float {
    $lat_center_float=(float)$lat_center;
    $lon_center_float=(float)$lon_center;
    $lat_float=(float)$lat;
    $lon_float=(float)$lon;
    return sqrt(($lat_float-$lat_center_float)**2+($lat_float-$lat_center_float)**2);
}
function mcp_cmp($a,$b){
    return $a>$b;
}
$array = [0 => "a", 1 => "b", 2 => "c"];
unset($array[1]);
var_dump($array);
usort($array,'mcp_cmp');
var_dump($array);
exit;
require_once 'connection.php';
$mcp_array = array();
$take_lat_lon="SELECT latitude,longtitude from `mcp` a ,`task_collector-mcp` b where a.id = b.mcp_id and b.id='$ID'";
$count="SELECT count(latitude) as count_mcp from (SELECT latitude,longtitude from `mcp` a ,`task_collector-mcp` b where a.id = b.mcp_id and b.id='$ID') as a";
$count_result=mysqli_query($conn, $count);
$count_result_display=mysqli_fetch_assoc($count_result);
$count_mcp=$count_result_display['count_mcp'];
$result=mysqli_query($conn, $take_lat_lon);
while($row=mysqli_fetch_assoc($result)){
    $lat=$row['latitude'];
    $long=$row['longtitude'];
    array_push($mcp_array,array($lat,$long,distance($lat_center,$lon_center,$lat,$long)));
}
usort($mcp_array,'mcp_cmp');
$count_mcp=4;
$count_mcp2=0;
$mcp_array_result = array();
array_push($mcp_array,array($lat,$long,distance($lat_center,$lon_center,$lat,$long)));
for($a=$count_mcp2+1;$a<$count_mcp;$a=$a+1){
    for(;$count_mcp2<$count_mcp;$count_mcp2=$count_mcp2+1){
        $mcp_array[$a][2]=distance($mcp_array[$count_mcp2][0],$mcp_array[$count_mcp2][1],$mcp_array[$a][0],$mcp_array[$a][1]);
    }
}
$mcp_array[][2]=distance($mcp_array[0][1],$mcp_array[0][2],$lat,$long)


// $ShowRoute="https://www.google.com/maps/dir";
// $ShowRoute=$ShowRoute . "/" . $lat1 . "," . $lon1 . "/" . $lat2 . "," . $lon2;
// header("location:$ShowRoute");
?>