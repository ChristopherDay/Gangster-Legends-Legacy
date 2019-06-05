<?php
// This file is prety basic we just check to see if $_GET['search'] is set then if not show the html link
if (!$_GET['search']) {
echo 'You can search the streets '.$turns.' times.<br><a href="?page=street&search=true">Search.</a>';
}
?>