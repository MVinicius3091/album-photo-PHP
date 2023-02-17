<?php

require_once '../model/CapeAlbumModel.class.php';

class CapeAlbumController {

    private $model;

    public function __construct()
    {
        $this->model = new CapeAlbumModel;
        $this->registerCapeAlbum();
    }

    private function registerCapeAlbum() 
    {
        $nameCape = $_POST['nome'];
        $file = $_FILES['capa'];

        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        
        $dir_name = uniqid() . ".$extension";
        $file_name = 'assets/images/' . $dir_name;

        $resp = $this->model->insertCapeAlbum($nameCape, $dir_name, $file_name);

        if (!$resp) {
            header('Location: ../index.php?i=false');
            return;
        }

        move_uploaded_file($file['tmp_name'], "../$file_name");
        header('Location: ../index.php?i=true');

    }
}


new CapeAlbumController;