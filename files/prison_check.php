<?php if($prison_check[1] == 1){ ?>
<fieldset style="color: #000000; border: 1px solid #000000; width: 350px; text-align: center; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">You are in Prison.</legend>
<?php 

if(time() <= $prison_check[0]){
echo "You are locked up in prison for:<br />".date( "00:i:s", $prison_check[0] - time() );
}else{	
echo "You are free to go.";
}
?>
</fieldset>
<?php require("bottom.php"); ?>
<?php exit();} ?>