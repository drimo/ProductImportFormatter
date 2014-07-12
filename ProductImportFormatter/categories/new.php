<? 
include('config.php'); 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "INSERT INTO `Categories` ( `CategoryId` ,  `CategoryList`  ) VALUES(  '{$_POST['CategoryId']}' ,  '{$_POST['CategoryList']}'  ) "; 
mysql_query($sql) or die(mysql_error()); 
echo "Added row.<br />"; 
echo "<a href='list.php'>Back To Listing</a>"; 
} 
?>

<form action='' method='POST'> 
<p><b>CategoryId:</b><br /><input type='text' name='CategoryId'/> 
<p><b>CategoryList:</b><br /><input type='text' name='CategoryList'/> 
<p><input type='submit' value='Add Row' /><input type='hidden' value='1' name='submitted' /> 
</form> 
