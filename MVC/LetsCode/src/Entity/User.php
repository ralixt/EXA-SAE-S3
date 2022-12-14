<?php

class User
{

    private int $id;
    private string $pseudo;
    private string $email;
    private string $password;
    private string $role;
    private int $subscription;
    private int $isPremium;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return User
     */
    public function setId(int $id): User
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getPseudo(): string
    {
        return $this->pseudo;
    }

    /**
     * @param string $pseudo
     * @return User
     */
    public function setPseudo(string $pseudo): User
    {
        $this->pseudo = $pseudo;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return User
     */
    public function setEmail(string $email): User
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return User
     */
    public function setPassword(string $password): User
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * @param string $role
     * @return User
     */
    public function setRole(string $role): User
    {
        $this->role = $role;
        return $this;
    }

    /**
     * @return int
     */
    public function getSubscription(): int
    {
        return $this->subscription;
    }

    /**
     * @param int $subscription
     * @return User
     */
    public function setSubscription(int $subscription): User
    {
        $this->subscription = $subscription;
        return $this;
    }

    /**
     * @return int
     */
    public function getPremium(): int
    {
        return $this->isPremium;
    }

    /**
     * @param int $isPremium
     * @return User
     */
    public function setIsPremium(int $isPremium): User
    {
        $this->isPremium = $isPremium;
        return $this;
    }





}