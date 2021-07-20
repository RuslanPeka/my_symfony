<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DataController extends AbstractController
{
    private $myString = 'Hello, World!';

    public function getMyString()
    {
        return $this->myString;
    }

    public function setMyString(string $newString)
    {
        $this->myString = $newString;
    }

    public function dataToJson($data)
    {
        return json_encode($data);
    }

    /**
     * @Route("/data", name="data")
     */
    public function index(): Response
    {
        $this->myString = $this->dataToJson($this->myString);

        return $this->render('data/index.html.twig', [
            'controller_name' => 'DataController',
            'controller_data' => $this->myString,
        ]);
    }
}
