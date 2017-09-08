<?php

class AutoSend_Model extends Model {

    public function __construct() {
        parent::__construct();
    }
    public function AutoSend(){        
		$now=intval(date("d"));
		$date=date("Y-m-d");
		$sql="SELECT * FROM  `aotoreport` where Date Like '%".$now."%' and LastSend<'".$date."' and ExpireDate>'".$date."'";
        $sts=$this->db->prepare($sql);
        $sts->execute();
		$result= $sts->fetchAll();
		foreach($result as $key => $value){
			$data=array();
			$data["ID"]=$value["ID"];
			$data["to"]=$this->GetTo($value["CustomerID"]);
			$senders=explode("-",$value["Sender"]);
			$data["pop"] = Code::GetField("settinglokasi","pop","ID=".$senders[0]);
			$data["username"] = $senders[1];
			$data["password"] = Code::GetField("settinglokasi","sendpass","ID=".$senders[0]); 
			$mfile=$this->GetFile($value["ProductID"]);
			$data["tema"] = $mfile["tema"];
			$data["tgltayang"] = $mfile["tgltayang"];
			$data["file"] = $mfile["list"];
			$lokasi=$this->getLokasi($value["ProductID"]);
			
			$data["lokasi"]="Kode Lokasi : ".$lokasi[0]["ProductCode"]." \nAddress : ".$lokasi[0]["Address"].",".$lokasi[0]["Kota"].",".$lokasi[0]["NamaArea"];
		}
         //print_r($data);
		 $send=$this->SendMail($data);
    }
	
	public function SendList(){        
	$now=date("Y-m-d");
	$sql="SELECT * FROM  `aotoreport` where LastSend='".$now."' order by LastSend desc";
	//$sql="SELECT * FROM  `aotoreport` order by LastSend desc";
        $sts=$this->db->prepare($sql);
        $sts->execute();
		return $sts->fetchAll();
         
    }
	public function getLokasi($id){        
	
	$sql="SELECT  `product`.`ProductCode`, `product`.`Address`, `product`.`Kota`, `area`.`NamaArea`, `product`.`ID` FROM `area` INNER JOIN `product`  ON (`area`.`ID` = `product`.`AreaID`) WHERE (`product`.`ID` =".$id.")";
	//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		return $sts->fetchAll();
         
    }
	public function GetTo($id){        
		
		$sql="SELECT Email FROM  `customercontact` where CustomerID=".$id." and recieve=1";
	
        $sts=$this->db->prepare($sql);
        $sts->execute();
		$result= $sts->fetchAll();
		$data="";
		foreach($result as $key => $value){
			$data=$data.",".$value["Email"];
		}
    	return $data;
	}
	
	public function GetFile($id){        
		
		$sql="SELECT * FROM `materi` where ProductID=".$id." order by tgltayang DESC limit 0,1";
	
        $sts=$this->db->prepare($sql);
        $sts->execute();
		$rst= $sts->fetchAll();
		
		$sql2="SELECT img FROM `materiimg` where MateriID='".$rst[0]["ID"]."' and  kirim=1";
		//echo $sql2;
        $sts2=$this->db->prepare($sql2);
        $sts2->execute();
		$result= $sts2->fetchAll();
		$data=array();
		$data["tema"]=$rst[0]["Tema"];
		$data["tgltayang"]=$rst[0]["tgltayang"];
		$file="";
		foreach($result as $key => $value){
			$file=$file.",".$value["img"];
		}
		$data["list"]=$file;
    	return $data;
	}
	
	public function SendMail($data){
		$note1="Berikut saya kirimkan  update Materi Iklan :\n\n";
		$note2="sekian yang dapat saya sampaikan\n\n";
		
		$mailbody="Dear Customer,\n\n";
		$mailbody=$mailbody.$note1;
		$mailbody=$mailbody.$data["lokasi"]."\n\n";
		$mailbody=$mailbody."Tema : ".$data["tema"]."\n\n";
		$mailbody=$mailbody."Tgl Foto : ".$data["tglfoto"]."\n\n";
		$mailbody=$mailbody.$note2;
		$mailbody=$mailbody."BR,\n\n";
		$mailbody=$mailbody."Admin\n";
		/***************** Send Mail *********************/
		$mail = new PHPMailer();
		
		
		
		$mail->IsSMTP();                                      // set mailer to use SMTP
		//echo  Code::GetField("settinglokasi","emailfrom","ID=".$id[1]);
		$mail->Host = $data["pop"];  // specify main and backup server
		$mail->SMTPAuth = true;     // turn on SMTP authentication
		//$mail->SMTPDebug=1;
		$mail->Username = $data["username"];  // SMTP username
		$mail->Password = $data["password"]; // SMTP password
//echo Code::GetField("customer","Email","CustomerID='".$cst."'");
		$mail->From = $data["username"];
		$mail->Port = 25;
		$mail->FromName = "Online report";
		$to=explode(",",$data["to"]);
		foreach($to as $key){
			if($key<>""){$mail->AddAddress($key);}
		}
		//$mail->AddAddress(Code::GetField("customer","Email","CustomerID='".$cst."'"));
		//$mail->IsHTML(true);                                  // set email format to HTML
		//Attach Images
		$subject="Update Materi Iklan";
		
		
		$result=explode(",",$data["file"]);
        foreach ($result as $list){
			if($list<>""){$mail->AddAttachment($list);}
		}
		$mail->Subject = $subject;
		$mail->Body    = $mailbody;
		//echo $data["pop"]."=>".$data["username"]."=".$data["password"];

		if(!$mail->Send())
		{
		   echo "Message could not be sent. <p>";
		   echo "Mailer Error: " . $mail->ErrorInfo;
		   exit;
		}else{
			echo "Message has been sent";
			$sql="insert into emaillog (emailfrom,pop,emailto,tglkirim,subject,body,AttcList)values(:from,:pop,:emailto,:tgl,:subject,:body,:attc)";
			
			$sts=$this->db->prepare($sql);
			$sts->execute(
			array(
			":from"=>$data["username"],
			":pop"=>$data["pop"],
			":emailto"=>$data["to"],
			":tgl"=>date("Y-m-d"),
			":subject"=>$subject,
			":body"=>$mailbody,
			":attc"=>$data["file"]
			));
			$sql="Update aotoreport set LastSend='".date("Y-m-d")."' where ID='".$data["ID"]."'";
			
			$sts=$this->db->prepare($sql);
			$sts->execute();
			//header('location: '.URL.'admin/Senddock');
		} 
	}
}