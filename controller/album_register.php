<?php

require_once '../model/PhotosModel.class.php';

class AlbumRegister {

    private $model;

    public function __construct()
    {
        $this->model = new PhotosModel;
        $this->registerPhotos();
    }

    private function registerPhotos() {

        $files = $_FILES['photo'];
        $caId = $_POST['ca_id'];
        $http = $_SERVER['HTTP_REFERER'];

        if (count($files['name']) > 1) {

            for ($i = 0; $i < count($files['name']); $i++) {
                $extension = pathinfo($files['name'][$i], PATHINFO_EXTENSION);
                $fil = uniqid() . ".{$extension}";
                $dir = "uploads/{$fil}";

                $resp = $this->model->insertPhotos($files['name'][$i], $dir, $fil, $caId);

                if (!$resp) {
                    $_SESSION['fail'] = 'Falha ao cadastrar foto.';
                    return;
                }

                move_uploaded_file($files['tmp_name'][$i], "../{$dir}");
            }

            header("Location: {$http}");
            return;
        }

        $extension = pathinfo($files['name'][0], PATHINFO_EXTENSION);
        $fil = uniqid() . ".{$extension}";
        $dir = "uploads/{$fil}";
        $resp = $this->model->insertPhotos($files['name'][0], $dir, $fil, $caId);

        if (!$resp) {
            $_SESSION['fail'] = 'Falha ao cadastrar foto.';
            return;
        }
        move_uploaded_file($files['tmp_name'][0], "../{$dir}");
        header("Location: {$http}");
    }
}

new AlbumRegister;