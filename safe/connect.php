<?php

session_start();

$connect = mysql_connect("localhost", "name", "pass");
if($connect == TRUE) {
 if(mysql_select_db("db") != TRUE) {
  exit("<span style='color: red'>Can't connect to the MySQL database. Please contact the webmaster.</body></html>");
 }
}else{
 exit("<span style='color: red'>Can't connect to the MySQL server. Please contact the webmaster.</body></html>");
}

?>