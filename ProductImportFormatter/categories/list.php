<? 
include('config.php'); 
echo "<table border=1 >"; 
echo "<tr>"; 
echo "<td><b>CategoryId</b></td>"; 
echo "<td><b>CategoryList</b></td>"; 
echo "</tr>"; 
$result = mysql_query("SELECT * FROM `Categories` ORDER BY CategoryList") or trigger_error(mysql_error()); 
while($row = mysql_fetch_array($result)){ 
foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
echo "<tr>";  
echo "<td valign='top'>" . nl2br( $row['CategoryId']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['CategoryList']) . "</td>";  
echo "<td valign='top'><a href=edit.php?id=" . $row['CategoryId'] .">Edit</a></td><td><a href=delete.php?id=" . $row['CategoryId'] . ">Delete</a></td> "; 
echo "</tr>"; 
} 
echo "</table>"; 
echo "<a href=new.php>New Row</a>"; 
?>