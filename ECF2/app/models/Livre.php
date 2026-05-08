<?php

namespace app\models;

use Exception;
use app\core\DbConnect;


class Livre extends DbConnect {

    public function findAll(){

        $this->request = "SELECT * FROM Livre";
        $result = $this->connection->query($this->request);
        $list = $result->fetchAll(PDO::FETCH_ASSOC);
        return $list;
    }

    public function find($id){

        $sql = "SELECT * FROM Livre WHERE id_livre = ?";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($titre, $auteur,$quantite, $disponible){

        $sql = "INSERT INTO Livre(titre, auteur, quantite, disponible)
                VALUES(?, ?, ?, ?)";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            $titre,
            $auteur,
            $quantite,
            $disponible
        ]);
    }

    public function update($id, $titre, $auteur,$quantite, $disponible){

        $sql = "UPDATE Livre
                SET titre = ?, auteur = ?, quantite = ?, disponible = ?
                WHERE id_livre = ?";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            $titre,
            $auteur,
            $isbn,
            $quantite,
            $id
        ]);
    }

    public function delete($id){

        $sql = "DELETE FROM Livre WHERE id_livre = ?";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([$id]);
    }

    private function executeTryCatch(){

        try {
            $this->request->execute();
        } catch (Exception $e){
            die('Erreur : ' . $e->getMessage());
        }

        $this->request->closeCursor();
    }
}