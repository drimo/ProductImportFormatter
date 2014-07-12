<? 
include('config.php'); 
if (isset($_GET['id']) ) { 
$id = (int) $_GET['id']; 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "UPDATE `Categories` SET  `CategoryId` =  '{$_POST['CategoryId']}' ,  `CategoryList` =  '{$_POST['CategoryList']}'   WHERE `CategoryId` = '$id' "; 
mysql_query($sql) or die(mysql_error()); 
echo (mysql_affected_rows()) ? "Edited row.<br />" : "Nothing changed. <br />"; 
echo "<a href='list.php'>Back To Listing</a>"; 
} 
$row = mysql_fetch_array ( mysql_query("SELECT * FROM `Categories` WHERE `CategoryId` = '$id' ")); 
?>

<form action='' method='POST'> 
<p><b>CategoryId:</b><br /><input type='text' name='CategoryId' value='<?= stripslashes($row['CategoryId']) ?>' /> 
<p><b>CategoryList:</b><br /><input type='text' name='CategoryList' value='<?= stripslashes($row['CategoryList']) ?>' /> 
<p><input type='submit' value='Edit Row' /><input type='hidden' value='1' name='submitted' /> 
</form> 
<? } ?> 
