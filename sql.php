<?php
// reikia includint kartu su config failu !!!
class mysql{
	
	protected static $connection;
	
public static function connect() {
        // Try and connect to the database
		if(!isset(self::$cosnnection)) {
            self::$connection = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
			
			if(self::$connection !== false) {
				// try to set mysql connection character set to UTF-8
				if (!mysql::$connection->set_charset("utf8")) {
					printf("Error loading character set");
				}
			} else {
				// Handle error - notify administrator, log to a file, show an error screen, etc.
				return false;
			}
        }
        return self::$connection;
    }
	
	public static function query($query) {
        // Connect to the database
        $connection = mysql::connect();
        
        // Query the database
        $result = $connection->query($query);
		
        return $result;
    }

    public static function select($query) {
        $rows = array();
        $result = mysql::query($query);
        if($result === false) {
            return false;
        }
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }
}