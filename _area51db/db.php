<?php
/**
 * Created by Aaron C. Schafer.
 * User: aaron
 * Date: 4/18/2018
 * Time: 12:50 PM
 */

if (isset($db_secure) && $db_secure) {
    class Db {
        // TODO: Add ability to use transactions (i.e. beginTransaction, commit)
        protected static $dbConnection;

        /**
         * connect to db
         *
         * @return bool false on failure / mysqli MySQLi object instance on success
         */
        public function connect() {
            // try to connect to db
            if (!isset(self::$dbConnection)) {
                // load config as array
                // use location of config file
                $config = parse_ini_file('config.ini');
                self::$dbConnection = new mysqli(
                    $config['host'],
                    $config['username'],
                    $config['password'],
                    $config['dbname']);
            }

            if (self::$dbConnection === false) {
                // TODO: Handle error by notifying admin(s) / developer(s), log to a file, show user friendly error screen, etc.
                return false;
            }

            return self::$dbConnection;
        }

        /**
         * query db
         *
         * @param $query - the query string
         * @return mixed - the result of the mysqli::query() function
         */
        public function query($query) {
            // connect to db
            $connection = $this -> connect();

            // query db
            $result = $connection -> query($query);

            return $result;
        }

        /**
         * select array of rows from db
         *
         * @param $query - the query string
         * @return bool - false on failure / array of db rows on success
         */
        public function select($query) {
            $rows = array();
            $result = $this -> query($query);
            if($result === false) {
                return false;
            }

            while($row = $result -> fetch_assoc()) {
                $rows[] = $row;
            }

            return $rows;
        }

        /**
         * select array of rows from db
         *
         * @param $query - the query string
         * @return bool - false on failure / array of db rows on success
         */
        public function insert($query) {
            $rows = array();
            $result = $this -> query($query);
            if($result === false) {
                return false;
            }

            while($row = $result -> fetch_assoc()) {
                $rows[] = $row;
            }

            return $rows || false;
        }

        // TODO: Add functionality to insert and delete

        /**
         * get last error from db
         *
         * @return string - db error message
         */
        public function error() {
            $connection = $this -> connect();
            return $connection -> error;
        }

        /**
         * quote and escape value for use in db
         *
         * @param string $value - the value to be quoted and escaped
         * @return string - the quoted and escaped string
         */
        public function quote($value) {
            $connection = $this -> connect();
            return "'" . $connection -> real_escape_string($value) . "'";
        }
    }
} else {
    include('./models/models.php');

    $models = new \PhpSample\Models\Models();

    header('Location: '.$models->Text()->Common()->URL());
}

