<?php
if (isset($_COOKIE["OAuth"]))
  {

	$credential=substr($_COOKIE["OAuth"],10);
	$decoded=base64_decode($credential);

	$temp=explode("%_%",$decoded);

	$isCookie=TRUE;
	$user=$temp[0];
	$passwd=$temp[1];
  }

else {

if($_REQUEST['username']==NULL) {
header('Location: login.php');
exit; }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>JIRA Time tracker</title>
    <link rel="stylesheet" href="http://localhost/tracker/css/pure-menu.css">  
    <link rel="stylesheet" href="http://localhost/tracker/css/side-menu.css">
<script>
function redirect_basic() {
document.getElementById("jql_form").style.display = "none";
document.getElementById("basic_form").style.display = ""; 
document.getElementById("btn_1").style.display = "none"; 
document.getElementById("btn_2").style.display = ""; 
}
function redirect_advanced() {
document.getElementById("jql_form").style.display = "";
document.getElementById("basic_form").style.display = "none"; 
document.getElementById("btn_1").style.display = ""; 
document.getElementById("btn_2").style.display = "none";
}
</script>
</head>
<body>

<div class="layout">


<?php
					
					$username = $_REQUEST['username'];
					$password = $_REQUEST['password'];                                      
     
					if($username==NULL && $password==NULL && $isCookie==TRUE){
					$username=$user;
					$password=$passwd;
					}
					// cURL CODE BEGINS!!!

                                        $login = curl_init();
                                        $login = login('https://pubmatic.okta.com/login/do-login', 'username='.$username.'&password='.$password.'&_xsrfToken=c51bd3a922c69a599969f9af8850a2b64e7868ee&domain=&fromURI=&remember=true&login=Sign+In'); //OKTA LOGIN
                                        get_post_param($login, "https://pubmatic.okta.com/app/jira_onprem/kvw2ohtkBZXITLQLHIAV/sso/saml");
                                        
					

					//cURL Code Starts
					function login($url, $data)
                                        {
                                        global $login;
                                        curl_setopt($login, CURLOPT_COOKIEFILE, "");
                                        curl_setopt($login, CURLOPT_TIMEOUT, 999999999999999);
                                        curl_setopt($login, CURLOPT_RETURNTRANSFER, TRUE);
                                        curl_setopt($login, CURLOPT_URL, $url);
                                        curl_setopt($login, CURLOPT_FOLLOWLOCATION, TRUE);
                                        curl_setopt($login, CURLOPT_POST, TRUE);
                                        curl_setopt($login, CURLOPT_POSTFIELDS, $data);
                                        ob_start();
                                        $data = curl_exec($login);
					
                                        ob_end_clean();
                                        return $login;
                                        }

                                        function get_post_param($ch, $site)
                                        {
                                        global $POST_PARAM;
                                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                                        curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
                                        curl_setopt($ch, CURLOPT_TIMEOUT, 999999999999999);
                                        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
                                        curl_setopt($ch, CURLOPT_URL, $site);
                                        $data = curl_exec($ch);
                                        libxml_use_internal_errors(true); // Prevent HTML errors from displaying
                                        $doc = new DOMDocument();
                                        $doc->loadHTML($data);
                                        $SAML = $doc->getElementsByTagName('input')->item(0);
                                        $SAML_Response = $SAML->getAttribute('value');
                                        $RelayState = $doc->getElementsByTagName('input')->item(1);
                                        $RelayState_Value = $RelayState->getAttribute('value');
                                        $SAML_Response = str_replace("+", "%2B", $SAML_Response);
                                        $RelayState_Value = str_replace("/", "%2F", $RelayState_Value);
                                        $RelayState_Value = str_replace(":", "%3A", $RelayState_Value);
                                        $POST_PARAM = "SAMLResponse=" . $SAML_Response . "&RelayState=" . $RelayState_Value;
                                        }

                                        function grab($ch, $url)
                                        {
                                        curl_setopt($ch, CURLOPT_URL, $url);
                                        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
                                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                        $sample_raw = curl_exec($ch);
                                        return $sample_raw;
                                        }

					//cURL CODE ENDS!!


					if($POST_PARAM=='SAMLResponse=&RelayState=') {
					setcookie("OAuth",$value,time()-3600,'/');
					echo  '
						<div class="contents">

						<form action="login.php" method="post" class="pure-form pure-form-aligned">
						<br/><br/><table align="center">
						<tr>
						<td><label>The username or password is invalid</label></td>
						</tr>

						<tr><td><br/><br/><input type="submit" value="Go Back" name="Submit" class="pure-button pure-button-primary"/></td></tr>
						</table>
						</form>

	  							</div>
        						</div>
						</body>
						</html>';
						exit;
					}

                                        else {
					$value=base64_encode("$username%_%$password");
					$value="Z3I354HfRs".$value;
					setcookie("OAuth",$value,time()+(3600*3600*2));

					echo '

        <div id="contents" class="contents">
    
<form id="jql_form" action="report.php" method="post" class="pure-form pure-form-aligned" onsubmit="setInterval(draw, 33);">
  

<br/><br/><table align="center"><tr><td><input type="text" name="input1" placeholder="Enter a JQL Query" size="52" required autofocus/></td><td><button  type="button" id="btn_1" onclick="redirect_basic()"  title="Switch to Basic Search" class="pure-button pure-button-primary" >~</button></td></tr></table>
<input type="hidden" name="set-flag" value="True"/>';


$username=$_REQUEST['username'];
$password=$_REQUEST['password'];

echo "<input type='hidden' name='username' value=$username />";
echo "<input type='hidden' name='password' value=$password />";


echo '<br/><br/><input type="submit" id="Submit" value="Search" name="submit" class="pure-button pure-button-primary" /> <tr/><input id="Reset" type="reset" value="Reset" class="pure-button pure-button-secondary"/>

</form>       


<form style="display:none;" id="basic_form" action="report-basic.php" method="post" class="pure-form pure-form-aligned" onsubmit="setInterval(draw, 33);">
  

<br/><br/><table align="center"><tr><td><input type="text" name="input1" pattern="([A-Za-z]*-\d+)(,\s*[A-Za-z]*-\d+)*" placeholder="TE-8834,TE-9070,TE-8853" size="52" required/></td><td><button id="btn_2" type="button" onclick="redirect_advanced()" title="Switch to JQL Query based Search" style="display:none;" class="pure-button pure-button-primary">~</button></td></tr></table>
<input type="hidden" name="set-flag" value="True"/>';


$username=$_REQUEST['username'];
$password=$_REQUEST['password'];

echo "<input type='hidden' name='username' value=$username />";
echo "<input type='hidden' name='password' value=$password />";


echo '<br/><br/><input type="submit" id="Submit" value="Search" name="submit" class="pure-button pure-button-primary" /> <tr/><input id="Reset" type="reset" value="Reset" class="pure-button pure-button-secondary"/>

</form>     

       </div>     
    </div>

</body>

<canvas id="c" width="1366" height="220"></canvas>
<script src="http://localhost/tracker/js/physics.js"></script>
</html>					


					';
					}

?>
