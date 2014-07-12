<? 
include('config.php'); 
$result = mysql_query("SELECT CategoryList FROM `Categories` ORDER BY CategoryList") or trigger_error(mysql_error()); 

while ($row = mysql_fetch_assoc($result)) {
    $category[] = $row;
}

$struct = array("Categories" => $category);

header("Content-type: text/javascript");
echo json_encode($struct);
?>