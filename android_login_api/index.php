<?php

/**
 * File to handle all API requests
 * Accepts GET and POST
 * 
 * Each request will be identified by TAG
 * Response will be JSON data
 *
 * check for POST request 
 */
if (isset($_GET['tag']) && $_GET['tag'] != '') {
    // get tag
    $tag = $_GET['tag'];

    // include db handler
    require_once 'include/DB_Functions.php';
    $db = new DB_Functions();

    // response Array
    $response = array("tag" => $tag, "error" => FALSE);

    // check for tag type
    if ($tag == 'login') {
        // Request type is check Login
        $email = $_GET['email'];
        $password = md5($_GET['password']);
        $type = $_GET['type'];

        // check for user
        $user = $db->getUserByEmailAndPassword($email, $password, $type);
        if ($user != false) {
            // user found
            $response["error"] = FALSE;
            $response["uid"] = $user["uid"];
            $response["name"] = $user["u_name"];
            $response["email"] = $user["u_email"];
            $response["type"] = $user["u_type"];
            echo json_encode($response);
        } else {
            // user not found
            // echo json with error = 1
            $response["error"] = TRUE;
            $response["error_msg"] = "Incorrect email or password!";
            echo json_encode($response);
        }
    }elseif($tag == 'fetchApp'){
        $uid = $_GET['uid'];
        $doctor = $db->fetchApp($uid);
        
        if($doctor != false){
            $response["error"] = FALSE;
            $response["response"] = $doctor;
            echo json_encode($response);
        }
    }elseif($tag == 'fetchPres'){
        $uid = $_GET['uid'];
        $doctor = $db->fetchPres($uid);
        
        if($doctor != false){
            $response["error"] = FALSE;
            $response["response"] = $doctor;
            echo json_encode($response);
        }
    }elseif($tag == 'fetchTest'){
        $uid = $_GET['uid'];
        $doctor = $db->fetchTest($uid);
        
        if($doctor != false){
            $response["error"] = FALSE;
            $response["response"] = $doctor;
            echo json_encode($response);
        }
    }elseif($tag == 'fetchTime'){
        $uid = $_GET['uid'];
        $doctor = $db->fetchTime($uid);
        
        if($doctor != false){
            $response["error"] = FALSE;
            $response["response"] = $doctor;
            echo json_encode($response);
        }
    }else {
        // user failed to store
        $response["error"] = TRUE;
        $response["error_msg"] = "Unknown 'tag' value. It should be either 'login' or 'register'";
        echo json_encode($response);
    }
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameter 'tag' is missing!";
    echo json_encode($response);
}
?>
