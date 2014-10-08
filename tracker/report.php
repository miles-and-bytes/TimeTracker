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
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>JIRA Time tracker</title>
    <link rel="stylesheet" href="http://localhost/tracker/css/pure-menu.css">  
    <link rel="stylesheet" href="http://localhost/tracker/css/side-menu.css">
</head>

<body>
    <div class="layout">
                
                    <?php
					
					$username = $_REQUEST['username'];
					$password = $_REQUEST['password'];

					if($isCookie==TRUE){
					$username=$user;
					$password=$passwd;
					}
					
$csv_hdr=" , , , , Time Duration [In Hours]\nTicket, Priority, Default User, TE Team, Product Management, Engineering, Client Ops, Miscellaneous, Total";
                                        
                                      
                                        
                                        $jql_query = $_REQUEST['input1'];
                                       
					$jql = rawurlencode($jql_query);

					//INITIALIZE TEAM ARRAY


					$Dev_Team = array("devsupport","null");

					$TE_Team = array("brt","mukul.gotkhindikar","kunal.kuntalam","neha.lokhande","bhaskar.kakinada","santosh.khandekar","anurag.vijayvergia","anupam.vijayvergia","dhawal.totey","swapnil.gandhi","milind.kulkarni","kiran.javalekar","atish.ahir","rahul.pawar","manojn.kumar","nana.shelke","shivam.agrawal");

					$PM_Team = array("navendu.sharma","sachin.kumar","mohammed.rahil.shaikh","robert.walczak","sunil.kelath","sanjay.varma","ankur.srivastava","adrian.pang","varun.menghani","nghiem.le","ira.blossom","justin.re","sachin.singh","ganeshram.natarajan","rahil.shaikh","meghna.gupta","ritesh.pai","sumit.kumawat","garima.shrivastava","ganesh.ram.natarajan","murali.veeraiyan","shaiz.kunhimohammed","praveen.sheethalnath","pranjal.shrivastava","paritosh.desai");

					$BS_Team = array("kedar.gholap","sankesh.yadav","amit.dutta","james.murray","craig.hoppe","krupa.varughese","marina.igron","laisha.washington","masami.kobayashi","francis.patin","niranjan.venkat","judith.engel","sunil.thakur","remy.cottin","katherine.gilbert","sheikh.pervez","maria.gialouris","divyaprakash.padhee","gary.kertis","michelle.pinsonneault","rakesh.sharma","creativeservices","rtbops","sebastian.neo","akshay.mane","daniela.ronchi","dayana.concepcion","abhijeetk.kulkarni","abhinav.shandilya","aniruddha.wanjape","daniela.keil","harjeet.singh","kyle.dozeman","mukund.joshi","sharon.park","steven.slattery","william.everett","ziauddin.shaikh","adnetops","amit.jamdade","anil.rao","cindy.lee","jake.wormhoudt","kathy.woo","kofi.amoako","kurt.christensen","lauren.bernstein","livia.busseni","ml.aa","qcservices","richard.sobel","ryan.katana","salim.darwajkar","samsuddin.ahmed","sebastian.knauf","mahesh.prajwal","aditya.joshi","ziauddin.t.shaikh","sachin.urankar","nitin.palmure","rajesh.ajjarapu","sanjay.borde","ibrahim.shaikh","dhanraj.yewale","avi.rathi","pravin.kulkarni","divyang.shah","sandeep.dhivar","rahul.gupta","sunil.singh.thakur","siddharth.laxmeshwar","dheeraj.majalikar","nirmal.bhagwani","abhijeet.chitrao","anup.chandekar","alok.kapase","nikhil.vikhe","shrikant.shinde","mohd..samsuddin.ahmed","sudhakar.rote","bikash.gupta","abhishek.singh","anirudha.wanjape","joshua.mendes","prince.francis","divya.prakash.padhee","abhishek.sharma","anant.saboo","susheel.vishwakarma","pondrati.venkata.niranjan","saurabh.kaushik","premier.paul","abhijeet.k.kulkarni","shailesh.kumar","yuvraj.munot","madhur.damle","amit.pandey","manan.jhamb","amol.ghate","rahul.lohakare","shivam.thapliyal","amogh.pore","jatin.magnani","rais.naik","rohit.thombre","ashish.kumar","satdeep.singh","amit.chitte","dolar.adesara","umesh.sharma","rajvardhan.uprety","omkar.vechalekar","swapnil.jain","yogesh.jadhav","vaibhav.prabhune","rahul.sanwal","harish.radhakrishnan","saurabh.golani","vishank.goel","baldeep.singh","viral.jain","sabarish.pillai","nishal.chawla","nikhil.chandalia","naman.varma","mudit.govil","tushar.kamble","narendra.kumar.chandrapati","satyanarayana.narina","jijesh.nambiar","vishal.shirke","sunil.bharath.s","ashpak.barajji","zubair.magray","ripun.chhabra","ninad.joshi","suhit.gupta","pavan.bhoge","shivam.nawani","sagar.chavan","akshay.kale","abhijeet.kulkarni","kamakhyarjun.mishra","aditya.shrivastava","mohit.bharti","chandra.bhatt");

					$ENGG_Team = array("mukul.kumar","prashant.mahajan","suraj.narkhede","manish.tayal","anand.das","kunal.umrigar","giuseppe.di","mauro","purnima.venkatram","christopher.schmidt","joseph.morales","lei.zeng","evan.simeone","douglas.peng","lingan.nguyen","george.zhao","krishna.arvapally","vitaly.fedyunin","sergey.tsoy","vladislav.kuzemchik","giordano.fusco","nisha.mathew","mehmet","kartal.goksel","sudhir.kulkarni","vasudev.cherlopalle","ben.daici","sunil.surana","purnima.venkatram","suraj.narkhede","neetesh.tiwari","puneet.kumar","vikash.kumar","harshal.patil","jagadish.bihani","aditya.varma","ankit.marothi","saily.gadgil","sandeep.mukhopadhyay","amit.bharti","bigdata.analytics","imran.shaikh","mobilesupport","piyush.goyal","rajeev.kumar","sangharsh.kamble","rohan.bankar","karishma.bothara","jitendra.tilekar","abhishek.kumar","kartik.mahajan","divyesh.minjrola","dilip.vaidya","kuldeep.ghadge","pramod.pisal","vishal.raghuwanshi","manasi.moghe","sai.kulkarni","jagdish.shinde","sreekanth.vempati","unmesh.kulkarni","dhananjay.gurav","abhinav.sinha","raunak.doshi","tushar.deshpande","priyesh.potdar","kunal.patil","sagar.takawane","saurabh.maind","shashikant.thorat","barkha.turkar","snehal.mhaske","vikas.gite","chetan.jadhav","sohil.raghwani","avinash.palghadmal","mohd..hanoosh.mp","r..sandeep","jagdish.bihani","komal.jain","priyanka.bhosale","manoj.kumar","kunal.shaha","ankur.sand","pankaj.solanki","sneh.gupta","kshitij.barve","deepak.dhage","pramod.baddurkar","dipak.baviskar","salil.godbole","shrinivas.prabhu","mahesh.bhosale","gulab.patil","harshad.mane","ashutosh.singh","udayan.warnekar","aditya.kulkarni","shriprasad.marathe","sachin.nikam","ankit.singhal","preeta.karmarkar","shalmali.patil","anagha.bhide","akhil.durge","sumit.patil","mahesh.anarase","pratik.joshi","shekhar.chavan","surajit.das","harshal.joshi","prasad.menon","debjit.biswas","ashishkumar.tadose","ajay.agarwal","sushil.joharapurkar","shrirang.bapat","anuja.phaltankar","manoj.danane","shashi.kumar","abhijeet.pawar","kartik.sura","gautam.soneja","srinivas.chundi","parashuram.dhole","yuvraj.sawant","prerana.doshi","ramkrishan.ravi","siddiya.shenoy","ashok.ramchandani","varun.srivastava","dinesh.kandhari","rajesh.patel","anjali.kulkarni","ajay.bodhe","darshan.shirodkar","sunil.chaudhari","ashish.singh","bhagyashree.chavan","bhavana.mamane","pankaj.agarwala","gaurav.bora","jayant.kulkarni","nikhil.dabadghav","ramakant.sharma","gurushant.jidagi","deepesh.malviya","prashant.rane","deepali.more","arpit.pattewar","alok.kumar","shreyas.patil","devanand.gujar","harshal.bharsakal","mukesh.gowda","ashok.jakkani","anant.mathkari","sourabh.gandhe","puneet.kumar.ojha","aman.chugh","devendra.tagare","arpita.sheth","ashish.adhav","isha.bharti","shreyas.damle","nikita.motiramani","deepak.dalai","tushar.pathare","vikrant.gupta","niranjan.borawake","tanvi.thacker","amit.kalpande","vaibhav.kakade","sumit.deshinge","biswajit.dey","abhijit.kharde","neha.gupta","riyanka.dagaonkar","rohan.hardas","sandeep.nemuri","yogesh.somawar","shilpa.soni","shrikant.bang","sujal.raul","pragati.srivastava","ayan.bose","soumya.nishan.pattnaik","ninad.bhide","sumit.jhajharia","rakhi.pal","ashay.patil","bhavesh.thakkar","adhir.potdar","sandeep.mehta","surya.prakash.gupta","altamash.jiwani","renuka.nalawade","vishal.mahajan","selvakumar.krishnamoorthy","pramila.payal","kedar.jedhe","nitin.nikam","abhijeet.kudale","neha.bhoyar","jagmeet.singh","manisha.sethi","gagandeep.juneja","gagan.agrawal","neha.zaveri","yuvraj.gupta","akul.narang","paritosh.gupta","ishmeet.kaur");

					//TEAM ARRAY DECLARATION ENDS


					// cURL CODE BEGINS!!!

                                        $login = curl_init();
                                        $login = login('https://pubmatic.okta.com/login/do-login', 'username='.$username.'&password='.$password.'&_xsrfToken=c51bd3a922c69a599969f9af8850a2b64e7868ee&domain=&fromURI=&remember=true&login=Sign+In'); //OKTA LOGIN
                                        get_post_param($login, "https://pubmatic.okta.com/app/jira_onprem/kvw2ohtkBZXITLQLHIAV/sso/saml");
                                        $login = login("https://pubmatic.okta.com/app/jira_onprem/kvw2ohtkBZXITLQLHIAV/sso/saml", $POST_PARAM); //JIRA LOGIN
					if($POST_PARAM=='SAMLResponse=&RelayState=') {

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

                                        grab($login, 'https://inside.pubmatic.com:9443/jira/secure/Dashboard.jspa');

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
					
					$response=grab($login,'https://inside.pubmatic.com:9443/jira/rest/api/latest/search?jql='.$jql.'&maxResults=99999');
					
					$response=json_decode($response,true);
                                         
   					for($i=0;$i<$response[total];$i++)
   						 {
 							     $Ticket[$i]=$response['issues'][$i][key];
					         }

					if($response[total]==null) {
					     

					     if($response[errorMessages][0]==NULL){$response[errorMessages][0]='<b>No issues were found to match your search</b><br/>Try modifying your search criteria';}
					 
					echo  '
						<div class="contents">

						<form action="Time-tracker.php" method="post" class="pure-form pure-form-aligned">
						<br/><br/><table align="center">
						<tr>
						<td>'.$response[errorMessages][0].'</td>
						</tr>

						<tr><td><br/><br/><input type="submit" value="Go Back" name="Submit" class="pure-button pure-button-primary"/></td></tr>
						</table>
						<input type="hidden" name="username" value='.$username. '>
						<input type="hidden" name="password" value='.$password. '>
						</form>

	  							</div>
        						</div>
						</body>
						</html>';					
			

					exit;
                                        }
	
					else {
					
					$null_path = 0;
                                        $total_tickets_analysed = 0;
                                        $loop_count = count($Ticket);

					
                                        for ($i = 0; $i < $loop_count; $i++)
                                        {
                                        $json_data[$i] = grab($login, 'https://inside.pubmatic.com:9443/jira/rest/api/latest/issue/' . $Ticket[$i] . '?expand=changelog&fields=summary');
					$complete_data[$i] = grab($login, 'https://inside.pubmatic.com:9443/jira/rest/api/latest/issue/' . $Ticket[$i]);
                                      
						       if($json_data[$i]=='{"errorMessages":["Issue Does Not Exist"],"errors":{}}') {
							 $null_ticket+=1;
						       }

                                                    }

						    if($null_ticket==$loop_count) {
						    echo  '
                                    <div class="contents-table" style="padding:3em 6em;width:900px">

                                    <form action="Time-tracker.php" method="post" class="pure-form pure-form-aligned">
                                    <h1>Well this is embarrassing</h1>
				    <p>Time tracker is having trouble accessing the Ticket(s). This is usually caused if the Ticket you have entered is an invalid.</p><p>You can try : </p><p>
					<ul>
					<li>Removing one or more Tickets that you think may be causing the problem</li>
				        <li>Starting an entirely new Time Tracking session</li>
					</ul></p>
				    <input type="hidden" name="username" value='.$username.' />
				    <input type="hidden" name="password" value='.$password.' />
				    <input type="submit" value="Go Back" name="Submit" class="pure-button pure-button-primary" />
                                    </form>

                                            </div>
                                            </div>
                                    </body>
                                    </html>';
                                    exit;

 						    }

				     echo '<div class="content">
                                            <br/>
                                    <form class="pure-form pure-form-aligned">'; 


                                                    $total_time = 0;
                                                    $average_time = 0;
                                                    $sum_Dev = NA;
                                                    $sum_TE = NA;
                                                    $sum_PM = NA;
                                                    $sum_ENGG = NA;
                                                    $sum_BS = NA;
                                		   
                                $sum_MISC = NA;
                                $sum = NA;
                                
                                $blocker_count = 0;
                                $critical_count = 0;
                                $major_count = 0;

                                                    $average_time_Dev = NA;
                                                    $average_time_TE = NA;
                                                    $average_time_PM = NA;
                                                    $average_time_ENGG = NA;
                                                    $average_time_BS = NA;
                                		    $average_time_MISC = NA;
                                		    $average_time_TOTAL = NA;
                                
				$null_ticket='';


                                echo "<p><b><font size='4'>Detailed Ticket-wise Report :</font></b></p>";
                                                    echo "<table style='width:1180px'>
                                                                              <tr>
                                                <th></th>
                                                                                <th></th>
                                                                                <th></th>
                                                                                <th></th>
                                                                                <th>Time Duration [In Hours]</th>
                                                                                <th></th>
                                                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                                              </tr></table>";
                                                    echo "<table align=center border='2' cellpadding='5' id='Report' style='width:1150px'>
                                                                              <tr>
                                                                                <th>Ticket</th>
                                                				<th>Priority</th>
                                                                                <th>Default User</th>
                                                                                <th>TE Team</th>
                                                                                <th>Product Management</th>
                                                                                <th>Engineering</th>
                                                                                <th>Client Ops</th>
                                                				<th>Misc.</th>
                                               				        <th>Total</th>
                                                                              </tr>";

                                                    for ($a = 0; $a < $loop_count; $a++)
                                                    {
                                		    $sum_Dev = 0;
                                                    $sum_TE = 0;
                                                    $sum_PM = 0;
                                                    $sum_ENGG = 0;
                                                    $sum_BS = 0;
                                		    $sum_MISC = 0;
                                		    $sum=0;

                                $devcount=0;
                                $tecount=0;
                                $pmcount=0;
                                $enggcount=0;
                                $bscount=0;
				$misccount=0;
                                $counted=0;


				$print_Dev="";
				$print_TE="";
				$print_PM="";
				$print_ENGG="";
				$print_BS=""; 
				$print_MISC="";
                                $resolved=0;
                                $closed=0;

                            
                                                    $json = $json_data[$a];
                                $complete_json=$complete_data[$a];

                                $json = json_decode($json, true);
                                $complete_json = json_decode($complete_json, true);
                                
                                                    if($json!=NULL){
                                                    
                                                    $lower_limit = $json['changelog']['startAt']; //FOR LOOP LOWER BOUND
                                                    $upper_limit = $json['changelog']['total']; //FOR LOOP UPPER BOUND
                                $priority = $complete_json['fields']['priority']['name'];
                                $created_date = substr($complete_json['fields']['created'],0,10);
                                $created_time = substr($complete_json['fields']['created'],11,11);
                                $one_time_flag = 0;
                                $found=0;
                                date_default_timezone_set('America/Los_Angeles');


                                //TIME tracker CODE BEGINS


                                for ($i = $lower_limit; $i < $upper_limit; $i++)
                {
                for ($j = 0; $j < 20; $j++)
                    {
                    $found=0; $team_found=0;
                    $fromstring = $json['changelog']['histories'][$i]['items'][$j]['from'];
                    $tostring = $json['changelog']['histories'][$i]['items'][$j]['to'];
                    $field = $json['changelog']['histories'][$i]['items'][$j]['field'];
                    if ($field == "assignee")
                        {

                                if($one_time_flag==0) {
                            $from_date = substr($json['changelog']['histories'][$i]['created'], 0, 10);
                            $from_time = substr($json['changelog']['histories'][$i]['created'], 11, 11);                

                            $to_time1 = strtotime($created_date . $created_time);
                            $from_time1 = strtotime($from_date . $from_time);

                            $duration = round(abs($to_time1 - $from_time1) / (60 * 60) , 2);

                            $sum = $sum + $duration;
                            if (in_array($fromstring, $Dev_Team)) 
            {
              $sum_Dev=$sum_Dev+$duration; 
              $counted=0;
              $team_found=1;

              for($p=0;$p<$devcount;$p++){
               if($fromstring==$name_Dev[$p]){
                  $time_Dev[$p]+=$duration;$counted=1;
                }
              }

              if($counted==0) {
               $name_Dev[$devcount]=$fromstring;
               $time_Dev[$devcount]=$duration;
               $devcount=$devcount+1;
               $counted=0;
               }
              
            }
                               

            if (in_array($fromstring, $TE_Team)) 
            {
              $sum_TE=$sum_TE+$duration; 
              $counted=0;
              $team_found=1;

              for($p=0;$p<$tecount;$p++){
               if($fromstring==$name_TE[$p]){
                  $time_TE[$p]+=$duration;$counted=1;
                }
              }

              if($counted==0) {
               $name_TE[$tecount]=$fromstring;
               $time_TE[$tecount]=$duration;
               $tecount=$tecount+1;
               $counted=0;
               }
              
            }


            if (in_array($fromstring, $PM_Team)) 
            {
              $sum_PM=$sum_PM+$duration; 
              $counted=0;
              $team_found=1;

              for($p=0;$p<$pmcount;$p++){
               if($fromstring==$name_PM[$p]){
                  $time_PM[$p]+=$duration;$counted=1;
                }
              }

              if($counted==0) {
               $name_PM[$pmcount]=$fromstring;
               $time_PM[$pmcount]=$duration;
               $pmcount=$pmcount+1;
               $counted=0;
               }
              
            }

            if (in_array($fromstring, $ENGG_Team)) 
            {
              $sum_ENGG=$sum_ENGG+$duration; 
              $counted=0;
              $team_found=1;

              for($p=0;$p<$enggcount;$p++){
               if($fromstring==$name_ENGG[$p]){
                  $time_ENGG[$p]+=$duration;$counted=1;
                }
              }

              if($counted==0) {
               $name_ENGG[$enggcount]=$fromstring;
               $time_ENGG[$enggcount]=$duration;
               $enggcount=$enggcount+1;
               $counted=0;
               }
              
            }

            if (in_array($fromstring, $BS_Team)) 
            {
              $sum_BS=$sum_BS+$duration; 
              $counted=0;
              $team_found=1;

              for($p=0;$p<$bscount;$p++){
               if($fromstring==$name_BS[$p]){
                  $time_BS[$p]+=$duration;$counted=1;
                }
              }

              if($counted==0) {
               $name_BS[$bscount]=$fromstring;
               $time_BS[$bscount]=$duration;
               $bscount=$bscount+1;
               $counted=0;
               }
              
            }





            if ($team_found==0) 
            {
              $sum_MISC=$sum_MISC+$duration; 
              $counted=0;
              $team_found=1;

              for($p=0;$p<$misccount;$p++){
               if($fromstring==$name_MISC[$p]){
                  $time_MISC[$p]+=$duration;$counted=1;
                }
              }

              if($counted==0) {
               $name_MISC[$misccount]=$fromstring;
               $time_MISC[$misccount]=$duration;
               $misccount=$misccount+1;
               $counted=0;
               }
              
            }
                            

                        }

                        if ($one_time_flag == 0)
                            {
                            $catch = $tostring;
                            $from_date = substr($json['changelog']['histories'][$i]['created'], 0, 10);
                            $from_time = substr($json['changelog']['histories'][$i]['created'], 11, 11);
                            $one_time_flag = 1;
                            }

                        if ($catch == $fromstring)
                            {

                            // echo "$catch found";

                            $catch = $tostring;
                            $found=1;

                            // echo "New catch : $catch";

                            $to_date = substr($json['changelog']['histories'][$i]['created'], 0, 10);
                            $to_time = substr($json['changelog']['histories'][$i]['created'], 11, 11);
                            $to_time1 = strtotime($to_date . $to_time);
                            $from_time1 = strtotime($from_date . $from_time);
                            $duration = round(abs($to_time1 - $from_time1) / (60 * 60) , 2);
                            
                            $sum = $sum + $duration;
                            
                            $from_date = substr($json['changelog']['histories'][$i]['created'], 0, 10);
                            $from_time = substr($json['changelog']['histories'][$i]['created'], 11, 11);

                            // ASSIGN TIME SPENT TO A TEAM      
            if (in_array($fromstring, $Dev_Team)) 
            {
              $sum_Dev=$sum_Dev+$duration; 
              $counted=0;
              $team_found=1;

              for($p=0;$p<$devcount;$p++){
               if($fromstring==$name_Dev[$p]){
                  $time_Dev[$p]+=$duration;$counted=1;
                }
              }

              if($counted==0) {
               $name_Dev[$devcount]=$fromstring;
               $time_Dev[$devcount]=$duration;
               $devcount=$devcount+1;
               $counted=0;
               }
              
            }
                               

            if (in_array($fromstring, $TE_Team)) 
            {
              $sum_TE=$sum_TE+$duration; 
              $counted=0;
              $team_found=1;

              for($p=0;$p<$tecount;$p++){
               if($fromstring==$name_TE[$p]){
                  $time_TE[$p]+=$duration;$counted=1;
                }
              }

              if($counted==0) {
               $name_TE[$tecount]=$fromstring;
               $time_TE[$tecount]=$duration;
               $tecount=$tecount+1;
               $counted=0;
               }
              
            }


            if (in_array($fromstring, $PM_Team)) 
            {
              $sum_PM=$sum_PM+$duration; 
              $counted=0;
              $team_found=1;

              for($p=0;$p<$pmcount;$p++){
               if($fromstring==$name_PM[$p]){
                  $time_PM[$p]+=$duration;$counted=1;
                }
              }

              if($counted==0) {
               $name_PM[$pmcount]=$fromstring;
               $time_PM[$pmcount]=$duration;
               $pmcount=$pmcount+1;
               $counted=0;
               }
              
            }

            if (in_array($fromstring, $ENGG_Team)) 
            {
              $sum_ENGG=$sum_ENGG+$duration; 
              $counted=0;
              $team_found=1;

              for($p=0;$p<$enggcount;$p++){
               if($fromstring==$name_ENGG[$p]){
                  $time_ENGG[$p]+=$duration;$counted=1;
                }
              }

              if($counted==0) {
               $name_ENGG[$enggcount]=$fromstring;
               $time_ENGG[$enggcount]=$duration;
               $enggcount=$enggcount+1;
               $counted=0;
               }
              
            }

            if (in_array($fromstring, $BS_Team)) 
            {
              $sum_BS=$sum_BS+$duration; 
              $counted=0;
              $team_found=1;

              for($p=0;$p<$bscount;$p++){
               if($fromstring==$name_BS[$p]){
                  $time_BS[$p]+=$duration;$counted=1;
                }
              }

              if($counted==0) {
               $name_BS[$bscount]=$fromstring;
               $time_BS[$bscount]=$duration;
               $bscount=$bscount+1;
               $counted=0;
               }
              
            }




            if ($team_found==0) 
            {
              $sum_MISC=$sum_MISC+$duration; 
              $counted=0;
              $team_found=1;

              for($p=0;$p<$misccount;$p++){
               if($fromstring==$name_MISC[$p]){
                  $time_MISC[$p]+=$duration;$counted=1;
                }
              }

              if($counted==0) {
               $name_MISC[$misccount]=$fromstring;
               $time_MISC[$misccount]=$duration;
               $misccount=$misccount+1;
               $counted=0;
               }
              
            }

                            } //IF CATCH LOOP
                        } // IF ASSIGNEE LOOP

                        if ($field == "status")
                                            {
                                                    $tostring_status = $json['changelog']['histories'][$i]['items'][$j]['toString'];
                                                    if ($tostring_status == "Resolved" and $found==0)
                                                    {
                                $resolved=1;
                                                    $to_date = substr($json['changelog']['histories'][$i]['created'], 0, 10);
                                                    $to_time = substr($json['changelog']['histories'][$i]['created'], 11, 11);
                                $to_time1 = strtotime($to_date . $to_time);
                                    $from_time1 = strtotime($from_date . $from_time);

                                    $duration = round(abs($to_time1 - $from_time1) / (60 * 60) , 2);

                                    
                                    $sum = $sum + $duration;
                                
                                
                                //ADD CHECK FOR TEAM MEMBERS HERE!!!

                                                      

            if (in_array($catch, $Dev_Team)) 
            {
              $sum_Dev=$sum_Dev+$duration; 
              $counted=0;
              $team_found=1;

              for($p=0;$p<$devcount;$p++){
               if($catch==$name_Dev[$p]){
                  $time_Dev[$p]+=$duration;$counted=1;
                }
              }

              if($counted==0) {
               $name_Dev[$devcount]=$catch;
               $time_Dev[$devcount]=$duration;
               $devcount=$devcount+1;
               $counted=0;
               }
              
            }
                               

            if (in_array($catch, $TE_Team)) 
            {
              $sum_TE=$sum_TE+$duration; 
              $counted=0;
              $team_found=1;

              for($p=0;$p<$tecount;$p++){
               if($catch==$name_TE[$p]){
                  $time_TE[$p]+=$duration;$counted=1;
                }
              }

              if($counted==0) {
               $name_TE[$tecount]=$catch;
               $time_TE[$tecount]=$duration;
               $tecount=$tecount+1;
               $counted=0;
               }
              
            }


            if (in_array($catch, $PM_Team)) 
            {
              $sum_PM=$sum_PM+$duration; 
              $counted=0;
              $team_found=1;

              for($p=0;$p<$pmcount;$p++){
               if($catch==$name_PM[$p]){
                  $time_PM[$p]+=$duration;$counted=1;
                }
              }

              if($counted==0) {
               $name_PM[$pmcount]=$catch;
               $time_PM[$pmcount]=$duration;
               $pmcount=$pmcount+1;
               $counted=0;
               }
              
            }

            if (in_array($catch, $ENGG_Team)) 
            {
              $sum_ENGG=$sum_ENGG+$duration; 
              $counted=0;
              $team_found=1;

              for($p=0;$p<$enggcount;$p++){
               if($catch==$name_ENGG[$p]){
                  $time_ENGG[$p]+=$duration;$counted=1;
                }
              }

              if($counted==0) {
               $name_ENGG[$enggcount]=$catch;
               $time_ENGG[$enggcount]=$duration;
               $enggcount=$enggcount+1;
               $counted=0;
               }
              
            }

            if (in_array($catch, $BS_Team)) 
            {
              $sum_BS=$sum_BS+$duration; 
              $counted=0;
              $team_found=1;

              for($p=0;$p<$bscount;$p++){
               if($catch==$name_BS[$p]){
                  $time_BS[$p]+=$duration;$counted=1;
                }
              }

              if($counted==0) {
               $name_BS[$bscount]=$catch;
               $time_BS[$bscount]=$duration;
               $bscount=$bscount+1;
               $counted=0;
               }
              
            }



            if ($team_found==0) 
            {
              $sum_MISC=$sum_MISC+$duration; 
              $counted=0;
              $team_found=1;

              for($p=0;$p<$misccount;$p++){
               if($catch==$name_MISC[$p]){
                  $time_MISC[$p]+=$duration;$counted=1;
                }
              }

              if($counted==0) {
               $name_MISC[$misccount]=$catch;
               $time_MISC[$misccount]=$duration;
               $misccount=$misccount+1;
               $counted=0;
               }
              
            }

                                    $from_date = substr($json['changelog']['histories'][$i]['created'], 0, 10);
                                    $from_time = substr($json['changelog']['histories'][$i]['created'], 11, 11);
                                $one_time_flag=1;
                                                    }

                                if ($tostring_status == "Resolved" and $found==1) {
                                $resolved=1;
                                $to_date = substr($json['changelog']['histories'][$i]['created'], 0, 10);
                                                    $to_time = substr($json['changelog']['histories'][$i]['created'], 11, 11);

                                $to_time1 = strtotime($to_date . $to_time);
                                    $from_time1 = strtotime($from_date . $from_time);

                                    $duration = round(abs($to_time1 - $from_time1) / (60 * 60) , 2);

                                    
                                    $sum = $sum + $duration;
                                
                                    $from_date = substr($json['changelog']['histories'][$i]['created'], 0, 10);
                                    $from_time = substr($json['changelog']['histories'][$i]['created'], 11, 11);
                                $one_time_flag=1;
                                }

                                if ($tostring_status == "Closed" and $found==0)
                                                    {
                                $closed=1;
                                                    $to_date = substr($json['changelog']['histories'][$i]['created'], 0, 10);
                                                    $to_time = substr($json['changelog']['histories'][$i]['created'], 11, 11);

                                $to_time1 = strtotime($to_date . $to_time);
                                    $from_time1 = strtotime($from_date . $from_time);

                                    $duration = round(abs($to_time1 - $from_time1) / (60 * 60) , 2);
                                    $sum = $sum + $duration;
                                
                                // ADD CHECK FOR TEAM MEMBERS HERE!!!

                  

            if (in_array($catch, $Dev_Team)) 
            {
              $sum_Dev=$sum_Dev+$duration; 
              $counted=0;
              $team_found=1;

              for($p=0;$p<$devcount;$p++){
               if($catch==$name_Dev[$p]){
                  $time_Dev[$p]+=$duration;$counted=1;
                }
              }

              if($counted==0) {
               $name_Dev[$devcount]=$catch;
               $time_Dev[$devcount]=$duration;
               $devcount=$devcount+1;
               $counted=0;
               }
              
            }
                               

            if (in_array($catch, $TE_Team)) 
            {
              $sum_TE=$sum_TE+$duration; 
              $counted=0;
              $team_found=1;

              for($p=0;$p<$tecount;$p++){
               if($catch==$name_TE[$p]){
                  $time_TE[$p]+=$duration;$counted=1;
                }
              }

              if($counted==0) {
               $name_TE[$tecount]=$catch;
               $time_TE[$tecount]=$duration;
               $tecount=$tecount+1;
               $counted=0;
               }
              
            }


            if (in_array($catch, $PM_Team)) 
            {
              $sum_PM=$sum_PM+$duration; 
              $counted=0;
              $team_found=1;

              for($p=0;$p<$pmcount;$p++){
               if($catch==$name_PM[$p]){
                  $time_PM[$p]+=$duration;$counted=1;
                }
              }

              if($counted==0) {
               $name_PM[$pmcount]=$catch;
               $time_PM[$pmcount]=$duration;
               $pmcount=$pmcount+1;
               $counted=0;
               }
              
            }

            if (in_array($catch, $ENGG_Team)) 
            {
              $sum_ENGG=$sum_ENGG+$duration; 
              $counted=0;
              $team_found=1;

              for($p=0;$p<$enggcount;$p++){
               if($catch==$name_ENGG[$p]){
                  $time_ENGG[$p]+=$duration;$counted=1;
                }
              }

              if($counted==0) {
               $name_ENGG[$enggcount]=$catch;
               $time_ENGG[$enggcount]=$duration;
               $enggcount=$enggcount+1;
               $counted=0;
               }
              
            }

            if (in_array($catch, $BS_Team)) 
            {
              $sum_BS=$sum_BS+$duration; 
              $counted=0;
              $team_found=1;

              for($p=0;$p<$bscount;$p++){
               if($catch==$name_BS[$p]){
                  $time_BS[$p]+=$duration;$counted=1;
                }
              }

              if($counted==0) {
               $name_BS[$bscount]=$catch;
               $time_BS[$bscount]=$duration;
               $bscount=$bscount+1;
               $counted=0;
               }
              
            }



            if ($team_found==0) 
            {
              $sum_MISC=$sum_MISC+$duration; 
              $counted=0;
              $team_found=1;

              for($p=0;$p<$misccount;$p++){
               if($catch==$name_MISC[$p]){
                  $time_MISC[$p]+=$duration;$counted=1;
                }
              }

              if($counted==0) {
               $name_MISC[$misccount]=$catch;
               $time_MISC[$misccount]=$duration;
               $misccount=$misccount+1;
               $counted=0;
               }
              
            }


                                    $from_date = substr($json['changelog']['histories'][$i]['created'], 0, 10);
                                    $from_time = substr($json['changelog']['histories'][$i]['created'], 11, 11);
                                $one_time_flag=1;
                                                    }

                                if ($tostring_status == "Closed" and $found==1)
                                {
                                $closed=1;
                                $to_date = substr($json['changelog']['histories'][$i]['created'], 0, 10);
                                                    $to_time = substr($json['changelog']['histories'][$i]['created'], 11, 11);

                                $to_time1 = strtotime($to_date . $to_time);
                                    $from_time1 = strtotime($from_date . $from_time);

                                    $duration = round(abs($to_time1 - $from_time1) / (60 * 60) , 2) ;

                                    
                                    $sum = $sum + $duration;
                                
                                    $from_date = substr($json['changelog']['histories'][$i]['created'], 0, 10);
                                    $from_time = substr($json['changelog']['histories'][$i]['created'], 11, 11);
                                $one_time_flag=1;
                                }

                                if ($tostring_status == "Reopened")
                                                    {
                                 $created_date = substr($json['changelog']['histories'][$i]['created'], 0, 10);
                                                     $created_time = substr($json['changelog']['histories'][$i]['created'], 11, 11);
                                 $resolved=0;
                                 $closed=0;
                                 $one_time_flag=1;
                                }
                                            }

                    } //INNER FOR LOOP
                } //OUTER FOR LOOP END


                                if($resolved==1 or $closed==1)
                                {

                        
                                //TIME tracker CODE ENDS

                                $total_time_Dev = $total_time_Dev + $sum_Dev;
                                $total_time_TE = $total_time_TE + $sum_TE;
                                $total_time_PM = $total_time_PM + $sum_PM;
                                $total_time_ENGG = $total_time_ENGG + $sum_ENGG;
                                $total_time_BS = $total_time_BS + $sum_BS;
                                $total_time_MISC = $total_time_MISC + $sum_MISC;
                                $total_time = $total_time + $sum;


                                //REPORTING ON BASIS OF PRIORITY

                                if($priority=="Blocker") {
                                $blocker_count+=1;
                                $blocker_Dev += $sum_Dev;
                                $blocker_TE += $sum_TE;
                                $blocker_PM += $sum_PM;
                                $blocker_ENGG += $sum_ENGG;
                                $blocker_BS += $sum_BS;
                                $blocker_MISC += $sum_MISC;
                                
                                }

                                if($priority=="Critical") {
                                $critical_count+=1;
                                $critical_Dev += $sum_Dev;
                                $critical_TE += $sum_TE;
                                $critical_PM += $sum_PM;
                                $critical_ENGG += $sum_ENGG;
                                $critical_BS += $sum_BS;
                                $critical_MISC += $sum_MISC;
                                }

                                if($priority=="Major") {
                                $major_count+=1;
                                $major_Dev += $sum_Dev;
                                $major_TE += $sum_TE;
                                $major_PM += $sum_PM;
                                $major_ENGG += $sum_ENGG;
                                $major_BS += $sum_BS;
                                $major_MISC += $sum_MISC;
                                }

                                if($priority=="Minor") {
                                $minor_count+=1;
                                $minor_Dev += $sum_Dev;
                                $minor_TE += $sum_TE;
                                $minor_PM += $sum_PM;
                                $minor_ENGG += $sum_ENGG;
                                $minor_BS += $sum_BS;
                                $minor_MISC += $sum_MISC;
                                }

            for($n=0;$n<$devcount;$n++){
            if($name_Dev[$n]!=NULL) { $print_Dev.=$name_Dev[$n]." spent ".$time_Dev[$n]." Hours &#13;";}
            }

            for($n=0;$n<$tecount;$n++){
            if($name_TE[$n]!=NULL) { $print_TE.=$name_TE[$n]." spent ".$time_TE[$n]." Hours &#13;";}
            }

            for($n=0;$n<$pmcount;$n++){
            if($name_PM[$n]!=NULL) { $print_PM.=$name_PM[$n]." spent ".$time_PM[$n]." Hours &#13;";}
            }

            for($n=0;$n<$enggcount;$n++){
            if($name_ENGG[$n]!=NULL) { $print_ENGG.=$name_ENGG[$n]." spent ".$time_ENGG[$n]." Hours &#13;";}
            }

            for($n=0;$n<$bscount;$n++){
            if($name_BS[$n]!=NULL) { $print_BS.=$name_BS[$n]." spent ".$time_BS[$n]." Hours &#13;";}
            }

            for($n=0;$n<$misccount;$n++){
            if($name_MISC[$n]!=NULL) { $print_MISC.=$name_MISC[$n]." spent ".$time_MISC[$n]." Hours &#13;";}
            }


            if($print_Dev==NULL) { $print_Dev="NA"; }
            if($print_TE==NULL) { $print_TE="NA"; }
            if($print_PM==NULL) { $print_PM="NA"; }
            if($print_ENGG==NULL) { $print_ENGG="NA"; }
            if($print_BS==NULL) { $print_BS="NA"; }
            if($print_MISC==NULL) { $print_MISC="NA"; }
                                // PRINT TIME SPENT

                                                    echo "<tr align='center'>
                                                                                <td title='Ticket No.'><a href='https://inside.pubmatic.com:9443/jira/browse/$Ticket[$a]' target='_blank'>$json[key]</a></td>
                                                				<td title='Priority'>$priority</td>
                                                                                <td title='$print_Dev'>$sum_Dev</td>
                                                                                <td title='$print_TE'>$sum_TE</td>
                                                                                <td title='$print_PM'>$sum_PM</td>
                                                                                <td title='$print_ENGG'>$sum_ENGG</td>
                                                                                <td title='$print_BS'>$sum_BS</td>
                                                				<td title='$print_MISC'>$sum_MISC</td>
                                                				<td>$sum</td>
                                                                              </tr>";

                                $csv_output .= $json[key] . ", ";
                                $csv_output .= $priority . ", ";
                                $csv_output .= $sum_Dev . ", ";
                                $csv_output .= $sum_TE . ", ";
                                $csv_output .= $sum_PM . ", ";
                                $csv_output .= $sum_ENGG . ", ";
                                $csv_output .= $sum_BS . ", ";
                                $csv_output .= $sum_MISC . ", ";
                                $csv_output .= $sum . "\n";

                                 } //IF LOOP TO CHECK IF TICKET IS RESOLVED OR CLOSED
                                else {$null_path += 1; $null_ticket.=$Ticket[$a].'&#13;';}

                                                    } //IF LOOP FOR NULL JSON

                                                     else {
                                                                                $null_path += 1;
										$null_ticket.=$Ticket[$a].'&#13;';
                                                                            }

                                                    } //FOR LOOP ENDS

                                $total_tickets_analysed = $loop_count - $null_path;

                                                    $average_time_Dev = round((($total_time_Dev / $total_tickets_analysed) / 24) , 2);
                                                    $average_time_TE = round((($total_time_TE / $total_tickets_analysed) / 24) , 2);
                                                    $average_time_PM = round((($total_time_PM / $total_tickets_analysed) / 24) , 2);
                                                    $average_time_ENGG = round((($total_time_ENGG / $total_tickets_analysed) / 24) , 2);
                                                    $average_time_BS = round((($total_time_BS / $total_tickets_analysed) / 24) , 2);
                                $average_time_MISC = round((($total_time_MISC / $total_tickets_analysed) / 24) , 2);
                                $average_time_TOTAL = round((($total_time / $total_tickets_analysed) / 24) , 2);
                                                    echo "<tr align='center'>
                                                                                <td>Average Time</td>
                                                <td>          </td>
                                                                                <td>$average_time_Dev Days</td>
                                                                                <td>$average_time_TE Days</td>
                                                                                <td>$average_time_PM Days</td>
                                                                                <td>$average_time_ENGG Days</td>
                                                                                <td>$average_time_BS Days</td>
                                                <td>$average_time_MISC Days</td>
                                                <td>$average_time_TOTAL Days</td>
                                                                              </tr>";
                                                    echo "</table>";

                                $csv_output .= "Average Time" . ", ";                      
                                $csv_output .= ", ";                  
                                $csv_output .= $average_time_Dev . " Days, ";
                                $csv_output .= $average_time_TE . " Days, ";
                                $csv_output .= $average_time_PM . " Days, ";
                                $csv_output .= $average_time_ENGG . " Days, ";
                                $csv_output .= $average_time_BS . " Days, ";
                                $csv_output .= $average_time_MISC . " Days, ";
                                $csv_output .= $average_time_TOTAL . " Days\n";

                                echo "<br/><h5>Number of Tickets Analysed : $total_tickets_analysed</h5>";

				if($null_path>0) {
			        echo "<h5 style='line-height:0em' title=$null_ticket>Number of Open/Invalid Tickets Analysed : $null_path</h5>";
				}


                                $average_blocker_Dev = round((($blocker_Dev / $blocker_count) / 24) , 2);
                                $average_blocker_TE = round((($blocker_TE / $blocker_count) / 24) , 2);
                                $average_blocker_PM = round((($blocker_PM / $blocker_count) / 24) , 2);
                                $average_blocker_ENGG = round((($blocker_ENGG / $blocker_count) / 24) , 2);
                                $average_blocker_BS = round((($blocker_BS / $blocker_count) / 24) , 2);
                                $average_blocker_MISC = round((($blocker_MISC / $blocker_count) / 24) , 2);

                                    $average_critical_Dev = round((($critical_Dev / $critical_count) / 24) , 2);
                                $average_critical_TE = round((($critical_TE / $critical_count) / 24) , 2);
                                $average_critical_PM = round((($critical_PM / $critical_count) / 24) , 2);
                                $average_critical_ENGG = round((($critical_ENGG / $critical_count) / 24) , 2);
                                $average_critical_BS = round((($critical_BS / $critical_count) / 24) , 2);
                                $average_critical_MISC = round((($critical_MISC / $critical_count) / 24) , 2);

                                $average_major_Dev = round((($major_Dev / $major_count) / 24) , 2);
                                $average_major_TE = round((($major_TE / $major_count) / 24) , 2);
                                $average_major_PM = round((($major_PM / $major_count) / 24) , 2);
                                $average_major_ENGG = round((($major_ENGG / $major_count) / 24) , 2);
                                $average_major_BS = round((($major_BS / $major_count) / 24) , 2);
                                $average_major_MISC = round((($major_MISC / $major_count) / 24) , 2);

                                $average_minor_Dev = round((($minor_Dev / $minor_count) / 24) , 2);
                                $average_minor_TE = round((($minor_TE / $minor_count) / 24) , 2);
                                $average_minor_PM = round((($minor_PM / $minor_count) / 24) , 2);
                                $average_minor_ENGG = round((($minor_ENGG / $minor_count) / 24) , 2);
                                $average_minor_BS = round((($minor_BS / $minor_count) / 24) , 2);
                                $average_minor_MISC = round((($minor_MISC / $minor_count) / 24) , 2);


                                $cummulative_report_hdr .= ", , , Time Duration [In Days],\nPriority, Default User, TE Team, Product Management, Engineering, Client Ops, Miscellaneous";

                                $cummulative_report .= "Blocker" . ", ";                  
                                $cummulative_report .= $average_blocker_Dev . ", ";
                                $cummulative_report .= $average_blocker_TE . ", ";
                                $cummulative_report .= $average_blocker_PM . ", ";
                                $cummulative_report .= $average_blocker_ENGG . ", ";
                                $cummulative_report .= $average_blocker_BS . ", ";
                                $cummulative_report .= $average_blocker_MISC . "\n";

                                $cummulative_report .= "Critical" . ", ";                  
                                $cummulative_report .= $average_critical_Dev . ", ";
                                $cummulative_report .= $average_critical_TE . ", ";
                                $cummulative_report .= $average_critical_PM . ", ";
                                $cummulative_report .= $average_critical_ENGG . ", ";
                                $cummulative_report .= $average_critical_BS . ", ";
                                $cummulative_report .= $average_critical_MISC . "\n";

                                $cummulative_report .= "Major" . ", ";                  
                                $cummulative_report .= $average_major_Dev . ", ";
                                $cummulative_report .= $average_major_TE . ", ";
                                $cummulative_report .= $average_major_PM . ", ";
                                $cummulative_report .= $average_major_ENGG . ", ";
                                $cummulative_report .= $average_major_BS . ", ";
                                $cummulative_report .= $average_major_MISC . "\n";

                                
                                $cummulative_report .= "Minor" . ", ";                  
                                $cummulative_report .= $average_minor_Dev . ", ";
                                $cummulative_report .= $average_minor_TE . ", ";
                                $cummulative_report .= $average_minor_PM . ", ";
                                $cummulative_report .= $average_minor_ENGG . ", ";
                                $cummulative_report .= $average_minor_BS . ", ";
                                $cummulative_report .= $average_minor_MISC . "\n";                  
                                echo '</form>';                                        


					} //ELSE LOOP TO CHECK ERRORS IN JQL
                                        ?>

                

<table>
<tr>
   <form name="export" action="export.php" method="post" class="pure-form pure-form-aligned">
    <td><label>Ticket-wise Report : </label></td><td><input type="submit" value="Download" class="pure-button pure-button-primary" ></td>
    <input type="hidden" value="<? echo $csv_hdr; ?>" name="csv_hdr">
    <input type="hidden" value="<? echo $csv_output; ?>" name="csv_output">
    </form>
</tr>

<tr>
<form name="export" action="export.php" method="post" class="pure-form pure-form-aligned">
<td><br/><label>Cummulative Report : </label></td><td><br/><input type="submit" value="Download" class="pure-button pure-button-primary" ></td>
    <input type="hidden" value="<? echo $cummulative_report_hdr; ?>" name="csv_hdr">
    <input type="hidden" value="<? echo $cummulative_report; ?>" name="csv_output">
    </form>
</tr>
</table>
            </div>

<div id="contents" class="contents">
<table><tr><h1>We would love to hear from you</h1></tr><tr>
<a href="mailto:swapnil.gandhi@pubmatic.com?subject=Time-tracker | Feedback&body=%0A%0A%0A%0A%0A%0A%0A_____________________________________%0A%0A
<?echo $username.' used JIRA TIME tracker and ran following Query :  %0A%0A'.$jql.'%0A%0ANumber of Tickets Analysed : '.$total_tickets_analysed ?>"><button class="pure-button pure-button-primary">Submit Feedback</button></a></tr></table></div>

    </div>

		


</body>
</html>
