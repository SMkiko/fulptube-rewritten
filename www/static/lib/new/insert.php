<?php
/**
 * Use this to insert data for users.
 *
 * Blah blah blah blah.
 *
 * @copyright  FulpTube
 * @since      Class available since FulpTube backend rewrite 5/9/21
 */ 
class user_insert_utils {
    public $conn;
    function initialize_db_var($conn) {
        $this->conn = $conn;    
    }

    function initialize_server_vars($server) {
        $this->server = $server;    
    }

    function register($username, $email, $hashedpassword) {
        $stmt = $this->conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $hashedpassword);
        $stmt->execute();
        $stmt->close();
        return true;
    }
    
    function validateCaptcha($privatekey, $response) {
        $responseData = json_decode(file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$privatekey.'&response='.$response));
        return $responseData->success;
    }
}

/**
 * Use this to insert data for videos.
 *
 * Blah blah blah blah.
 *
 * @copyright  FulpTube
 * @since      Class available since FulpTube backend rewrite 5/9/21
 */ 
class video_insert_utils {
    public $conn;
    function initialize_db_var($conn) {
        $this->conn = $conn;    
    }

    function initialize_server_vars($server) {
        $this->server = $server;    
    }
}
?>