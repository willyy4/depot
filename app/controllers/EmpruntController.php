<?php



class EmpruntController {

    private $emprunt;
    private $personne;
    private $livre;

    public function __construct() {

        $this->emprunt = new Emprunt();

        $this->personne = new Personne();

        $this->livre = new Livre();
    }

    // LISTE
    public function index() {

        $emprunts = $this->emprunt->getAll();

        require '../app/views/emprunts/index.php';
    }

    // AJOUT
    public function create() {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id_personne = intval($_POST['id_personne']);

            $id_livre = intval($_POST['id_livre']);

            $result = $this->emprunt->create(
                $id_personne,
                $id_livre
            );

            if(!$result) {

                $error =
                "Cet utilisateur possède déjà 3 livres.";
            }

            else {

                header(
                    'Location: index.php?controller=emprunt'
                );
            }
        }

        $personnes = $this->personne->getAll();

        $livres = $this->livre->getAll();

        require '../app/views/emprunts/create.php';
    }

    // RETOUR
    public function retourner() {

        $id = $_GET['id'];

        $this->emprunt->retourner($id);

        header(
            'Location: index.php?controller=emprunt'
        );
    }

    // SUPPRESSION
    public function delete() {

        $id = $_GET['id'];

        $this->emprunt->delete($id);

        header(
            'Location: index.php?controller=emprunt'
        );
    }
}