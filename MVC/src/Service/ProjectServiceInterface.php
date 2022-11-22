<?php


/**
 * Defines the common way of using a task service implementation
 */
interface ProjectServiceInterface {
  
  /**
   * Retrieve a Projet instance using its ID
   *
   * @param int $id
   *
   * @return Projet|null
   */
  public function get ( int $id ) : ?Projet;
  
  
  /**
   * Retrieve multiple TaskEntities that complies to optional parameters that can be passed in $args.
   *
   * @param array{
   *  orderBy: string,
   *  order: string,
   *  search: string,
   *  perPage: int,
   *  page: int,
   *  tags: String[]
   * } $args
   *
   * @return array{
   *  Projects: Projet[],
   *  page: int,
   *  perPage: int,
   *  total: int
   * }
   */
  public function list ( array $args = [] ) : array;
  
  
  /**
   * Persist a new Projet to the storage
   *
   * @param Projet $project
   *
   * @return Projet
   */
  public function create ( Projet $project ) : Projet;
  
  
  /**
   * Apply modifications to the Projet record
   *
   * @param Projet $project
   *
   * @return Projet
   */
  public function update ( Projet $project ) : Projet;
  
  
  /**
   * Deletes a Projet from the storage
   *
   * @param int $id
   *
   * @return void
   */
  public function delete ( int $id ) : void;
  
}