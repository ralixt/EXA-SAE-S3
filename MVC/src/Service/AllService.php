<?php

interface AllService
{
    public function get ($entity)  : ?object;

    public function delete ($entity);

    public function getlist() : ?array;

    public function create();

    public function update();


}

?>