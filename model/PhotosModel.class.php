<?php

require_once 'database/Connection.php';

class PhotosModel extends Connection {

    public function listAllPhotos($idCape) {

        try {

            $sql = "SELECT
                        *
                    FROM
                        photos
                    WHERE
                        ca_id = :id
                    ORDER BY
                        id ASC;";

            $prep = $this->con->prepare($sql);
            $prep->bindValue(':id', $idCape);
            $prep->execute();

            return $prep->fetchAll(PDO::FETCH_ASSOC);
            
            
        } catch (PDOException $e) {

            echo 'LIST ALL PHOTOS ERROR '. $e->getMessage();
        }
    }

    public function insertPhotos($name, $dir, $fil, $caId) {

        try {

            $sql = "INSERT INTO
                        photos(name_photo, dir_name, file_name, ca_id)
                    VALUES
                        (:nam, :dir, :fil, :ca);";

            $prep = $this->con->prepare($sql);
            $prep->bindValue(':nam' , $name);
            $prep->bindValue(':dir' , $dir);
            $prep->bindValue(':fil' , $fil);
            $prep->bindValue(':ca'  , $caId);
            $prep->execute();

            return $prep->rowCount();
            
        } catch (PDOException $e) {

            echo 'INSERTED PHOTOS ERROR '. $e->getMessage();
        }
    }
}