<?php

class Article
{
    private $id;
    private $titre;
    private $excerpt;
    private $content;
    private $dateCreation;
    private $dateModification;
    private $user;
    private $userFirstname;
    private $categoryTitle;
    private $userImage;
    private $userLastname;

    public function __construct($id, $titre, $excerpt, $content, $dateCreation, $dateModification, $user, $category, $userFirstname, $userLastname, $categoryTitle, $userImage)
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->excerpt = $excerpt;
        $this->content = $content;
        $this->dateCreation = $dateCreation;
        $this->dateModification = $dateModification;
        $this->user = $user;
        $this->userFirstname = $userFirstname;
        $this->userLastname = $userLastname;
        $this->category = $category; //value numero
        $this->categoryTitle = $categoryTitle;
        $this->userImage = $userImage;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    public function getExcerpt()
    {
        return $this->excerpt;
    }

    public function setExcerpt($excerpt)
    {
        $this->excerpt = $excerpt;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;
    }

    public function getDateModification()
    {
        return $this->dateModification;
    }

    public function setDateModification($dateModification)
    {
        $this->dateModification = $dateModification;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

    public function getUserFirstname()
    {
        return $this->userFirstname;
    }

    public function setUserFirstname($userFirstname)
    {
        $this->userFirstname = $userFirstname;
    }

    public function getUserLastname()
    {
        return $this->userLastname;
    }

    public function setUserLastname($userLastname)
    {
        $this->userLastname = $userLastname;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function getCategoryTitle()
    {
        return $this->categoryTitle;
    }

    public function setCategoryTitle($categoryTitle)
    {
        $this->categoryTitle = $categoryTitle;
    }

    public function getUserImage()
    {
        return $this->userImage;
    }

    public function setUserImage($userImage)
    {
        $this->userImage = $userImage;
    }

}
