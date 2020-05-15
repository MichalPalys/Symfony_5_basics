<?php


namespace App\Controller;


use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class CommentController extends AbstractController
{
    /**
     * @Route(path="/comments/{id}/vote/{direction<up|down>}", methods="POST")
     *
     * @param $id
     * @param string $direction
     *
     * @return JsonResponse
     */
    public function commentVote($id, string $direction, LoggerInterface $logger)
    {
        //todo later this will be based on database

        if ($direction === 'up')
        {
            $logger->info('Voting Up!');
            $currentVoteCount = rand(7, 100);
        } else {
            $logger->info('Voting Down!');
            $currentVoteCount = rand(0, 5);
        }


        return $this->json(['votes' => $currentVoteCount]);
    }
}