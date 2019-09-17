<?php 
$link= mysqli_connect('localhost', 'root', '', 'test2');
$sql="SELECT * FROM users";
$result =mysqli_query($link, $sql);
?>


<html>
<head>
	<title>list of users</title>
</head>
<body>
	<p>List of posts</p>
	<table>
		<tr>
			<td>Username</td>
			<td>Useremail</td>
		</tr>
<?php 
while ($row = mysqli_fetch_array($result))
{
	echo "\t<tr>\n";
	printf("\t\t<td> %s </td>\n", $row['userName']);
	printf("\t\t<td> %s </td>\n", $row['userEmail']);
	echo "\t</tr>\n";
}
?>
</table>
</body>
</html>
<?php 
mysqli_close($link);
?>