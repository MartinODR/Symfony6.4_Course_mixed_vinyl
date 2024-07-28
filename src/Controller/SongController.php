<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SongController extends AbstractController
{
    #[Route('/api/songs/{id<\d+>}', methods: ['GET'])]
    public function getSong(int $id, LoggerInterface $logger): Response
    {
       // dd($id);  //test if the new page it's working
        //TODO query the database
        $song = [
            'id' => $id,
            'name' => 'Waterfalls',
            'url' => 'https:symfonycasts.s3.amazonaws.com/sample.mp3',
        ];

        $logger->info('Returning API response for song {song}', [    //LoggerInterface Service
            'song' => $id,
            ]);
        //return new JsonResponse($song);
        return $this -> json($song);  //json() is another shortcut method that comes from Abstract controller//makes no difference
    }
}