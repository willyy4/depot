<?php


class Personne extends DbConnect {

    
    public function getAll() {

        $sql = "SELECT * FROM personne
                ORDER BY id_personne DESC";

        $stmt = $this->connection->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
    public function getById($id) {

        $sql = "SELECT * FROM personne
                WHERE id_personne = ?";

        $stmt = $this->connection->prepare($sql);

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    
    public function create(
        $nom,
        $prenom,
        $email,
        $mot_de_passe,
        $role
    ) {

        $passwordHash = password_hash(
            $mot_de_passe,
            PASSWORD_DEFAULT
        );

        $sql = "INSERT INTO personne(
                    nom,
                    prenom,
                    email,
                    mot_de_passe,
                    role
                )
                VALUES(?, ?, ?, ?, ?)";

        $stmt = $this->connection->prepare($sql);

        return $stmt->execute([
            $nom,
            $prenom,
            $email,
            $passwordHash,
            $role
        ]);
    }

    /
    public function update(
        $id,
        $nom,
        $prenom,
        $email,
        $role
    ) {

        $sql = "UPDATE personne

                SET nom = ?,
                    prenom = ?,
                    email = ?,
                    role = ?

                WHERE id_personne = ?";

        $stmt = $this->connection->prepare($sql);

        return $stmt->execute([
            $nom,
            $prenom,
            $email,
            $role,
            $id
        ]);
    }

    
    public function delete($id) {

        $sql = "DELETE FROM personne
                WHERE id_personne = ?";

        $stmt = $this->connection->prepare($sql);

        return $stmt->execute([$id]);
    }
}