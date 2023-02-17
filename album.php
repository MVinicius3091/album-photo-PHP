<?php 
    require_once './model/PhotosModel.class.php'; 
    $query = $_SERVER['QUERY_STRING'];
    $idCape = explode('&', $query);
    $idCape = ltrim($idCape[0], 'idcape=');

    $allPhotos = (new PhotosModel)->listAllPhotos($idCape); 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Album - PHP</title>
    <link rel="stylesheet" href="./assets/css/album.css" type="text/css">
</head>
<body>
    <div class="zoom-photo">
        <button id="btn-close-zoom">Close</button>
        <button id="btn-next"><ion-icon name="chevron-forward-outline"></ion-icon></button>
        <button id="btn-back"><ion-icon name="chevron-back-outline"></ion-icon></button>
    </div>

    <header>
        <div class="box-cape-header">
            <h3 id="cape-name"></h3>
            <img src="#" alt="" id="image-cape" width="150px" height="100px">
        </div>
        <form action="./controller/album_register.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="ca_id" id="ca_id" >
            <div>
                <label for="photo">Selecionar foto</label>
                <input type="file" name="photo[]" id="photo" accept="image/png, image/jpg, image/jpeg, image/gif" multiple>

                <button type="submit" id="btn-add-photo">Adicionar</button>
            </div>
        </form>

        <div>
            <button id="btn-close">Close</button>
        </div>
    </header>

    <main>
        <div class="container">
            <div class="box-photos">
                <?php foreach ($allPhotos as $photo): ?>
                    <div>
                        <img src="<?= $photo['dir_name'] ?>" alt="<?= $photo['name_photo'] ?>" id="<?= $photo['id'] ?>" class="photos" width="200px" height="120px">
                        
                        <a href="photo_delete.php?id=<?= $photo
                        ['id'] ?>" id="delete-cape">X</a>

                        <a href="photo_update.php?id=<?= $photo
                        ['id'] ?>" id="update-cape">E</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="./assets/js/album.js"></script>
</body>
</html>