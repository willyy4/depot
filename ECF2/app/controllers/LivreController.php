<?php

class LivreController {

    private $livre;

    public function __construct() {

        $this->livre = new Livre();
    }

    
    public function index() {

        $livres = $this->livre->getAll();

        require '../app/views/livres/index.php';
    }

    
    public function create() {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $titre = htmlspecialchars($_POST['titre']);
            $auteur = htmlspecialchars($_POST['auteur']);
            $quantite = intval($_POST['quantite']);
            $disponible = htmlspecialchars($_POST['disponible']);

            $this->livre->create(
                $titre,
                $auteur,
                $quantite
                $disponible
            );

            header('Location: index.php');
        }

        require '../app/views/livres/create.php';
    }

    
    public function edit() {

        $id = $_GET['id'];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $titre = htmlspecialchars($_POST['titre']);
            $auteur = htmlspecialchars($_POST['auteur']);
            $quantite = intval($_POST['quantite']);
            $disponible = htmlspecialchars($_POST['disponible']);

            $this->livre->update(
                $id,
                $titre,
                $auteur,
                $quantite
                $disponible
            );

            header('Location: index.php');
        }

        $livre = $this->livre->getById($id);

        require '../app/views/livres/edit.php';
    }

    
    public function delete() {

        $id = $_GET['id'];

        $this->livre->delete($id);

        header('Location: index.php');
    }
}