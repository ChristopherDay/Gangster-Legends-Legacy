<?php

if (!in_array($name, $admin_array) { 
	echo '<h1>Access denied!</h1>'; 
} else {
	echo '<h1>Location Administartion</h1>
	<p>
	<table width="470px">
	<th><td width="20px">ID</td><td width="300px">Name</td><td width="100px;">Cost</td><td width="50px;">Links</td></th>';
	$q=mysql_query("SELECT * FROM `location`");
	while ($location=mysql_fetch_array($q)) {	
		echo '<tr><td>'.$location['id'].'</td><td>'.$location['name'].'</td><td>'.$location['cost'].'</td><td></td></tr>';
	}
	echo '</table>
	</p>';
}

?>