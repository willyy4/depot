<?php

class Emprunt {


    // LISTE DES EMPRUNTS
    public function getAll() {

        $sql = "SELECT
                    emprunt.*,
                    personne.nom,
                    personne.prenom,
                    livre.titre

                FROM emprunt

                INNER JOIN personne
                ON emprunt.id_personne = personne.id_personne

                INNER JOIN livre
                ON emprunt.id_livre = livre.id_livre

                ORDER BY emprunt.id_emprunt DESC";

        $stmt = $this->connection->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // RECUPERER UN EMPRUNT
    public function getById($id) {

        $sql = "SELECT * FROM emprunt
                WHERE id_emprunt = ?";

        $stmt = $this->connection->prepare($sql);

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // VERIFIER NOMBRE EMPRUNTS
    public function countEmprunts($id_personne) {

        $sql = "SELECT COUNT(*) as total

                FROM emprunt

                WHERE id_personne = ?
                AND statut = 'en_cours'";

        $stmt = $this->connection->prepare($sql);

        $stmt->execute([$id_personne]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['total'];
    }

    // CREER EMPRUNT
    public function create($id_personne, $id_livre) {

        // MAXIMUM 3 LIVRES
        if($this->countEmprunts($id_personne) >= 3) {

            return false;
        }

        $date_emprunt = date('Y-m-d');

        $date_retour = date(
            'Y-m-d',
            strtotime('+21 days')
        );

        $sql = "INSERT INTO emprunt(

                    id_personne,
                    id_livre,
                    date_emprunt,
                    date_retour

                )

                VALUES(?, ?, ?, ?)";

        $stmt = $this->connection->prepare($sql);

        return $stmt->execute([

            $id_personne,
            $id_livre,
            $date_emprunt,
            $date_retour
        ]);
    }

    // RETOUR LIVRE
    public function retourner($id) {

        $sql = "UPDATE emprunt

                SET statut = 'retourne',
                    date_retour = NOW()

                WHERE id_emprunt = ?";

        $stmt = $this->connection->prepare($sql);

        return $stmt->execute([$id]);
    }

    // SUPPRESSION
    public function delete($id) {

        $sql = "DELETE FROM emprunt
                WHERE id_emprunt = ?";

        $stmt = $this->connection->prepare($sql);

        return $stmt->execute([$id]);
    }
}