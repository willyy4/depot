<?php

class PersonneController {

    private $personne;

    public function __construct() {

        $this->personne = new Personne();
    }

    
    public function index() {

        $personnes = $this->personne->getAll();

        require '../app/views/personnes/index.php';
    }

    
    public function create() {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $email = htmlspecialchars($_POST['email']);
            $mot_de_passe = $_POST['mot_de_passe'];
            $role = htmlspecialchars($_POST['role']);

            $this->personne->create(
                $nom,
                $prenom,
                $email,
                $mot_de_passe,
                $role
            );

            header('Location: index.php?controller=personne');
        }

        require '../app/views/personnes/create.php';
    }

    
    public function edit() {

        $id = $_GET['id'];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $email = htmlspecialchars($_POST['email']);
            $role = htmlspecialchars($_POST['role']);

            $this->personne->update(
                $id,
                $nom,
                $prenom,
                $email,
                $role
            );

            header('Location: index.php?controller=personne');
        }

        $personne = $this->personne->getById($id);

        require '../app/views/personnes/edit.php';
    }

    
    public function delete() {

        $id = $_GET['id'];

        $this->personne->delete($id);

        header('Location: index.php?controller=personne');
    }
}