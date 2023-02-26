<?php
    if(file_exists("../Data/categorydata.php")){
        include_once "../Data/categorydata.php";
    }else{
        include_once "./Data/categorydata.php";
    }

    class CategoryBusiness{
        private $data;
        public function __construct(){
            $this->data = new CategoryData();
        }

        public function getAll(){
            return $this->data->getAll();
        }
        public function getNameById($id){
            return $this->data->getNameById($id);
        }
        public function save($category){
            return $this->data->save($category);
        }
        public function edit($category){
            return $this->data->edit($category);
        }
        public function delete($id){
            return $this->data->delete($id);
        }

    }
?>