<?php

require_once 'database/Connection.php';

class CapeAlbumModel extends Connection {

    public function listAllCapeAlbum() {

        try {

            $sql = "SELECT
                        *
                    FROM
                        cape_album
                    ORDER BY
                        ca_id ASC;";

            $prep = $this->con->prepare($sql);
            $prep->execute();

            return $prep->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {

            echo 'LIST ALL CAPE ALBUM ERROR '. $e->getMessage();
        }
    }

    public function insertCapeAlbum($nomeCape, $dir_name, $photo){

        try {

            $sql = "INSERT INTO
                        cape_album(ca_name_cape, ca_dir_name, ca_file_name)
                    VALUES
                        (:nam, :dir, :fil);";

            $prep = $this->con->prepare($sql);
            $prep->bindValue(':nam', $nomeCape);
            $prep->bindValue(':dir', $dir_name);
            $prep->bindValue(':fil', $photo);
            $prep->execute();

            return $prep->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {

            echo 'INSERTED CAPE ALBUM ERROR '. $e->getMessage();
        }
        
    }
}

new CapeAlbumModel;