<?php

namespace App\Twig\Components;

use App\Repository\MovieRepository;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent]
final class SearchMovie
{
    use DefaultActionTrait;

    #[LiveProp(writable: true)]
    public ?string $query = null;

    public function __construct(private readonly MovieRepository $movieRepository)
    {
    }

    public function getMovies(): array
    {
        return $this->movieRepository->findByTitle($this->query);
    }
}
