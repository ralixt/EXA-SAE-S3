<?php

abstract class AbstractController {
  
  protected ProjectServiceInterface $Service;
  
  public function __construct(ProjectServiceInterface $Service) {
    $this->Service = $Service;
  }
  
  abstract public function render() : void;
  
}