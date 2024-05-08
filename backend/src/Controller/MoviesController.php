<?php

namespace App\Controller;

use App\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class MoviesController extends AbstractController
{
    public function showMovies(Request $request)
    {
        $sortBy = $request->query->get('sort_by', 'latest'); // Per impostazione predefinita, ordiniamo per ultimo
        $movies = $this->getDoctrine()->getRepository(Movie::class)->findAllSortedBy($sortBy);
        
        // Visualizzazione di un elenco di film
        return $this->render('movies/index.html.twig', [
            'movies' => $movies,
        ]);
    }
}
