
<?php
$username="root";
$pass="";
$name="thesis";
$db=new mysqli('localhost',$username,$pass)or die("No connection");

mysqli_select_db($db,$name)or die("cannot select DB");
$query="Select * from er_info;";
$records=mysqli_query($db,$query);



?>



<html>
<head>
 <script type="text/javascript" src="../jquery/jquery-1.4.4.min.js"></script>        
 <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
 <script type="text/javascript" src="../gmap3.js"></script> 
</head>
<style>
body{
  text-align:left-side;
}
.name{
  text-align:right-side;
}
.gmap3{
  margin: 20px auto;
  border: 2px dashed #C0C0C0;
  width: 500px;
  height: 500px;
}
</style>


<script type="text/javascript">

var map;
function initialize(lat,lng) {


  var myLatlng = new google.maps.LatLng(lat, lng);
  var myOptions = {
   zoom: 12,
   center: myLatlng,
   mapTypeId: google.maps.MapTypeId.ROADMAP
 }
 map = new google.maps.Map(document.getElementById("map_canvas"), myOptions); 
 
 var marker = new google.maps.Marker({
  position: myLatlng, 
  map: map,
  title: "Your location"
});
 



}

</script> 

<body onLoad="initialize(23.7805930,90.3935941)">
  <div id="map_canvas" style="width:inital; height:400px"></div>
  

  <?php

  if($records==FALSE){
    die(mysql_error());
  }
  echo "<table border='1'>
  <tr>
  <th>Id</th>
  <th>Name</th>
  <th>Email</th>
  <th>Number</th>
  <th>Latitude</th>
  <th>Longitude</th>
  <th>On Map</th>
  </tr>";

  while($course=mysqli_fetch_assoc($records)){
    $Course_ID=$course['id'];
    $Course_name=$course['name'];
    $Day=$course['email']; 
    $Faculty_Name=$course['number']; 
    $Start_time=$course['lat'];
    $Duration=$course['lng'];


    echo"<tr>";
    echo "<td>$Course_ID</td>";
    echo "<td>$Course_name</td>";
    echo "<td>$Faculty_Name</td>";
    echo "<td>$Day</td>";
    echo "<td>$Start_time</td>";
    echo "<td>$Duration</td>";
    echo "<td>" . '<input type="submit" name="submit" value="Show" class="button" onclick="initialize('.$Start_time.','.$Duration.')">' . "</td>";
    echo "</tr>";
  }
  echo "</table>";	
  ?>


</body>
</html>

