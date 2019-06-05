<?php
// Bank Script Made By Dayo
// Made for the GL scripts
$bperc = 3; // set this to the ammount you want to charge to deposit money
// dont forget to make a link on your menu <a href="http://bank.php" target="_blank">Bank</a>
 
if (isset($_POST['withdraw'])) {
	$withdraw = abs(@intval($_POST['withdraw']));
		if ($withdraw > $bank_money) { 
			echo 'You dont have enough money in your bank to do this';
		} else { 
			mysql_query("UPDATE `login` SET `money`=`money`+'".$withdraw."',  `bank`=`bank`-'".$withdraw."'"); echo 'You withdrew $'.number_format($withdraw).' from your bank.';
		}
} else if (isset($_POST['deposit'])) {
$ibp = 100 - $bperc;
$deposit = abs(@intval($_POST['deposit']));
$depo=round($deposit/100);
$deposit2 = $depo*$ibp;
	if ($deposit > $money) { 
	echo 'You dont have enough money to do this';
	} else { 
	mysql_query("UPDATE `login` SET `money`=`money`-'".$deposit."', `bank`=`bank`+'".$deposit2."'");
	echo 'You deposited $'.number_format($deposit).' into your bank.';
}
}
echo '
<form name="form1" method="post" action="">';

if ($_GET['action']=='deposit'){ 
	echo '[<a href="page.php?page=bank&action=withdraw">Withdraw Money</a>] [Deposit Money] [<a href="page.php?page=transfer">Transfer Money</a>]'; 
} else if($_GET['action'] == 'withdraw') { 
	echo '[Withdraw Money] [<a href="page.php?page=bank&action=deposit">Deposit Money</a>] [<a href="page.php?page=transfer">Transfer Money</a>]';
}

echo '<table width="400" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td colspan="2"><b>Bank</b></td>
    </tr>';

if ($bperc > 0) {
    echo '<tr>
      <td colspan="2">There is a charge of '.$bperc.'% to deposit your money</td>
    </tr>'; 
}
      
if ($_GET['action']=='withdraw') {
	echo '<tr>
      <td width="150px">Withdraw</td>
      <td><label>
        <input name="withdraw" type="text" id="withdraw" value="'.round($bank_money).'" class="entryfield" />
      </label></td>
    </tr>';
} else if ($_GET['action']=='deposit') {
    echo '<tr>
      <td width="150px">Deposit</td>
      <td><label>
        <input name="deposit" type="text" id="deposit" value="'.$money.'" class="entryfield" />
      </label></td>
    </tr>';
}  

if (!isset($_GET['action'])) { 
	echo '<tr><td><a href="page.php?page=bank&action=withdraw">Withdraw Money</a></td><td><a href="page.php?page=bank&action=deposit">Deposit Money</a></td><td><a href="page.php?page=transfer">Transfer Money</a></td></tr>';
} else {
    echo '<tr>
    <td colspan="2"><label>
    <input type="submit" name="Submit" value="Submit." class="button" style="float:right;">
    </label></td>
    </tr>';
}

echo '</table>
</form>';