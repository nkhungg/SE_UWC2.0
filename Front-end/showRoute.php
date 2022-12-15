<?php
$ID=$_GET['ID'];
$lat_center="10.8805587";
$lon_center="106.803188";
function distance($lat_center,$lon_center,$lat,$lon) : float {
    $lat_center_float=(float)$lat_center;
    $lon_center_float=(float)$lon_center;
    $lat_float=(float)$lat;
    $lon_float=(float)$lon;
    return sqrt(($lat_float-$lat_center_float)**2+($lon_float-$lon_center_float)**2);
}
function mcp_cmp($a,$b){
    return $a[2]>$b[2];
}
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
$mcp_array_result = array();
array_push($mcp_array_result,array($mcp_array[0][0],$mcp_array[0][1]));
unset($mcp_array[0]);
usort($mcp_array,'mcp_cmp');
$count_mcp_new=0;
var_dump($mcp_array_result);
echo "<br>";
while(count($mcp_array)>0){
    for($a=0;$a<count($mcp_array);$a=$a+1){

        $mcp_array[$a][2]=distance($mcp_array_result[$count_mcp_new][0],$mcp_array_result[$count_mcp_new][1],$mcp_array[$a][0],$mcp_array[$a][1]);
    }
    usort($mcp_array,'mcp_cmp');
    array_push($mcp_array_result,array($mcp_array[0][0],$mcp_array[0][1]));
    unset($mcp_array[0]);
    usort($mcp_array,'mcp_cmp');
    $count_mcp_new=$count_mcp_new+1; 
}
    // for($a=0;$a<count($mcp_array_result);$a++){
    //     echo $mcp_array_result[$a][0] . " " . $mcp_array_result[$a][1];
    //     echo "<br>";
    // }
$ShowRoute="https://www.google.com/maps/dir/10.8805587,106.803188";
for($a=0;$a<count($mcp_array_result);$a++){
    $ShowRoute=$ShowRoute . "/" . $mcp_array_result[$a][0] . "," . $mcp_array_result[$a][1];
}
header("location:$ShowRoute");
?>