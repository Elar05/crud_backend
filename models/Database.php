<?php
class Database
{
    public static $con;
    public static $db;

    public static $servername = 'localhost';
    public static $username = 'root';
    public static $ddbb = "pruebas";
    public static $password = "";
    public static $conn ;

    public function connect(){
        $con = new mysqli(self::$servername, self::$username, self::$password, self::$ddbb);
        $con->set_charset("utf8");
        return $con;
    }

    public static function getCon()
    {
        if (self::$con == null && self::$db == null) {
            self::$db = new Database();
            self::$con = self::$db->connect();
        }
        return self::$con;
    }

    public static function doit($sql){
		$con = self::getCon();
        return array($con->query($sql),$con->insert_id,$con->error);
	}
    
    public static function getAll() {
        $sql = "select * from clientes";
        $query = self::doit($sql);
        // return Model::many($query[0], new BancospData());
        return $query;
    }

    public static function many($query,$aclass){
		$cnt = 0;
		$array = array();

		while($r = $query->fetch_array()){
			$array[$cnt] = new $aclass;
			$cnt2=1;
			foreach ($r as $key => $v) {
				if($cnt2>0 && $cnt2%2==0){
					$array[$cnt]->$key = $v;
				}
				$cnt2++;
			}
			$cnt++;
		}
		return $array;
	}
}
