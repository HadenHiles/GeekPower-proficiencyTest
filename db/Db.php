<?php

//DB connection definitions
define('DB_HOST', 'localhost');
define('DB_NAME', 'geek_power');
define('DB_USER', 'root');
define('DB_PASS', 'root');

class DB {
    protected static $instance = null; //DB instance variable
    protected function __construct() {}

    /**
     * @return null|PDO
     * Retrieve a database connection instance
     */
    public static function instance() {
        if (self::$instance === null) {
            $connectionString = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;
            self::$instance = new PDO($connectionString, DB_USER, DB_PASS);
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$instance;
    }

    /**
     * @param $method
     * @param $args
     * @return mixed
     * Execute various PDO methods using DB::<method>
     */
    public static function __callStatic($method, $args)
    {
        return call_user_func_array(array(self::instance(), $method), $args);
    }

    /**
     * @param $sql
     * @param array $bindParams Ex. array(':id' => $id, ':title' => $title)
     * @return PDOStatement
     * Execute the passed in sql string with optional bind parameters and return a PDO statement for further action
     */
    public static function run($sql, $bindParams = array()) {
        $stmt = self::instance()->prepare($sql);
        if($stmt->execute($bindParams)) {
            return $stmt;
        }
        return false;
    }
}