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
        return new Response('It`s work!',200);
    }

    /**
     * @Route(path="/questions/{slug}")
     *
     * @param $slug
     *
     * @return Response
     */
    public function show($slug)
    {
        return new Response(sprintf(
            'Future page to show a questions "%s"!',
            ucwords(str_replace('-', ' ', $slug))
        ));
    }
}