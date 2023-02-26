<?php
    include_once "../Data/logindata.php";
    class LoginBusiness{
        private $data;
        public function __construct(){
            $this->data = new LoginData();
        }

        public function validate($username, $password){
            return $this->data->validate($username, $password);
        }

    }
?>