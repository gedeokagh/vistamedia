<?php

class admin extends Controllers{
    function __construct() {
        parent::__construct();
        Session::init();
        $loggin =  Session::get('loggedin');
        $typeID =  Session::get('Level');
		$LoginID =  Session::get('ID');
        if($loggin == FALSE){
            Session::destroy();
            header('location: '.URL.'login');
            exit;            
        }
        if($typeID<>1){
            header('location: '.URL);
        }
             
    }
    function index(){
		
		$this->view->prolist=$this->model->prolist();
        $this->view->render('admin/index');
    }
    function logout(){
        Session::destroy();
        header('location: ../login');
        exit;
    }
	
	public function ProductView($id){
		$this->view->id=$id;
        $this->view->ProductView=$this->model->ProductView($id);
        $this->view->render('admin/ProductView');
    }
	
    /*** Property category */
    public function property_category(){
        $this->view->catlist=$this->model->catlist();
        
        $this->view->render('admin/property_category');
    }
	public function AddCategory(){
        $this->view->catlist=$this->model->catlist();
        
        $this->view->render('admin/AddCategory');
    }
	public function savecat(){
        $data=array();
        $data['cat']=$_POST['cat'];
        
        $this->model->savecat($data);
        header('location: '.URL.'admin/property_category');
    }
    public function EditCat($id){
        $this->view->CatSingle=$this->model->CatSingle($id);
        $this->view->render('admin/EditCat');
    }
	public function UpdCat($id){
        $data=array();
        $data['cat']=$_POST['cat'];
        $data['id']=$id;
        $this->model->UpdCat($data);
        header('location: '.URL.'admin/property_category');
    }
	public function CatDel($id){
        $this->model->CatDel($id);
		header('location: '.URL.'admin/property_category');
    }
	
	/*** area */
    public function area(){
        $this->view->areaList=$this->model->arealist();
        
        $this->view->render('admin/area');
    }
	public function areaAdd(){
        $this->view->arealist=$this->model->arealist();
        
        $this->view->render('admin/areaAdd');
    }
	public function areaSave(){
        $data=array();
        $data['cat']=$_POST['cat'];
        
        $this->model->areaSave($data);
        header('location: '.URL.'admin/area');
    }
    public function areaEdit($id){
        $this->view->areaSingle=$this->model->areaSingle($id);
        $this->view->render('admin/areaEdit');
    }
	public function UpdArea($id){
        $data=array();
        $data['cat']=$_POST['cat'];
        $data['id']=$id;
        $this->model->UpdArea($data);
        header('location: '.URL.'admin/area');
    }
	public function areaDel($id){
        $this->model->areaDel($id);
		header('location: '.URL.'admin/area');
    }
	/** Property **/
	public function Property_List(){
        $this->view->propertylist=$this->model->propertylist();
        
        $this->view->render('admin/Property_List');
    }
	public function AddProperty(){
		$this->view->catlist=$this->model->catlist();
		$this->view->arealist=$this->model->arealist();
        $this->view->render('admin/AddProperty');
    }
	public function saveprod(){
        $data=array();
        $data['kode']=$_POST['kode'];
		$data['alamat']=$_POST['alamat'];
		$data['kota']=$_POST['kota'];
		$data['lat']=$_POST['lat'];
		$data['longs']=$_POST['longs'];
		$data['cat']=$_POST['cat'];
		$data['ukuran']=$_POST['ukuran'];
		$data['Jumlah']=$_POST['Jumlah'];
		$data['Orientasi']=$_POST['Orientasi'];
		$data['Penerangan']=$_POST['Penerangan'];
		$data['Rute']=$_POST['Rute'];
		$data['AreaID']=$_POST['area'];
		$data['Akses']=$_POST['Akses'];
		$data['side']=$_POST['side'];
		$data['Jpanjang']=$_POST['Jpanjang'];
		$data['Kecepatan']=$_POST['Kecepatan'];
		$data['Kawasan']=$_POST['Kawasan'];
		$data['Keterangan']=$_POST['Keterangan'];
        $this->model->saveprod($data);
        header('location: '.URL.'admin/Property_List');
    }
	public function editProd($id){
        $this->view->ProdSingle=$this->model->ProdSingle($id);
		$this->view->catlist=$this->model->catlist();
		$this->view->arealist=$this->model->arealist();
        $this->view->render('admin/PropertyEdit');
    }
	public function UpdateProd($id){
        $data=array();
        $data['kode']=$_POST['kode'];
		$data['alamat']=$_POST['alamat'];
		$data['kota']=$_POST['kota'];
		$data['lat']=$_POST['lat'];
		$data['longs']=$_POST['longs'];
		$data['cat']=$_POST['cat'];
		$data['ukuran']=$_POST['ukuran'];
		$data['Jumlah']=$_POST['Jumlah'];
		$data['Orientasi']=$_POST['Orientasi'];
		$data['Penerangan']=$_POST['Penerangan'];
		$data['Rute']=$_POST['Rute'];
		$data['Akses']=$_POST['Akses'];
		$data['side']=$_POST['side'];
		$data['Jpanjang']=$_POST['Jpanjang'];
		$data['Kecepatan']=$_POST['Kecepatan'];
		$data['Kawasan']=$_POST['Kawasan'];
		$data['Keterangan']=$_POST['Keterangan'];
		$data['AreaID']=$_POST['area'];
		$data['ID']=$id;
        $this->model->ProdUpdate($data);
        header('location: '.URL.'admin/Property_List');
    }
	public function delprod(){
		$id=$_POST["gid"];
		echo  $id;
        $this->model->delprod($id);
    }
	/**** Profile Image ****/
	public function ProdGallery($id = false){
        if($id<>""){			
			if (isset($_FILES['files'])){
				$error="";
				$fileext=strtolower(end(explode('.',$_FILES['files']['name'])));
				$ext=array("jpeg","jpg","png","gif");
				if(in_array($fileext,$ext)===false){
					$this->view->name=$_POST["name"];
					$this->view->note=$_POST["note"];
					$this->view->err="Harap Upload File Gambar";
					$this->view->GalList=$this->model->GalList($id);
					$this->view->msg=code::GetField('product','ProductCode','ID='.$id);
					$this->view->render('admin/ProdGallery');
				}else{
				$this->model->Upload($id);
				$this->view->GalList=$this->model->GalList($id);
				$this->view->msg=code::GetField('product','ProductCode','ID='.$id);
				
				$this->view->render('admin/ProdGallery');
				}
			}else{
				$this->view->GalList=$this->model->GalList($id);
				$this->view->msg=code::GetField('product','ProductCode','ID='.$id);
				
				$this->view->render('admin/ProdGallery');
			}
        }else{
			header('location: '.URL.'admin/Property_List');
        }
    }
	public function setdefault(){
        $this->model->setdefault();
    }
	public function proddelgal(){
        $this->model->proddelgal();
    }
	public function defaultimg(){
        $this->view->propertylist=$this->model->propertylist();
        $this->view->render('admin/property_img');
    }
	
	
	public function GalList($id){
        $sts=$this->db->prepare("SELECT * FROM profileg where ProfileID='".$id."'");
        $sts->execute();
        return $sts->fetchAll();
    }
	
	/*** Customer **/
	public function CustomerList(){
        $this->view->customerlist=$this->model->customerlist();
        $this->view->render('admin/CustomerList');
    }
	public function CustomerAdd(){
        $this->view->render('admin/CustomerAdd');
    }
	public function saveCostumer(){
        $data=array();
        $data['nama']=$_POST['nama'];
		$data['alamat']=$_POST['alamat'];
		$data['phone']=$_POST['phone'];
		$data['email']=$_POST['email'];
		$data['contact']=$_POST['contact'];
        
        $this->model->saveCustomer($data);
        header('location: '.URL.'admin/CustomerList');
    }
	public function editCostumer($id){
        $this->view->CostumerSingle=$this->model->CostumerSingle($id);
        $this->view->render('admin/CustomerEdit');
    }
	public function UpdCostumer($id){
        $data=array();
        $data['nama']=$_POST['nama'];
		$data['alamat']=$_POST['alamat'];
		$data['phone']=$_POST['phone'];
		$data['email']=$_POST['email'];
		$data['contact']=$_POST['contact'];
        $data['id']=$id;
        $this->model->UpdCostumer($data);
        header('location: '.URL.'admin/CustomerList');
    }
	public function ContactList($id){
		$this->view->id=$id;
        $this->view->contactlist=$this->model->contactlist($id);
        $this->view->render('admin/ContactList');
    }
	public function ContactAdd($id){
		$this->view->id=$id;
        $this->view->render('admin/ContactAdd');
    }
	public function saveContact($id){
        $data=array();
        $data['nama']=$_POST['nama'];
		$data['alamat']=$_POST['alamat'];
		$data['phone']=$_POST['phone'];
		$data['email']=$_POST['email'];
		$data['recieve']=$_POST['recieve'];
		$data['id']=$id;
        
        $this->model->saveContact($data);
        header('location: '.URL.'admin/ContactList/'.$id);
    }
	public function editContact($id){
		$nID=explode("-",$id);
		$this->view->id=$nID[0];
        $this->view->ContactSingle=$this->model->ContactSingle($nID[1]);
        $this->view->render('admin/ContactEdit');
    }
	public function UpdContact($id){
        $data=array();
        $data['nama']=$_POST['nama'];
		$data['alamat']=$_POST['alamat'];
		$data['phone']=$_POST['phone'];
		$data['email']=$_POST['email'];
		$data['recieve']=$_POST['recieve'];
        $data['id']=$id;		
        $this->model->UpdContact($data);
        header('location: '.URL.'admin/ContactList/'.$_POST['CID']);
    }
	
	/** Kontrak **/
	
	public function KontrakList(){
		
        $this->view->KontrakList=$this->model->KontrakList();
        $this->view->render('admin/KontrakList');
    }
	public function KontrakAdd(){
		$this->view->propertylist=$this->model->propertylist();
		$this->view->customerlist=$this->model->customerlist();
        $this->view->render('admin/KontrakAdd');
    }
	public function KontrakAdds($id){
		$this->view->propertylist=$this->model->ProdSingle($id);
		$this->view->customerlist=$this->model->customerlist();
        $this->view->render('admin/KontrakAdds');
    }
	public function saveKontrak(){
		$tanggal=explode("/",$_POST['tanggal']);
		$start=explode("/",$_POST['start']);
		$end=explode("/",$_POST['end']);
        $data=array();
        $data['no']=$_POST['no'];
		$data['prod']=$_POST['prod'];
		$data['cat']=$_POST['cat'];
		$data['tanggal']=$tanggal[2]."-".$tanggal[0]."-".$tanggal[1];
		$data['nilai']=$_POST['nilai'];
		$data['start']=$start[2]."-".$start[0]."-".$start[1];
		$data['end']=$end[2]."-".$end[0]."-".$end[1];
        $data['note']=$_POST['note'];
		$data['id']=$_POST['id'];
        $this->model->saveKontrak($data);
        ///header('location: '.URL.'admin/KontrakList');
		header('location: '.URL.'admin/UploadImgKontrak/'.$data["id"]);
    }
	public function UploadImgKontrak($id){
		
		if($id<>""){			
			
			if (isset($_FILES['files'])){
				$error="";
				$fileext=strtolower(end(explode('.',$_FILES['files']['name'])));
				$ext=array("jpeg","jpg","png","gif");
				if(in_array($fileext,$ext)===false){
					$this->view->err="Harap Upload File Gambar";
					
					$this->view->msg="Kontrak No. ".Code::GetField("kontrak","NoKontrak","KontrakID='".$id."'");
					
					$this->view->GalList=$this->model->ImgKontrak($id);
					$this->view->render('admin/UploadImgKontrak');
				}else{
					$this->model->UpKontrak($id);
					$this->view->msg="Kontrak No. ".Code::GetField("kontrak","NoKontrak","KontrakID='".$id."'");
					
					$this->view->GalList=$this->model->ImgKontrak($id);
					$this->view->render('admin/UploadImgKontrak');
				}
			}else{
				$this->view->msg="Kontrak No. ".Code::GetField("kontrak","NoKontrak","KontrakID='".$id."'");
				$this->view->GalList=$this->model->ImgKontrak($id);
				$this->view->render('admin/UploadImgKontrak');
			}
        }else{
			header('location: '.URL.'admin/');
        }	
		
    }
	public function delupkontrak(){
		$id=$_POST["gid"];
        $this->model->delupkontrak($id);
    }
	
	public function editKontrak($id){
		$idx=explode("-",$id);
		$this->view->idx=$id;
		$this->view->ids=$idx[0];
		if(isset($idx[1])){
		$this->view->sts=$idx[1];
		
		}
		$this->view->propertylist=$this->model->propertylist();
		$this->view->customerlist=$this->model->customerlist();
        $this->view->KontrakSingle=$this->model->KontrakSingle($idx[0]);
        $this->view->render('admin/KontrakEdit');
    }
	public function UpdKontrak($id){
		$idx=explode("-",$id);
        $tanggal=explode("/",$_POST['tanggal']);
		$start=explode("/",$_POST['start']);
		$end=explode("/",$_POST['end']);
        $data=array();
        $data['no']=$_POST['no'];
		$data['prod']=$_POST['prod'];
		$data['cat']=$_POST['cat'];
		$data['tanggal']=$tanggal[2]."-".$tanggal[0]."-".$tanggal[1];
		$data['nilai']=$_POST['nilai'];
		$data['start']=$start[2]."-".$start[0]."-".$start[1];
		$data['end']=$end[2]."-".$end[0]."-".$end[1];
        $data['note']=$_POST['note'];
        $data['id']=$idx[0];		
        $this->model->UpdKontrak($data);
		$ids=code::GetField("kontrak","ProductID","KontrakID='".$idx[0]."'");
		if(isset($idx[1])){
			header('location: '.URL.'admin/dtlKontrak/'.$ids.'-'.$idx[1]);	
		}else{
			header('location: '.URL.'admin/KontrakList');
		}
        
    }
	public function DelKontrak($id){
		$idx=explode("-",$id);
		$ids=code::GetField("kontrak","ProductID","KontrakID='".$idx[0]."'");
		$this->model->DelKontrak($idx[0]);
		if(isset($idx[1])){
			header('location: '.URL.'admin/dtlKontrak/'.$ids.'-'.$idx[1]);	
		}else{
			header('location: '.URL.'admin/KontrakList');
		}
        
    }
	public function dtlKontrak($id){
		$idx=explode("-",$id);
		$this->view->Title=$this->model->ProdSingle($idx[0]);
		$this->view->Status=$idx[1];
		//$ids=Code::GetField("sewa","ProductID","ID='".$idx[0]."'");
        $this->view->ListKontrak=$this->model->ListKontrak($idx[0],"ALL","ALL");
        $this->view->render('admin/printkontrak');
    }
	/** IjinPrinsip **/
	
	public function IjinPrinsipList(){
		
        $this->view->IjinPrinsipList=$this->model->IjinPrinsipList();
        $this->view->render('admin/IjinPrinsipList');
    }
	public function IjinPrinsipAdd(){
		$this->view->propertylist=$this->model->propertylist();
		$this->view->customerlist=$this->model->customerlist();
        $this->view->render('admin/IjinPrinsipAdd');
    }
	public function IjinPrinsipAdds($id){
		$this->view->propertylist=$this->model->prosingle($id);
		$this->view->customerlist=$this->model->customerlist();
        $this->view->render('admin/IjinPrinsipAdds');
    }
	public function saveIjinPrinsip(){
		$tanggal=explode("/",$_POST['tanggal']);
		$start=explode("/",$_POST['start']);
		$end=explode("/",$_POST['end']);
        $data=array();
        $data['no']=$_POST['no'];
		$data['id']=$_POST['id'];
		$data['prod']=$_POST['prod'];
		//$data['cat']=$_POST['cat'];
		$data['tanggal']=$tanggal[2]."-".$tanggal[0]."-".$tanggal[1];
		//$data['nilai']=$_POST['nilai'];
		$data['start']=$start[2]."-".$start[0]."-".$start[1];
		$data['end']=$end[2]."-".$end[0]."-".$end[1];
        $data['note']=$_POST['note'];
        $this->model->saveIjinPrinsip($data);
        header('location: '.URL.'admin/UploadImgPrinsip/'.$data["id"]);
    }
	public function UploadImgPrinsip($id){
		
		if($id<>""){			
			
			if (isset($_FILES['files'])){
				$error="";
				$fileext=strtolower(end(explode('.',$_FILES['files']['name'])));
				$ext=array("jpeg","jpg","png","gif");
				if(in_array($fileext,$ext)===false){
					$this->view->err="Harap Upload File Gambar";
					$tipe=Code::GetField("ijin","TipeIjin","ID='".$id."'");
					switch ($tipe){
						case "1": $tipes="Ijin Prinsip No :";break;
						case "2": $tipes="Ijin Reklame No :";break;
						case "3": $tipes="IMBR No :";break;
					}
					$this->view->msg=$tipes." ".Code::GetField("ijin","NoIjin","ID='".$id."'");
					$this->view->tipe=$tipe;
					$this->view->GalList=$this->model->ImgIjin($id);
					$this->view->render('admin/UploadImgPrinsip');
				}else{
					$this->model->UploadIMG($id);
					$tipe=Code::GetField("ijin","TipeIjin","ID='".$id."'");
					switch ($tipe){
						case "1": $tipes="Ijin Prinsip No :";break;
						case "2": $tipes="Ijin Reklame No :";break;
						case "3": $tipes="IMBR No :";break;
					}
					$this->view->msg=$tipes." ".Code::GetField("ijin","NoIjin","ID='".$id."'");
					$this->view->tipe=$tipe;
					$this->view->GalList=$this->model->ImgIjin($id);
					$this->view->render('admin/UploadImgPrinsip');
				}
			}else{
				$tipe=Code::GetField("ijin","TipeIjin","ID='".$id."'");
				switch ($tipe){
					case "1": $tipes="Ijin Prinsip No :";break;
					case "2": $tipes="Ijin Reklame No :";break;
					case "3": $tipes="IMBR No :";break;
				}
				$this->view->msg=$tipes." ".Code::GetField("ijin","NoIjin","ID='".$id."'");
				$this->view->tipe=$tipe;
				$this->view->GalList=$this->model->ImgIjin($id);
				$this->view->render('admin/UploadImgPrinsip');
			}
        }else{
			header('location: '.URL.'admin/');
        }
		
		
		
    }
	
	public function deluploadImg(){
		$id=$_POST["gid"];
        $this->model->deluploadImg($id);
    }
	
	public function editIjinPrinsip($id){
		$idx=explode("-",$id);
		$this->view->idx=$id;
		$this->view->ids=$idx[0];
		if(isset($idx[1])){
		$this->view->sts=$idx[1];
		
		}
		$this->view->propertylist=$this->model->propertylist();
        $this->view->IjinPrinsipSingle=$this->model->IjinPrinsipSingle($idx[0]);
        $this->view->render('admin/IjinPrinsipEdit');
    }
	public function UpdIjinPrinsip($id){
		$idx=explode("-",$id);
        $tanggal=explode("/",$_POST['tanggal']);
		$start=explode("/",$_POST['start']);
		$end=explode("/",$_POST['end']);
        $data=array();
        $data['no']=$_POST['no'];
		$data['prod']=$_POST['prod'];
		$data['tanggal']=$tanggal[2]."-".$tanggal[0]."-".$tanggal[1];
		//$data['nilai']=$_POST['nilai'];
		$data['start']=$start[2]."-".$start[0]."-".$start[1];
		$data['end']=$end[2]."-".$end[0]."-".$end[1];
        $data['note']=$_POST['note'];
        $data['id']=$idx[0];		
        $this->model->UpdIjinPrinsip($data);
		$ids=code::GetField("ijin","ProductID","ID='".$idx[0]."'");
		if($idx[1]=="1"){
		header('location: '.URL.'admin/ListIjin/'.$ids.'-'.$idx[1]);	
		}else{
        header('location: '.URL.'admin/IjinPrinsipList');
		}
		
    }
	public function DeleteIjinPrinsip($id){
		$idx=explode("-",$id);
        
		$ids=Code::GetField("ijin","ProductID","ID='".$idx[0]."'");
		//echo $ids;
		
		if($idx[1]=="1"){
			$this->model->DeleteIjinPrinsip($idx[0]);
		header('location: '.URL.'admin/ListIjin/'.$ids.'-'.$idx[1]);	
		}else{
			$this->model->DeleteIjinPrinsip($idx[0]);
		header('location: '.URL.'admin/IjinPrinsipList');
		}
		
    }
	
	
	/** IjinReklame **/
	
	public function IjinreklameList(){
		
        $this->view->IjinreklameList=$this->model->IjinreklameList();
        $this->view->render('admin/IjinreklameList');
    }
	public function IjinreklameAdd(){
		$this->view->propertylist=$this->model->propertylist();
        $this->view->render('admin/IjinreklameAdd');
    }
	public function IjinreklameAdds($id){
		$this->view->propertylist=$this->model->ProdSingle($id);
        $this->view->render('admin/IjinreklameAdds');
    }
	public function saveIjinreklame(){
		$tanggal=explode("/",$_POST['tanggal']);
		$start=explode("/",$_POST['start']);
		$end=explode("/",$_POST['end']);
        $data=array();
        $data['no']=$_POST['no'];
		$data['prod']=$_POST['prod'];
		
		$data['tanggal']=$tanggal[2]."-".$tanggal[0]."-".$tanggal[1];
		
		$data['start']=$start[2]."-".$start[0]."-".$start[1];
		$data['end']=$end[2]."-".$end[0]."-".$end[1];
        $data['note']=$_POST['note'];
		$data['id']=$_POST['id'];	
        $this->model->saveIjinreklame($data);
        //header('location: '.URL.'admin/IjinreklameList');
		header('location: '.URL.'admin/UploadImgPrinsip/'.$data["id"]);
    }
	public function editIjinreklame($id){
		$idx=explode("-",$id);
		$this->view->idx=$id;
		$this->view->ids=$idx[0];
		if(isset($idx[1])){
		$this->view->sts=$idx[1];
		}
		$this->view->propertylist=$this->model->propertylist();
        $this->view->IjinreklameSingle=$this->model->IjinreklameSingle($idx[0]);
        $this->view->render('admin/IjinreklameEdit');
    }
	public function UpdIjinreklame($id){
        $tanggal=explode("/",$_POST['tanggal']);
		$start=explode("/",$_POST['start']);
		$end=explode("/",$_POST['end']);
        $data=array();
        $data['no']=$_POST['no'];
		$data['prod']=$_POST['prod'];
		$data['tanggal']=$tanggal[2]."-".$tanggal[0]."-".$tanggal[1];
		//$data['nilai']=$_POST['nilai'];
		$data['start']=$start[2]."-".$start[0]."-".$start[1];
		$data['end']=$end[2]."-".$end[0]."-".$end[1];
        $data['note']=$_POST['note'];
		$idx=explode("-",$id);
        $data['id']=$idx[0];		
        $this->model->UpdIjinreklame($data);
		$ids=code::GetField("ijin","ProductID","ID='".$idx[0]."'");
		if($idx[1]=="2"){
			header('location: '.URL.'admin/ListIjin/'.$ids.'-'.$idx[1]);	
		}else{
			header('location: '.URL.'admin/IjinReklameList');
		}
    }
	public function DeleteIjinReklame($id){
		$idx=explode("-",$id);
		$ids=Code::GetField("ijin","ProductID","ID='".$idx[0]."'");
		if($idx[1]=="2"){
        $this->model->DeleteIjinReklame($idx[0]);
		header('location: '.URL.'admin/ListIjin/'.$ids.'-'.$idx[1]);	
		}else{
			$this->model->DeleteIjinReklame($idx[0]);
		header('location: '.URL.'admin/IjinReklameList');
		}
    }
	
	/** IjinIMBR **/
	
	public function IMBRList(){
		
        $this->view->IMBRList=$this->model->IMBRList();
        $this->view->render('admin/IMBRList');
    }
	public function IMBRAdd(){
		$this->view->propertylist=$this->model->propertylist();
        $this->view->render('admin/IMBRAdd');
    }
	public function IMBRAdds($id){
		$this->view->propertylist=$this->model->ProdSingle($id);
        $this->view->render('admin/IMBRAdds');
    }
	public function saveIMBR(){
		$tanggal=explode("/",$_POST['tanggal']);
		$start=explode("/",$_POST['start']);
		$end=explode("/",$_POST['end']);
        $data=array();
        $data['no']=$_POST['no'];
		$data['prod']=$_POST['prod'];
		//$data['cat']=$_POST['cat'];
		$data['tanggal']=$tanggal[2]."-".$tanggal[0]."-".$tanggal[1];
		//$data['nilai']=$_POST['nilai'];
		$data['start']=$start[2]."-".$start[0]."-".$start[1];
		$data['end']=$end[2]."-".$end[0]."-".$end[1];
        $data['note']=$_POST['note'];
		$data['id']=$_POST['id'];
        $this->model->saveIMBR($data);
        //header('location: '.URL.'admin/IMBRList');
		header('location: '.URL.'admin/UploadImgPrinsip/'.$data["id"]);
    }
	public function editIMBR($id){
		$idx=explode("-",$id);
		$this->view->idx=$id;
		$this->view->ids=$idx[0];
		if(isset($idx[1])){
		$this->view->sts=$idx[1];
		}
		$this->view->propertylist=$this->model->propertylist();
        $this->view->IMBRSingle=$this->model->IMBRSingle($idx[0]);
        $this->view->render('admin/IMBREdit');
    }
	public function UpdIMBR($id){
        $tanggal=explode("/",$_POST['tanggal']);
		$start=explode("/",$_POST['start']);
		$end=explode("/",$_POST['end']);
        $data=array();
        $data['no']=$_POST['no'];
		$data['prod']=$_POST['prod'];
		$data['tanggal']=$tanggal[2]."-".$tanggal[0]."-".$tanggal[1];
		$data['nilai']=$_POST['nilai'];
		$data['start']=$start[2]."-".$start[0]."-".$start[1];
		$data['end']=$end[2]."-".$end[0]."-".$end[1];
        $data['note']=$_POST['note'];
		$idx=explode("-",$id);
        $data['id']=$idx[0];		
        $this->model->UpdIMBR($data);
		$ids=code::GetField("ijin","ProductID","ID='".$idx[0]."'");
		if($idx[1]=="3"){
			header('location: '.URL.'admin/ListIjin/'.$ids.'-'.$idx[1]);	
		}else{
			header('location: '.URL.'admin/IMBRList');
		}
    }
	public function DeleteIMBR($id){
		$idx=explode("-",$id);
		$ids=Code::GetField("ijin","ProductID","ID='".$idx[0]."'");
		if($idx[1]=="3"){
        $this->model->DeleteIMBR($idx[0]);
		header('location: '.URL.'admin/ListIjin/'.$ids.'-'.$idx[1]);	
		}else{
			$this->model->DeleteIMBR($idx[0]);
		header('location: '.URL.'admin/IMBRList');
		}
    }
	/**  Ijin List/History **/
	public function ListIjin($id){
		$idx=explode("-",$id);
		switch($idx[1]){
			case "1":
			$this->view->Ijin="Ijin Prinsip";
			break;
			case "2":
			$this->view->Ijin="Ijin Reklame";
			break;
			case "3":
			$this->view->Ijin="IMBR";
			break;
		}
		//echo $idx[0];
		$this->view->Title=$this->model->ProdSingle($idx[0]);
		$this->view->Status=$idx[1];
        $this->view->IjinList=$this->model->IjinList($idx[0],$idx[1]);
        $this->view->render('admin/listijin');
    }
	/** Sewa **/
	
	public function SewaList(){
		
        $this->view->SewaList=$this->model->SewaList();
        $this->view->render('admin/SewaList');
    }
	public function SewaAdd(){
		$this->view->propertylist=$this->model->propertylist();
        $this->view->render('admin/SewaAdd');
    }
	public function SewaAdds($id){
		$this->view->propertylist=$this->model->ProdSingle($id);
        $this->view->render('admin/SewaAdds');
    }
	public function saveSewa(){
		$tanggal=explode("/",$_POST['tanggal']);
		$start=explode("/",$_POST['start']);
		$end=explode("/",$_POST['end']);
        $data=array();
        $data['no']=$_POST['no'];
		$data['prod']=$_POST['prod'];
		$data['kontak']=$_POST['kontak'];
		$data['ktp']=$_POST['ktp'];
		$data['hp']=$_POST['hp'];
		$data['tanggal']=$tanggal[2]."-".$tanggal[0]."-".$tanggal[1];
		$data['nilai']=$_POST['nilai'];
		$data['start']=$start[2]."-".$start[0]."-".$start[1];
		$data['end']=$end[2]."-".$end[0]."-".$end[1];
        $data['note']=$_POST['note'];
		$data['id']=$_POST['id'];
        $this->model->saveSewa($data);
        header('location: '.URL.'admin/UploadImgSewa/'.$data["id"]);
    }
	
	public function UploadImgSewa($id){
		
		if($id<>""){			
			
			if (isset($_FILES['files'])){
				$error="";
				$fileext=strtolower(end(explode('.',$_FILES['files']['name'])));
				$ext=array("jpeg","jpg","png","gif");
				if(in_array($fileext,$ext)===false){
					$this->view->err="Harap Upload File Gambar";
					
					$this->view->msg="Sewa No. ".Code::GetField("sewa","NoPerjanjian","ID='".$id."'");
					
					$this->view->GalList=$this->model->ImgSewa($id);
					$this->view->render('admin/UploadImgSewa');
				}else{
					$this->model->UpSewa($id);
					$this->view->msg="Sewa No. ".Code::GetField("sewa","NoPerjanjian","ID='".$id."'");
					$this->view->GalList=$this->model->ImgSewa($id);
					$this->view->render('admin/UploadImgSewa');
				}
			}else{
				$this->view->msg="Sewa No. ".Code::GetField("sewa","NoPerjanjian","ID='".$id."'");
				$this->view->GalList=$this->model->ImgSewa($id);
				$this->view->render('admin/UploadImgSewa');
			}
        }else{
			header('location: '.URL.'admin/');
        }
		
    }
	public function delupsewa(){
		$id=$_POST["gid"];
        $this->model->delupsewa($id);
    }
	public function editSewa($id){
		$idx=explode("-",$id);
		$this->view->idx=$id;
		$this->view->ids=$idx[0];
		if(isset($idx[1])){
		$this->view->sts=$idx[1];
		}
		$this->view->propertylist=$this->model->propertylist();
        $this->view->SewaSingle=$this->model->SewaSingle($idx[0]);
        $this->view->render('admin/SewaEdit');
    }
	public function UpdSewa($id){
        $tanggal=explode("/",$_POST['tanggal']);
		$start=explode("/",$_POST['start']);
		$end=explode("/",$_POST['end']);
        $data=array();
        $data['no']=$_POST['no'];
		$data['id']=$id;
		$data['prod']=$_POST['prod'];
		$data['kontak']=$_POST['kontak'];
		$data['ktp']=$_POST['ktp'];
		$data['hp']=$_POST['hp'];
		$data['tanggal']=$tanggal[2]."-".$tanggal[0]."-".$tanggal[1];
		$data['harga']=$_POST['harga'];
		$data['start']=$start[2]."-".$start[0]."-".$start[1];
		$data['end']=$end[2]."-".$end[0]."-".$end[1];
        $data['note']=$_POST['note'];
		$idx=explode("-",$id);
        $data['id']=$idx[0];		
		$ids=code::GetField("sewa","ProductID","ID='".$idx[0]."'");
        $this->model->UpdSewa($data);
		
        if(isset($idx[1])){
			header('location: '.URL.'admin/dtlSewa/'.$ids.'-'.$idx[1]);	
		}else{
			header('location: '.URL.'admin/SewaList');
		}
		
    }
	public function dtlSewa($id){
		$idx=explode("-",$id);
		$this->view->Title=$this->model->ProdSingle($idx[0]);
		$this->view->Status=$idx[1];
		//$ids=Code::GetField("sewa","ProductID","ID='".$idx[0]."'");
        $this->view->ListSewa=$this->model->ListSewa($idx[0],"ALL","ALL");
        $this->view->render('admin/printsewa');
    }
	public function DeleteSewa($id){
		$idx=explode("-",$id);
		$ids=Code::GetField("sewa","ProductID","ID='".$idx[0]."'");
		if(isset($idx[1])){
			$this->model->DeleteSewa($idx[0]);
			header('location: '.URL.'admin/dtlSewa/'.$ids.'-'.$idx[1]);	
		}else{
			$this->model->DeleteSewa($idx[0]);
			header('location: '.URL.'admin/SewaList');
		}
    }
	
	/***  Kirim Lokasi ***/
	public function kirimlokasi(){
		$this->view->Kirim=$this->model->listkirim("2");
		$this->view->render('admin/kirimlokasi');
	}
	public function kirimlokasiAdd(){
		$this->view->freeProperty=$this->model->freeProperty();
		$this->view->setsender=$this->model->setsender();
		$this->view->render('admin/kirimlokasiAdd');
	}
	public function kirimlEdit($id){
		$this->view->freeProperty=$this->model->freeProperty();
		$this->view->setsender=$this->model->setsender();
		$this->view->Single=$this->model->SingleSend($id);
		$this->view->render('admin/kirimlokasiEdit');
	}
	public function vresend($id){
		$this->view->freeProperty=$this->model->freeProperty();
		$this->view->setsender=$this->model->setsender();
		$this->view->Single=$this->model->SingleSend($id);
		$this->view->render('admin/kirimvresend');
	}
	public function savekirimlokasi(){
		$data=array();
		$data["ID"]=$_POST["ID"];
		$data["user"]=$_POST["user"];
		$data["pass"]=$_POST["pass"];
		$data["send"]=$_POST["mailto"];
		$data["subject"]=$_POST["subject"];
		$data["expiretime"]=$_POST["time"];
		$tanggal=explode("/",$_POST['tanggal']);
		$data["exiredate"]=$tanggal[2]."-".$tanggal[0]."-".$tanggal[1];
		$data["note"]=$_POST["note"];
		$list="";
		for($i=1;$i<$_POST["ci"];$i++){
			if(isset($_POST["ch".$i])){
			$list=$list.",".$_POST["ch".$i];
			}
		}
		//echo $list;
		$data["list"]=$list;
		$data["opt"]=$_POST["opt"];
		$data["sender"]=$_POST["opt"]."-".Code::GetField("settinglokasi","emailfrom","ID=".$_POST["opt"]);
		$data["froms"]=Code::GetField("settinglokasi","emailfrom","ID=".$_POST["opt"]);
		$this->model->sendMail($data);
        
	}
	public function Updkirimlokasi(){
		$data=array();
		$data["ID"]=$_POST["ID"];
		$data["user"]=$_POST["user"];
		$data["pass"]=$_POST["pass"];
		$data["send"]=$_POST["mailto"];
		$data["subject"]=$_POST["subject"];
		$data["expiretime"]=$_POST["time"];
		$tanggal=explode("/",$_POST['tanggal']);
		$data["exiredate"]=$tanggal[2]."-".$tanggal[0]."-".$tanggal[1];
		$data["note"]=$_POST["note"];
		$list="";
		for($i=1;$i<$_POST["ci"];$i++){
			if(isset($_POST["ch".$i])){
			$list=$list.",".$_POST["ch".$i];
			}
		}
		//echo $list;
		$data["list"]=$list;
		$data["opt"]=$_POST["opt"];
		$data["sender"]=$_POST["opt"]."-".Code::GetField("settinglokasi","emailfrom","ID=".$_POST["opt"]);
		$data["froms"]=Code::GetField("settinglokasi","emailfrom","ID=".$_POST["opt"]);
		$this->model->UpdMail($data);
        
	}
	
	public function resend($id){
		
		$this->model->resendMail($id);
        header('location: '.URL.'admin/kirimlokasi');
	}
	
	/*** Upload Dokumentasi ***/
	public function updock(){
		$this->view->prolist=$this->model->prolistx();
		$this->view->render('admin/updock');
	}
	public function updockAdd($id){
		
		if(isset($id) || $id!=""){
		$this->view->prolist=$this->model->prosingle($id);
		$this->view->prolistkon=$this->model->prosinglekontrak($id);
		$this->view->render('admin/updockadd');
		}else{
			header('location: '.URL.'admin/updock');
		}
	}
	public function updockimg($id){
		
		if(isset($id) || $id!=""){
			$id=explode("-",$id);
		//$this->view->prolist=$this->model->prosingle($id[1]);
		$tgltayang=explode("/",$_POST['tgltayang']);
		$tglfoto=explode("/",$_POST['tglfoto']);
		
		$data=array();
		$data["id"]=$id[1];
		$data["pid"]=$id[0];
		$data["cid"]=$_POST["cid"];
		$data["tgltayang"]=$tgltayang[2]."-".$tgltayang[0]."-".$tgltayang[1];
		$data["tglfoto"]=$tglfoto[2]."-".$tglfoto[0]."-".$tglfoto[1];
		$data["tglupload"]=$_POST["tglupload"];
		$data["tema"]=$_POST["tema"];
		$data["pemasang"]=$_POST["pemasang"];
		$this->model->SMateri($data);
		//$this->view->render('admin/updockimg');
		header('location: '.URL.'admin/updockUimg/'.$data["pid"]);
		}else{
			header('location: '.URL.'admin/updock');
		}
	}
	public function updockUimg($id = false){
        if($id<>""){			
			$ids=code::GetField('materi','ProductID',"ID='".$id."'");
			//echo $ids;
			if (isset($_FILES['files'])){
				$error="";
				$fileext=strtolower(end(explode('.',$_FILES['files']['name'])));
				$ext=array("jpeg","jpg","png","gif");
				if(in_array($fileext,$ext)===false){
					$this->view->err="Harap Upload File Gambar";
					$this->view->msg=code::GetField('product','ProductCode','ID='.$ids);
					$this->view->GalList=$this->model->ImgMateriList($id);
					$this->view->render('admin/updockimg');
				}else{
				$this->model->UploadMateri($id);
				$this->view->msg=code::GetField('product','ProductCode','ID='.$ids);
				$this->view->GalList=$this->model->ImgMateriList($id);
				$this->view->render('admin/updockimg');
				}
			}else{
				$this->view->GalList=$this->model->ImgMateriList($id);
				$this->view->msg=code::GetField('product','ProductCode','ID='.$ids);
				$this->view->render('admin/updockimg');
			}
        }else{
			header('location: '.URL.'admin/updocklist');
        }
    }
	
	public function updockimgdel(){
        $this->model->updockimgdel();
    }
	public function setkirim(){
        $this->model->setkirim();
    }
	public function unsetkirim(){
        $this->model->unsetkirim();
    }
	public function kirimlDel($id){
        $this->model->kirimlDel($id);
		header('location: '.URL.'admin/kirimlokasi');
    }
	
	public function updocklist(){
		$this->view->sendx="false";
		$this->view->prolist=$this->model->updocklist();
		$this->view->render('admin/updocklist');
	}
	/*** Kirim Dokumentasi ***/
	public function Senddock(){
		$this->view->prolist=$this->model->updocklist();
		$this->view->render('admin/updocklist');
	}
	
	public function updockmail(){
		$id=$_POST["gid"];
        $this->model->updockmail($id);
    }
	
	public function viewSenddock($id){
		
		$this->view->ListImg=$this->model->ListImg($id);
		$contact=Code::GetField("materi","CustomerID","ID='".$id."'");
		echo $contact;
		$this->view->ListContact=$this->model->ListContact($contact);
		$prod=Code::GetField("materi","ProductID","ID='".$id."'");
		
		$this->view->prolist=$this->model->prosingle($prod);
		$this->view->prosinglekontrak=$this->model->prosinglekontrak($prod);
		$this->view->setsender=$this->model->setsender();
		$this->view->Single=$this->model->SingleMateri($id);
		$this->view->render('admin/viewSenddock');
	}
	public function SendDockView(){
		$data=array();
		$data["ID"]=$_POST["nomateri"];
		$data["CID"]=$_POST["cid"];
		$data["tglfoto"]=$_POST["tglfoto"];
		
		$data["tgltayang"]=$_POST["tgltayang"];
		$data["tema"]=$_POST["tema"];
		
		$list="";
		for($i=1;$i<$_POST["ci"];$i++){
			if(isset($_POST["ch".$i])){
			$list=$list.",".$_POST["ch".$i];
			}
		}
		$to="";
		for($x=1;$x<$_POST["emx"];$x++){
			if(isset($_POST["em".$x])){
			$to=$to.",".$_POST["em".$x];
			}
		}
		$data["to"]=$to;
		$data["list"]=$list;
		$data["lokasi"]=$_POST["lokasi"];
		$data["sender"]=$_POST["opt"]."-".Code::GetField("settinglokasi","emailfrom","ID=".$_POST["opt"]);
		$data["froms"]=Code::GetField("settinglokasi","emailfrom","ID=".$_POST["opt"]);
		$this->model->updockmail($data);
        
		//print_r($data);
	}
	
	/*** Set Report ***/
	public function uprpt(){
		$this->view->prolist=$this->model->prolistx();
		$this->view->render('admin/uprpt');
	}
	public function uprptAdd($id){
		
		if(isset($id) || $id!=""){
		$this->view->prolist=$this->model->prosinglef($id);
		$this->view->render('admin/uprptAdd');
		}else{
			header('location: '.URL.'admin/uprpt');
		}
	}
	public function uprptimg($id){
		
		if(isset($id) || $id!=""){
			$id=explode("-",$id);
		//$this->view->prolist=$this->model->prosingle($id[1]);
		
		$tglfoto=explode("/",$_POST['tglfoto']);
		
		
		$data=array();
		$data["id"]=$id[1];
		$data["pid"]=$id[0];
		$data["cid"]=$_POST["cid"];
		$data["tglfoto"]=$tglfoto[2]."-".$tglfoto[0]."-".$tglfoto[1];
		$data["tglupload"]=$_POST["tglupload"];
		$data["bulan"]=$_POST["bulan"];
		$data["tahun"]=$_POST["tahun"];
		$data["note"]=$_POST["note"];
		$this->model->SRpt($data);
		//$this->view->render('admin/updockimg');
		header('location: '.URL.'admin/uprptUimg/'.$data["pid"]);
		}else{
			header('location: '.URL.'admin/uprpt');
		}
	}
	public function uprptUimg($id = false){
        if($id<>""){			
			$ids=code::GetField('mounlyreport','ProductID',"ID='".$id."'");
			//echo $ids;
			if (isset($_FILES['files'])){
				$error="";
				$fileext=strtolower(end(explode('.',$_FILES['files']['name'])));
				$ext=array("jpeg","jpg","png","gif");
				if(in_array($fileext,$ext)===false){
					$this->view->err="Harap Upload File Gambar";
					$this->view->msg=code::GetField('product','ProductCode','ID='.$ids);
					$this->view->GalList=$this->model->ImgRptList($id);
					$this->view->render('admin/uprptimg');
				}else{
				$this->model->UploadRpt($id);
				$this->view->msg=code::GetField('product','ProductCode','ID='.$ids);
				$this->view->GalList=$this->model->ImgRptList($id);
				$this->view->render('admin/uprptimg');
				}
			}else{
				$this->view->GalList=$this->model->ImgRptList($id);
				$this->view->msg=code::GetField('product','ProductCode','ID='.$ids);
				$this->view->render('admin/uprptimg');
			}
        }else{
			header('location: '.URL.'admin/uprptlist');
        }
    }
	
	public function rptimgdel(){
		$id=$_POST["gid"];
        $this->model->rptimgdel($id);
    }
	
	public function listrpt(){
		if(isset($_GET["bulan"])){
		$bln=$_GET["bulan"];}
		if(isset($_GET["tahun"])){
		$thn=$_GET["tahun"];}
		$this->view->sendx="false";
		if (isset($bln) && isset($thn)){
			$this->view->bln=$bln;
			$this->view->thn=$thn;
		//$this->view->prolist=$this->model->rptfilter($bln,$thn);
		$this->view->prolist=$this->model->listrpt($bln,$thn);;
		}else{
		$this->view->prolist=array();
		}
		$this->view->render('admin/listrpt');
	}
	public function rptfilter(){
		$bln=$_GET["bln"];
		$thn=$_GET["thn"];
        $this->model->rptfilter($bln,$thn);
    }
	public function rptedit($id){
		$idx=explode("-",$id);
		//echo $idx[0];
		$this->view->bln=$idx[1];
		$this->view->thn=$idx[2];
		$this->view->prolist=$this->model->rptSingle($idx[0]);
		$this->view->render('admin/uprptEdit');
	}
	public function rptdel($id){
		$idx=explode("-",$id);
        $this->model->rptdel($idx[0]);
		header('location: '.URL.'admin/listrpt?bulan='.$idx[1].'&tahun='.$idx[2]);
    }
	public function setdef(){
        $this->model->setdef();
    }
	public function unsetdef(){
        $this->model->unsetdef();
    }
	public function rptUpdate($id){
		
		if(isset($id) || $id!=""){
			echo $id;
			$id=explode("-",$id);
		//$this->view->prolist=$this->model->prosingle($id[1]);
		
		$tglfoto=explode("/",$_POST['tglfoto']);
		
		
		$data=array();
		$data["id"]=$id[1];
		$data["pid"]=$id[0];
		$data["cid"]=$_POST["cid"];
		$data["tglfoto"]=$tglfoto[2]."-".$tglfoto[0]."-".$tglfoto[1];
		$data["tglupload"]=$_POST["tglupload"];
		$data["bulan"]=$_POST["bulan"];
		$data["tahun"]=$_POST["tahun"];
		$data["note"]=$_POST["note"];
		$this->model->URpt($data);
		//$this->view->render('admin/updockimg');
		header('location: '.URL.'admin/listrpt?bulan='.$id[2].'&tahun='.$id[3]);
		}else{
			header('location: '.URL.'admin/listrpt');
		}
	}
	
	
	public function reportset(){
		
		$this->view->prolist=$this->model->setMailList();
		$this->view->render('admin/listsetmail');
	}
	public function setMailList(){
		
		$this->view->prolist=$this->model->setProKon();
		$this->view->render('admin/setProd');
	}
	
	public function setMailAdd($id){
		
		if(isset($id) || $id!=""){
			$this->view->idx=$id;
			$ids=explode("|",$id);
			$this->view->prolist=$this->model->prosingle($ids[0]);				
			$this->view->setsender=$this->model->setsender();
			$this->view->ListContact=$this->model->ListRecieve($ids[1]);
			$this->view->render('admin/setProdAdd');
		}else{
			header('location: '.URL.'admin/reportset');
		}
	}
	public function reportEdit($id){
		
		if(isset($id) || $id!=""){
			$this->view->lst=explode("|",Code::GetField('aotoreport','Date',"ID='".$id."'"));
			$prod=Code::GetField('aotoreport','ProductID',"ID='".$id."'");
			$cst=Code::GetField('aotoreport','CustomerID',"ID='".$id."'");
			$exp=Code::GetField('aotoreport','ExpireDate',"ID='".$id."'");
			$sender=explode("-",Code::GetField('aotoreport','Sender',"ID='".$id."'"));
			$this->view->sender=$sender[0];
			$this->view->expdate=$exp;
			$this->view->id=$id;
			$this->view->prolist=$this->model->prosingle($prod);				
			$this->view->setsender=$this->model->setsender();
			$this->view->ListContact=$this->model->ListRecieve($cst);
			$this->view->render('admin/setProdEdit');
		}else{
			header('location: '.URL.'admin/reportset');
		}
	}
	public function reportDel($id){
			$this->model->reportDel($id);				
			header('location: '.URL.'admin/reportset');
	}
	public function sendMailSave(){
		$id=$_POST["idx"];
		$idx=explode("|",$id);
		$data=array();
		$data["ProdID"]=$idx[0];
		$data["CID"]=$idx[1];
		$data["expdate"]=$idx[2];
		
		$date="";
		for($i=1;$i<=31;$i++){
			if(isset($_POST["tgl".$i])){
			$date=$date."|".$_POST["tgl".$i];
			}
		}
		$to="";
		
		$data["tgl"]=$date;
		
		$data["sender"]=$_POST["opt"]."-".Code::GetField("settinglokasi","emailfrom","ID=".$_POST["opt"]);
		//$data["froms"]=Code::GetField("settinglokasi","emailfrom","ID=".$_POST["opt"]);
		$this->model->setMailSave($data);
		//print_r($data);
		header('location: '.URL.'admin/reportset');
	}
	public function sendMailUpdate(){
		
		$data=array();
		$date="";
		for($i=1;$i<=31;$i++){
			if(isset($_POST["tgl".$i])){
			$date=$date."|".$_POST["tgl".$i];
			}
		}
		//$to="";
		
		$data["tgl"]=$date;
		$data["expdate"]=$_POST["expdate"];
		$data["id"]=$_POST["id"];
		
		$data["sender"]=$_POST["opt"]."-".Code::GetField("settinglokasi","emailfrom","ID=".$_POST["opt"]);
		//$data["froms"]=Code::GetField("settinglokasi","emailfrom","ID=".$_POST["opt"]);
		$this->model->setMailUpdate($data);
		//print_r($data);
		header('location: '.URL.'admin/reportset');
	}
	public function printrpt(){
		$this->view->render('admin/printrpt');
	}
	public function prodlist(){
		$bln=$_POST["bln"];
		$thn=$_POST["thn"];
		$this->model->prodlist($bln,$thn);
	}
	public function Printlist($id){
		
		$idx=explode("|",$id);
		$pid=$idx[0];
		$idxx=explode("-",$idx[1]);
		$sbln=$idxx[0];
		$sthn=$idxx[1];
		//echo $pid.",".$sbln.",".$sthn;
		$this->view->Title=$this->model->ProdSingle($pid);
		$this->view->ListSewa=$this->model->ListSewa($pid,$sbln,$sthn);
		$this->view->ListPrinsip=$this->model->ListPrinsip($pid,$sbln,$sthn);
		$this->view->ListKontrak=$this->model->ListKontrak($pid,$sbln,$sthn);
		$this->view->ListRptImg=$this->model->ListRptImg($pid,$sbln,$sthn);
		$this->view->render('admin/printlist');
	}
	public function PrintHistory($id){
		/*
		$idx=explode("|",$id);
		$pid=$idx[0];
		$idxx=explode("-",$idx[1]);
		$sbln=$idxx[0];
		$sthn=$idxx[1];
		*/
		//echo $pid.",".$sbln.",".$sthn;
		$this->view->Title=$this->model->ProdSingle($id);
		$this->view->ListSewa=$this->model->ListSewa($id,"All","All");
		$this->view->ListPrinsip=$this->model->ListPrinsip($id,"All","All");
		$this->view->ListKontrak=$this->model->ListKontrak($id,"All","All");
		$this->view->ListIMBR=$this->model->ListIMBR($id,"All","All");
		$this->view->ListReklame=$this->model->ListReklame($id,"All","All");
		$this->view->render('admin/printHistory');
	}
	public function UserList(){
		$this->view->usrList=$this->model->usrlist();
		$this->view->render('admin/UserList');
	}
	public function UserAdd(){
		
		$this->view->render('admin/UserAdd');
	}
	public function UserSave(){
		$data=array();
        $data['user']=$_POST['user'];
		$data['pass']=$_POST['pass'];
		$data['name']=$_POST['name'];
		$data['id']=$_POST['id'];
        $this->model->SaveUser($data);
        header('location: '.URL.'admin/UserList');
	}
	public function UserEdit($id){
        $this->view->UserSingle=$this->model->usrSingle($id);
        $this->view->render('admin/UserEdit');
    }
	public function UserUpdate($id){
        $data=array();
        $data['pass']=$_POST['pass'];
		$data['name']=$_POST['name'];
        $data['id']=$id;
        $this->model->UserUpdate($data);
        header('location: '.URL.'admin/UserList');
    }
	public function ChangePass($id){
		$this->view->Single=$this->model->UsrSingle($id);
		$this->view->render('admin/ChangePass');
	}
	public function SaveChangePass(){
		$data=array();
        
		$data['pass']=$_POST['pass'];
		
		$data['id']=$_POST['id'];
        $this->model->SaveChangePass($data);
        header('location: '.URL.'admin/UserList');
	}
	public function UserPre($id){
		$this->view->usrList=$this->model->usrPre($id);
		$this->view->total=Code::requery('modul','0',"1=1");
		$this->view->id=$id;
		$this->view->aName=Code::GetField('usrlogin','Name',"ID='".$id."'");
		$this->view->render('admin/UserPre');
	}
	public function SavePre(){
		$id=$_POST["id"];
		$total=$_POST["total"];
		
		$this->model->DelPreV($id);
		for ($i=1;$i<=$total;$i++){
			$modul=$i;
			$x=0;
			//echo $_POST[$i."-add"];
			if (isset($_POST[$i."-lst"])){
				$list=1;
				$x=$x+1;
			}else{$list=0;}
			if (isset($_POST[$i."-add"])){
				$add=1;
				$list=1;
				$x=$x+1;
			}else{$add=0;}
			if (isset($_POST[$i."-edt"])){
				$edt=1;
				$x=$x+1;
				$list=1;
			}else{$edt=0;}
			if (isset($_POST[$i."-del"])){
				$del=1;
				$list=1;
				$x=$x+1;
			}else{$del=0;}
			if (isset($_POST[$i."-img"])){
				$img=1;
				$list=1;
				$x=$x+1;
			}else{$img=0;}
			if (isset($_POST[$i."-snd"])){
				$snd=1;
				$list=1;
				$x=$x+1;
			}else{$snd=0;}
			//echo "==>".$x;
			if ($x>0){
				echo $id.",".$modul.",".$list.",".$add.",".$edt.",".$del.",".$img.",".$snd."<br>";
				$this->model->SavePreV($id,$modul,$list,$add,$edt,$del,$img,$snd);
			}
		}
		header('location: '.URL.'admin/UserList');
	}
	public function cindex($id){
		$this->view->cindex=$this->model->cindex($id);
		$this->view->render('admin/cindex');
	}
	public function cIjinPrinsipList($id){
		$this->view->IjinPrinsipList=$this->model->IjinPrinsipList($id);
		$this->view->render('admin/cIjinPrinsipList');
	}
	public function cIjinreklameList($id){
		$this->view->IjinreklameList=$this->model->IjinreklameList($id);
		$this->view->render('admin/cIjinreklameList');
	}
	public function cIMBRList($id){
		$this->view->IMBRList=$this->model->IMBRList($id);
		$this->view->render('admin/cIMBRList');
	}
	public function cKontrakList($id){
		$this->view->KontrakList=$this->model->KontrakList($id);
		$this->view->render('admin/cKontrakList');
	}
	public function cSewaList($id){
		$this->view->SewaList=$this->model->SewaList($id);
		$this->view->render('admin/cSewaList');
	}
	public function exportPDF(){
		$this->view->freeProperty=$this->model->freeProperty();
		$this->view->render('admin/setPro');
	}
	public function listPDF(){
		$ci=$_POST['ci'];
		$xi="";
		for ($i=1;$i<=$ci;$i++){
			if(isset($_POST['ch'.$i])){
				$xi=$xi.$_POST['ch'.$i]."-";
			}
		}
		//echo $xi;
		$this->view->listPro=$this->model->ProductViewx($xi);
		$this->view->render('admin/vProd');
	}
}
