<?php
    if(file_exists("../Data/filedata.php")){
        include_once "../Data/filedata.php";
    }else{
        include_once "./Data/filedata.php";
    }

    class FileBusiness{
        private $data;
        public function __construct(){
            $this->data = new FileData();
        }

        public function getAll(){
            return $this->data->getAll();
        }
        public function edit($id, $name, $type, $file){
            return $this->data->edit($id, $name, $type, $file);
        }
        public function getByNewsId($newId){
            return $this->data->getByNewsId($newId);
        }
        public function getById($id){
            return $this->data->getById($id);
        }
        public function save($name, $type, $file){
            return $this->data->save($name, $type, $file);
        }
        public function saveFromEdit($name, $type, $file, $id){
            return $this->data->saveFromEdit($name, $type, $file, $id);
        }
        public function delete($id){
            return $this->data->delete($id);
        }

    }
?>