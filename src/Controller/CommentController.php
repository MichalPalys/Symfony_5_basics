<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class CommentController extends AbstractController
{
    /**
     * @Route(path="/comments/{id}/vote/{direction}")
     *
     * @param $id
     * @param string $direction
     *
     * @return JsonResponse
     */
    public function commentVote($id, string $direction)
    {
        //todo later this will be based on database

        if ($direction === 'up')
        {
            $currentVoteCount = rand(7, 100);
        } else {
            $currentVoteCount = rand(0, 5);
        }


        return $this->json(['votes' => $currentVoteCount]);
    }
}