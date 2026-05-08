<?php







class Livre extends DbConnect {




    public function findAll(){

        $sql = "SELECT * FROM livre";

        $stmt = $this->connection->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // UN LIVRE
    public function find($id){

        $sql = "SELECT * FROM livre
                WHERE id_livre = ?";

        $stmt = $this->connection->prepare($sql);

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // CREATE
    public function create(
        $titre,
        $auteur,
        $quantite,
        $disponible
    ){

        $sql = "INSERT INTO livre(
                    titre,
                    auteur,
                    quantite,
                    disponible
                )

                VALUES(?, ?, ?, ?)";

        $stmt = $this->connection->prepare($sql);

        return $stmt->execute([
            $titre,
            $auteur,
            $quantite,
            $disponible
        ]);
    }

    // UPDATE
    public function update(
        $id,
        $titre,
        $auteur,
        $quantite,
        $disponible
    ){

        $sql = "UPDATE livre

                SET titre = ?,
                    auteur = ?,
                    quantite = ?,
                    disponible = ?

                WHERE id_livre = ?";

        $stmt = $this->connection->prepare($sql);

        return $stmt->execute([
            $titre,
            $auteur,
            $quantite,
            $disponible,
            $id
        ]);
    }

    // DELETE
    public function delete($id){

        $sql = "DELETE FROM livre
                WHERE id_livre = ?";

        $stmt = $this->connection->prepare($sql);

        return $stmt->execute([$id]);
    }
}