<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuestionController extends AbstractController
{
    /**
     * @Route(path="/", name="app_homepage")
     *
     * @return Response
     */
    public function homepage()
    {
        return $this->render('question/homepage.html.twig');
    }

    /**
     * @Route(path="/questions/{slug}", name="app_question_show")
     *
     * @param $slug
     *
     * @return Response
     */
    public function show($slug)
    {
        $answers = [
            'Answer 1',
            'Answer 2',
            'Answer 3',
        ];

        $questionText = 'I\'ve been turned into a cat, any thoughts on how to turn back? While I\'m **adorable**, I don\'t really care for cat food.';

        return $this->render('question/show.html.twig', [
           'question' => ucwords(str_replace('-', ' ', $slug)),
            'questionText' => $questionText,
            'answers' => $answers,
        ]);
    }
}