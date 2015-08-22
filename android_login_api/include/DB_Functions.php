<?php

class DB_Functions {

    private $db;

    //put your code here
    // constructor
    function __construct() {
        require_once 'DB_Connect.php';
        // connecting to database
        $this->db = new DB_Connect();
        $this->db->connect();
    }

    // destructor
    function __destruct() {
        
    }

    /**
     * Get user by email and password
     */
    public function getUserByEmailAndPassword($email, $password, $type) {
        $result = mysql_query("SELECT * FROM user_login WHERE u_email = '$email'") or die(mysql_error());
        // check for result 
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            $result = mysql_fetch_array($result);
            
            // check for password equality
            if ($result['u_email']==$email && $result['u_password']==$password && $result['u_type']==$type) {
                // user authentication details are correct
                return $result;
            }
        } else {
            // user not found
            return false;
        }
    }

    public function fetchApp($uid) {
        $date = date('Y-m-d');
        $result = mysql_query("SELECT da.book_date, da.start_time, da.services_name, apd.app_fname FROM doc_appointment as da, app_details as apd WHERE da.id_appdetails= apd.id and da.id_doctor= '$uid' and da.book_date = '$date'") or die(mysql_error());
        // check for result 
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            $emparray[] = array();
            while ($row = mysql_fetch_array($result)) {
                $emparray[] = $row;
            };
            return $emparray;
        } else {
            // user not found
            return false;
        }
    }
    public function fetchPres($uid) {
        $result = mysql_query("SELECT med_name, dose, freq FROM prescription_med WHERE patient_id = '$uid'") or die(mysql_error());
        // check for result 
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            $emparray[] = array();
            while ($row = mysql_fetch_array($result)) {
                $emparray[] = $row;
            };
            return $emparray;
        } else {
            // user not found
            return false;
        }
    }
    public function fetchTest($uid) {
        $result = mysql_query("SELECT name, notes FROM prescription_test WHERE patient_id = '$uid'") or die(mysql_error());
        // check for result 
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            $emparray[] = array();
            while ($row = mysql_fetch_array($result)) {
                $emparray[] = $row;
            };
            return $emparray;
        } else {
            // user not found
            return false;
        }
    }
    public function fetchTime($uid) {
        $result = mysql_query("SELECT Max(id), book_date, start_time FROM doc_appointment where id_patient ='$uid' order by book_date") or die(mysql_error());
        // check for result 
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            $emparray[] = array();
            while ($row = mysql_fetch_array($result)) {
                $emparray[] = $row;
            };
            return $emparray;
        } else {
            // user not found
            return false;
        }
    }

}

?>
