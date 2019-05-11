<?php
class Documentos
{
    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function getDocumentos(){
        $returner = array();

        $sql = "SELECT * FROM documentos";
        $sql = $this->pdo->prepare($sql);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $returner = $sql->fetchAll();
        }

        return $returner;
    }
}

?>
