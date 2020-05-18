<?php


namespace App\Controller;


use Knp\Bundle\MarkdownBundle\MarkdownParserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Cache\CacheInterface;

class QuestionController extends AbstractController
{
    private static $markdownCachePrefix = 'markdown_cache_prefix_';

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
     * @param MarkdownParserInterface $markdownParser
     * @param CacheInterface $cache
     *
     * @return Response
     * @throws \Psr\Cache\InvalidArgumentException
     */
    public function show($slug, MarkdownParserInterface $markdownParser, CacheInterface $cache)
    {
        $answers = [
            'Make sure your cat is sitting `purrrfectly` still 🤣',
            'Honestly, I like furry shoes better than MY cat',
            'Maybe... try saying the spell backwards?',
        ];

        $questionText = 'I\'ve been turned into a cat, any thoughts on how to turn back? While I\'m **adorable**, I don\'t really care for cat food.';
        
        $parsedQuestionText = $cache->get(static::$markdownCachePrefix . md5($questionText), function () use ($questionText, $markdownParser) {
          return $markdownParser->transformMarkdown($questionText);
        });

        dump($cache);

        return $this->render('question/show.html.twig', [
           'question' => ucwords(str_replace('-', ' ', $slug)),
            'questionText' => $parsedQuestionText,
            'answers' => $answers,
        ]);
    }
}