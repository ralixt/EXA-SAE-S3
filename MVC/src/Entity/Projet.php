<?php

class Projet
{
    private int $id;
    private String $titre;
    private String $content;
    private String $CreatedAt;
    private String $author;
    private bool $premium;
    private String $URLImage;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Projet
     */
    public function setId(int $id): Projet
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return String
     */
    public function getTitre(): string
    {
        return $this->titre;
    }

    /**
     * @param String $titre
     * @return Projet
     */
    public function setTitre(string $titre): Projet
    {
        $this->titre = $titre;
        return $this;
    }

    /**
     * @return String
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param String $content
     * @return Projet
     */
    public function setContent(string $content): Projet
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return String
     */
    public function getCreatedAt(): string
    {
        return $this->CreatedAt;
    }

    /**
     * @param String $CreatedAt
     * @return Projet
     */
    public function setCreatedAt(string $CreatedAt): Projet
    {
        $this->CreatedAt = $CreatedAt;
        return $this;
    }

    /**
     * @return String
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @param String $author
     * @return Projet
     */
    public function setAuthor(string $author): Projet
    {
        $this->author = $author;
        return $this;
    }

    /**
     * @return bool
     */
    public function isPremium(): bool
    {
        return $this->premium;
    }

    /**
     * @param bool $premium
     * @return Projet
     */
    public function setPremium(bool $premium): Projet
    {
        $this->premium = $premium;
        return $this;
    }

    /**
     * @return String
     */
    public function getURLImage(): string
    {
        return $this->URLImage;
    }

    /**
     * @param String $URLImage
     * @return Projet
     */
    public function setURLImage(string $URLImage): Projet
    {
        $this->URLImage = $URLImage;
        return $this;
    }



}