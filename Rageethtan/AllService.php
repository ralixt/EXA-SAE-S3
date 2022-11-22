<?php

interface AllService
{
    public function get ($entity)  : ?TaskEntity;

    public function delete ($entity) : ?TaskEntity;

    public function getlist();

    public function create();

    public function update();


}

?>