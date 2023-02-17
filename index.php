<?php require_once 'model/CapeAlbumModel.class.php'; $listAllPhotos = (new CapeAlbumModel)->listAllCapeAlbum(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Album de fotos com PHP</title>
    <link rel="stylesheet" href="assets/css/style.css" type="text/css" />
</head>
<body>
    <header>
        <div class="box-add-album">
            <form action="./controller/capealbum_register.php" method="post" enctype="multipart/form-data">
                <div>
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" placeholder="Nome do álbum" />
                </div>
                <div>
                    <label for="capa">Imagem de Capa</label>
                    <input type="file" name="capa" id="capa" accept="image/png,image/jpg,image/jpeg,image/gif"/>
                </div>
                <div>
                    <button type="submit" id="btn-add">Adicionar</button>
                </div>
            </form>
        </div>
    </header>

    <main>
        <section>
            <div class="box-cape">
                <?php foreach ($listAllPhotos as $photo): ?>
                    <div>
                        <img src="<?= $photo['ca_file_name'] ?>" alt="Capa do álbum <?= $photo['ca_name_cape']?>" class="cape" id="<?= $photo['ca_id'] ?>" width="200px" height="120px">

                        <a href="capealbum_delete.php?id=<?= $photo
                        ['ca_id'] ?>" id="delete-cape">X</a>

                        <a href="capealbum_update.php?id=<?= $photo
                        ['ca_id'] ?>" id="update-cape">E</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </main>

    <script src="./assets/js/script.js"></script>
</body>
</html>