<?php

class Admin_Model extends Model {

    public function __construct() {
        parent::__construct();
    }
	
	/** Category **/
    public function catlist(){        
        $sts=$this->db->prepare("SELECT * FROM  `jenisproduct` ");
        $sts->execute();
		//print_r($sts->fetchAll());
		return $sts->fetchAll();
         
    }
	
	public function savecat($data){
        $sts=$this->db->prepare("INSERT INTO `jenisproduct`(`NamaJenis`)            
                VALUES (:cat)");
        $sts->execute(array(
            ':cat'=>$data['cat']
            ));
    }
	public function CatSingle($id){
        $sts=$this->db->prepare('select * from jenisproduct where JenisID=:id');
        $sts->execute(array(
            ':id'=>$id
        ));
       
        return $sts->fetch();
    }
	public function UpdCat($data){
        $sql="Update `jenisproduct` set  NamaJenis=:cat where JenisID=:id ";
        $sts=$this->db->prepare($sql);
        $sts->execute(array(
            ':id'=>$data['id'],
            ':cat'=>$data['cat']
            ));
            //print_r($data);
    }
	public function catDel($id){
        // remove dari database         
        $sts=$this->db->prepare("Delete from jenisproduct where JenisID=".$id."");
        $sts->execute();
    }
	/** Area **/
    public function arealist(){        
        $sts=$this->db->prepare("SELECT * FROM  `area` ");
        $sts->execute();
		//print_r($sts->fetchAll());
		return $sts->fetchAll();
         
    }
	
	public function areaSave($data){
        $sts=$this->db->prepare("INSERT INTO `area`(`NamaArea`)            
                VALUES (:cat)");
        $sts->execute(array(
            ':cat'=>$data['cat']
            ));
    }
	public function areaSingle($id){
        $sts=$this->db->prepare('select * from area where ID=:id');
        $sts->execute(array(
            ':id'=>$id
        ));
       
        return $sts->fetch();
    }
	public function UpdArea($data){
        $sql="Update `area` set  NamaArea=:cat where ID=:id ";
        $sts=$this->db->prepare($sql);
        $sts->execute(array(
            ':id'=>$data['id'],
            ':cat'=>$data['cat']
            ));
            //print_r($data);
    }
	public function areaDel($id){
        // remove dari database         
        $sts=$this->db->prepare("Delete from area where ID=".$id."");
        $sts->execute();
    }
	/** Dashboard  **/
	public function ProductView($id){
        $sts=$this->db->prepare('select product.*, jenisproduct.NamaJenis from (product INNER JOIN jenisproduct ON product.JenisID=jenisproduct.JenisID) where ID=:id');
        $sts->execute(array(
            ':id'=>$id
        ));
		$sts->setFetchMode(PDO::FETCH_ASSOC);
		$result2 = $sts->fetchAll();
		$result2[0]["img"]=$this->getImg($id);
		return $result2;
    }
	public function ProductViewx($idx){
		$idm=explode("-",$idx);
		foreach($idm as $id){
        $sts=$this->db->prepare('select product.*, jenisproduct.NamaJenis,area.namaarea from (product INNER JOIN jenisproduct ON product.JenisID=jenisproduct.JenisID)inner join Area on area.ID=product.areaID where product.ID=:id');
        $sts->execute(array(
            ':id'=>$id
        ));
		$sts->setFetchMode(PDO::FETCH_ASSOC);
		$result2 = $sts->fetchAll();
		$result2[0]["img"]=$this->getImg($id);
		$resultx[]=$result2;
		}
		
		return $resultx;
		//return 'select product.*, jenisproduct.NamaJenis,area.namaarea, from (product INNER JOIN jenisproduct ON product.JenisID=jenisproduct.JenisID)inner join Area on area.AreaID=product.areaID where ID="'.$id.'"';
    }
	public function getImg($id){
		//$sql="select Img from profileimg where ProductID=".$id." order by status desc limit 0,1;";
		$sql="select Img from profileimg where ProductID=".$id." and uri='".PX."' order by status desc limit 0,1;";
		//echo $sql;
		$sts2=$this->db->prepare($sql);
		$sts2->execute();
		$sts2->setFetchMode(PDO::FETCH_ASSOC);
		$result2 = $sts2->fetchAll();
		//return $result2[0]["Img"];
		if ($sts2->rowCount()==0){ return "";}else{return $result2[0]["Img"];}
	}
	
	public function prolist(){        
        $sts=$this->db->prepare("select product.ID,product.ProductCode,product.Address,product.Kota,product.JenisID,product.Ukuran,product.Jumlah,product.Orientasi,product.Penerangan,product.Side, jenisproduct.NamaJenis,area.NamaArea from (product INNER JOIN jenisproduct ON product.JenisID=jenisproduct.JenisID) inner join area on area.ID=product.AreaID where product.status=0");
        $sts->execute();
		$sts->setFetchMode(PDO::FETCH_ASSOC);
		$result=$sts->fetchAll();
		$list=$sts->rowCount();
		if(($sts->rowCount())<=0){
		$mylist[]=array(
				'ID'=>"",
				'ProductCode'=>"",
				'Address'=>"",
				'Kota'=>"",
				'Area'=>"",
				'NamaJenis'=>"",
				'Penerangan'=>"",
				'Side'=>"",
				'Jumlah'=>"",
				'Ukuran'=>"",
				'Orientasi'=>"",
				'KontrakID'=>"",
				'NoKontrak'=>"",
				'Nilai'=>0,
				'CustomerName'=>"",
				'StartPeriode'=>"",
				'EndPeriode'=>"",
				'Note'=>"");
		return $mylist;
		}else{
			$now=date('Y-m-d');
        foreach ($result as $list){
			 $sql="SELECT kontrak.*,customer.CustomerName FROM kontrak INNER JOIN customer on 
			 kontrak.CustomerID=customer.CustomerID where (kontrak.status=1) AND (kontrak.ProductID=".$list["ID"].") and (kontrak.StartPeriode < '".$now."') and (kontrak.EndPeriode > '".$now."')   ORDER BY kontrak.EndPeriode DESC";
			 //echo $sql;
			$sts2=$this->db->prepare($sql);
			$sts2->execute();
			//$sts2->setFetchMode(PDO::FETCH_ASSOC);
			$result2 = $sts2->fetchAll();
			$mres=$sts2->rowCount();
			if ($mres>0){
			//print_r($result2);
			$mylist[]=array(
				'ID'=>$list["ID"],
				'ProductCode'=>$list["ProductCode"],
				'Address'=>$list["Address"],
				'Kota'=>$list["Kota"],
				'Area'=>$list["NamaArea"],
				'NamaJenis'=>$list["NamaJenis"],
				'Penerangan'=>$list["Penerangan"],
				'Side'=>$list["Side"],
				'Jumlah'=>$list["Jumlah"],
				'Ukuran'=>$list["Ukuran"],
				'Orientasi'=>$list["Orientasi"],
				'KontrakID'=>$result2[0]["KontrakID"],
				'NoKontrak'=>$result2[0]["NoKontrak"],
				'Nilai'=>$result2[0]["Nilai"],
				'CustomerName'=>$result2[0]["CustomerName"],
				'StartPeriode'=>$result2[0]["StartPeriode"],
				'EndPeriode'=>$result2[0]["EndPeriode"],
				'Note'=>$result2[0]["Note"]);
			}else{
				$mylist[]=array(
				'ID'=>$list["ID"],
				'ProductCode'=>$list["ProductCode"],
				'Address'=>$list["Address"],
				'Kota'=>$list["Kota"],
				'Area'=>$list["NamaArea"],
				'NamaJenis'=>$list["NamaJenis"],
				'Penerangan'=>$list["Penerangan"],
				'Side'=>$list["Side"],
				'Jumlah'=>$list["Jumlah"],
				'Ukuran'=>$list["Ukuran"],
				'Orientasi'=>$list["Orientasi"],
				'KontrakID'=>"-",
				'NoKontrak'=>"-",
				'Nilai'=>0,
				'CustomerName'=>"-",
				'StartPeriode'=>"-",
				'EndPeriode'=>"-",
				'Note'=>"");
			}
			
		}
		
		//print_r($mylist);
		return $mylist;
		}
    }
	
	
	
	/** Property **/
	public function propertylist(){        
        $sts=$this->db->prepare("select product.*, jenisproduct.NamaJenis,area.NamaArea from (product INNER JOIN jenisproduct ON product.JenisID=jenisproduct.JenisID) inner join area on area.ID=product.AreaID where product.status=0");
        $sts->execute();
		return $sts->fetchAll();
         
    }
	public function ProdSingle($id){        
        $sts=$this->db->prepare("select product.*,jenisproduct.NamaJenis from product inner join jenisproduct on product.JenisID=jenisproduct.JenisID where ID=:id");
        $sts->execute(array(':id'=>$id));
		return $sts->fetch();
         
    }
	public function saveprod($data) {
		
		$sts=$this->db->prepare("INSERT INTO `product`(`ProductCode`,`Address`,`Kota`,`AreaID`,`JenisID`,`Ukuran`,`Jumlah`,`Orientasi`,`Penerangan`,`Side`,`RuteJalan`,`Akses`,`JarakPandang`,`KecepatanKendaraan`,`Keterangan`,`Kawasan`,`Longitude`,`Latitude`)
                VALUES (:ProductCode,:Address,:Kota,:AreaID,:JenisID,:Ukuran,:Jumlah,:Orientasi,:Penerangan,:side,:RuteJalan,:Akses,:JarakPandang,:KecepatanKendaraan,:Keterangan,:Kawasan,:Longitude,:Latitude)");
        $sts->execute(array(
            ':ProductCode'=>$data['kode'],
			':Address'=>$data['alamat'],
			':Kota'=>$data['kota'],
			':JenisID'=>$data['cat'],
			':Ukuran'=>$data['ukuran'],
			':Jumlah'=>$data['Jumlah'],
			':Orientasi'=>$data['Orientasi'],
			':Penerangan'=>$data['Penerangan'],
			':side'=>$data['side'],
			':RuteJalan'=>$data['Rute'],
			':Akses'=>$data['Akses'],
			':JarakPandang'=>$data['Jpanjang'],
			':KecepatanKendaraan'=>$data['Kecepatan'],
			':Keterangan'=>$data['Keterangan'],
			':Kawasan'=>$data['Kawasan'],
			':Longitude'=>$data['longs'],
			':AreaID'=>$data['AreaID'],
			':Latitude'=>$data['lat']
            ));
    }
	public function ProdUpdate($data) {
		
		$sts=$this->db->prepare("Update  `product` set `ProductCode`=:ProductCode,`Address`=:Address,`Kota`=:Kota,`JenisID`=:JenisID,`Ukuran`=:Ukuran,`Jumlah`=:Jumlah,`Orientasi`=:Orientasi,`Penerangan`=:Penerangan,`Side`=:side,`RuteJalan`=:RuteJalan,`Akses`=:Akses,`JarakPandang`=:JarakPandang,`KecepatanKendaraan`=:KecepatanKendaraan,`Keterangan`=:Keterangan,`Kawasan`=:Kawasan,`Longitude`=:Longitude,`Latitude`=:Latitude,`AreaID`=:AreaID where ID=:id");
        $sts->execute(array(
            ':ProductCode'=>$data['kode'],
			':id'=>$data['ID'],
			':Address'=>$data['alamat'],
			':Kota'=>$data['kota'],
			':JenisID'=>$data['cat'],
			':Ukuran'=>$data['ukuran'],
			':Jumlah'=>$data['Jumlah'],
			':Orientasi'=>$data['Orientasi'],
			':Penerangan'=>$data['Penerangan'],
			':side'=>$data['side'],
			':AreaID'=>$data['AreaID'],
			':RuteJalan'=>$data['Rute'],
			':Akses'=>$data['Akses'],
			':JarakPandang'=>$data['Jpanjang'],
			':KecepatanKendaraan'=>$data['Kecepatan'],
			':Keterangan'=>$data['Keterangan'],
			':Kawasan'=>$data['Kawasan'],
			':Longitude'=>$data['longs'],
			':Latitude'=>$data['lat']
            ));
    }
	public function delprod($id){
                
        // remove dari database         
        $sts=$this->db->prepare("update product set status=1 where ID=".$id."");
        $sts->execute();
        $sql="update product set status=1 where ID=".$id;
		echo $sql;
    }
	/**** Upload ProfileImage ****/
	 public function Upload($id){ 
	 /*
		$tmp=$_FILES['files']["tmp_name"];
		$ext=strtolower(end(explode('.',$_FILES['files']['name'])));
        $SaveName = "files/".Code::random_string().time().".".$ext;
		$filename = "./".$SaveName;
		move_uploaded_file($tmp,$filename);
		*/
		switch(strtolower($_FILES['files']['type'])){
            //buat image            
        case 'image/jpeg':
            $image = imagecreatefromjpeg($_FILES['files']['tmp_name']);
            break;
        case 'image/png':
            $image = imagecreatefrompng($_FILES['files']['tmp_name']);
            break;
        case 'image/gif':
            $image = imagecreatefromgif($_FILES['files']['tmp_name']);
            break;
        
        } 
        // Target dimensions Big File
        $max_width = 1366;
        $max_height = 768;

        // Get current dimensions
        $old_width  = imagesx($image);
        $old_height = imagesy($image);

        // Calculate the scaling we need to do to fit the image inside our frame
        $scale      = min($max_width/$old_width, $max_height/$old_height);

        // Get the new dimensions
        $new_width  = ceil($scale*$old_width);
        $new_height = ceil($scale*$old_height);
        // Create new empty image
        $new = imagecreatetruecolor($new_width, $new_height);
		// Resize old image into new
        imagecopyresampled($new, $image, 0, 0, 0, 0, $new_width, $new_height, $old_width, $old_height);
		$ext=strtolower(end(explode('.',$_FILES['files']['name'])));
		$namafile=Code::random_string().time().".".$ext;
        
        $filename = __DIR__."./../files/".$namafile;
        $SaveName = "files/".$namafile;
        imagejpeg($new,$filename,100);
        
		
        
        //save to database
        $sts2=$this->db->prepare("INSERT INTO `profileimg` (ProductID,Img,status) VALUES (:id,:image,0)");
        $sts2->execute(array(
            ':id'=>  $id,
            ':image'=>$SaveName
            
        ));
    }
	// Set Default
    public function setdefault(){
        $gid=explode("-",$_POST['gid']);
		switch($gid[2]){
			case "1":
			$uri="vistamedia";
			break;
			case "2":
			$uri="visualmandiri";
			break;
			case "3":
			$uri="SMP";
			break;
		}
		$sts=$this->db->prepare("update profileimg set status=0,uri='' where ProductID='".$gid[0]."' and uri='".$uri."'");
        $sts->execute();
        // Change
        $sts=$this->db->prepare("update profileimg set status=1,uri='".$uri."' where IDProfile='".$gid[1]."'");
        $sts->execute();
		return $_POST['gid'];
    }
	// delete Gallery Image
    public function proddelgal(){
        //select Link Image
        $sql = "select * from profileimg where IDProfile='".$_POST['pid']."'";
        $q = $this->db->prepare($sql);
        $q->execute();
        $q->setFetchMode(PDO::FETCH_BOTH);	
		while($r = $q->fetch()){
			  $img=$r['ImgUrl'];
		  unlink($img);
		}        
        // remove dari database         
        $sts=$this->db->prepare("Delete from profileimg where IDProfile='".$_POST['gid']."'");
        $sts->execute();
        
    }
	public function GalList($id){
        $sts=$this->db->prepare("SELECT * FROM profileimg where ProductID='".$id."' order by IDProfile");
        $sts->execute();
        return $sts->fetchAll();
		
    }
	
	/** Customer **/
	public function customerlist(){        
        $sts=$this->db->prepare("SELECT * FROM  `customer` ");
        $sts->execute();
		return $sts->fetchAll();
         
    }
	public function saveCustomer($data){
        $sts=$this->db->prepare("INSERT INTO `customer`(`CustomerName`,`Address`,`Phone`,`Email`,`Contact`)            
                VALUES (:nama,:alamat,:phone,:email,:contact)");
        $sts->execute(array(
            ':nama'=>$data['nama'],
			':alamat'=>$data['alamat'],
			':email'=>$data['email'],
			':phone'=>$data['phone'],
			':contact'=>$data['contact']
            ));
    }
	public function CostumerSingle($id){
        $sts=$this->db->prepare('select * from customer where customerID=:id');
        $sts->execute(array(
            ':id'=>$id
        ));
        return $sts->fetch();
    }
	public function UpdCostumer($data){
        $sql="Update `customer` set  CustomerName=:nama,Address=:alamat,Phone=:phone,Email=:email,Contact=:contact where CustomerID=:id ";
        $sts=$this->db->prepare($sql);
        $sts->execute(array(
            ':nama'=>$data['nama'],
			':alamat'=>$data['alamat'],
			':email'=>$data['email'],
			':phone'=>$data['phone'],
			':contact'=>$data['contact'],
			':id'=>$data['id']
            ));
		//echo $sql;
		//print_r($data);
    }
	
	/** Contact **/
	public function contactlist($id){        
        $sts=$this->db->prepare("SELECT * FROM  `customercontact` where CustomerID=".$id);
        $sts->execute();
		return $sts->fetchAll();
         
    }
	public function saveContact($data){
        $sts=$this->db->prepare("INSERT INTO `customercontact`(`CustomerID`,`Name`,`Address`,`Phone`,`Email`,`recieve`)            
                VALUES (:id,:nama,:alamat,:phone,:email,:recieve)");
        $sts->execute(array(
            ':nama'=>$data['nama'],
			':alamat'=>$data['alamat'],
			':email'=>$data['email'],
			':phone'=>$data['phone'],
			':recieve'=>$data['recieve'],
			':id'=>$data['id']
            ));
    }
	public function ContactSingle($id){
        $sts=$this->db->prepare('select * from customercontact where id=:id');
        $sts->execute(array(
            ':id'=>$id
        ));
        return $sts->fetch();
    }
	public function UpdContact($data){
        $sql="Update `customercontact` set  Name=:nama,Address=:alamat,Phone=:phone,Email=:email,recieve=:recieve where id=:id ";
        $sts=$this->db->prepare($sql);
        $sts->execute(array(
            ':nama'=>$data['nama'],
			':alamat'=>$data['alamat'],
			':email'=>$data['email'],
			':phone'=>$data['phone'],
			':recieve'=>$data['recieve'],
			':id'=>$data['id']
            ));
		//echo $sql;
		print_r($data);
    }
	
	
	
	/** Kontrak **/
	/*
	public function KontrakList(){        
        $sts=$this->db->prepare("SELECT * FROM  `kontrak` order by KontrakID desc ");
        $sts->execute();
		return $sts->fetchAll();
         
    }*/
	public function KontrakList($id=false){        
		
		if (($id)!=""){
			//echo "ID =".$id;
		$idx=explode("-",$id);
		if($idx[0]!=""){
			if($idx[1]!=""){
				$sql="select product.ID,product.ProductCode,product.Address,product.Kota,product.JenisID,product.Ukuran,product.Jumlah,product.Orientasi,product.Penerangan,product.Side, jenisproduct.NamaJenis,area.NamaArea from (product INNER JOIN jenisproduct ON product.JenisID=jenisproduct.JenisID) inner join area on area.ID=product.AreaID where  (product.status=0) and (product.Kota='".$idx[0]."' and(area.NamaArea='".$idx[1]."'))";
			}else{
				$sql="select product.ID,product.ProductCode,product.Address,product.Kota,product.JenisID,product.Ukuran,product.Jumlah,product.Orientasi,product.Penerangan,product.Side, jenisproduct.NamaJenis,area.NamaArea from (product INNER JOIN jenisproduct ON product.JenisID=jenisproduct.JenisID) inner join area on area.ID=product.AreaID where  (product.status=0) and (product.Kota='".$idx[0]."')";
			}
		}else{
			if($idx[1]!=""){
				$sql="select product.ID,product.ProductCode,product.Address,product.Kota,product.JenisID,product.Ukuran,product.Jumlah,product.Orientasi,product.Penerangan,product.Side, jenisproduct.NamaJenis,area.NamaArea from (product INNER JOIN jenisproduct ON product.JenisID=jenisproduct.JenisID) inner join area on area.ID=product.AreaID where  (product.status=0) and(area.NamaArea='".$idx[1]."')";
			}else{
				$sql="select product.ID,product.ProductCode,product.Address,product.Kota,product.JenisID,product.Ukuran,product.Jumlah,product.Orientasi,product.Penerangan,product.Side, jenisproduct.NamaJenis,area.NamaArea from (product INNER JOIN jenisproduct ON product.JenisID=jenisproduct.JenisID) inner join area on area.ID=product.AreaID where  product.status=0";
			}
		}
		}else{
		$sql="select product.ID,product.ProductCode,product.Address,product.Kota,product.JenisID,product.Ukuran,product.Jumlah,product.Orientasi,product.Penerangan,product.Side, jenisproduct.NamaJenis,area.NamaArea from (product INNER JOIN jenisproduct ON product.JenisID=jenisproduct.JenisID) inner join area on area.ID=product.AreaID where  product.status=0";
		}
		//echo $sql;
        $sts=$this->db->prepare($sql);
				$now=date('Y-m-d');
        //$sts=$this->db->prepare("select product.ID,product.ProductCode,product.Address,product.Kota,product.JenisID,product.Ukuran,product.Jumlah,product.Orientasi,product.Penerangan,product.Side, jenisproduct.NamaJenis,area.NamaArea from (product INNER JOIN jenisproduct ON product.JenisID=jenisproduct.JenisID) inner join area on area.ID=product.AreaID where product.status=0");
		//echo "select product.ID,product.ProductCode,product.Address,product.Kota,product.JenisID,product.Ukuran,product.Jumlah,product.Orientasi,product.Penerangan,product.Side, jenisproduct.NamaJenis,area.NamaArea from (product INNER JOIN jenisproduct ON product.JenisID=jenisproduct.JenisID) inner join area on area.ID=product.AreaID where product.status=0;<br>";
        $sts->execute();
		$sts->setFetchMode(PDO::FETCH_ASSOC);
		$result=$sts->fetchAll();
		if(($sts->rowCount())<=0){ 
		$mylist[]=array(
				'ID'=>"",
				'ProductCode'=>"",
				'Address'=>"",
				'Kota'=>"",
				'Area'=>"",
				'NamaJenis'=>"",
				'Penerangan'=>"",
				'Side'=>"",
				'Jumlah'=>"",
				'Ukuran'=>"",
				'Orientasi'=>"",
				'KontrakID'=>"-",
				'Tanggal'=>"-",
				'NoKontrak'=>"-",
				'Nilai'=>0,
				'CustomerName'=>"-",
				'StartPeriode'=>"-",
				'EndPeriode'=>"-",
				'Note'=>""
			);
		}else{
        foreach ($result as $list){
			
			 $sql="SELECT kontrak.*,customer.CustomerName FROM kontrak INNER JOIN customer on kontrak.CustomerID=customer.CustomerID where (kontrak.status=1) AND (kontrak.ProductID=".$list["ID"].") and (kontrak.StartPeriode < '".$now."') and (kontrak.EndPeriode > '".$now."')   ORDER BY kontrak.EndPeriode DESC; ";
			 //$sqlold="SELECT kontrak.*,customer.CustomerName FROM kontrak INNER JOIN customer on kontrak.CustomerID=customer.CustomerID where kontrak.status=1 AND kontrak.ProductID=".$list["ID"]."  ORDER BY kontrak.EndPeriode DESC";
			 //echo $sql."<br>";
			$sts2=$this->db->prepare($sql);
			$sts2->execute();
			//$sts2->setFetchMode(PDO::FETCH_ASSOC);
			$result2 = $sts2->fetchAll();
			$mres=$sts2->rowCount();
			if ($mres>0){
			//print_r($result2);
			$mylist[]=array(
				'ID'=>$list["ID"],
				'ProductCode'=>$list["ProductCode"],
				'Address'=>$list["Address"],
				'Kota'=>$list["Kota"],
				'Area'=>$list["NamaArea"],
				'NamaJenis'=>$list["NamaJenis"],
				'Penerangan'=>$list["Penerangan"],
				'Side'=>$list["Side"],
				'Jumlah'=>$list["Jumlah"],
				'Ukuran'=>$list["Ukuran"],
				'Orientasi'=>$list["Orientasi"],
				'KontrakID'=>$result2[0]["KontrakID"],
				'NoKontrak'=>$result2[0]["NoKontrak"],
				'Tanggal'=>$result2[0]["Tanggal"],
				'Nilai'=>$result2[0]["Nilai"],
				'CustomerName'=>$result2[0]["CustomerName"],
				'StartPeriode'=>$result2[0]["StartPeriode"],
				'EndPeriode'=>$result2[0]["EndPeriode"],
				'Note'=>$result2[0]["Note"]
			);
			}else{
				$mylist[]=array(
				'ID'=>$list["ID"],
				'ProductCode'=>$list["ProductCode"],
				'Address'=>$list["Address"],
				'Kota'=>$list["Kota"],
				'Area'=>$list["NamaArea"],
				'NamaJenis'=>$list["NamaJenis"],
				'Penerangan'=>$list["Penerangan"],
				'Side'=>$list["Side"],
				'Jumlah'=>$list["Jumlah"],
				'Ukuran'=>$list["Ukuran"],
				'Orientasi'=>$list["Orientasi"],
				'KontrakID'=>"-",
				'Tanggal'=>"-",
				'NoKontrak'=>"-",
				'Nilai'=>0,
				'CustomerName'=>"-",
				'StartPeriode'=>"-",
				'EndPeriode'=>"-",
				'Note'=>""
			);
			}
		}
		}
		//print_r($mylist);
		return $mylist;
    }
	public function ImgKontrak($id){
		$sts=$this->db->prepare('select * from kontrakimg where KontrakID=:id');
        $sts->execute(array(
            ':id'=>$id
        ));
        return $sts->fetchAll();
	}
	public function saveKontrak($data){
        $sts=$this->db->prepare("INSERT INTO `kontrak`(KontrakID,`NoKontrak`,`ProductID`,`CustomerID`,`Nilai`,`Tanggal`,`StartPeriode`,`EndPeriode`,`Note`)            
                VALUES (:id,:no,:prod,:cat,:nilai,:tanggal,:start,:end,:note)");
        $sts->execute(array(
            ':no'=>$data['no'],
			':id'=>$data['id'],
			':id'=>$data['id'],
			':prod'=>$data['prod'],
			':cat'=>$data['cat'],
			':nilai'=>$data['nilai'],
			':tanggal'=>$data['tanggal'],
			':start'=>$data['start'],
			':end'=>$data['end'],
			':note'=>$data['note']
            ));
    }
	public function KontrakSingle($id){
        $sts=$this->db->prepare('select * from kontrak where KontrakID=:id');
        $sts->execute(array(
            ':id'=>$id
        ));
        return $sts->fetch();
    }
	public function UpKontrak($id){ 
	/*
		$tmp=$_FILES['files']["tmp_name"];
		$ext=strtolower(end(explode('.',$_FILES['files']['name'])));
        $SaveName = "files/".Code::random_string().time().".".$ext;
		$filename = "./".$SaveName;
		move_uploaded_file($tmp,$filename);
     */

		switch(strtolower($_FILES['files']['type'])){
            //buat image            
        case 'image/jpeg':
            $image = imagecreatefromjpeg($_FILES['files']['tmp_name']);
            break;
        case 'image/png':
            $image = imagecreatefrompng($_FILES['files']['tmp_name']);
            break;
        case 'image/gif':
            $image = imagecreatefromgif($_FILES['files']['tmp_name']);
            break;
        
        } 
        // Target dimensions Big File
        $max_width = 768;
        $max_height = 1366;

        // Get current dimensions
        $old_width  = imagesx($image);
        $old_height = imagesy($image);

        // Calculate the scaling we need to do to fit the image inside our frame
        $scale      = min($max_width/$old_width, $max_height/$old_height);

        // Get the new dimensions
        $new_width  = ceil($scale*$old_width);
        $new_height = ceil($scale*$old_height);
        // Create new empty image
        $new = imagecreatetruecolor($new_width, $new_height);
		// Resize old image into new
        imagecopyresampled($new, $image, 0, 0, 0, 0, $new_width, $new_height, $old_width, $old_height);
		$ext=strtolower(end(explode('.',$_FILES['files']['name'])));
		$namafile=Code::random_string().time().".".$ext;
        
        $filename = __DIR__."./../files/".$namafile;
        $SaveName = "files/".$namafile;
        imagejpeg($new,$filename,100);
        	 
        //save to database
        $sts2=$this->db->prepare("INSERT INTO `kontrakimg` (KontrakID,Img,Keterangan,tglupload) VALUES (:id,:image,:desk,:tgl)");
        $sts2->execute(array(
            ':id'=>  $id,
            ':image'=>$SaveName,
            ':tgl'=>$_POST["tglupload"],
			':desk'=>$_POST["desk"]
        ));
    }
	
	public function delupkontrak(){
        //select Link Image
        $sql = "select * from kontrakimg where ID='".$_POST['gid']."'";
        $q = $this->db->prepare($sql);
        $q->execute();
        $q->setFetchMode(PDO::FETCH_BOTH);	
		while($r = $q->fetch()){
			  $img=$r['Img'];
		  unlink($img);
		}        
        // remove dari database         
        $sts=$this->db->prepare("Delete from kontrakimg where ID='".$_POST['gid']."'");
        $sts->execute();
        
    }
	
	
	public function UpdKontrak($data){
        $sql="Update `kontrak` set  NoKontrak=:no,ProductID=:prod,CustomerID=:cat,Nilai=:nilai,Tanggal=:tanggal,StartPeriode=:start,EndPeriode=:end,Note=:note where KontrakID=:id ";
        $sts=$this->db->prepare($sql);
        $sts->execute(array(
            ':no'=>$data['no'],
			':prod'=>$data['prod'],
			':cat'=>$data['cat'],
			':nilai'=>$data['nilai'],
			':tanggal'=>$data['tanggal'],
			':start'=>$data['start'],
			':end'=>$data['end'],
			':id'=>$data['id'],
			':note'=>$data['note']
            ));
		//echo $sql;
		//print_r($data);
    }
	public function DelKontrak($id){
        //select Link Image
        $sql = "select * from kontrakimg where KontrakID='".$id."'";
        $q = $this->db->prepare($sql);
        $q->execute();
        $q->setFetchMode(PDO::FETCH_BOTH);	
		while($r = $q->fetch()){
			  $img=$r['Img'];
		  unlink($img);
		}        
        // remove dari database         
        $sts=$this->db->prepare("Delete from kontrakimg where KontrakID='".$id."'");
        $sts->execute();
		$sts=$this->db->prepare("Delete from kontrak where KontrakID='".$id."'");
        $sts->execute();
        
    }
	
	/** IjinPrinsip **/
	/*
	public function IjinPrinsipList(){        
        $sts=$this->db->prepare("SELECT * FROM  `ijin` where TipeIjin=1 order by EndPeriode desc ");
        $sts->execute();
		return $sts->fetchAll();
         
    }*/
	public function IjinPrinsipList($id=false){        
		
		if (($id)!=""){
			//echo "ID =".$id;
		$idx=explode("-",$id);
		if($idx[0]!=""){
			if($idx[1]!=""){
				$sql="select product.ID,product.ProductCode,product.Address,product.Kota,product.JenisID,product.Ukuran,product.Jumlah,product.Orientasi,product.Penerangan,product.Side, jenisproduct.NamaJenis,area.NamaArea from (product INNER JOIN jenisproduct ON product.JenisID=jenisproduct.JenisID) inner join area on area.ID=product.AreaID where  (product.status=0) and (product.Kota='".$idx[0]."' and(area.NamaArea='".$idx[1]."'))";
			}else{
				$sql="select product.ID,product.ProductCode,product.Address,product.Kota,product.JenisID,product.Ukuran,product.Jumlah,product.Orientasi,product.Penerangan,product.Side, jenisproduct.NamaJenis,area.NamaArea from (product INNER JOIN jenisproduct ON product.JenisID=jenisproduct.JenisID) inner join area on area.ID=product.AreaID where  (product.status=0) and (product.Kota='".$idx[0]."')";
			}
		}else{
			if($idx[1]!=""){
				$sql="select product.ID,product.ProductCode,product.Address,product.Kota,product.JenisID,product.Ukuran,product.Jumlah,product.Orientasi,product.Penerangan,product.Side, jenisproduct.NamaJenis,area.NamaArea from (product INNER JOIN jenisproduct ON product.JenisID=jenisproduct.JenisID) inner join area on area.ID=product.AreaID where  (product.status=0) and(area.NamaArea='".$idx[1]."')";
			}else{
				$sql="select product.ID,product.ProductCode,product.Address,product.Kota,product.JenisID,product.Ukuran,product.Jumlah,product.Orientasi,product.Penerangan,product.Side, jenisproduct.NamaJenis,area.NamaArea from (product INNER JOIN jenisproduct ON product.JenisID=jenisproduct.JenisID) inner join area on area.ID=product.AreaID where  product.status=0";
			}
		}
		}else{
		$sql="select product.ID,product.ProductCode,product.Address,product.Kota,product.JenisID,product.Ukuran,product.Jumlah,product.Orientasi,product.Penerangan,product.Side, jenisproduct.NamaJenis,area.NamaArea from (product INNER JOIN jenisproduct ON product.JenisID=jenisproduct.JenisID) inner join area on area.ID=product.AreaID where  product.status=0";
		}
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		$sts->setFetchMode(PDO::FETCH_ASSOC);
		$result=$sts->fetchAll();
		if(($sts->rowCount())<=0){ 
		$mylist[]=array(
				'ProductID'=>"",
				'ProductCode'=>"",
				'Address'=>"",
				'Kota'=>"",
				'Area'=>"",
				'NamaJenis'=>"",
				'Penerangan'=>"",
				'Side'=>"",
				'Jumlah'=>"",
				'Ukuran'=>"",
				'Orientasi'=>"",
				'ID'=>"",
				'NoIjin'=>"",
				'Tanggal'=>"",
				'StartPeriode'=>"",
				'EndPeriode'=>"",
				'Ket'=>""
			);
		}else{
        foreach ($result as $list){
			// echo $list["ID"];
			//$sts2=$this->db->prepare("SELECT * from ijin where TipeIjin='1' and ProductID=".$list["ID"]." and ijin.StartPeriode < '".date("Y-m-d")."' and ijin.EndPeriode > '".date("Y-m-d")."' ORDER BY EndPeriode DESC");
			$sts2=$this->db->prepare("SELECT * from ijin where TipeIjin='1' and ProductID=".$list["ID"]."  ORDER BY EndPeriode DESC LIMIT 0,1");
			$sts2->execute();
			//$sts2->setFetchMode(PDO::FETCH_ASSOC);
			$result2 = $sts2->fetchAll();
			$mres=$sts2->rowCount();
			//print_r($result2);
			if ($mres>0){
			
			$mylist[]=array(
				'ProductID'=>$list["ID"],
				'ProductCode'=>$list["ProductCode"],
				'Address'=>$list["Address"],
				'Kota'=>$list["Kota"],
				'Area'=>$list["NamaArea"],
				'NamaJenis'=>$list["NamaJenis"],
				'Penerangan'=>$list["Penerangan"],
				'Side'=>$list["Side"],
				'Jumlah'=>$list["Jumlah"],
				'Ukuran'=>$list["Ukuran"],
				'Orientasi'=>$list["Orientasi"],
				'ID'=>$result2[0]["ID"],
				'NoIjin'=>$result2[0]["NoIjin"],
				'Tanggal'=>$result2[0]["Tanggal"],
				'StartPeriode'=>$result2[0]["StartPeriode"],
				'EndPeriode'=>$result2[0]["EndPeriode"],
				'Ket'=>$result2[0]["Ket"]
			);
			}else{
				$mylist[]=array(
				'ProductID'=>$list["ID"],
				'ProductCode'=>$list["ProductCode"],
				'Address'=>$list["Address"],
				'Kota'=>$list["Kota"],
				'Area'=>$list["NamaArea"],
				'NamaJenis'=>$list["NamaJenis"],
				'Penerangan'=>$list["Penerangan"],
				'Side'=>$list["Side"],
				'Jumlah'=>$list["Jumlah"],
				'Ukuran'=>$list["Ukuran"],
				'Orientasi'=>$list["Orientasi"],
				'ID'=>"",
				'NoIjin'=>"",
				'Tanggal'=>"",
				'StartPeriode'=>"",
				'EndPeriode'=>"",
				'Ket'=>""
			);
			}
		}
		}
		//print_r($mylist);
		return $mylist;
    }
	public function ImgIjin($id){
		$sts=$this->db->prepare('select * from ijinimg where IjinID=:id');
        $sts->execute(array(
            ':id'=>$id
        ));
        return $sts->fetchAll();
	}
	
	public function deluploadImg(){
        //select Link Image
        $sql = "select * from ijinimg where ID='".$_POST['gid']."'";
        $q = $this->db->prepare($sql);
        $q->execute();
        $q->setFetchMode(PDO::FETCH_BOTH);	
		while($r = $q->fetch()){
			  $img=$r['img'];
		  unlink($img);
		}        
        // remove dari database         
        $sts=$this->db->prepare("Delete from ijinimg where ID='".$_POST['gid']."'");
        $sts->execute();
        
    }
	
	public function UploadIMG($id){ 
	/*
		$tmp=$_FILES['files']["tmp_name"];
		$ext=strtolower(end(explode('.',$_FILES['files']['name'])));
        $SaveName = "files/".Code::random_string().time().".".$ext;
		$filename = "./".$SaveName;
		move_uploaded_file($tmp,$filename);
     */

		switch(strtolower($_FILES['files']['type'])){
            //buat image            
        case 'image/jpeg':
            $image = imagecreatefromjpeg($_FILES['files']['tmp_name']);
            break;
        case 'image/png':
            $image = imagecreatefrompng($_FILES['files']['tmp_name']);
            break;
        case 'image/gif':
            $image = imagecreatefromgif($_FILES['files']['tmp_name']);
            break;
        
        } 
        // Target dimensions Big File
        $max_width = 768;
        $max_height = 1366;

        // Get current dimensions
        $old_width  = imagesx($image);
        $old_height = imagesy($image);

        // Calculate the scaling we need to do to fit the image inside our frame
        $scale      = min($max_width/$old_width, $max_height/$old_height);

        // Get the new dimensions
        $new_width  = ceil($scale*$old_width);
        $new_height = ceil($scale*$old_height);
        // Create new empty image
        $new = imagecreatetruecolor($new_width, $new_height);
		// Resize old image into new
        imagecopyresampled($new, $image, 0, 0, 0, 0, $new_width, $new_height, $old_width, $old_height);
		$ext=strtolower(end(explode('.',$_FILES['files']['name'])));
		$namafile=Code::random_string().time().".".$ext;
        
        $filename = __DIR__."./../files/".$namafile;
        $SaveName = "files/".$namafile;
        imagejpeg($new,$filename,100);
        	 
        //save to database
        $sts2=$this->db->prepare("INSERT INTO `ijinimg` (IjinID,Img,Deskripsi,tglupload) VALUES (:id,:image,:desk,:tgl)");
        $sts2->execute(array(
            ':id'=>  $id,
            ':image'=>$SaveName,
            ':tgl'=>$_POST["tglupload"],
			':desk'=>$_POST["desk"]
        ));
    }
	public function saveIjinPrinsip($data){
        $sts=$this->db->prepare("INSERT INTO `ijin`(ID,`NoIjin`,`ProductID`,`Tanggal`,`StartPeriode`,`EndPeriode`,`TipeIjin`,`Ket`)            
                VALUES (:id,:no,:prod,:tanggal,:start,:end,1,:note)");
        $sts->execute(array(
            ':id'=>$data['id'],
			':no'=>$data['no'],
			':prod'=>$data['prod'],
			':tanggal'=>$data['tanggal'],
			':start'=>$data['start'],
			':end'=>$data['end'],
			':note'=>$data['note']
            ));
    }
	public function IjinPrinsipSingle($id){
        $sts=$this->db->prepare('select * from ijin where ID=:id');
        $sts->execute(array(
            ':id'=>$id
        ));
        return $sts->fetch();
    }
	public function UpdIjinPrinsip($data){
        $sql="Update `ijin` set  NoIjin=:no,ProductID=:prod,Tanggal=:tanggal,StartPeriode=:start,EndPeriode=:end,Ket=:note where ID=:id ";
        $sts=$this->db->prepare($sql);
        $sts->execute(array(
            ':no'=>$data['no'],
			':prod'=>$data['prod'],
			':tanggal'=>$data['tanggal'],
			':start'=>$data['start'],
			':end'=>$data['end'],
			':id'=>$data['id'],
			':note'=>$data['note']
            ));
		//echo $sql;
		//print_r($data);
    }
	public function DeleteIjinPrinsip($id){
        //select Link Image
        $sql = "select * from ijinimg where IjinID='".$id."'";
        $q = $this->db->prepare($sql);
        $q->execute();
        $q->setFetchMode(PDO::FETCH_BOTH);	
		while($r = $q->fetch()){
			  $img=$r['Img'];
		  unlink($img);
		}        
        // remove dari database         
        $sts=$this->db->prepare("Delete from ijinimg where IjinID='".$id."'");
        $sts->execute();
		$sts=$this->db->prepare("Delete from ijin where ID='".$id."'");
        $sts->execute();
        
    }
	/** IjinReklame **/
	/*
	public function IjinreklameList(){        
        $sts=$this->db->prepare("SELECT * FROM  `ijin` where TipeIjin=2 order by EndPeriode desc ");
        $sts->execute();
		return $sts->fetchAll();
         
    }*/
	public function IjinreklameList($id=false){        
		if (($id)!=""){
		$idx=explode("-",$id);
		if($idx[0]!=""){
			if($idx[1]!=""){
				$sql="select product.ID,product.ProductCode,product.Address,product.Kota,product.JenisID,product.Ukuran,product.Jumlah,product.Orientasi,product.Penerangan,product.Side, jenisproduct.NamaJenis,area.NamaArea from (product INNER JOIN jenisproduct ON product.JenisID=jenisproduct.JenisID) inner join area on area.ID=product.AreaID where  (product.status=0) and (product.Kota='".$idx[0]."' and(area.NamaArea='".$idx[1]."'))";
			}else{
				$sql="select product.ID,product.ProductCode,product.Address,product.Kota,product.JenisID,product.Ukuran,product.Jumlah,product.Orientasi,product.Penerangan,product.Side, jenisproduct.NamaJenis,area.NamaArea from (product INNER JOIN jenisproduct ON product.JenisID=jenisproduct.JenisID) inner join area on area.ID=product.AreaID where  (product.status=0) and (product.Kota='".$idx[0]."')";
			}
		}else{
			if($idx[1]!=""){
				$sql="select product.ID,product.ProductCode,product.Address,product.Kota,product.JenisID,product.Ukuran,product.Jumlah,product.Orientasi,product.Penerangan,product.Side, jenisproduct.NamaJenis,area.NamaArea from (product INNER JOIN jenisproduct ON product.JenisID=jenisproduct.JenisID) inner join area on area.ID=product.AreaID where  (product.status=0) and(area.NamaArea='".$idx[1]."')";
			}else{
				$sql="select product.ID,product.ProductCode,product.Address,product.Kota,product.JenisID,product.Ukuran,product.Jumlah,product.Orientasi,product.Penerangan,product.Side, jenisproduct.NamaJenis,area.NamaArea from (product INNER JOIN jenisproduct ON product.JenisID=jenisproduct.JenisID) inner join area on area.ID=product.AreaID where  product.status=0";
			}
		}
		}else{
		$sql="select product.ID,product.ProductCode,product.Address,product.Kota,product.JenisID,product.Ukuran,product.Jumlah,product.Orientasi,product.Penerangan,product.Side, jenisproduct.NamaJenis,area.NamaArea from (product INNER JOIN jenisproduct ON product.JenisID=jenisproduct.JenisID) inner join area on area.ID=product.AreaID where  product.status=0";
		}
		//echo $sql;        
        $sts=$this->db->prepare($sql);
        $sts->execute();
		$sts->setFetchMode(PDO::FETCH_ASSOC);
		$result=$sts->fetchAll();
		if(($sts->rowCount())<=0){ 
		$mylist[]=array(
				'ProductID'=>"",
				'ProductCode'=>"",
				'Address'=>"",
				'Kota'=>"",
				'Area'=>"",
				'NamaJenis'=>"",
				'Penerangan'=>"",
				'Side'=>"",
				'Jumlah'=>"",
				'Ukuran'=>"",
				'Orientasi'=>"",
				'ID'=>"",
				'NoIjin'=>"",
				'Tanggal'=>"",
				'StartPeriode'=>"",
				'EndPeriode'=>"",
				'Ket'=>""
			);
		}else{
        foreach ($result as $list){
			// echo $list["ID"];
			//$sts2=$this->db->prepare("SELECT * from ijin where TipeIjin='2' and ProductID=".$list["ID"]."  and ijin.StartPeriode < '".date("Y-m-d")."' and ijin.EndPeriode > '".date("Y-m-d")."'  ORDER BY EndPeriode DESC");
			$sts2=$this->db->prepare("SELECT * from ijin where TipeIjin='2' and ProductID=".$list["ID"]." ORDER BY EndPeriode DESC LIMIT 0,1");
			$sts2->execute();
			//$sts2->setFetchMode(PDO::FETCH_ASSOC);
			$result2 = $sts2->fetchAll();
			$mres=$sts2->rowCount();
			//print_r($result2);
			if ($mres>0){
			
			$mylist[]=array(
				'ProductID'=>$list["ID"],
				'ProductCode'=>$list["ProductCode"],
				'Address'=>$list["Address"],
				'Kota'=>$list["Kota"],
				'Area'=>$list["NamaArea"],
				'NamaJenis'=>$list["NamaJenis"],
				'Penerangan'=>$list["Penerangan"],
				'Side'=>$list["Side"],
				'Jumlah'=>$list["Jumlah"],
				'Ukuran'=>$list["Ukuran"],
				'Orientasi'=>$list["Orientasi"],
				'ID'=>$result2[0]["ID"],
				'NoIjin'=>$result2[0]["NoIjin"],
				'Tanggal'=>$result2[0]["Tanggal"],
				'StartPeriode'=>$result2[0]["StartPeriode"],
				'EndPeriode'=>$result2[0]["EndPeriode"],
				'Ket'=>$result2[0]["Ket"]
			);
			}else{
				$mylist[]=array(
				'ProductID'=>$list["ID"],
				'ProductCode'=>$list["ProductCode"],
				'Address'=>$list["Address"],
				'Kota'=>$list["Kota"],
				'Area'=>$list["NamaArea"],
				'NamaJenis'=>$list["NamaJenis"],
				'Penerangan'=>$list["Penerangan"],
				'Side'=>$list["Side"],
				'Jumlah'=>$list["Jumlah"],
				'Ukuran'=>$list["Ukuran"],
				'Orientasi'=>$list["Orientasi"],
				'ID'=>"",
				'NoIjin'=>"",
				'Tanggal'=>"",
				'StartPeriode'=>"",
				'EndPeriode'=>"",
				'Ket'=>""
			);
			}
		}
		}
		//print_r($mylist);
		return $mylist;
    }
	public function saveIjinreklame($data){
        $sts=$this->db->prepare("INSERT INTO `ijin`(ID,`NoIjin`,`ProductID`,`Tanggal`,`StartPeriode`,`EndPeriode`,`TipeIjin`,`Ket`)            
                VALUES (:id,:no,:prod,:tanggal,:start,:end,2,:note)");
        $sts->execute(array(
            ':no'=>$data['no'],
			':id'=>$data['id'],
			':prod'=>$data['prod'],
			':tanggal'=>$data['tanggal'],
			':start'=>$data['start'],
			':end'=>$data['end'],
			':note'=>$data['note']
            ));
    }
	public function IjinreklameSingle($id){
        $sts=$this->db->prepare('select * from ijin where ID=:id');
        $sts->execute(array(
            ':id'=>$id
        ));
        return $sts->fetch();
    }
	public function UpdIjinreklame($data){
        $sql="Update `ijin` set  NoIjin=:no,ProductID=:prod,Tanggal=:tanggal,StartPeriode=:start,EndPeriode=:end,Ket=:note where ID=:id ";
        $sts=$this->db->prepare($sql);
        $sts->execute(array(
            ':no'=>$data['no'],
			':prod'=>$data['prod'],
			':tanggal'=>$data['tanggal'],
			':start'=>$data['start'],
			':end'=>$data['end'],
			':id'=>$data['id'],
			':note'=>$data['note']
            ));
		//echo $sql;
		//print_r($data);
    }
	public function DeleteIjinReklame($id){
        //select Link Image
        $sql = "select * from ijinimg where IjinID='".$id."'";
        $q = $this->db->prepare($sql);
        $q->execute();
        $q->setFetchMode(PDO::FETCH_BOTH);	
		while($r = $q->fetch()){
			  $img=$r['Img'];
		  unlink($img);
		}        
        // remove dari database         
        $sts=$this->db->prepare("Delete from ijinimg where IjinID='".$id."'");
        $sts->execute();
		$sts=$this->db->prepare("Delete from ijin where ID='".$id."'");
        $sts->execute();
        
    }
	
	/** IjinIMBR **/
	/*
	public function IMBRList(){        
        $sts=$this->db->prepare("SELECT * FROM  `ijin` where TipeIjin=3 order by EndPeriode desc ");
        $sts->execute();
		return $sts->fetchAll();
         
    }*/
	public function IMBRList($id=false){        
	if (($id)!=""){
			//echo "ID =".$id;
		$idx=explode("-",$id);
		if($idx[0]!=""){
			if($idx[1]!=""){
				$sql="select product.ID,product.ProductCode,product.Address,product.Kota,product.JenisID,product.Ukuran,product.Jumlah,product.Orientasi,product.Penerangan,product.Side, jenisproduct.NamaJenis,area.NamaArea from (product INNER JOIN jenisproduct ON product.JenisID=jenisproduct.JenisID) inner join area on area.ID=product.AreaID where  (product.status=0) and (product.Kota='".$idx[0]."' and(area.NamaArea='".$idx[1]."'))";
			}else{
				$sql="select product.ID,product.ProductCode,product.Address,product.Kota,product.JenisID,product.Ukuran,product.Jumlah,product.Orientasi,product.Penerangan,product.Side, jenisproduct.NamaJenis,area.NamaArea from (product INNER JOIN jenisproduct ON product.JenisID=jenisproduct.JenisID) inner join area on area.ID=product.AreaID where  (product.status=0) and (product.Kota='".$idx[0]."')";
			}
		}else{
			if($idx[1]!=""){
				$sql="select product.ID,product.ProductCode,product.Address,product.Kota,product.JenisID,product.Ukuran,product.Jumlah,product.Orientasi,product.Penerangan,product.Side, jenisproduct.NamaJenis,area.NamaArea from (product INNER JOIN jenisproduct ON product.JenisID=jenisproduct.JenisID) inner join area on area.ID=product.AreaID where  (product.status=0) and(area.NamaArea='".$idx[1]."')";
			}else{
				$sql="select product.ID,product.ProductCode,product.Address,product.Kota,product.JenisID,product.Ukuran,product.Jumlah,product.Orientasi,product.Penerangan,product.Side, jenisproduct.NamaJenis,area.NamaArea from (product INNER JOIN jenisproduct ON product.JenisID=jenisproduct.JenisID) inner join area on area.ID=product.AreaID where  product.status=0";
			}
		}
		}else{
		$sql="select product.ID,product.ProductCode,product.Address,product.Kota,product.JenisID,product.Ukuran,product.Jumlah,product.Orientasi,product.Penerangan,product.Side, jenisproduct.NamaJenis,area.NamaArea from (product INNER JOIN jenisproduct ON product.JenisID=jenisproduct.JenisID) inner join area on area.ID=product.AreaID where  product.status=0";
		}
        //$sts=$this->db->prepare("select product.ID,product.ProductCode,product.Address,product.Kota,product.JenisID,product.Ukuran,product.Jumlah,product.Orientasi,product.Penerangan,product.Side, jenisproduct.NamaJenis,area.NamaArea from (product INNER JOIN jenisproduct ON product.JenisID=jenisproduct.JenisID) inner join area on area.ID=product.AreaID where  product.status=0 ");
		$sts=$this->db->prepare($sql);
        $sts->execute();
		$sts->setFetchMode(PDO::FETCH_ASSOC);
		$result=$sts->fetchAll();
		if(($sts->rowCount())<=0){ 
		$mylist[]=array(
				'ProductID'=>"",
				'ProductCode'=>"",
				'Address'=>"",
				'Kota'=>"",
				'Area'=>"",
				'NamaJenis'=>"",
				'Penerangan'=>"",
				'Side'=>"",
				'Jumlah'=>"",
				'Ukuran'=>"",
				'Orientasi'=>"",
				'ID'=>"",
				'NoIjin'=>"",
				'Tanggal'=>"",
				'StartPeriode'=>"",
				'EndPeriode'=>"",
				'Ket'=>""
			);
		}else{
        foreach ($result as $list){
			// echo $list["ID"];
			//$sts2=$this->db->prepare("SELECT * from ijin where TipeIjin='3' and ProductID=".$list["ID"]."  and ijin.StartPeriode < '".date("Y-m-d")."' and ijin.EndPeriode > '".date("Y-m-d")."'  ORDER BY EndPeriode DESC");
			$sts2=$this->db->prepare("SELECT * from ijin where TipeIjin='3' and ProductID=".$list["ID"]." ORDER BY EndPeriode DESC LIMIT 0,1");
			$sts2->execute();
			//$sts2->setFetchMode(PDO::FETCH_ASSOC);
			$result2 = $sts2->fetchAll();
			$mres=$sts2->rowCount();
			//print_r($result2);
			if ($mres>0){
			
			$mylist[]=array(
				'ProductID'=>$list["ID"],
				'ProductCode'=>$list["ProductCode"],
				'Address'=>$list["Address"],
				'Kota'=>$list["Kota"],
				'Area'=>$list["NamaArea"],
				'NamaJenis'=>$list["NamaJenis"],
				'Penerangan'=>$list["Penerangan"],
				'Side'=>$list["Side"],
				'Jumlah'=>$list["Jumlah"],
				'Ukuran'=>$list["Ukuran"],
				'Orientasi'=>$list["Orientasi"],
				'ID'=>$result2[0]["ID"],
				'NoIjin'=>$result2[0]["NoIjin"],
				'Tanggal'=>$result2[0]["Tanggal"],
				'StartPeriode'=>$result2[0]["StartPeriode"],
				'EndPeriode'=>$result2[0]["EndPeriode"],
				'Ket'=>$result2[0]["Ket"]
			);
			}else{
				$mylist[]=array(
				'ProductID'=>$list["ID"],
				'ProductCode'=>$list["ProductCode"],
				'Address'=>$list["Address"],
				'Kota'=>$list["Kota"],
				'Area'=>$list["NamaArea"],
				'NamaJenis'=>$list["NamaJenis"],
				'Penerangan'=>$list["Penerangan"],
				'Side'=>$list["Side"],
				'Jumlah'=>$list["Jumlah"],
				'Ukuran'=>$list["Ukuran"],
				'Orientasi'=>$list["Orientasi"],
				'ID'=>"",
				'NoIjin'=>"",
				'Tanggal'=>"",
				'StartPeriode'=>"",
				'EndPeriode'=>"",
				'Ket'=>""
			);
			}
		}
		}
		//print_r($mylist);
		return $mylist;
    }
	public function saveIMBR($data){
        $sts=$this->db->prepare("INSERT INTO `ijin`(ID,`NoIjin`,`ProductID`,`Tanggal`,`StartPeriode`,`EndPeriode`,`TipeIjin`,`Ket`)            
                VALUES (:id,:no,:prod,:tanggal,:start,:end,3,:note)");
        $sts->execute(array(
            ':no'=>$data['no'],
			':id'=>$data['id'],
			':prod'=>$data['prod'],
			':tanggal'=>$data['tanggal'],
			':start'=>$data['start'],
			':end'=>$data['end'],
			':note'=>$data['note']
            ));
    }
	public function IMBRSingle($id){
        $sts=$this->db->prepare('select * from ijin where ID=:id');
        $sts->execute(array(
            ':id'=>$id
        ));
        return $sts->fetch();
    }
	public function UpdIMBR($data){
        $sql="Update `ijin` set  NoIjin=:no,ProductID=:prod,Tanggal=:tanggal,StartPeriode=:start,EndPeriode=:end,Ket=:note where ID=:id ";
        $sts=$this->db->prepare($sql);
        $sts->execute(array(
            ':no'=>$data['no'],
			':prod'=>$data['prod'],
			':tanggal'=>$data['tanggal'],
			':start'=>$data['start'],
			':end'=>$data['end'],
			':id'=>$data['id'],
			':note'=>$data['note']
            ));
		//echo $sql;
		//print_r($data);
    }
	public function DeleteIMBR($id){
        //select Link Image
        $sql = "select * from ijinimg where IjinID='".$id."'";
        $q = $this->db->prepare($sql);
        $q->execute();
        $q->setFetchMode(PDO::FETCH_BOTH);	
		while($r = $q->fetch()){
			  $img=$r['Img'];
		  unlink($img);
		}        
        // remove dari database         
        $sts=$this->db->prepare("Delete from ijinimg where IjinID='".$id."'");
        $sts->execute();
		$sts=$this->db->prepare("Delete from ijin where ID='".$id."'");
        $sts->execute();
        
    }
	
	/** Ijin List **/
	public function IjinList($id,$tipe){        
		//echo "SELECT * FROM  `ijin` where ProductID='".$id."' and TipeIjin=1 order by EndPeriode desc";
        $sts=$this->db->prepare("SELECT * FROM  `ijin` where ProductID='".$id."' and TipeIjin='".$tipe."'  order by EndPeriode desc");
        $sts->execute();
		return $sts->fetchAll();
         
    }
	
	
	/** Sewa **/
	/*
	public function SewaList(){        
        $sts=$this->db->prepare("SELECT * FROM  `sewa` order by ID desc ");
        $sts->execute();
		return $sts->fetchAll();
         
    }*/
	public function SewaList($id=false){        
		
		if (($id)!=""){
			//echo "ID =".$id;
		$idx=explode("-",$id);
		if($idx[0]!=""){
			if($idx[1]!=""){
				$sql="select product.ID,product.ProductCode,product.Address,product.Kota,product.JenisID,product.Ukuran,product.Jumlah,product.Orientasi,product.Penerangan,product.Side, jenisproduct.NamaJenis,area.NamaArea from (product INNER JOIN jenisproduct ON product.JenisID=jenisproduct.JenisID) inner join area on area.ID=product.AreaID where  (product.status=0) and (product.Kota='".$idx[0]."' and(area.NamaArea='".$idx[1]."'))";
			}else{
				$sql="select product.ID,product.ProductCode,product.Address,product.Kota,product.JenisID,product.Ukuran,product.Jumlah,product.Orientasi,product.Penerangan,product.Side, jenisproduct.NamaJenis,area.NamaArea from (product INNER JOIN jenisproduct ON product.JenisID=jenisproduct.JenisID) inner join area on area.ID=product.AreaID where  (product.status=0) and (product.Kota='".$idx[0]."')";
			}
		}else{
			if($idx[1]!=""){
				$sql="select product.ID,product.ProductCode,product.Address,product.Kota,product.JenisID,product.Ukuran,product.Jumlah,product.Orientasi,product.Penerangan,product.Side, jenisproduct.NamaJenis,area.NamaArea from (product INNER JOIN jenisproduct ON product.JenisID=jenisproduct.JenisID) inner join area on area.ID=product.AreaID where  (product.status=0) and(area.NamaArea='".$idx[1]."')";
			}else{
				$sql="select product.ID,product.ProductCode,product.Address,product.Kota,product.JenisID,product.Ukuran,product.Jumlah,product.Orientasi,product.Penerangan,product.Side, jenisproduct.NamaJenis,area.NamaArea from (product INNER JOIN jenisproduct ON product.JenisID=jenisproduct.JenisID) inner join area on area.ID=product.AreaID where  product.status=0";
			}
		}
		}else{
		$sql="select product.ID,product.ProductCode,product.Address,product.Kota,product.JenisID,product.Ukuran,product.Jumlah,product.Orientasi,product.Penerangan,product.Side, jenisproduct.NamaJenis,area.NamaArea from (product INNER JOIN jenisproduct ON product.JenisID=jenisproduct.JenisID) inner join area on area.ID=product.AreaID where  product.status=0";
		}
        //$sts=$this->db->prepare("select product.ID,product.ProductCode,product.Address,product.Kota,product.JenisID,product.Ukuran,product.Jumlah,product.Orientasi,product.Penerangan,product.Side, jenisproduct.NamaJenis,area.NamaArea from (product INNER JOIN jenisproduct ON product.JenisID=jenisproduct.JenisID) inner join area on area.ID=product.AreaID");
		$sts=$this->db->prepare($sql);
        $sts->execute();
		$sts->setFetchMode(PDO::FETCH_ASSOC);
		$result=$sts->fetchAll();
		if(($sts->rowCount())<=0){ 
		$mylist[]=array(
				'ProductID'=>"",
				'ProductCode'=>"",
				'Address'=>"",
				'Kota'=>"",
				'Area'=>"",
				'NamaJenis'=>"",
				'Penerangan'=>"",
				'Side'=>"",
				'Jumlah'=>"",
				'Ukuran'=>"",
				'Orientasi'=>"",
				'ID'=>"",
				'NoPerjanjian'=>"",
				'Tanggal'=>"",
				'Harga'=>0,
				'Kontak'=>"",
				'StartPeriode'=>"",
				'EndPeriode'=>"",
				'NoKTP'=>"",
				'NoHP'=>"",
				'Note'=>""
			);
		}else{
        foreach ($result as $list){
			 
			//$sts2=$this->db->prepare("SELECT sewa.* from sewa where sewa.ProductID=".$list["ID"]."  and StartPeriode < '".date("Y-m-d")."' and EndPeriode > '".date("Y-m-d")."'  ORDER BY sewa.EndPeriode DESC");
			$sts2=$this->db->prepare("SELECT sewa.* from sewa where sewa.ProductID=".$list["ID"]." ORDER BY sewa.EndPeriode DESC limit 0,1");
			$sts2->execute();
			
			//$sts2->setFetchMode(PDO::FETCH_ASSOC);
			$result2 = $sts2->fetchAll();
			$mres=$sts2->rowCount();
			if ($mres>0){
			//print_r($result2);
			$mylist[]=array(
				'ProductID'=>$list["ID"],
				'ProductCode'=>$list["ProductCode"],
				'Address'=>$list["Address"],
				'Kota'=>$list["Kota"],
				'Area'=>$list["NamaArea"],
				'NamaJenis'=>$list["NamaJenis"],
				'Penerangan'=>$list["Penerangan"],
				'Side'=>$list["Side"],
				'Jumlah'=>$list["Jumlah"],
				'Ukuran'=>$list["Ukuran"],
				'Orientasi'=>$list["Orientasi"],
				'ID'=>$result2[0]["ID"],
				'NoPerjanjian'=>$result2[0]["NoPerjanjian"],
				'Tanggal'=>$result2[0]["Tanggal"],
				'Harga'=>$result2[0]["Harga"],
				'Kontak'=>$result2[0]["Kontak"],
				'StartPeriode'=>$result2[0]["StartPeriode"],
				'EndPeriode'=>$result2[0]["EndPeriode"],
				'NoKTP'=>$result2[0]["NoKTP"],
				'NoHP'=>$result2[0]["NoHP"],
				'Note'=>$result2[0]["Note"]
			);
			}else{
				$mylist[]=array(
				'ProductID'=>$list["ID"],
				'ProductCode'=>$list["ProductCode"],
				'Address'=>$list["Address"],
				'Kota'=>$list["Kota"],
				'Area'=>$list["NamaArea"],
				'NamaJenis'=>$list["NamaJenis"],
				'Penerangan'=>$list["Penerangan"],
				'Side'=>$list["Side"],
				'Jumlah'=>$list["Jumlah"],
				'Ukuran'=>$list["Ukuran"],
				'Orientasi'=>$list["Orientasi"],
				'ID'=>"",
				'NoPerjanjian'=>"",
				'Tanggal'=>"",
				'Harga'=>0,
				'Kontak'=>"",
				'StartPeriode'=>"",
				'EndPeriode'=>"",
				'NoKTP'=>"",
				'NoHP'=>"",
				'Note'=>""
			);
			}
		}
		}
		//print_r($mylist);
		return $mylist;
    }
	public function ImgSewa($id){
		$sts=$this->db->prepare('select * from sewaimg where SewaID=:id');
        $sts->execute(array(
            ':id'=>$id
        ));
        return $sts->fetchAll();
	}
	
	public function UpSewa($id){ 
	/*
		$tmp=$_FILES['files']["tmp_name"];
		$ext=strtolower(end(explode('.',$_FILES['files']['name'])));
        $SaveName = "files/".Code::random_string().time().".".$ext;
		$filename = "./".$SaveName;
		move_uploaded_file($tmp,$filename);
     */

		switch(strtolower($_FILES['files']['type'])){
            //buat image            
        case 'image/jpeg':
            $image = imagecreatefromjpeg($_FILES['files']['tmp_name']);
            break;
        case 'image/png':
            $image = imagecreatefrompng($_FILES['files']['tmp_name']);
            break;
        case 'image/gif':
            $image = imagecreatefromgif($_FILES['files']['tmp_name']);
            break;
        
        } 
        // Target dimensions Big File
        $max_width = 768;
        $max_height = 1366;

        // Get current dimensions
        $old_width  = imagesx($image);
        $old_height = imagesy($image);

        // Calculate the scaling we need to do to fit the image inside our frame
        $scale      = min($max_width/$old_width, $max_height/$old_height);

        // Get the new dimensions
        $new_width  = ceil($scale*$old_width);
        $new_height = ceil($scale*$old_height);
        // Create new empty image
        $new = imagecreatetruecolor($new_width, $new_height);
		// Resize old image into new
        imagecopyresampled($new, $image, 0, 0, 0, 0, $new_width, $new_height, $old_width, $old_height);
		$ext=strtolower(end(explode('.',$_FILES['files']['name'])));
		$namafile=Code::random_string().time().".".$ext;
        
        $filename = __DIR__."./../files/".$namafile;
        $SaveName = "files/".$namafile;
        imagejpeg($new,$filename,100);
        	 
        //save to database
        $sts2=$this->db->prepare("INSERT INTO `sewaimg` (SewaID,Img,Deskripsi,tglupload) VALUES (:id,:image,:desk,:tgl)");
        $sts2->execute(array(
            ':id'=>  $id,
            ':image'=>$SaveName,
            ':tgl'=>$_POST["tglupload"],
			':desk'=>$_POST["desk"]
        ));
    }
	
	public function delupsewa(){
        //select Link Image
        $sql = "select * from sewaimg where ID='".$_POST['gid']."'";
        $q = $this->db->prepare($sql);
        $q->execute();
        $q->setFetchMode(PDO::FETCH_BOTH);	
		while($r = $q->fetch()){
			  $img=$r['Img'];
		  unlink($img);
		}        
        // remove dari database         
        $sts=$this->db->prepare("Delete from sewaimg where ID='".$_POST['gid']."'");
        $sts->execute();
        
    }
	
	public function saveSewa($data){
        $sts=$this->db->prepare("INSERT INTO `sewa`(ID,`NoPerjanjian`,`ProductID`,`Harga`,`Tanggal`,`StartPeriode`,`EndPeriode`,`Kontak`,`NoKTP`,`NoHP`,`Note`)            
                VALUES (:id,:no,:prod,:nilai,:tanggal,:start,:end,:kontak,:ktp,:hp,:note)");
        $sts->execute(array(
            ':no'=>$data['no'],
			':id'=>$data['id'],
			':prod'=>$data['prod'],
			':nilai'=>$data['nilai'],
			':tanggal'=>$data['tanggal'],
			':start'=>$data['start'],
			':end'=>$data['end'],
			':kontak'=>$data['kontak'],
			':ktp'=>$data['ktp'],
			':hp'=>$data['hp'],
			':note'=>$data['note']
            ));
    }
	public function SewaSingle($id){
		//echo $id;
        $sts=$this->db->prepare('select * from Sewa where ID=:id');
        $sts->execute(array(
            ':id'=>$id
        ));
        return $sts->fetch();
    }
	public function UpdSewa($data){
        $sql="Update `sewa` set  NoPerjanjian=:no,ProductID=:prod,Kontak=:kontak,NoKTP=:ktp,NoHP=:hp,Harga=:harga,Tanggal=:tanggal,StartPeriode=:start,EndPeriode=:end,Note=:note where ID=:id ";
        $sts=$this->db->prepare($sql);
        $sts->execute(array(
            ':no'=>$data['no'],
			':prod'=>$data['prod'],
			':harga'=>$data['harga'],
			':tanggal'=>$data['tanggal'],
			':start'=>$data['start'],
			':end'=>$data['end'],
			':id'=>$data['id'],
			':kontak'=>$data['kontak'],
			':ktp'=>$data['ktp'],
			':hp'=>$data['hp'],
			':note'=>$data['note']
            ));
		//echo $sql;
		print_r($data);
    }
	public function DeleteSewa($id){
        //select Link Image
        $sql = "select * from sewaimg where SewaID='".$id."'";
        $q = $this->db->prepare($sql);
        $q->execute();
        $q->setFetchMode(PDO::FETCH_BOTH);	
		while($r = $q->fetch()){
			  $img=$r['Img'];
		  unlink($img);
		}        
        // remove dari database         
        $sts=$this->db->prepare("Delete from sewaimg where SewaID='".$id."'");
        $sts->execute();
		$sts=$this->db->prepare("Delete from sewa where ID='".$id."'");
        $sts->execute();
        
    }
	
	
	
	public function listkirim($id){
		$sql="select usrlogin.*,settinglokasi.name,settinglokasi.pop,settinglokasi.emailfrom from usrlogin inner join settinglokasi on settinglokasi.ID=usrlogin.sender where usrlogin.Level=:id";
		
        $sts=$this->db->prepare($sql);
        $sts->execute(array(
            ':id'=>$id
        ));
        return $sts->fetchall();
    }
	public function freeProperty(){
				$now=date('Y-m-d');
        $sts=$this->db->prepare("select product.ID,product.ProductCode,product.Address,product.Kota,product.JenisID,product.Ukuran,product.Jumlah,product.Orientasi,product.Penerangan,product.Side, jenisproduct.NamaJenis,area.NamaArea from (product INNER JOIN jenisproduct ON product.JenisID=jenisproduct.JenisID) inner join area on area.ID=product.AreaID where  product.status=0");
        $sts->execute();
		$sts->setFetchMode(PDO::FETCH_ASSOC);
		$result=$sts->fetchAll();
		if(($sts->rowCount())<=0){ $mylist[]=array();}else{
        foreach ($result as $list){
			 $sql="SELECT kontrak.*,customer.CustomerName FROM kontrak INNER JOIN customer on kontrak.CustomerID=customer.CustomerID where (kontrak.status=1) AND (kontrak.ProductID=".$list["ID"].") and (kontrak.StartPeriode < '".$now."') and (kontrak.EndPeriode > '".$now."')   ORDER BY kontrak.EndPeriode DESC";
			 $sqlold="SELECT kontrak.*,customer.CustomerName FROM kontrak INNER JOIN customer on kontrak.CustomerID=customer.CustomerID where kontrak.status=1 AND kontrak.ProductID=".$list["ID"]."  ORDER BY kontrak.EndPeriode DESC";
			$sts2=$this->db->prepare($sql);
			$sts2->execute();
			//$sts2->setFetchMode(PDO::FETCH_ASSOC);
			$result2 = $sts2->fetchAll();
			$mres=$sts2->rowCount();
			if ($mres>0){
			}else{
				$get=Code::requery("profileimg","Img","ProductID=".$list["ID"]." and Status=1");
				
				if($get<>0){
					$mylist[]=array(
					'ID'=>$list["ID"],
					'ProductCode'=>$list["ProductCode"],
					'Address'=>$list["Address"],
					'Kota'=>$list["Kota"],
					'Area'=>$list["NamaArea"],
					'NamaJenis'=>$list["NamaJenis"],
					'img'=>Code::GetField("profileimg","Img","ProductID=".$list["ID"]." and Status=1")
					);
				}else{
					$mylist[]=array(
					'ID'=>$list["ID"],
					'ProductCode'=>$list["ProductCode"],
					'Address'=>$list["Address"],
					'Kota'=>$list["Kota"],
					'Area'=>$list["NamaArea"],
					'NamaJenis'=>$list["NamaJenis"],
					'img'=>""
					);
				}
			
			}
		}
		}
		//print_r($mylist);
		return $mylist;
	}
	public function setsender(){
		$sql="select * from settinglokasi";
		
        $sts=$this->db->prepare($sql);
        $sts->execute();
        return $sts->fetchall();
	}
	public function SingleSend($id){
		$sql="select * from usrlogin where ID='".$id."'";
		
        $sts=$this->db->prepare($sql);
        $sts->execute();
        return $sts->fetchAll();
	}
	
	
	public function sendMail($data){
		$sts=$this->db->prepare("INSERT INTO `usrlogin`(`ID`,`Username`,`Password`,`Level`,`expireDate`,`expiretime`,`list`,`send`,`dateSend`,`Note`,`subject`,`sender`)            
                VALUES (:id,:username,:pass,:level,:date,:time,:list,:send,:senddate,:note,:subject,:sender)");
        $sts->execute(array(
            ':id'=>$data["ID"],
			':username'=>$data["user"],
			':pass'=>$data["pass"],
			':send'=>$data["send"],
			':subject'=>$data["subject"],
			':time'=>$data["expiretime"],
			':date'=>$data["exiredate"],
			':note'=>$data["note"],
			':list'=>$data["list"],
			':sender'=>$data["sender"],
			':senddate'=>date("Y-m-d"),
			':level'=>2
			
        ));
		$data["froms"];
		$mailbody="Dear Customer,\n\n";
		$mailbody=$mailbody.$data["note"]."\n\n";
		$mailbody=$mailbody."URL : ".Code::GetField("settinglokasi","url","ID=".$_POST["opt"])."\n\n";
		$mailbody=$mailbody."User Name : ".$data["user"]."\n";
		$mailbody=$mailbody."Password  : ".$data["pass"]."\n\n";
		$mailbody=$mailbody."BR,\n\n";
		$mailbody=$mailbody."Admin\n";
		/***************** Send Mail *********************/
		$mail = new PHPMailer();

		$mail->IsSMTP();                                      // set mailer to use SMTP
		$mail->Host = Code::GetField("settinglokasi","pop","ID=".$_POST["opt"]);  // specify main and backup server
		$mail->SMTPAuth = true;     // turn on SMTP authentication
		$mail->Username = Code::GetField("settinglokasi","emailfrom","ID=".$_POST["opt"]);  // SMTP username
		$mail->Password = Code::GetField("settinglokasi","sendpass","ID=".$_POST["opt"]);; // SMTP password

		$mail->From = Code::GetField("settinglokasi","emailfrom","ID=".$_POST["opt"]);;
		$mail->FromName = "Info";
		$mail->AddAddress($data["send"]);
		
		
		//$mail->IsHTML(true);                                  // set email format to HTML
		
		$mail->Subject = $data["subject"];
		$mail->Body    = $mailbody;
		

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
			":from"=>Code::GetField("settinglokasi","emailfrom","ID=".$_POST["opt"]),
			":pop"=>Code::GetField("settinglokasi","pop","ID=".$_POST["opt"]),
			":emailto"=>$data["send"],
			":tgl"=>date("Y-m-d"),
			":subject"=>$data["subject"],
			":body"=>$mailbody,
			":attc"=>""
			));
			header('location: '.URL.'admin/kirimlokasi');
		}
	}
	public function UpdMail($data){
		$sts=$this->db->prepare("update  `usrlogin` set `Username`=:username,`Password`=:pass,`Level`=:level,`expireDate`=:date,`expiretime`=:time,`list`=:list,`send`=:send,`dateSend`=:senddate,`Note`=:note,`subject`=:subject,`sender`=:sender where ID=:id");
        $sts->execute(array(
            ':id'=>$data["ID"],
			':username'=>$data["user"],
			':pass'=>$data["pass"],
			':send'=>$data["send"],
			':subject'=>$data["subject"],
			':time'=>$data["expiretime"],
			':date'=>$data["exiredate"],
			':note'=>$data["note"],
			':list'=>$data["list"],
			':sender'=>$data["sender"],
			':senddate'=>date("Y-m-d"),
			':level'=>2
			
        ));
		$data["froms"];
		$mailbody="Dear Customer,\n\n";
		$mailbody=$mailbody.$data["note"]."\n\n";
		$mailbody=$mailbody."URL : ".Code::GetField("settinglokasi","url","ID=".$_POST["opt"])."\n\n";
		$mailbody=$mailbody."User Name : ".$data["user"]."\n";
		$mailbody=$mailbody."Password  : ".$data["pass"]."\n\n";
		$mailbody=$mailbody."BR,\n\n";
		$mailbody=$mailbody."Admin\n";
		/***************** Send Mail *********************/
		$mail = new PHPMailer();

		$mail->IsSMTP();                                      // set mailer to use SMTP
		$mail->Host = Code::GetField("settinglokasi","pop","ID=".$_POST["opt"]);  // specify main and backup server
		$mail->SMTPAuth = true;     // turn on SMTP authentication
		$mail->Username = Code::GetField("settinglokasi","emailfrom","ID=".$_POST["opt"]);  // SMTP username
		$mail->Password = Code::GetField("settinglokasi","sendpass","ID=".$_POST["opt"]);; // SMTP password

		$mail->From = Code::GetField("settinglokasi","emailfrom","ID=".$_POST["opt"]);;
		$mail->FromName = "Info";
		$mail->AddAddress($data["send"]);
		
		
		//$mail->IsHTML(true);                                  // set email format to HTML
		
		$mail->Subject = $data["subject"];
		$mail->Body    = $mailbody;
		

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
			":from"=>Code::GetField("settinglokasi","emailfrom","ID=".$_POST["opt"]),
			":pop"=>Code::GetField("settinglokasi","pop","ID=".$_POST["opt"]),
			":emailto"=>$data["send"],
			":tgl"=>date("Y-m-d"),
			":subject"=>$data["subject"],
			":body"=>$mailbody,
			":attc"=>""
			));
			header('location: '.URL.'admin/kirimlokasi');
		}
	}
	public function resendMail($id){
		$senders=Code::GetField("usrlogin","sender","ID='".$id."'");    	
		$senders=explode("-",$senders);
		$mailbody="Dear Customer,\n\n";
		$mailbody=$mailbody.Code::GetField("usrlogin","note","ID='".$id."'")."\n\n";
		$mailbody=$mailbody."URL : ".Code::GetField("settinglokasi","sendpass","ID=".$senders[0])."\n\n";
		$mailbody=$mailbody."User Name : ".Code::GetField("usrlogin","Username","ID='".$id."'")."\n";
		$mailbody=$mailbody."Password  : ".Code::GetField("usrlogin","Password","ID='".$id."'")."\n\n";
		$mailbody=$mailbody."BR,\n\n";
		$mailbody=$mailbody."Admin\n";
		/***************** Send Mail *********************/
		$mail = new PHPMailer();
		
		
		
		//$mail->IsSMTP();                                      // set mailer to use SMTP
		$mail->Host = Code::GetField("settinglokasi","pop","ID=".$senders[0]);  // specify main and backup server
		//$mail->SMTPAuth = true;     // turn on SMTP authentication
		$mail->Username = Code::GetField("settinglokasi","emailfrom","ID=".$senders[0]);  // SMTP username
		$mail->Password = Code::GetField("settinglokasi","sendpass","ID=".$senders[0]); // SMTP password

		$mail->From = Code::GetField("settinglokasi","emailfrom","ID=".$senders[0]);
		$mail->FromName = "Info";
		$mail->AddAddress(Code::GetField("usrlogin","send","ID='".$id."'"));
		
		
		//$mail->IsHTML(true);                                  // set email format to HTML
		
		$mail->Subject = Code::GetField("usrlogin","subject","ID=".$id."'");
		$mail->Body    = $mailbody;
		

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
			":from"=>Code::GetField("settinglokasi","emailfrom","ID=".$senders[0]),
			":pop"=>Code::GetField("settinglokasi","pop","ID=".$senders[0]),
			":emailto"=>Code::GetField("usrlogin","send","ID='".$id."'"),
			":tgl"=>date("Y-m-d"),
			":subject"=>Code::GetField("usrlogin","subject","ID=".$id."'"),
			":body"=>$mailbody,
			":attc"=>""
			));
		}
	}
	public function kirimlDel($id){
		$sts=$this->db->prepare("Delete from  `usrlogin` where ID=:id");
        $sts->execute(array(
            ':id'=>$id));
	}
	/****** Upload Documentasi   *****/
	public function prolistx(){        
        $sts=$this->db->prepare("select product.ID,product.ProductCode,product.Address,product.Kota,product.JenisID,product.Ukuran,product.Jumlah,product.Orientasi,product.Penerangan,product.Side, jenisproduct.NamaJenis,area.NamaArea from (product INNER JOIN jenisproduct ON product.JenisID=jenisproduct.JenisID) inner join area on area.ID=product.AreaID where  product.status=0");
        $sts->execute();
		$sts->setFetchMode(PDO::FETCH_ASSOC);
		$result=$sts->fetchAll();
		$list=$sts->rowCount();
		if(($sts->rowCount())>0){
		
		$now=date('Y-m-d');
        foreach ($result as $list){
			 $sql="SELECT kontrak.*,customer.CustomerName FROM kontrak INNER JOIN customer on kontrak.CustomerID=customer.CustomerID where (kontrak.status=1) AND (kontrak.ProductID=".$list["ID"].") and (kontrak.StartPeriode < '".$now."') and (kontrak.EndPeriode > '".$now."')   ORDER BY kontrak.EndPeriode DESC";
			 //echo $sql;
			$sts2=$this->db->prepare($sql);
			$sts2->execute();
			//$sts2->setFetchMode(PDO::FETCH_ASSOC);
			$result2 = $sts2->fetchAll();
			$mres=$sts2->rowCount();
			if ($mres>0){
			//print_r($result2);
			$mylist[]=array(
				'ID'=>$list["ID"],
				'ProductCode'=>$list["ProductCode"],
				'Address'=>$list["Address"],
				'Kota'=>$list["Kota"],
				'Area'=>$list["NamaArea"],
				'NamaJenis'=>$list["NamaJenis"],
				'Penerangan'=>$list["Penerangan"],
				'Side'=>$list["Side"],
				'Jumlah'=>$list["Jumlah"],
				'Ukuran'=>$list["Ukuran"],
				'Orientasi'=>$list["Orientasi"],
				'KontrakID'=>$result2[0]["KontrakID"],
				'NoKontrak'=>$result2[0]["NoKontrak"],
				'Nilai'=>$result2[0]["Nilai"],
				'CustomerName'=>$result2[0]["CustomerName"],
				'StartPeriode'=>$result2[0]["StartPeriode"],
				'EndPeriode'=>$result2[0]["EndPeriode"],
				'Note'=>$result2[0]["Note"]);
			}else{
				$mylist[]=array(
				'ID'=>$list["ID"],
				'ProductCode'=>$list["ProductCode"],
				'Address'=>$list["Address"],
				'Kota'=>$list["Kota"],
				'Area'=>$list["NamaArea"],
				'NamaJenis'=>$list["NamaJenis"],
				'Penerangan'=>$list["Penerangan"],
				'Side'=>$list["Side"],
				'Jumlah'=>$list["Jumlah"],
				'Ukuran'=>$list["Ukuran"],
				'Orientasi'=>$list["Orientasi"],
				'KontrakID'=>"",
				'NoKontrak'=>"",
				'Nilai'=>"",
				'CustomerName'=>"",
				'StartPeriode'=>"",
				'EndPeriode'=>"",
				'Note'=>"");
			}
		}	
		}else{
			$mylist[]=array(
				'ID'=>"",
				'ProductCode'=>"",
				'Address'=>"",
				'Kota'=>"",
				'Area'=>"",
				'NamaJenis'=>"",
				'Penerangan'=>"",
				'Side'=>"",
				'Jumlah'=>"",
				'Ukuran'=>"",
				'Orientasi'=>"",
				'KontrakID'=>"",
				'NoKontrak'=>"",
				'Nilai'=>"",
				'CustomerName'=>"",
				'StartPeriode'=>"",
				'EndPeriode'=>"",
				'Note'=>"");
		
		
		//print_r($mylist);
		
		}
		return $mylist;
    }
	public function prosingle($id){        
	$now=date('Y-m-d');
	//$sql="SELECT `product`.`ProductCode`,`product`.`ID`, `product`.`Address`, `product`.`Kota`, `area`.`NamaArea`, `customer`.`CustomerName`,`customer`.`CustomerID`, `product`.`ID` FROM `customer` INNER JOIN `kontrak` ON (`customer`.`CustomerID` = `kontrak`.`CustomerID`) INNER JOIN `vistamedia`.`product` ON (`product`.`ID` = `kontrak`.`ProductID`) INNER JOIN `vistamedia`.`area` ON (`product`.`AreaID` = `area`.`ID`) WHERE (`kontrak`.`StartPeriode` < '".$now."' AND `kontrak`.`EndPeriode` > '".$now."' AND `product`.`ID`= ".$id.")";
	$sql="SELECT `product`.`ProductCode`,`product`.`ID`, `product`.`Address`, `product`.`Kota`, `area`.`NamaArea`,  `product`.`ID` FROM `vistamedia`.`product` INNER JOIN `vistamedia`.`area` ON (`product`.`AreaID` = `area`.`ID`) WHERE  `product`.`ID`= ".$id."";
	//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		//$sts->setFetchMode(PDO::FETCH_ASSOC);
		$result=$sts->fetch();
		return $result;
    }
	public function prosinglekontrak($id){        
	$now=date('Y-m-d');
	$sql="SELECT  `customer`.`CustomerName`,`customer`.`CustomerID`, `product`.`ID` FROM `customer` INNER JOIN `kontrak` ON (`customer`.`CustomerID` = `kontrak`.`CustomerID`) INNER JOIN `vistamedia`.`product` ON (`product`.`ID` = `kontrak`.`ProductID`) WHERE (`kontrak`.`StartPeriode` < '".$now."' AND `kontrak`.`EndPeriode` > '".$now."' AND `product`.`ID`= ".$id.")";
	
	//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		//$sts->setFetchMode(PDO::FETCH_ASSOC);
		if($sts->rowCount()==0){
			$result=array('CustomerName'=>'');
			return $result;
		}else{
		$result=$sts->fetch();
		return $result;
		}
    }
	public function prosinglef($id){        
	$now=date('Y-m-d');
	$sql="SELECT product.*, area.NamaArea from product inner join area on product.AreaID=area.ID where `product`.`ID`= ".$id;
	//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		//$sts->setFetchMode(PDO::FETCH_ASSOC);
		$result=$sts->fetch();
		return $result;
    }
	public function SMateri($data){
        $sts=$this->db->prepare("INSERT INTO `materi`(`ID`,`ProductID`,`CustomerID`,`Tema`,`tgltayang`,`pemasang`,`tglfoto`,`tglupload`)            
                VALUES (:pid,:id,:cid,:tema,:tgltayang,:pemasang,:tglfoto,:tglupload)");
        $sts->execute(array(
            ':id'=>$data['id'],
			':pid'=>$data['pid'],
			':pemasang'=>$data['pemasang'],
			':tema'=>$data['tema'],
			':tgltayang'=>$data['tgltayang'],
			':tglupload'=>$data['tglupload'],
			':cid'=>$data['cid'],
			':tglfoto'=>$data['tglfoto']
            ));
    }
	
	
	public function UploadMateri($id){ 
	/*
		$tmp=$_FILES['files']["tmp_name"];
		$ext=strtolower(end(explode('.',$_FILES['files']['name'])));
        $SaveName = "files/".Code::random_string().time().".".$ext;
		$filename = "./".$SaveName;
		move_uploaded_file($tmp,$filename);
     */

		switch(strtolower($_FILES['files']['type'])){
            //buat image            
        case 'image/jpeg':
            $image = imagecreatefromjpeg($_FILES['files']['tmp_name']);
            break;
        case 'image/png':
            $image = imagecreatefrompng($_FILES['files']['tmp_name']);
            break;
        case 'image/gif':
            $image = imagecreatefromgif($_FILES['files']['tmp_name']);
            break;
        
        } 
        // Target dimensions Big File
        $max_width = 1366;
        $max_height = 768;

        // Get current dimensions
        $old_width  = imagesx($image);
        $old_height = imagesy($image);

        // Calculate the scaling we need to do to fit the image inside our frame
        $scale      = min($max_width/$old_width, $max_height/$old_height);

        // Get the new dimensions
        $new_width  = ceil($scale*$old_width);
        $new_height = ceil($scale*$old_height);
        // Create new empty image
        $new = imagecreatetruecolor($new_width, $new_height);
		// Resize old image into new
        imagecopyresampled($new, $image, 0, 0, 0, 0, $new_width, $new_height, $old_width, $old_height);
		$ext=strtolower(end(explode('.',$_FILES['files']['name'])));
		$namafile=Code::random_string().time().".".$ext;
        
        $filename = __DIR__."./../files/".$namafile;
        $SaveName = "files/".$namafile;
        imagejpeg($new,$filename,100);
        	 
        //save to database
        $sts2=$this->db->prepare("INSERT INTO `materiimg` (MateriID,Img,TglUpload) VALUES (:id,:image,:tgl)");
        $sts2->execute(array(
            ':id'=>  $id,
            ':image'=>$SaveName,
            ':tgl'=>$_POST["tglupload"]
        ));
    }
	
	public function ImgMateriList($id){
        $sts=$this->db->prepare("SELECT * FROM materiimg where MateriID='".$id."' order by ID");
        $sts->execute();
        return $sts->fetchAll();
		
    }
	
	public function updockimgdel(){
        //select Link Image
        $sql = "select * from materiimg where ID='".$_POST['gid']."'";
        $q = $this->db->prepare($sql);
        $q->execute();
        $q->setFetchMode(PDO::FETCH_BOTH);	
		while($r = $q->fetch()){
			  $img=$r['img'];
		  unlink($img);
		}        
        // remove dari database         
        $sts=$this->db->prepare("Delete from materiimg where ID='".$_POST['gid']."'");
        $sts->execute();
        
    }
	public function setkirim(){
        $sts=$this->db->prepare("update materiimg set kirim=1 where ID='".$_POST['gid']."'");
        $sts->execute();
        
    }
	public function unsetkirim(){
        $sts=$this->db->prepare("update materiimg set kirim=0 where ID='".$_POST['gid']."'");
        $sts->execute();
        
    }
	
	public function updocklist(){    
		
        $sts=$this->db->prepare("select * from materi order by tglupload");
        $sts->execute();
		$sts->setFetchMode(PDO::FETCH_ASSOC);
		$mlist=$sts->fetchAll();
		$list=$sts->rowCount();
		if(($sts->rowCount())>0){
		
		
        foreach ($mlist as $result){
			$area=Code::GetField("product","AreaID","ID=".$result["ProductID"]);
			$Cst=Code::GetField("customer","CustomerName","CustomerID=".$result['CustomerID']);
			
			$mylist[]=array(
				"ID"=>$result["ID"],
				"ProdCode"=>Code::GetField("product","ProductCode","ID=".$result["ProductID"]),
				"Address"=>Code::GetField("product","Address","ID=".$result["ProductID"]),
				"Kota"=>Code::GetField("product","Kota","ID=".$result["ProductID"]),
				"Area"=>Code::GetField("area","NamaArea","ID=".$area),
				"Customer"=>$Cst,
				"Tema"=>$result["Tema"],
				"pemasang"=>$result["pemasang"],
				"tgltayang"=>$result["tgltayang"],
				"tglfoto"=>$result["tglfoto"]
			);
			
			
		
		}
		}else{
			$mylist=array();
		}
		//print_r($mylist);
		return $mylist;
		
    }
	
	
	public function updockmail($data){
		$note1="Berikut saya kirimkan  update Materi Iklan :\n\n";
		$note2="sekian yang dapat saya sampaikan\n\n";
		
		$mailbody="Dear Customer,\n\n";
		$mailbody=$mailbody.$note1;
		$mailbody=$mailbody.$data["lokasi"]."\n\n";
		$mailbody=$mailbody."Tema : ".$data["tema"]."\n\n";
		$mailbody=$mailbody."Tgl Tayang : ".$data["tgltayang"]."\n\n";
		$mailbody=$mailbody."Tgl Foto : ".$data["tglfoto"]."\n\n";
		$mailbody=$mailbody.$note2;
		$mailbody=$mailbody."BR,\n\n";
		$mailbody=$mailbody."Admin\n";
		/***************** Send Mail *********************/
		$mail = new PHPMailer();
		
		
		$senders=explode("-",$data["sender"]);
		//echo $data["sender"];
		$mail->IsSMTP();                                      // set mailer to use SMTP
		//echo  Code::GetField("settinglokasi","emailfrom","ID=".$id[1]);
		$mail->Host = Code::GetField("settinglokasi","pop","ID=".$senders[0]);  // specify main and backup server
		$mail->SMTPAuth = true;     // turn on SMTP authentication
		$mail->Username = Code::GetField("settinglokasi","emailfrom","ID=".$senders[0]);  // SMTP username
		$mail->Password = Code::GetField("settinglokasi","sendpass","ID=".$senders[0]); // SMTP password
//echo Code::GetField("customer","Email","CustomerID='".$cst."'");
		$mail->From = Code::GetField("settinglokasi","emailfrom","ID=".$senders[0]);
		$mail->FromName = "Info";
		$to=explode(",",$data["to"]);
		foreach($to as $key){
			if($key<>""){$mail->AddAddress($key);}
		}
		//$mail->AddAddress(Code::GetField("customer","Email","CustomerID='".$cst."'"));
		//$mail->IsHTML(true);                                  // set email format to HTML
		//Attach Images
		$subject="Update Materi Iklan";
		
		
		$result=explode(",",$data["list"]);
        foreach ($result as $list){
			if($list<>""){$mail->AddAttachment($list);}
		}
		$mail->Subject = $subject;
		$mail->Body    = $mailbody;
		

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
			":from"=>Code::GetField("settinglokasi","emailfrom","ID=".$senders[0]),
			":pop"=>Code::GetField("settinglokasi","pop","ID=".$senders[0]),
			":emailto"=>$data["to"],
			":tgl"=>date("Y-m-d"),
			":subject"=>$subject,
			":body"=>$mailbody,
			":attc"=>$data["list"]
			));
			header('location: '.URL.'admin/Senddock');
		} 
	}
	
	public function ListImg($id){
        $sts=$this->db->prepare("select * from materiimg where MateriID='".$id."'");
        $sts->execute();
        $result=$sts->fetchAll();
		return $result;
    }
	public function SingleMateri($id){
        $sts=$this->db->prepare("select * from materi where ID='".$id."'");
        $sts->execute();
        $result=$sts->fetch();
		return $result;
    }
	public function ListContact($id){
		
        $sts=$this->db->prepare("select * from customercontact where CustomerID='".$id."'");
        $sts->execute();
        $result=$sts->fetchAll();
		return $result;
    }
	public function listrpt($bln1,$thn){
		
        $sts=$this->db->prepare("select * from mounlyreport where bulan='".$bln1."' and tahun='".$thn."'");
        $sts->execute();
        $result=$sts->fetchAll();
		return $result;
		//print_r($result);
    }
	public function SRpt($data){
        $sts=$this->db->prepare("INSERT INTO `mounlyreport`(`ID`,`ProductID`,`CustomerID`,`Bulan`,`Tahun`,`TglFoto`,`tglupload`,`Note`)            
                VALUES (:pid,:id,:cid,:bulan,:tahun,:tglfoto,:tglupload,:note)");
        $sts->execute(array(
            ':id'=>$data['id'],
			':pid'=>$data['pid'],
			':bulan'=>$data['bulan'],
			':tahun'=>$data['tahun'],
			':note'=>$data['note'],
			':tglupload'=>$data['tglupload'],
			':cid'=>$data['cid'],
			':tglfoto'=>$data['tglfoto']
            ));
    }
	
	public function ImgRptList($id){
        $sts=$this->db->prepare("SELECT * FROM mounlyrptimg where IDReport='".$id."' order by ID");
        $sts->execute();
        return $sts->fetchAll();
		
    }
	
	
	public function UploadRpt($id){ 
	/*
		$tmp=$_FILES['files']["tmp_name"];
		$ext=strtolower(end(explode('.',$_FILES['files']['name'])));
        $SaveName = "files/".Code::random_string().time().".".$ext;
		$filename = "./".$SaveName;
		move_uploaded_file($tmp,$filename);
     */

		switch(strtolower($_FILES['files']['type'])){
            //buat image            
        case 'image/jpeg':
            $image = imagecreatefromjpeg($_FILES['files']['tmp_name']);
            break;
        case 'image/png':
            $image = imagecreatefrompng($_FILES['files']['tmp_name']);
            break;
        case 'image/gif':
            $image = imagecreatefromgif($_FILES['files']['tmp_name']);
            break;
        
        } 
        // Target dimensions Big File
        $max_width = 1366;
        $max_height = 768;

        // Get current dimensions
        $old_width  = imagesx($image);
        $old_height = imagesy($image);

        // Calculate the scaling we need to do to fit the image inside our frame
        $scale      = min($max_width/$old_width, $max_height/$old_height);

        // Get the new dimensions
        $new_width  = ceil($scale*$old_width);
        $new_height = ceil($scale*$old_height);
        // Create new empty image
        $new = imagecreatetruecolor($new_width, $new_height);
		// Resize old image into new
        imagecopyresampled($new, $image, 0, 0, 0, 0, $new_width, $new_height, $old_width, $old_height);
		$ext=strtolower(end(explode('.',$_FILES['files']['name'])));
		$namafile=Code::random_string().time().".".$ext;
        
        $filename = __DIR__."./../files/".$namafile;
        $SaveName = "files/".$namafile;
        imagejpeg($new,$filename,100);
        	 
        //save to database
        $sts2=$this->db->prepare("INSERT INTO `mounlyrptimg` (IDReport,Img,tglupload) VALUES (:id,:image,:tgl)");
        $sts2->execute(array(
            ':id'=>  $id,
            ':image'=>$SaveName,
            ':tgl'=>date("Y-m-d")
        ));
    }
	public function rptimgdel($id){
        //select Link Image
        $sql = "select * from mounlyrptimg where ID=".$id."";
        $q = $this->db->prepare($sql);
        $q->execute();
        $q->setFetchMode(PDO::FETCH_BOTH);	
		while($r = $q->fetch()){
			  $img=$r['Img'];
		  unlink($img);
		}        
        // remove dari database         
        $sts=$this->db->prepare("Delete from mounlyrptimg where ID=".$id."");
        $sts->execute();
        //return $id;
    }
	
	public function rptfilter($bln1,$thn){ 
	$sts=$this->db->prepare("select * from mounlyreport where bulan='".$bln1."' and tahun='".$thn."'");
        $sts->execute();
		$sts->setFetchMode(PDO::FETCH_ASSOC);
		$result=$sts->fetchAll();
		
		if(($sts->rowCount())===0){ 
		$mylist=array();
		}else{
        foreach ($result as $list){
			 //$mylist=$mylist."<tr>";
			 $areaid=Code::GetField("product","AreaID","ID=".$list['ProductID']);
			 switch ($list['Bulan']){
											case "01": $bln= "Januari";break;
											case "02": $bln= "Februari";break;
											case "03": $bln= "Maret";break;
											case "04": $bln= "April";break;
											case "05": $bln= "Mei";break;
											case "06": $bln= "Juni";break;
											case "07": $bln= "Juli";break;
											case "08": $bln= "Agustus";break;
											case "09": $bln= "September";break;
											case "10": $bln= "Oktober";break;
											case "11": $bln= "November";break;
											case "12": $bln= "Desember";break;
											
											}
			 $mylist=$mylist."<tr><td>".$list["ID"]."</td><td><a href='".URL."admin/ProductView/".$list['ProductID']."'  target='Blank'>".Code::GetField("product","ProductCode","ID='".$list["ProductID"]."'")."</a></td> <td>".Code::GetField("product","Address","ID='".$list["ProductID"]."'")."</td><td>".Code::GetField("product","Kota","ID='".$list["ProductID"]."'")."</td><td>".Code::GetField("area","NamaArea","ID=".$areaid)."</td><td>";
			if(Code::requery("customer","CustomerName","CustomerID=".$list['CustomerID'])!=0){
			$mylist=$mylist.Code::GetField("customer","CustomerName","CustomerID=".$list['Cust	omerID']);
			}
											$mylist=$mylist."</td>
											<td>".$bln."</td>
											<td>".$list["Tahun"]."</td>
											<td>".$list["TglFoto"]."</td>
											<td>".$list["Note"]."</td>
											<td><a class='btn btn-primary btn-circle' href='".URL."admin/uprptUimg/".$list['ID']."'><i class='icon-picture'></i></a></td>
											<td><a class='btn btn-primary btn-circle' href='".URL."admin/rptedit/".$list['ID']."'> <i class='icon-edit'></i></a></td>";
			 $mylist=$mylist."<tr>";
		}
		}
		$mylist=$mylist."</tbody>
                                </table>";
		return $mylist;
		
	}
	public function rptdel($id){
        //select Link Image
        $sql = "select * from mounlyreportimg where IDReport='".$id."'";
        $q = $this->db->prepare($sql);
        $q->execute();
        $q->setFetchMode(PDO::FETCH_BOTH);	
		while($r = $q->fetch()){
			  $img=$r['img'];
		  unlink($img);
		}        
        // remove dari database         
        $sts=$this->db->prepare("Delete from mounlyreport where ID='".$id."'");
        $sts->execute();
		$sts=$this->db->prepare("Delete from mounlyreportimg where IDReport='".$id."'");
        $sts->execute();
        
    }

	public function rptSingle($id){
		
        $sts=$this->db->prepare("select * from mounlyreport where ID='".$id."'");
        $sts->execute();
       
        return $sts->fetch();
    }
	
	public function URpt($data){
		//$sql="INSERT INTO `mounlyreport`(`ID`,`ProductID`,`CustomerID`,`Bulan`,`Tahun`,`TglFoto`,`tglupload`,`Note`)                VALUES (:pid,:id,:cid,:bulan,:tahun,:tglfoto,:tglupload,:note)";
		$sql="Update mounlyreport set `Bulan`=:bulan,`Tahun`=:tahun,`TglFoto`=:tglfoto,`Note`=:note where ID=:id";
        $sts=$this->db->prepare($sql);
        $sts->execute(array(
            ':id'=>$data['id'],
			':bulan'=>$data['bulan'],
			':tahun'=>$data['tahun'],
			':note'=>$data['note'],
			':tglfoto'=>$data['tglfoto']
            ));
    }
	
	public function setMailList(){        
        $sts=$this->db->prepare("SELECT * FROM  `aotoreport` order by datecreate desc");
        $sts->execute();
		return $sts->fetchAll();
         
    }
	
	public function setProKon(){        
        $sts=$this->db->prepare("select product.ID,product.ProductCode,product.Address,product.Kota,product.JenisID,product.Ukuran,product.Jumlah,product.Orientasi,product.Penerangan,product.Side, jenisproduct.NamaJenis,area.NamaArea from (product INNER JOIN jenisproduct ON product.JenisID=jenisproduct.JenisID) inner join area on area.ID=product.AreaID where product.status=0");
        $sts->execute();
		$sts->setFetchMode(PDO::FETCH_ASSOC);
		$result=$sts->fetchAll();
		$list=$sts->rowCount();
		if(($sts->rowCount())<=0){
		}else{
			$now=date('Y-m-d');
        foreach ($result as $list){
			 $sql="SELECT kontrak.*,customer.CustomerName FROM kontrak INNER JOIN customer on kontrak.CustomerID=customer.CustomerID where (kontrak.status=1) AND (kontrak.ProductID=".$list["ID"].") and (kontrak.StartPeriode < '".$now."') and (kontrak.EndPeriode > '".$now."')   ORDER BY kontrak.EndPeriode DESC";
			 //echo $sql;
			$sts2=$this->db->prepare($sql);
			$sts2->execute();
			//$sts2->setFetchMode(PDO::FETCH_ASSOC);
			$result2 = $sts2->fetchAll();
			$mres=$sts2->rowCount();
			if ($mres>0){
			//print_r($result2);
			$mylist[]=array(
				'ID'=>$list["ID"],
				'ProductCode'=>$list["ProductCode"],
				'Address'=>$list["Address"],
				'Kota'=>$list["Kota"],
				'Area'=>$list["NamaArea"],
				'NamaJenis'=>$list["NamaJenis"],
				'Penerangan'=>$list["Penerangan"],
				'Side'=>$list["Side"],
				'Jumlah'=>$list["Jumlah"],
				'Ukuran'=>$list["Ukuran"],
				'Orientasi'=>$list["Orientasi"],
				'KontrakID'=>$result2[0]["KontrakID"],
				'NoKontrak'=>$result2[0]["NoKontrak"],
				'Nilai'=>$result2[0]["Nilai"],
				'CustomerID'=>$result2[0]["CustomerID"],
				'CustomerName'=>$result2[0]["CustomerName"],
				'StartPeriode'=>$result2[0]["StartPeriode"],
				'EndPeriode'=>$result2[0]["EndPeriode"],
				'Note'=>$result2[0]["Note"]);
			}			
		}
		
		//print_r($mylist);
		return $mylist;
		}
    }
	public function ListRecieve($id){
		
        $sts=$this->db->prepare("select * from customercontact where CustomerID='".$id."' and recieve=1");
        $sts->execute();
        $result=$sts->fetchAll();
		return $result;
    }
	public function setMailSave($data){
		$sql="INSERT INTO `aotoreport`(`ID`,`ProductID`,`CustomerID`,`Date`,`Sender`,`ExpireDate`)            
                VALUES (:id,:pid,:cid,:date,:sender,:expire)";
		
        $sts=$this->db->prepare($sql);
        $sts->execute(array(
            ':pid'=>$data['ProdID'],
			':id'=>Code::random_string(),
			':cid'=>$data['CID'],
			':date'=>$data['tgl'],
			':sender'=>$data['sender'],
			':expire'=>$data['expdate']
            ));
			print_r($sts);
    }
	public function setMailUpdate($data){
		
		$sql="Update `aotoreport` set Date=:date, Sender=:sender,ExpireDate=:expire where ID=:id";
		
        $sts=$this->db->prepare($sql);
        
		$sts->execute(array(
			':date'=>$data['tgl'],
			':id'=>$data['id'],
			':sender'=>$data['sender'],
			':expire'=>$data['expdate']
            ));
			/*
			print_r($sts);
			
			print_r(array(
            
			':date'=>$data['tgl'],
			':sender'=>$data['sender'],
			':expire'=>$data['expdate']
            ));
			*/
    }
	public function setdef(){
        $sts=$this->db->prepare("update mounlyrptimg set status=1 where ID=".$_POST['gid']);
        $sts->execute();
        
    }
	public function unsetdef(){
        $sts=$this->db->prepare("update mounlyrptimg set status=0 where ID=".$_POST['gid']);
        $sts->execute();
        echo "update mounlyrptimg set statu=0 where ID=".$_POST['gid'];
    }
	
	
	public function reportDel($id){
                
        // remove dari database         
        $sts=$this->db->prepare("Delete from aotoreport where ID='".$id."'");
        $sts->execute();
        //return $id;
    }
	public function prodlist($bln,$thn){
		$print='<div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            
                                            <th>Kode </th>
											<th>Alamat Lokasi</th>
											<th>Kota</th>
											<th>Area</th>
											<th>Jenis</th>
											<th>Penerangan</th>
											<th>Side</th>
											<th>Qty</th>
											<th>Size</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
		$sts=$this->db->prepare("select product.ID,product.ProductCode,product.Address,product.Kota,product.JenisID,product.Ukuran,product.Jumlah,product.Orientasi,product.Penerangan,product.Side, jenisproduct.NamaJenis,area.NamaArea from (product INNER JOIN jenisproduct ON product.JenisID=jenisproduct.JenisID) inner join area on area.ID=product.AreaID where  product.status=0");
        $sts->execute();
		$sts->setFetchMode(PDO::FETCH_ASSOC);
		$result=$sts->fetchAll();
		$list=$sts->rowCount();
		if(($sts->rowCount())>0){
		
		$now=date('Y-m-d');
        foreach ($result as $list){
			
			
				switch($list['Penerangan']){
					case 'N' : $Penerangan="No-Light"; break;
					case 'B' : $Penerangan= "Back Light"; break;
					case 'F' : $Penerangan= "Front Light"; break;
				} 
				$print=$print.'<tr class="odd gradeX">
				<td  nowrap><a href="'.URL.'admin/Printlist/'.$list["ID"].'|'.$bln.'-'.$thn.'" target="blank" >'.$list["ProductCode"].'</a></td>
				<td  nowrap>'.$list["Address"].'</td>
				<td  nowrap>'.$list["Kota"].'</td>
				<td  nowrap>'.$list["NamaArea"].'</td>
				<td  nowrap>'.$list["NamaJenis"].'</td>
				<td  nowrap>'.$Penerangan.'</td>
				<td  nowrap>'.$list["Side"].'</td>
				<td  nowrap>'.$list['Jumlah'].'</td>
				<td  nowrap>'.$list['Ukuran'].' - '.$list['Orientasi'].'</td>
				
			</tr>';
			
		}
		}
	
                                        
									
                                    $print=$print.'</tbody>
                                </table>
                            </div>';
		
	
		echo $print;
	}
	
	public function ListSewa($id,$sbln,$sthn){
		
        if ($sbln==1){
			$x=1;$y=6;$z=30;
			//$sql="select * from sewa where ProductID='".$id."' and StartPeriode<='".$sthn."-".$y."-".$z."' and EndPeriode>='".$sthn."-".$y."-".$z."' order by EndPeriode Desc limit 0,1";
			$sql="select * from sewa where ProductID='".$id."' order by EndPeriode Desc";
		}elseif ($sbln==2){
			$x=7;$y=12;$z=31;
			//$sql="select * from sewa where ProductID='".$id."' and StartPeriode<='".$sthn."-".$y."-".$z."' and EndPeriode>='".$sthn."-".$y."-".$z."' order by EndPeriode Desc limit 0,1";
			$sql="select * from sewa where ProductID='".$id."' order by EndPeriode Desc";
		}else{
			$sql="select * from sewa where ProductID='".$id."' order by EndPeriode Desc";
		}
			
		
		//echo $sql;
		$sts=$this->db->prepare($sql);
		$sts->execute();
		$sts->setFetchMode(PDO::FETCH_ASSOC);
		$result=$sts->fetchAll();
		return $result;
		
    }
	public function ListKontrak($id,$sbln,$sthn){
        if ($sbln==1){
			$x=1;$y=6;$z=30;
			$sql="select kontrak.*,customer.CustomerName from kontrak inner join customer on kontrak.customerID=customer.customerID where ProductID='".$id."' and StartPeriode<='".$sthn."-".$y."-".$z."' and EndPeriode>='".$sthn."-".$y."-".$z."'";
		}elseif ($sbln==2){
			$x=7;$y=12;$z=31;
			$sql="select kontrak.*,customer.CustomerName from kontrak inner join customer on kontrak.customerID=customer.customerID where ProductID='".$id."' and StartPeriode<='".$sthn."-".$y."-".$z."' and EndPeriode>='".$sthn."-".$y."-".$z."'";
		}else{
			$sql="select kontrak.*,customer.CustomerName from kontrak inner join customer on kontrak.customerID=customer.customerID where ProductID='".$id."' order by EndPeriode Desc";
		}
		
			
		
		//echo $sql.";<br>";
		$sts=$this->db->prepare($sql);
		$sts->execute();
		$sts->setFetchMode(PDO::FETCH_ASSOC);
		$result=$sts->fetchAll();return $result;
	
    }
	public function ListPrinsip($id,$sbln,$sthn){
        if ($sbln==1){
			$x=1;$y=6;$z=30;
			//$sql="select * from ijin where (ProductID='".$id."')  and StartPeriode<='".$sthn."-".$x."-01' and EndPeriode>='".$sthn."-".$y."-".$z."' and TipeIjin=1  order by EndPeriode Desc limit 0,1";
			$sql="select * from ijin where (ProductID='".$id."')  and TipeIjin=1  order by EndPeriode Desc ";
		}elseif ($sbln==1){
			$x=7;$y=12;$z=31;
			//$sql="select * from ijin where (ProductID='".$id."')  and StartPeriode<='".$sthn."-".$x."-01' and EndPeriode>='".$sthn."-".$y."-".$z."' and TipeIjin=1  order by EndPeriode Desc limit 0,1";
			$sql="select * from ijin where (ProductID='".$id."')  and TipeIjin=1  order by EndPeriode Desc ";
		}else{
			$sql="select * from ijin where (ProductID='".$id."')  and TipeIjin=1  order by EndPeriode Desc ";
		}
			
		//$sql="select * from ijin where ProductID='".$id."' and (StartPeriode between '".$sthn."-".$x."-01' and '".$sthn."-".$y."-".$z."') or (EndPeriode between '".$sthn."-".$x."-01' and '".$sthn."-".$y."-".$z."') and TipeIjin=1  order by EndPeriode Desc limit 0,1";
		
		
		//echo $sql.";<br>";
		$sts=$this->db->prepare($sql);
		$sts->execute();
		$sts->setFetchMode(PDO::FETCH_ASSOC);
		$result=$sts->fetchAll();
		return $result;
		//print_r($result);
    }
	public function ListIMBR($id,$sbln,$sthn){
        if ($sbln==1){
			$x=1;$y=6;$z=30;
			//$sql="select * from ijin where (ProductID='".$id."')  and StartPeriode<='".$sthn."-".$x."-01' and EndPeriode>='".$sthn."-".$y."-".$z."' and TipeIjin=3  order by EndPeriode Desc limit 0,1";
			$sql="select * from ijin where (ProductID='".$id."')  and TipeIjin=3  order by EndPeriode Desc ";
		}elseif ($sbln==1){
			$x=7;$y=12;$z=31;
			//$sql="select * from ijin where (ProductID='".$id."')  and StartPeriode<='".$sthn."-".$x."-01' and EndPeriode>='".$sthn."-".$y."-".$z."' and TipeIjin=3  order by EndPeriode Desc limit 0,1";
			$sql="select * from ijin where (ProductID='".$id."')  and TipeIjin=3  order by EndPeriode Desc ";
		}else{
			$sql="select * from ijin where (ProductID='".$id."')  and TipeIjin=3  order by EndPeriode Desc ";
		}
			
		//$sql="select * from ijin where ProductID='".$id."' and (StartPeriode between '".$sthn."-".$x."-01' and '".$sthn."-".$y."-".$z."') or (EndPeriode between '".$sthn."-".$x."-01' and '".$sthn."-".$y."-".$z."') and TipeIjin=1  order by EndPeriode Desc limit 0,1";
		
		
		//echo $sql.";<br>";
		$sts=$this->db->prepare($sql);
		$sts->execute();
		$sts->setFetchMode(PDO::FETCH_ASSOC);
		$result=$sts->fetchAll();
		return $result;
		//print_r($result);
    }
	public function ListReklame($id,$sbln,$sthn){
        if ($sbln==1){
			$x=1;$y=6;$z=30;
			$sql="select * from ijin where (ProductID='".$id."')  and StartPeriode<='".$sthn."-".$x."-01' and EndPeriode>='".$sthn."-".$y."-".$z."' and TipeIjin=2  order by EndPeriode Desc limit 0,1";
		}elseif ($sbln==1){
			$x=7;$y=12;$z=31;
			$sql="select * from ijin where (ProductID='".$id."')  and StartPeriode<='".$sthn."-".$x."-01' and EndPeriode>='".$sthn."-".$y."-".$z."' and TipeIjin=2  order by EndPeriode Desc limit 0,1";
		}else{
			$sql="select * from ijin where (ProductID='".$id."')  and TipeIjin=2  order by EndPeriode Desc ";
		}
			
		//$sql="select * from ijin where ProductID='".$id."' and (StartPeriode between '".$sthn."-".$x."-01' and '".$sthn."-".$y."-".$z."') or (EndPeriode between '".$sthn."-".$x."-01' and '".$sthn."-".$y."-".$z."') and TipeIjin=1  order by EndPeriode Desc limit 0,1";
		
		
		//echo $sql.";<br>";
		$sts=$this->db->prepare($sql);
		$sts->execute();
		$sts->setFetchMode(PDO::FETCH_ASSOC);
		$result=$sts->fetchAll();
		
		return $result;
		//print_r($result);
    }
	
	public function ListRptImg($id,$sbln,$sthn){
		if ($sbln==1){
			$x=1;$y=6;$z=30;
		}else{
			$x=7;$y=12;$z=31;
		}
		
		for($a=$x;$a<=$y;$a++){
			$sql="SELECT     `mounlyreport`.`Bulan`    , `mounlyreport`.`Tahun`    , `mounlyreport`.`TglFoto`    , `mounlyrptimg`.`Img`    , `mounlyrptimg`.`status` FROM     `mounlyreport`     INNER JOIN `mounlyrptimg`         ON (`mounlyreport`.`ID` = `mounlyrptimg`.`IDReport`) WHERE (`mounlyreport`.`Bulan` =".$a."  AND `mounlyreport`.`Tahun` =".$sthn." and `mounlyreport`.`ProductID` =".$id.") GROUP BY `mounlyrptimg`.`status` ORDER BY `mounlyreport`.`TglFoto` DESC, `mounlyrptimg`.`status` DESC limit 0,1;";
			//$sql="select * from ijin where ProductID='".$id."' and (StartPeriode between '".$sthn."-".$x."-01' and '".$sthn."-".$y."-".$z."') or (EndPeriode between '".$sthn."-".$x."-01' and '".$sthn."-".$y."-".$z."') and TipeIjin=1  order by EndPeriode Desc limit 0,1";
		//echo $sql.";<br>";
		$sts=$this->db->prepare($sql);
		$sts->execute();
		$sts->setFetchMode(PDO::FETCH_ASSOC);
		$co=$sts->rowCount();
		
		$result=$sts->fetchAll();
		
		foreach($result as $key=>$value){
				$data[]=array(
					'img'=>$value["Img"],
					'bln'=>$a
				);
		}
		}
		if (empty($data)){
			$data=array();
		}
			return $data;
		
		//print_r($data);
		
	}
	
	/** User **/
	public function usrlist(){
        $sts=$this->db->prepare("SELECT * FROM  `usrlogin` where Level=1 and aktif=1 ");
        $sts->execute();
		//print_r($sts->fetchAll());
		return $sts->fetchAll();
         
    }
	public function SaveUser($data){
		$sts=$this->db->prepare("INSERT INTO `usrlogin`(`id`,Username,Name,Password,Level,aktif)            
                VALUES (:id,:user,:name,:pass,1,1)");
        $sts->execute(array(
            ':id'=>$data['id'],
			':user'=>$data['user'],
			':pass'=>$data['pass'],
			':name'=>$data['name']
            ));
	}
	public function UserUpdate($data){
		
		$sts=$this->db->prepare("Update `usrlogin` set Password=:pass,Name=:name where ID=:id");
        $sts->execute(array(
            ':id'=>$data['id'],
			':pass'=>$data['pass'],
			':name'=>$data['name']
            ));
	}
	public function usrSingle($id){
        $sts=$this->db->prepare('select * from usrlogin where ID=:id');
        $sts->execute(array(
            ':id'=>$id
        ));
       
        return $sts->fetch();
    }
	public function SaveChangePass($data){
		
		$sts=$this->db->prepare("Update `usrlogin` set Password=:pass where ID=:id");
        $sts->execute(array(
            ':id'=>$data['id'],
			':pass'=>$data['pass']
            ));
	}
	public function usrPre($id){
        $sts=$this->db->prepare('select * from modul order by ID');
        $sts->execute();
        $result=$sts->fetchAll();
		foreach($result as $list){
			$sts=$this->db->prepare("select * from usrprev where IDUser='".$id."' and IDModule=".$list['ID']);
			$sts->execute();
			$emp=$sts->rowCount();
			$listst=$sts->fetch();
			if ($emp>0){
				$mylist[]=array(
					'IDM'=>$list['ID'],
					'IDU'=>$id,
					'Mname'=>$list['ModuleName'],
					'list'=>$listst['List'],
					'AddNew'=>$listst['AddNew'],
					'Changes'=>$listst['Changes'],
					'Void'=>$listst['Void'],
					'AddIMG'=>$listst['AddIMG'],
					'Kirim'=>$listst['Kirim']
				);
			}else{
				$mylist[]=array(
					'IDM'=>$list['ID'],
					
					'IDU'=>$id,
					'Mname'=>$list['ModuleName'],
					'list'=>0,
					'AddNew'=>0,
					'Changes'=>0,
					'Void'=>0,
					'AddIMG'=>0,
					'Kirim'=>0
				);
			}
		}
		//print_r($mylist);
		return $mylist;
    }
	public function DelPreV($id){                
        $sts=$this->db->prepare("Delete from usrprev where IDUser='".$id."'");
        $sts->execute();
    }
	public function SavePreV($id,$modul,$list,$add,$edt,$del,$img,$snd){
		
		$sql="INSERT INTO `usrprev`(IDUser,IDModule,List,AddNew,Changes,Void,AddIMG,Kirim)
                VALUES ('".$id."',".$modul.",".$list.",".$add.",".$edt.",".$del.",".$img.",".$snd.")";
		//echo $sql.";<br>";
		$sts=$this->db->prepare($sql);
        $sts->execute();
		
	}
	public function cindex($id){     
		if (isset($id)){
			$idx=explode("-",$id);
			if(($idx[0])!=""){
				if(($idx[1])!=""){
					$sql="select product.ID, product.ProductCode, product.Address, product.Kota, product.JenisID, product.Ukuran, product.Jumlah, product.Orientasi, product.Penerangan, product.Side, jenisproduct.NamaJenis, area.NamaArea from (product INNER JOIN jenisproduct ON product.JenisID=jenisproduct.JenisID) inner join area on area.ID=product.AreaID where (product.status=0) and (product.Kota='".$idx[0]."') and (area.NamaArea='".$idx[1]."')";
				}else{
					$sql="select product.ID, product.ProductCode, product.Address, product.Kota, product.JenisID, product.Ukuran, product.Jumlah, product.Orientasi, product.Penerangan, product.Side, jenisproduct.NamaJenis, area.NamaArea from (product INNER JOIN jenisproduct ON product.JenisID=jenisproduct.JenisID) inner join area on area.ID=product.AreaID where (product.status=0) and (product.Kota='".$idx[0]."')";
				}
			}else{
				if(($idx[1])!=""){
					$sql="select product.ID, product.ProductCode, product.Address, product.Kota, product.JenisID, product.Ukuran, product.Jumlah, product.Orientasi, product.Penerangan, product.Side, jenisproduct.NamaJenis, area.NamaArea from (product INNER JOIN jenisproduct ON product.JenisID=jenisproduct.JenisID) inner join area on area.ID=product.AreaID where (product.status=0) and (area.NamaArea='".$idx[1]."')";
				}
			}
		}else{
		$sql="select product.ID, product.ProductCode, product.Address, product.Kota, product.JenisID, product.Ukuran, product.Jumlah, product.Orientasi, product.Penerangan, product.Side, jenisproduct.NamaJenis, area.NamaArea from (product INNER JOIN jenisproduct ON product.JenisID=jenisproduct.JenisID) inner join area on area.ID=product.AreaID where product.status=0";
		}
		//echo $sql;
        $sts=$this->db->prepare($sql);
        $sts->execute();
		$sts->setFetchMode(PDO::FETCH_ASSOC);
		$result=$sts->fetchAll();
		$list=$sts->rowCount();
		if(($sts->rowCount())<=0){
		$mylist[]=array(
				'ID'=>"",
				'ProductCode'=>"",
				'Address'=>"",
				'Kota'=>"",
				'Area'=>"",
				'NamaJenis'=>"",
				'Penerangan'=>"",
				'Side'=>"",
				'Jumlah'=>"",
				'Ukuran'=>"",
				'Orientasi'=>"",
				'KontrakID'=>"",
				'NoKontrak'=>"",
				'Nilai'=>0,
				'CustomerName'=>"",
				'StartPeriode'=>"",
				'EndPeriode'=>"",
				'Note'=>"");
		return $mylist;
		}else{
			$now=date('Y-m-d');
        foreach ($result as $list){
			 $sql="SELECT kontrak.*,customer.CustomerName FROM kontrak INNER JOIN customer on kontrak.CustomerID=customer.CustomerID where (kontrak.status=1) AND (kontrak.ProductID=".$list["ID"].") and (kontrak.StartPeriode < '".$now."') and (kontrak.EndPeriode > '".$now."')   ORDER BY kontrak.EndPeriode DESC";
			 //echo $sql;
			$sts2=$this->db->prepare($sql);
			$sts2->execute();
			//$sts2->setFetchMode(PDO::FETCH_ASSOC);
			$result2 = $sts2->fetchAll();
			$mres=$sts2->rowCount();
			if ($mres>0){
			//print_r($result2);
			$mylist[]=array(
				'ID'=>$list["ID"],
				'ProductCode'=>$list["ProductCode"],
				'Address'=>$list["Address"],
				'Kota'=>$list["Kota"],
				'Area'=>$list["NamaArea"],
				'NamaJenis'=>$list["NamaJenis"],
				'Penerangan'=>$list["Penerangan"],
				'Side'=>$list["Side"],
				'Jumlah'=>$list["Jumlah"],
				'Ukuran'=>$list["Ukuran"],
				'Orientasi'=>$list["Orientasi"],
				'KontrakID'=>$result2[0]["KontrakID"],
				'NoKontrak'=>$result2[0]["NoKontrak"],
				'Nilai'=>$result2[0]["Nilai"],
				'CustomerName'=>$result2[0]["CustomerName"],
				'StartPeriode'=>$result2[0]["StartPeriode"],
				'EndPeriode'=>$result2[0]["EndPeriode"],
				'Note'=>$result2[0]["Note"]);
			}else{
				$mylist[]=array(
				'ID'=>$list["ID"],
				'ProductCode'=>$list["ProductCode"],
				'Address'=>$list["Address"],
				'Kota'=>$list["Kota"],
				'Area'=>$list["NamaArea"],
				'NamaJenis'=>$list["NamaJenis"],
				'Penerangan'=>$list["Penerangan"],
				'Side'=>$list["Side"],
				'Jumlah'=>$list["Jumlah"],
				'Ukuran'=>$list["Ukuran"],
				'Orientasi'=>$list["Orientasi"],
				'KontrakID'=>"-",
				'NoKontrak'=>"-",
				'Nilai'=>0,
				'CustomerName'=>"-",
				'StartPeriode'=>"-",
				'EndPeriode'=>"-",
				'Note'=>"");
			}
			
		}
		
		//print_r($mylist);
		return $mylist;
		}
    }
}