<?php 
include('dbcon_s.php');
$location=$_POST['location'];
$html="";
$get_services_category=mysql_query("SELECT service_categories FROM doc_services GROUP BY service_categories");
if($get_services_category){
	while($row=mysql_fetch_array($get_services_category)){
		$html = $html.'<optgroup label="' . $row['service_categories']. '">';
		$get_sub_category = mysql_query("SELECT name, service_categories FROM doc_services WHERE service_categories = '".$row['service_categories']."' AND location = '$location' GROUP BY name");
		while($row=mysql_fetch_array($get_sub_category)){
			$values_arr = array('s_name' => $row['name'], 's_category' => $row['service_categories']);
			$html = $html."<option value='".json_encode($values_arr)."'>". $row['name'] . "</option>";
		} 
		$html = $html.'</optgroup>';
	}
	echo $html;
}else
{
	echo mysql_error();	
}
?>