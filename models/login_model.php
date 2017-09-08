<?php

class Login_Model extends Model {

    public function __construct() {
        parent::__construct();
    }
    public function run(){        
        $sts=$this->db->prepare("SELECT * FROM  `usrlogin` WHERE username= :login AND PASSWORD =  :password");
        $sts->execute(array(
            ':login'=>$_POST['login'],
            ':password'=>$_POST['password']
        ));
		
        $data=$sts->fetch(PDO::FETCH_ASSOC );
        $count=$sts->rowcount();
        //echo $count;
        
		
        if($count>0){
			Session::init();
			Session::set($_POST['login'],'loggedin', true);
			Session::set($_POST['login'],'user', $data['Name']);
			Session::set($_POST['login'],'Level', $data['Level']);
			Session::set($_POST['login'],'ID', $data['ID']);
            if($data['aktif']==1){
				if($data['Level']==1){
					header('location: '.URL.'admin/index');
				}else{
					if($data['expireDate']<date("Y-m-d")){
						header('location: '.URL.'login/error/3');
					}elseif($data['expireDate']==date("Y-m-d")){
						if ($data['expiretime']>=date("H:i:s")){
							header('location: '.URL.'login/error/3');
						}else{
							header('location: '.URL.'demo/index');
						}
					}else{
						
						header('location: '.URL.'demo/index');
					}
				}
            }else{
                echo 'here2';
                header('location: '.URL.'login/error/2');
			}
        }else{            
           header('location: '.URL.'login/error/1');
           echo 'here0';
        }
        
    }
}