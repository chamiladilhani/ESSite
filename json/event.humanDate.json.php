<?php
header('Content-type: text/json');
echo '[';
$separator = "";

$host="localhost"; //replace with your hostname 
$username="root"; //replace with your username 
$password=""; //replace with your password 
$db_name="es-db"; //replace with your database 
$con=mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");
$sql = "SELECT * FROM `event` WHERE cancel_note = '' AND publish = '1'"; //replace emp_info with your table name 
$result = mysql_query($sql);

if(mysql_num_rows($result)){
    while($row=mysql_fetch_array($result)){
        $date = $row['edate'];
        echo $separator;
        echo '  { "date": "'.$date.' '.$row['ehour'].':'.$row['eminute'].':00", "type": "", "title": "'.current(explode("\n", wordwrap($row['ename'], 70, "...\n"))).'", "description": "'.current(explode("\n", wordwrap($row['edescription'], 100, "...\n"))).'", "url": "event-more.php?eid='.$row['id'].'" }';
        $separator = ",";
    }
}    

echo ']';
?>