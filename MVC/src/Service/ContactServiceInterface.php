<?php

interface ContactServiceInterface
{
    public function get ( int $id ) : ?contact;
    public function create(contact $Contact):contact;
    public function delete(int $id):void;
    public function list(array $Contacts):array;

}