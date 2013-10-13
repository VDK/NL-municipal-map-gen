<?php
header( "Content-type: image/svg+xml" );
@print('<?xml version="1.0" encoding="utf-8" standalone="no"?>');
?>
<!-- Creator: Esri ArcMap 10.2.0.3348 -->
<svg width="549.75118pt" height="633.00472pt" viewBox="0 0 549.75118 633.00472" enable-background="new 0 0 549.75118 633.00472"
  version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" >
  <g id="Layers">
    <g id="gem_2012_v1">
      <clipPath id="SVG_CP_1">
        <path d="M0,632.9505L0,0L549.75118,0L549.75118,632.9505L0,632.9505z"/>
      </clipPath>
<?php

// Create connection
$con=mysqli_connect("localhost","root","","test");

// Check connection
if (mysqli_connect_errno($con)) { echo "Failed to connect to MySQL: " . mysqli_connect_error(); }

$result = mysqli_query($con,"SELECT GM_CODE, GM_NAAM FROM _nl_gem");

//create results array
$i = 0;
while($row = mysqli_fetch_array($result)){
  $gem_info[$i]['gm_code'] = $row['GM_CODE'];
  $gem_info[$i]['gm_naam'] = mb_convert_encoding($row['GM_NAAM'], 'UTF-8');
  $i++;
}

//loop through SVG XML, replace colors where needed  
$xml = simplexml_load_file("map.xml");
$i =0;
foreach($xml->children() as $child){

    $child['gem'] = "0000";
    $child['cbs'] = "0000"; 
    if ($child['fill'] == '#C9F2D0'){
      $child['gem'] = $gem_info[$i]['gm_naam'];
      $child['cbs'] = $gem_info[$i]['gm_code'];
      $i++;
      
    } 

    //clip-path="url(#SVG_CP_1)" fill="#C9F2D0"
    createRow($child['clip-path'], $child['fill'], $child['gem'], $child['cbs'], $child['d'] );
  }



function createRow ($clippath, $fill, $gem, $cbs, $d ){
 echo '
 <path clip-path="'.$clippath.'" fill="'.$fill.'" gem="'.$gem.'" cbs="'.$cbs.'" fill-rule="evenodd" stroke="#6E6E6E" stroke-width="0.47991" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" d="'.$d.'" />';
} 
?>
    </g>
  </g>
</svg>
