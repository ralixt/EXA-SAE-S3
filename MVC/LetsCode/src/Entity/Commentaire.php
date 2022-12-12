<?php

class Commentaire
{
    private int $id;
    private string $content;
    private int $rating;
    private int $author;

    private int $projet;
    private string $createdAt;
    private string $Pseudo;

    /**
     * @return string
     */
    public function getPseudo(): string
    {
        return $this->Pseudo;
    }

    /**
     * @param string $Pseudo
     */
    public function setPseudo(string $Pseudo): void
    {
        $this->Pseudo = $Pseudo;
    }
    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /**
     * @param string $createdAt
     */
    public function setCreatedAt(string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): Commentaire
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): Commentaire
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return int
     */
    public function getRating(): int
    {
        return $this->rating;
    }

    /**
     * @param int $rating
     */
    public function setRating(int $rating): Commentaire
    {
        $this->rating = $rating;
        return $this;
    }

    /**
     * @return int
     */
    public function getAuthor(): int
    {
        return $this->author;
    }

    /**
     * @param int $author
     */
    public function setAuthor(int $author): Commentaire
    {
        $this->author = $author;
        return $this;
    }

    /**
     * @return int
     */
    public function getProjet(): int
    {
        return $this->projet;
    }

    /**
     * @param int $projet
     */
    public function setProjet(int $projet): Commentaire
    {
        $this->projet = $projet;
        return $this;
    }





}