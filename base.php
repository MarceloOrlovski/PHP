<?php
$conn = mysql_connect("servidor","usuario","senha") or print(mysql_error());
mysql_select_db("banco", $conn) or print(mysql_error());
print"conectado";	
$sql = mysql_query("SELECT id, teste FROM teste");
if (!$sql) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}
$row = mysql_fetch_row($sql);

echo $row[0];
echo $row[1];

?>