<?php

require_once "models/CategoryManager.class.php";


class Categories
{

    private $categoryManager;

    /**
     * On instancie la classe CategoryManager (model)
     */
    public function __construct()
    {
        $this->categoryManager = new CategoryManager;
    }

    /**
     * On recupere toutes les categories pour les afficher
     */
    public function afficherCategories()
    {
        $categories = $this->categoryManager->getCategories();
        require_once "views/back/adminCategories.view.php";
    }

    /**
     * On ajoute une catégorie dans le BDD
     */
    public function ajoutCategorie()
    {
        $category = trim($_POST['category']);

        if (isset($category) && !empty($category)) {
            $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            if ($this->categoryManager->insertCategoryIntoBD($category)) {
                Helper::flash('category_message', "La cateégorie a été ajouté");
                helper::redirect('admin/categories');

            }
        }
        require_once "views/back/adminCategoryAjout.view.php";
    }

    /**
     * On modifie une cateégorie dans le BDD
     */
    public function modificationCategory($id)
    {
        $category = $this->categoryManager->getCategoryById($id);
        $updatedCategory = Securite::secureHTML($_POST['category']);

        if (isset($_POST['submit'])) {
            if ($this->categoryManager->updateCategoryIntoBD($id, $updatedCategory)) {
                Helper::flash('category_message', "La catégorie a été modifié");
                helper::redirect('admin/categories');

            }
        }
        require_once "views/back/adminCategoryModif.view.php";
    }

    public function suppressionCategory($id)
    {
        $this->categoryManager->suppressionCategoryBD($id);
        Helper::flash('category_message', "La catégorie a été supprimée");
        helper::redirect('admin/categories');
    }
}
