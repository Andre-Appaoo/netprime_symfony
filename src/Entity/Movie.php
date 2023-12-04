<?php

namespace App\Entity;

use App\Repository\MovieRepository;
use DateTime;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: MovieRepository::class)]
class Movie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    #[Assert\NotNull]
    #[Assert\Date]
    private ?DateTime $release_date = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $synopsis = null;

    #[ORM\Column]
    private ?float $rating = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $poster_url = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $background_url = null;

    #[ORM\ManyToOne]
    private ?People $director = null;

    #[ORM\ManyToOne]
    private ?People $composer = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReleaseDate(): ?DateTime
    {
        return $this->release_date;
    }

    public function setReleaseDate(DateTime $release_date): static
    {
        $this->release_date = $release_date;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getSynopsis(): ?string
    {
        return $this->synopsis;
    }

    public function setSynopsis(string $synopsis): static
    {
        $this->synopsis = $synopsis;

        return $this;
    }

    public function getRating(): ?float
    {
        return $this->rating;
    }

    public function setRating(float $rating): static
    {
        $this->rating = $rating;

        return $this;
    }

    public function getPosterUrl(): ?string
    {
        return $this->poster_url;
    }

    public function setPosterUrl(?string $poster_url): static
    {
        $this->poster_url = $poster_url;

        return $this;
    }

    public function getBackgroundUrl(): ?string
    {
        return $this->background_url;
    }

    public function setBackgroundUrl(?string $background_url): static
    {
        $this->background_url = $background_url;

        return $this;
    }

    public function getDirector(): ?People
    {
        return $this->director;
    }

    public function setDirector(?People $director): static
    {
        $this->director = $director;

        return $this;
    }

    public function getComposer(): ?People
    {
        return $this->composer;
    }

    public function setComposer(?People $composer): static
    {
        $this->composer = $composer;

        return $this;
    }
}
