<?php
    include_once "../Data/addata.php";
    class AdBusiness{
        private $data;
        public function __construct(){
            $this->data = new AdData();
        }

        public function getAll(){
            return $this->data->getAll();
        }
        public function save($ad){
            return $this->data->save($ad);
        }
        public function edit($ad, $option){
            return $this->data->edit($ad, $option);
        }
        public function getImageById($id){
            return $this->data->getImageById($id);
        }
        public function delete($id){
            return $this->data->delete($id);
        }
    }
?>