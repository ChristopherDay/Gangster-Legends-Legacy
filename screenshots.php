<?php
$nopic='yes';
include 'theme/indextop.php';

$_GET['img'] = ereg_replace("[^0-9]",'',$_GET['img']);
if(empty($_GET['img'])){ $_GET['img'] = 1; }

$link_array = array("img/screens/ace_club.JPG", "img/screens/blackjack.JPG", "img/screens/booze_brewery.JPG", "img/screens/crimes.JPG", "img/screens/lottery.JPG", "img/screens/police_chase.JPG", "img/screens/smuggle.JPG", "img/screens/stock_market.JPG", "img/screens/travel.JPG");



	echo '<br />
<table width="600" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="top"><img src="'.$link_array[$_GET['img'] - 1].'"/></td>
  </tr>
  <tr>
    <td align="center"><hr class="hr" /></td>
  </tr>
  <tr>
    <td align="center">|| <a href="?img=1" onFocus="if(this.blur)this.blur()">1</a> || <a href="?img=2" onFocus="if(this.blur)this.blur()">2</a> || <a href="?img=3" onFocus="if(this.blur)this.blur()">3</a> || <a href="?img=4" onFocus="if(this.blur)this.blur()">4</a> || <a href="?img=5" onFocus="if(this.blur)this.blur()">5</a> || <a href="?img=6" onFocus="if(this.blur)this.blur()">6</a> || <a href="?img=7" onFocus="if(this.blur)this.blur()">7</a> ||<a href="?img=8" onFocus="if(this.blur)this.blur()">8</a> || <a href="?img=9" onFocus="if(this.blur)this.blur()">9</a> || </td>
  </tr>
</table>';


include 'theme/indexbottom.php';
?>
