<?php declare(strict_types=1);

namespace App\Models;

class CryptoInfo
{
    private int $id;
    private string $name;
    private string $symbol;
    private string $dateAdded;
    private float $circulatingSupply;
    private int $cmcRank;
    private float $priceUsd;

    public function __construct
    (
        int    $id,
        string $name,
        string $symbol,
        string $dateAdded,
        float  $circulatingSupply,
        int    $cmcRank,
        float  $priceUsd
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->symbol = $symbol;
        $this->dateAdded = $dateAdded;
        $this->circulatingSupply = $circulatingSupply;
        $this->cmcRank = $cmcRank;
        $this->priceUsd = $priceUsd;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSymbol(): string
    {
        return $this->symbol;
    }

    public function getDateAdded(): string
    {
        return $this->dateAdded;
    }

    public function getCirculatingSupply(): float
    {
        return $this->circulatingSupply;
    }

    public function getCmcRank(): int
    {
        return $this->cmcRank;
    }

    public function getPriceUsd(): float
    {
        return $this->priceUsd;
    }
}

