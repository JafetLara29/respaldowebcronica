<?php
    include_once "../Data/userdata.php";
    class UserBusiness{
        private $data;
        public function __construct(){
            $this->data = new UserData();
        }

        public function getUsers(){
            return $this->data->getUsers();
        }
        public function save($user){
            return $this->data->save($user);
        }
        public function delete($id){
            return $this->data->delete($id);
        }
        public function edit($user){
            return $this->data->edit($user);
        }
    }
?>