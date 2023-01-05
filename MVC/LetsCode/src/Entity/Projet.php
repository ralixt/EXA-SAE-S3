<?php

class Projet
{
    private int $id;
    private String $titre;
    private String $content;
    private String $CreatedAt;
    private int $authorID;
    private String $author;
    private bool $premium;
    /** @var string[] */
    private array $URLImage;
    private String $URLZIP;
    private String $Status;
    private String $Difficulte;
    /** @var String[] */
    private array $tags;
    private int $likes;
    private int $nbCom;
    private float $note;
    private int $nbProjet;

    /**
     * @return int
     */
    public function getNbProjet(): int
    {
        return $this->nbProjet;
    }

    /**
     * @param int $nbProjet
     */
    public function setNbProjet(int $nbProjet): Projet
    {
        $this->nbProjet = $nbProjet;
        return $this;
    }

    /**
     * @return int
     */
    public function getLikes(): int
    {
        return $this->likes;
    }

    /**
     * @return int
     */
    public function getNbCom(): int
    {
        return $this->nbCom;
    }

    /**
     * @param $nbCom
     */
    public function setNbCom($nbCom): Projet
    {
        $this->nbCom = $nbCom;
        return $this;
    }

    /**
     * @return float
     */
    public function getNote(): float
    {
        return $this->note;
    }

    /**
     * @param $note
     */
    public function setNote($note): Projet
    {
        $this->note = $note;
        return $this;
    }

    /**
     * @param int $likes
     * @return Projet
     */
    public function setLikes(int $likes): Projet
    {
        $this->likes = $likes;
        return $this;
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
     */
    public function setCreatedAt(string $CreatedAt): Projet
    {
        $this->CreatedAt = $CreatedAt;
        return $this;
    }

    /**
     * @return int
     */
    public function getAuthorID(): int
    {
        return $this->authorID;
    }

    /**
     * @param int $authorID
     */
    public function setAuthorID(int $authorID): Projet
    {
        $this->authorID = $authorID;
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
     */
    public function setPremium(bool $premium): Projet
    {
        $this->premium = $premium;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getURLImage(): array
    {
        return $this->URLImage;
    }

    /**
     * @param string[] $URLImage
     */
    public function setURLImage(array $URLImage): Projet
    {
        $this->URLImage = $URLImage;
        return $this;
    }

    /**
     * @return String
     */
    public function getURLZIP(): string
    {
        return $this->URLZIP;
    }

    /**
     * @param String $URLZIP
     */
    public function setURLZIP(string $URLZIP): Projet
    {
        $this->URLZIP = $URLZIP;
        return $this;
    }

    /**
     * @return String
     */
    public function getStatus(): string
    {
        return $this->Status;
    }

    /**
     * @param String $Status
     */
    public function setStatus(string $Status): Projet
    {
        $this->Status = $Status;
        return $this;
    }

    /**
     * @return String
     */
    public function getDifficulte(): string
    {
        return $this->Difficulte;
    }

    /**
     * @param String $Difficulte
     */
    public function setDifficulte(string $Difficulte): Projet
    {
        $this->Difficulte = $Difficulte;
        return $this;
    }

    /**
     * @return tag[]
     */
    public function getTags(): array
    {
        return $this->tags;
    }

    /**
     * @param tag[] $tags
     */
    public function setTags(array $tags): Projet
    {
        $this->tags = $tags;
        return $this;
    }
}