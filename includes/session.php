<?php
class Session {
    
    private $logged_in = false;
    public $id;
    private $message;
    function __construct() {
        session_start();
        $this->check_message();
        $this->check_login();
        if($this->logged_in){
            
        }
        else {
            
        }
    }
    public function is_logged_in() {
        return $this->logged_in;
    }
    
    
    private function check_message() {
        if(isset($_SESSION['message'])) {
            $this->message = $_SESSION['message'];
            unset($_SESSION['message']);
        }
        else {
            $this->message = "";
        }
    }
    
    public function message($msg="") {
        if(!empty($msg)) {
            $_SESSION['message'] = $msg;
        }
        else {
            return $this->message;
        }
    }
    
    public function login($user) {
        if($user) {
            $this->id = $_SESSION['id'] = $user->id;
            $this->logged_in = true;
        }
    }
    function logout() {
        unset($_SESSION['id']);
        unset($this->id);
        unset($_SESSION['items']);
        $this->logged_in = false;
    }
    
    private function check_login() {
        if(isset($_SESSION['id'])) {
            $this->id = $_SESSION['id'];
            $this->logged_in = true;
        }
        else {
            unset($this->id);
            $this->logged_in = false;
        }
    }
}
$session = new Session;
$message = $session->message();
?>