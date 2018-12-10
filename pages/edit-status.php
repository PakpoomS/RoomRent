<?PHP
	include("db_connect.php"); // เรียกใช้งานไฟล์เชื่อมต่อกับฐานข้อมูล
	$mysqli = connect(); // เชื่อมต่อกับฐานข้อมูล    
	$data = array(
	"status_M"=>$_POST['value'],
);
update("meeting",$data,"id_Meeting=".$_POST['pk']);

$sql = "SELECT Fname , Lname , Telephone , date_S , date_F , topics , name_Room  FROM `meeting` LEFT JOIN `login` on `login`.id_Login = `meeting`.id_Login LEFT JOIN `room_meeting` on `room_meeting`.`id_Room` = `meeting`.`id_Room` WHERE id_Meeting =  '".$_POST['pk']."'";
$result = $mysqli->query($sql);
$rs = $result->fetch_object();

///ส่ง SMS ---THSMS.com---

$sms = new thsms();
$sms->username   = 'pakpoom';
$sms->password   = 'bae993';
	$a = $sms->getCredit();
	var_dump( $a);
if($_POST['value'] == 2 ) {	 
	$b = $sms->send( '0000', $rs->Telephone , 'จาก การจองห้องประชุม สวัสดีคุณ '.$rs->Fname.' '.$rs->Lname.' การจองห้องประชุม '.$rs->name_Room.' เวลา '.$rs->date_S.' ถึง '.$rs->date_F.' ได้รับการอนุมัติแล้ว');
	var_dump( $b);
} 
	class thsms
	{
		 var $api_url   = 'http://www.thsms.com/api/rest';
		 var $username  = 'pakpoom';
		 var $password  = 'bae993';
	 
		public function getCredit()
		{
			$params['method']   = 'credit';
			$params['username'] = $this->username;
			$params['password'] = $this->password;
	 
			$result = $this->curl( $params);
	 
			$xml = @simplexml_load_string( $result);
	 
			if (!is_object($xml))
			{
				return array( FALSE, 'Respond error');
	 
			} else {
	 
				if ($xml->credit->status == 'success')
				{
					return array( TRUE, $xml->credit->status);
				} else {
					return array( FALSE, $xml->credit->message);
				}
			}
		}
	 
		public function send( $from='0000', $to=null, $message=null)
		{
			$params['method']   = 'send';
			$params['username'] = $this->username;
			$params['password'] = $this->password;
	 
			$params['from']     = $from;
			$params['to']       = $to;
			$params['message']  = $message;
	 
			if (is_null( $params['to']) || is_null( $params['message']))
			{
				return FALSE;
			}
	 
			$result = $this->curl( $params);
			$xml = @simplexml_load_string( $result);
			if (!is_object($xml))
			{
				return array( FALSE, 'Respond error');
			} else {
				if ($xml->send->status == 'success')
				{
					return array( TRUE, $xml->send->uuid);
				} else {
					return array( FALSE, $xml->send->message);
				}
			}
		}
		 
		private function curl( $params=array())
		{
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $this->api_url);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query( $params));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	 
			$response  = curl_exec($ch);
			$lastError = curl_error($ch);
			$lastReq = curl_getinfo($ch);
			curl_close($ch);
	 
			return $response;
		}
	}
	?>