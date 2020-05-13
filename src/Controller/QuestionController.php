<?php


namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuestionController
{
    /**
     * @Route(path="/")
     *
     * @return Response
     */
    public function homepage()
    {
        return new Response("It`s work!",200);
    }
}