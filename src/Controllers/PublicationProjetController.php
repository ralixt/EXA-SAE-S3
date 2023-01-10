<?php

class PublicationProjetController extends AbstractController
{

    private DatabaseProjectService $projetService;
    private int $id;
    public function __construct(AllService $Service)
    {
        parent::__construct(($Service));
        $this->projetService = DatabaseProjectService::getInstance();
        $this->id=0;

    }

    public function render(): void
    {
        $this->id=$_GET["idproject"];
        $this->projetService->upadateStatuts("Published",$this->id);
        header("location: http://localhost");
        // TODO: Implement render() method.

    }
}