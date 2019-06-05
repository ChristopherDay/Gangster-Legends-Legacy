<form method="post">
<?php
if(empty($gang)){
require("includes/_gang_create.php"); 
include('gang_create.php');
}else{
require("includes/_gang_club.php"); 
include('gang_club.php');
}
?>
</form>

