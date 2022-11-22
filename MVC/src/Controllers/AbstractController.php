<?php

abstract class AbstractController {
  
  protected ProjectServiceInterface $taskService;
  
  public function __construct(ProjectServiceInterface $taskService ) {
    $this->taskService = $taskService;
  }
  
  abstract public function render() : void;
  
}