<?php
header( "Content-type: image/svg+xml" );
@print('<?xml version="1.0" encoding="iso-8859-1"?>');
?>
<!-- Creator: Esri ArcMap 10.2.0.3348 -->
<svg width="549.75118pt" height="633.00472pt" viewBox="0 0 549.75118 633.00472" enable-background="new 0 0 549.75118 633.00472"
  version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" author="Centraal Bureau voor de Statistiek en het Kadaster" >
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


$result = mysqli_query($con,"SELECT _progress.*, _cbs_changes.2012_cbs FROM _progress LEFT JOIN _cbs_changes ON _progress.gemeentenummer = _cbs_changes.new_cbs");

//create results array
while($row = mysqli_fetch_array($result)){
  if ($row["2012_cbs"] == NULL){
      $colors[$row['gemeentenummer']] = $row['status'];
  }
  else{
      $colors[$row['2012_cbs']] = $row['status'];
  }  
}

//loop through SVG XML, replace colors where needed  
$xml = simplexml_load_file("map.xml");

foreach($xml->children() as $child){
    switch ($colors[(string)$child['cbs']]){
      case "2":
        $child['fill'] = '#99141b';
        break;
      case "1":
        $child['fill'] = '#9C6769';
        break;
    } 
    createRow($child['clip-path'], $child['fill'], $child['gem'], $child['cbs'], $child['d'] );
  }



function createRow ($clippath, $fill, $gem, $cbs, $d ){
 echo '
 <path clip-path="'.$clippath.'" fill="'.$fill.'" gem="'.$gem.'" cbs="'.$cbs.'" fill-rule="evenodd" stroke="#6E6E6E" stroke-width="0.48" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" d="'.$d.'" />';
} 
?>
    </g>
  </g>
</svg>
