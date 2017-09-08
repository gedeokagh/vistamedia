<?php

class Demo_Model extends Model {

    public function __construct() {
        parent::__construct();
    }
    public function vprod($id){
		$list=Code::GetField("usrlogin","list","ID='".$id."'");
		$list=explode(",",$list);
		foreach($list as $dlist){
			if($dlist<>""){
				$sql="select product.ID,product.ProductCode,product.Address,product.Kota,area.NamaArea from product inner join area on product.AreaID=area.ID where product.ID=".$dlist.";";
				//echo $sql;
				$sts2=$this->db->prepare($sql);
				$sts2->execute();
				//$sts2->setFetchMode(PDO::FETCH_ASSOC);
				$result2 = $sts2->fetchAll();
				$mres=$sts2->rowCount();
				if($mres>0){
				//print_r($result2);
				$mylist[]=array(
					'ID'=>$result2[0]["ID"],
					'ProductCode'=>$result2[0]["ProductCode"],
					'Address'=>$result2[0]["Address"],
					'Kota'=>$result2[0]["Kota"],
					'img'=>$this->getImg($result2[0]["ID"]),
					'Area'=>$result2[0]["NamaArea"]);
					
				}
			}else{$mylist="";}
		}
		return $mylist;
	}
	
	public function OtherList($ids,$id){
		$list=Code::GetField("usrlogin","list","ID='".$ids."'");
		//echo $list;
		$list=explode(",",$list);
		
		foreach($list as $dlist){
			if($dlist!="") {
				
				if ($dlist!=$id){
				$sql="select product.ID,product.ProductCode,product.Address,product.Kota,area.NamaArea from product inner join area on product.AreaID=area.ID where product.ID=".$dlist;
				//echo $sql;
				$sts2=$this->db->prepare($sql);
				$sts2->execute();
				//$sts2->setFetchMode(PDO::FETCH_ASSOC);
				$result2 = $sts2->fetchAll();
				$mres=$sts2->rowCount();
				//return $result2;
				if($mres>0){
				//print_r($result2);
				$mylist[]=array(
					'ID'=>$result2[0]["ID"],
					'ProductCode'=>$result2[0]["ProductCode"],
					'Address'=>$result2[0]["Address"],
					'Kota'=>$result2[0]["Kota"],
					'img'=>$this->getImg($result2[0]["ID"]),
					'Area'=>$result2[0]["NamaArea"]);
					
				}
				}
			}else{
				$mylist="";
			}
		}
		return $mylist;
	}
	
	public function getImg($id){
		$sql="select Img from profileimg where ProductID=".$id." order by status desc limit 0,1;";
		$sts2=$this->db->prepare($sql);
		$sts2->execute();
		$sts2->setFetchMode(PDO::FETCH_ASSOC);
		$result2 = $sts2->fetchAll();
		return $result2[0]["Img"];
	}
	public function proddtl($id){
		
		$sql="select product.*,area.NamaArea from product inner join area on product.AreaID=area.ID where product.ID=".$id.";";
		
		$sts2=$this->db->prepare($sql);
		$sts2->execute();
		$sts2->setFetchMode(PDO::FETCH_ASSOC);
		$result2 = $sts2->fetchAll();
		$result2[0]["img"]=$this->getImg($id);
		return $result2;
		
	}
}