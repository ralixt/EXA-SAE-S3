<?php

class DatabaseProjectService implements ProjectServiceInterface
{
    use SingletonTrait;

    /**
     * @var projet[]
     */
    private array $data;
    private Database $database;

    protected function __construct() {
        $this->database = Database::getInstance();
        $this->init();
    }

    /**
     * Generate sample projet
     *
     * @return void
     */
    private function init() : void {
        $sentence = $this->database->get()-> prepare("SELECT projet.id,projet.createdAt,projet.titre,projet.content,user.pseudo,projet.status,projet.difficulte,projet.coverURL,projet.isPremium,projet.URL_Image FROM projet JOIN user ON projet.author=user.id;");
        $sentence -> execute();
        $projects = $sentence->fetchAll();
        $this->data = [];
        foreach ($projects as $p){
            $this->data[$p[0]] = (new Projet())
                ->setId($p[0])
                ->setCreatedAt($p[1])
                ->setTitre($p[2])
                ->setContent($p[3])
                ->setAuthor($p[4])
                ->setStatus($p[5])
                ->setDifficulte($p[6])
                ->setCoverURL($p[7])
                ->setPremium($p[8])
                ->setURLImage($p[9]);
        }
    }

    public function get(int $id): ?Projet
    {
        return $this->data[$id] ?? null;
    }

    public function list(array $args = []): array
    {
        $results = [];

        // Filters results : we exclude unwanted tasks from output
        foreach ( $this->data as $projet ) :
            // Search filter
            if ( isset( $args['search'] ) && ! strpos( $projet->getTitre(), $args['search'] ) )
                continue;
            $results[] = $projet;
        endforeach;

        // Order by handling
        usort( $results, function ( Projet $a, Projet $b ) use ( $args ) {
            switch ( $args['orderBy'] ?? null ) :
                case "title":
                    return strnatcmp($a->getTitre(), $b->getTitre());
                default:
                    $aTime = strtotime( $a->getCreatedAt() );
                    $bTime = strtotime( $b->getCreatedAt() );

                    if ( $aTime === $bTime )
                        return 0;

                    return $aTime > $bTime
                        ? -1
                        : 1;
            endswitch;
        } );
        $page = $args['page'] ?? 1;
        $perPage = $args['perPage'] ?? 10;

        return array(
            'page' => $page,
            'perPage' => $perPage,
            'total' => count($results),
            'tasks' => array_slice($results, ($page-1)*$perPage, 10, true)
        );
    }

    public function create(Projet $project): Projet
    {
        // TODO: Implement create() method.
    }

    public function update(Projet $project): Projet
    {
        // TODO: Implement update() method.
    }

    public function delete(int $id): void
    {
        // TODO: Implement delete() method.
    }
}