<?php

namespace App\Controller;

use App\Repository\MovieRepository;
use App\Repository\PeopleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private MovieRepository $movieRepository;
    private PeopleRepository $peopleRepository;

    public function __construct(MovieRepository $movieRepository, PeopleRepository $peopleRepository)
    {
        $this->movieRepository = $movieRepository;
        $this->peopleRepository = $peopleRepository;
    }

    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        $allMovies = $this->movieRepository->findAll();
        $allPeople = $this->peopleRepository->findAll();

        return $this->render('pages/home/index.html.twig', [
            'allMovies' => $allMovies,
            'allPeople' => $allPeople,
        ]);
    }
}
