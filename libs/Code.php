<?php

class Code{
    public static function random_string(){
        $character_set_array = array();
        $character_set_array[] = array('count' => 4, 'characters' => 'ABCDEFGHIJKLMNOPQRSTUVWXYZ');
        $character_set_array[] = array('count' => 4, 'characters' => '0123456789');
        $temp_array = array();
        foreach ($character_set_array as $character_set) {
            for ($i = 0; $i < $character_set['count']; $i++) {
                $temp_array[] = $character_set['characters'][rand(0, strlen($character_set['characters']) - 1)];
            }
        }
        shuffle($temp_array);
        return implode('', $temp_array);
    }
    
    public static function requery($table,$field,$criteria){
        $dsn = DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME;
        $user = DB_USER;
        $password = DB_PASS;

        try {
            $dbh = new PDO($dsn, $user, $password);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
		$sqls="select ".$field." from `".$table."` where ".$criteria;
		//echo $sqls;
        $sts=$dbh->prepare($sqls);
        $sts->execute();
        return $sts->rowCount();
        
    }
    public static function GetField($table,$field,$criteria){
        $dsn = DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME;
        $user = DB_USER;
        $password = DB_PASS;

        try {
            $dbh = new PDO($dsn, $user, $password);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
        //echo "select ".$field." from `".$table."` where ".$criteria;\
        $qry="select ".$field." from `".$table."` where ".$criteria;
        //echo $qry;
        $sts=$dbh->prepare($qry);
        
        $sts->execute();
        $data=$sts->fetchAll(PDO::FETCH_ASSOC);
        return  $data[0][$field];
        //print_r($data);
        
    }
	public static function GetRecieve($id){
        $dsn = DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME;
        $user = DB_USER;
        $password = DB_PASS;

        try {
            $dbh = new PDO($dsn, $user, $password);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
        //echo "select ".$field." from `".$table."` where ".$criteria;\
        $qry="select * from customercontact where CustomerID='".$id."' and recieve=1";
        //echo $qry;
        $sts=$dbh->prepare($qry);
        
        $sts->execute();
        $data=$sts->fetchAll(PDO::FETCH_ASSOC);
        //return  $data[0][$field];
        //print_r($data);
		$list="";
		foreach($data as $key=>$value){
			$list=$list.",".$value["Name"]."[".$value["Email"]."]";
			
		}
        return $list;
    }
    public static function NoOrder(){
        switch (date("m")){
            case "01":
                $codes="A";
                break;
            case "02":
                $codes="B";
                break;
            case "03":
                $codes="C";
                break;
            case "04":
                $codes="D";
                break;
            case "05":
                $codes="E";
                break;
            case "06":
                $codes="F";
                break;
            case "07":
                $codes="G";
                break;
            case "08":
                $codes="H";
                break;
            case "09":
                $codes="I";
                break;
            case "10":
                $codes="J";
                break;
            case "11":
                $codes="K";
                break;
            case "12":
                $codes="L";
                break;
        }
        $codes=$codes.date("y").date("d");
        $character_set_array = array();
        $character_set_array[] = array('count' => 2, 'characters' => 'ABCDEFGHIJKLMNOPQRSTUVWXYZ');
        $character_set_array[] = array('count' => 3, 'characters' => '0123456789');
        $temp_array = array();
        foreach ($character_set_array as $character_set) {
            for ($i = 0; $i < $character_set['count']; $i++) {
                $temp_array[] = $character_set['characters'][rand(0, strlen($character_set['characters']) - 1)];
            }
        }
        shuffle($temp_array);
        $codes=$codes.(implode('', $temp_array));
        return $codes;
    }
}

