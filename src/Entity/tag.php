<?php

class tag
{
    private int $id;
    private String $name;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return tag
     */
    public function setId(int $id): tag
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return String
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param String $name
     * @return tag
     */
    public function setName(string $name): tag
    {
        $this->name = $name;
        return $this;
    }


}