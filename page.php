<?php
include 'safe/safe.php';
include 'theme/top.php';
include 'files/prison_check.php';
include 'files/usercheck.php';
include 'lang/en.php';
include 'safe/functions.php';
$_GET['page']=str_replace("/", "", $_GET['page']);
if (!$_GET['page']) {
	include 'files/news.php';
} else if (file_exists('files/'.$_GET['page'].'.php')) {
	if (file_exists('includes/_'.$_GET['page'].'.php')) {
		require 'includes/_'.$_GET['page'].'.php';
	}
	include 'files/'.$_GET['page'].'.php';
} else {
	echo $lang['global']['error']['404'];
}

include 'theme/information_bar.php';
include 'theme/bottom.php';
?>