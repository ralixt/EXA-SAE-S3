<?php

abstract class AbstractController {
  
  protected AllService $Service;
  
  public function __construct(AllService $Service) {
    $this->Service = $Service;
  }
  
  abstract public function render() : void;
  
}