<?php
    include_once "../Data/yomequejodata.php";
    class YoMeQuejoBusiness{
        private $data;
        public function __construct(){
            $this->data = new YoMeQuejoData();
        }

        public function getAllWaiting(){
            return $this->data->getAllWaiting();
        }
        public function getAllAccepted(){
            return $this->data->getAllAccepted();
        }
        public function save($queja){
            return $this->data->save($queja);
        }
        public function accept($id){
            return $this->data->accept($id);
        }
        public function reject($id){
            return $this->data->reject($id);
        }
    }
?>