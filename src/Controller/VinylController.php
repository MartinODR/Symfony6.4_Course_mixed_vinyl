<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;   //symfony Library gives librarys for Request, Response and Session.
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class VinylController extends AbstractController
{
    #[Route('/')]
    public function homepage(): Response //response it's just to specify the kind of function it doesn't have effect
    {
        $tracks = [
            ['song' => 'Gangsta\'s Paradise', 'artists' => 'Coolio'],
            ['song' => 'Waterfalls', 'artists' =>  'TLC'],
            ['song' => 'Creep',  'artists' =>  'Radiohead'],
            ['song' => 'Kiss from a Rose', 'artists' => 'Seal'],
            ['song' => 'On Bended Knee', 'artists' => 'Boyz II Men'],
            ['song' => 'Fantasy', 'artists' => 'Mariah Carey'],
        ];
       // return new Response('Title: Starting new ways first Method homepage("/")');  //response related to HttpFoundation
        return $this->render('vinyl/homepage.html.twig', [
            'title' => 'PB & Jams',
            'tracks' => $tracks,
        ]);
    }

    #[Route('/browse/{slug}')]  //{slug} it's a Wildcard can be another word it#s make no difference// can match anything but by default a wild card is required, must be an adress after /browse
    public function browse($slug = null): Response  //{slug} allows to have an argument with that same name, the wildcard introduce the /url in the variable // =null allows to not use an adress after /browse
    {
       // $title = str_replace('-', ' ', $slug);  //convert $slug to a title
        if($slug) {
            echo "Second Route /browse/{wildcard} </br>";
            $title = 'Genre: ' .u(str_replace('-', ' ', $slug))->title(true); //symfony function from library(components) symfony/string , allows to make strings transformations
        } else {
            $title = 'All Genres /browse/';
        }

        return new Response($title);    // browse/whatever = Genre: whatever
    }

}