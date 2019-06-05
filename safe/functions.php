<? 

///////////////////////////////////////////////////////////////////////////////

function tstotime($var) {
    // There are 60 seconds in a minute and 3600 seconds in a hour as well as 86400 seconds in a day
    $return=array();
    $return['d']=floor($var/86400);
    $var=$var-($return['d']*86400);
     
    $return['h']=floor($var/3600);
    $var=$var-($return['h']*3600);
     
    $return['m']=floor($var/60);
    $var=$var-($return['m']*60);
     
    $return['s']=$var;
     
    return $return;
}

function money($value){
     
    return "$ ".number_format($value)."";
 
}
function sitefilter($tekst) 
{ 

$badsite = array ("bootleggers", "deluccio", "crimebloc", "mobstar", "gangster basics", "Street Legends", "fluffychick"); 

$countsite = count($badsite); 

for ($var = 0; $var < $countsite; $var++ ) 
{ 
$tekst = eregi_replace($badsite[$var], 'No Advertisement', $tekst); 
} 

return $tekst; 

}

/////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////

function smilie($tekst) 
{ 

$smilie = array (":arrow:", ":d", ":s", "8)", ";(", "8|", ":evil:", ":!:", ":idea:", ":lol:", ":mad:", ":?:", ":redface:", ":rolleyes:", ":(", ":)", ":o", ":p", ":twisted:", ";)", ":tdn:", ":tup:"); 

$img = array (
"<img src=\"img/smile/arrow.gif\">",
"<img src=\"img/smile/biggrin.gif\">", 
"<img src=\"img/smile/confused.gif\">", 
"<img src=\"img/smile/cool.gif\">", 
"<img src=\"img/smile/cry.gif\">", 
"<img src=\"img/smile/eek.gif\">", 
"<img src=\"img/smile/evil.gif\">", 
"<img src=\"img/smile/exclaim.gif\">",
"<img src=\"img/smile/idea.gif\">", 
"<img src=\"img/smile/lol.gif\">", 
"<img src=\"img/smile/mad.gif\">", 
"<img src=\"img/smile/question.gif\">", 
"<img src=\"img/smile/redface.gif\">", 
"<img src=\"img/smile/rolleyes.gif\">", 
"<img src=\"img/smile/sad.gif\">", 
"<img src=\"img/smile/smile.gif\">", 
"<img src=\"img/smile/surprised.gif\">", 
"<img src=\"img/smile/toungue.gif\">", 
"<img src=\"img/smile/twisted.gif\">", 
"<img src=\"img/smile/wink.gif\">", 
"<img src=\"img/smile/tdown.gif\">", 
"<img src=\"img/smile/tup.gif\">"
);

$aantal = count($smilie); 

for ($var = 0; $var < $aantal; $var++ ) 
{ 

$tekst = str_replace($smilie[$var], $img[$var], $tekst );

} 

return $tekst; 
}

function smilielist(){
echo "
<a href=\"javascript:smile('message',':arrow:')\" onFocus=\"if(this.blur)this.blur()\"><img src=\"img/smile/arrow.gif\" border=\"0\"></a>
<a href=\"javascript:smile('message',':d')\" onFocus=\"if(this.blur)this.blur()\"><img src=\"img/smile/biggrin.gif\" border=\"0\"></a>
<a href=\"javascript:smile('message',':s')\" onFocus=\"if(this.blur)this.blur()\"><img src=\"img/smile/confused.gif\" border=\"0\"></a>
<a href=\"javascript:smile('message','8)')\" onFocus=\"if(this.blur)this.blur()\"><img src=\"img/smile/cool.gif\" border=\"0\"></a>
<a href=\"javascript:smile('message',';\(')\" onFocus=\"if(this.blur)this.blur()\"><img src=\"img/smile/cry.gif\" border=\"0\"></a>
<a href=\"javascript:smile('message','8|')\" onFocus=\"if(this.blur)this.blur()\"><img src=\"img/smile/eek.gif\" border=\"0\"></a>
<a href=\"javascript:smile('message',':evil:')\" onFocus=\"if(this.blur)this.blur()\"><img src=\"img/smile/evil.gif\" border=\"0\"></a>
<a href=\"javascript:smile('message',':!:')\" onFocus=\"if(this.blur)this.blur()\"><img src=\"img/smile/exclaim.gif\" border=\"0\"></a>
<a href=\"javascript:smile('message',':idea:')\" onFocus=\"if(this.blur)this.blur()\"><img src=\"img/smile/idea.gif\" border=\"0\"></a>
<a href=\"javascript:smile('message',':lol:')\" onFocus=\"if(this.blur)this.blur()\"><img src=\"img/smile/lol.gif\" border=\"0\"></a>
<a href=\"javascript:smile('message',':mad:')\" onFocus=\"if(this.blur)this.blur()\"><img src=\"img/smile/mad.gif\" border=\"0\"></a>
<a href=\"javascript:smile('message',':?:')\" onFocus=\"if(this.blur)this.blur()\"><img src=\"img/smile/question.gif\" border=\"0\"></a>
<a href=\"javascript:smile('message',':redface:')\" onFocus=\"if(this.blur)this.blur()\"><img src=\"img/smile/redface.gif\" border=\"0\"></a>
<a href=\"javascript:smile('message',':rolleyes:')\" onFocus=\"if(this.blur)this.blur()\"><img src=\"img/smile/rolleyes.gif\" border=\"0\"></a>
<a href=\"javascript:addtext('message',':)')\" onFocus=\"if(this.blur)this.blur()\"><img src=\"img/smile/smile.gif\" border=\"0\"></a>
<a href=\"javascript:smile('message',':o')\" onFocus=\"if(this.blur)this.blur()\"><img src=\"img/smile/surprised.gif\" border=\"0\"></a>
<a href=\"javascript:smile('message',':p')\" onFocus=\"if(this.blur)this.blur()\"><img src=\"img/smile/toungue.gif\" border=\"0\"></a>
<a href=\"javascript:smile('message',':twisted:')\"><img src=\"img/smile/twisted.gif\" border=\"0\"></a>
<a href=\"javascript:smile('message',';)')\" onFocus=\"if(this.blur)this.blur()\"><img src=\"img/smile/wink.gif\" border=\"0\"></a>
<a href=\"javascript:addtext('message',':tdn:')\" onFocus=\"if(this.blur)this.blur()\"v><img src=\"img/smile/tdown.gif\" border=\"0\"></a>
<a href=\"javascript:smile('message',':tup:')\" onFocus=\"if(this.blur)this.blur()\"><img src=\"img/smile/tup.gif\" border=\"0\"></a>";
}// end function

////////////////////////////////////// bb codes ///////////////////////////////

function bbcodes($reactie) 
    { 
        
    // Vet, schuin, etc            V
    $reactie = preg_replace("/\[b\](.+?)\[\/b\]/is",'<strong>\1</strong>', $reactie);
    $reactie = preg_replace("/\[i\](.+?)\[\/i\]/is",'<em>\1</em>', $reactie);
    $reactie = preg_replace("/\[u\](.+?)\[\/u\]/is",'<u>\1</u>', $reactie);
    $reactie = preg_replace("/\[s\](.+?)\[\/s\]/is",'<s>\1</s>', $reactie);

	//quote box.	 
	$reactie = preg_replace("/\[quote\](.+?)\[\/quote\]/is",'<br /><center><fieldset style="color: #000000; border: 1px solid #000000; width: 90%; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">Quote.</legend>\1</fieldset></center><br />', $reactie);
	 	  
    // Color, font & size        V
    $reactie = preg_replace ("#\[color=(\#[0-9A-F]{6}|[a-z\-]+)\](.*?)\[/color\]#si", "<font color=\"\\1\">\\2</font>", $reactie);
    $reactie = preg_replace ("/\[font=(.*)\](.*)\[\/font\]/", "<font face=\"\\1\">\\2</font>", $reactie);
    $reactie = preg_replace ("/\[size=(.*)\](.*)\[\/size\]/", "<font size=\"\\1\">\\2</font>", $reactie);
	
    // Diversen               V
    $reactie = str_replace ("[left]", "<div align=left>", $reactie);
    $reactie = str_replace ("[/left]", "</div>", $reactie);
    $reactie = str_replace ("[center]", "<div align=\"center\">", $reactie);
    $reactie = str_replace ("[/center]", "</div>", $reactie);
    $reactie = str_replace ("[right]", "<div align=\"right\">", $reactie);
    $reactie = str_replace ("[/right]", "</div>", $reactie);
    
    // Horizontale lijn    V
    $reactie = str_replace ("[hr]","<hr color=\"#000000\" noshade />",$reactie);
    
    // Lijst - Unorderd                V
    $reactie = str_replace ("[list]","<ul>",$reactie);
    $reactie = str_replace ("[*]","<li>",$reactie);
    $reactie = str_replace ("[/list]","</li></ul>",$reactie);
    
	// list orderd.
	
	$reactie = str_replace ("[order]","<ol>",$reactie);
    $reactie = str_replace ("[*]","<li>",$reactie);
    $reactie = str_replace ("[/order]","</li></ol>",$reactie);
	   
    return $reactie; 
    } 

?> 