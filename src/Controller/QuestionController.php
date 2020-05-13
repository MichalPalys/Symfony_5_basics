<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuestionController extends AbstractController
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
        return $this->render('question/show.html.twig', [
           'question' => ucwords(str_replace('-', ' ', $slug))
        ]);
    }
}