<?php
include('include/config.php');
$query=mysqli_query($con,"select * from diagnosis");
$rowcount=mysqli_num_rows($query);
?>
<table border="1">
<tr>
<td>download</td>
</tr>
<?php
for($i=1;$i<=$rowcount;$i++)
{
	$row=mysqli_fetch_array($query);

?>
<tr>
<td><a href="include/upload/<?php echo $row["pdf_file"] ?>"><?php echo $row["pdf_file"] ?></a></td>

</tr>

<?php	
}

?>
</table>