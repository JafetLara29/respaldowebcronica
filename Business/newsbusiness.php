<?php
    if (file_exists("../Data/newsdata.php")) {
        include_once "../Data/newsdata.php";
    }else{
        include_once "./Data/newsdata.php";
    }
    class NewsBusiness{
        private $data;
        public function __construct(){
            $this->data = new NewsData();
        }

        public function getAll(){
            return $this->data->getAll();
        }
        public function getLastTen(){
            return $this->data->getLastTen();
        }
        public function getLastFiveSportsNews(){
            return $this->data->getLastFiveSportsNews();
        }
        public function getLastFourNationalNews(){
            return $this->data->getLastFourNationalNews();
        }
        public function getLastFourRegionalNews(){
            return $this->data->getLastFourRegionalNews();
        }
        public function getLastFourSucesosNews(){
            return $this->data->getLastFourSucesosNews();
        }
        public function getLastFourEspectaculosNews(){
            return $this->data->getLastFourEspectaculosNews();
        }
        public function getLastFourTecnologiaNews(){
            return $this->data->getLastFourTecnologiaNews();
        }
        public function getMostViewNews(){
            return $this->data->getMostViewNews();
        }
        public function getSpecificNews($id){
            return $this->data->getSpecificNews($id);
        }
        public function save($news){
            return $this->data->save($news);
        }
        public function delete($id){
            return $this->data->delete($id);
        }
        public function edit($news, $option){
            return $this->data->edit($news, $option);
        }
        public function getNewsByCategoryId($id){
            return $this->data->getNewsByCategoryId($id);
        }
        public function getImageById($id){
            return $this->data->getImageById($id);
        }
        public function getFiveNewsByCategoryId($id){
            return $this->data->getFiveNewsByCategoryId($id);
        }
        public static function getLastInsertedID(){
            return NewsData::getLastInsertedID();
        }
    }
?>