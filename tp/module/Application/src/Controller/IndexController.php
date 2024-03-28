<?php

declare(strict_types=1);

namespace Application\Controller;



use Laminas\Db\Adapter\AdapterInterface;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    private $dbAdapter;

    public function __construct(AdapterInterface $dbAdapter)
    {
        $this->dbAdapter = $dbAdapter;
    }

    public function indexAction()
    {
        $resultSet = $this->dbAdapter->query('SELECT * FROM users');

        $results = $resultSet -> execute();

        $returnArray = array();
        // iterate through the rows
        foreach ($results as $result) {
            $returnArray[] = $result;
        }
     
        return new ViewModel([
            'users' => $returnArray,
        ]);
    }
}
