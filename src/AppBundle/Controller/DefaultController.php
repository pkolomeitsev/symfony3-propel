<?php

namespace AppBundle\Controller;

use AppBundle\PropelModels\Map\UserProfileTableMap;
use AppBundle\PropelModels\Map\UsersTableMap;
use Propel\Runtime\Map\TableMap;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $table = UsersTableMap::getTableMap();
        $this->displayColumns($table);

        $table = UserProfileTableMap::getTableMap();
        $this->displayColumns($table);

        die;

        // replace this example code with whatever you need
//        return $this->render('default/index.html.twig', [
//            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
//        ]);
    }

    /**
     * @param TableMap $table
     */
    private function displayColumns(TableMap $table)
    {
        echo sprintf('Analyze table `%s`:' . PHP_EOL, $table->getName());
        foreach ($table->getColumns() as $column) {
            echo '- ' . $column->getName() . PHP_EOL;
        }
        echo PHP_EOL;
    }
}
