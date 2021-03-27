<?php
declare(strict_types=1);

namespace App\Services;

class Offer
{
    /** @var string */
    private $title;

    /** @var string */
    private $link;

    /** @var string */
    private $hash;

    /** @var string */
    private $provider;

    /** @var string */
    private $price;

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Offer
     */
    public function setTitle(string $title): Offer
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getLink(): string
    {
        return $this->link;
    }

    /**
     * @param string $link
     * @return Offer
     */
    public function setLink(string $link): Offer
    {
        $this->link = $link;
        return $this;
    }

    /**
     * @return string
     */
    public function getHash(): string
    {
        return $this->hash;
    }

    /**
     * @param string $hash
     * @return Offer
     */
    public function setHash(string $hash): Offer
    {
        $this->hash = $hash;
        return $this;
    }

    /**
     * @return string
     */
    public function getProvider(): string
    {
        return $this->provider;
    }

    /**
     * @param string $provider
     * @return Offer
     */
    public function setProvider(string $provider): Offer
    {
        $this->provider = $provider;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrice(): string
    {
        return $this->price;
    }

    /**
     * @param string $price
     * @return Offer
     */
    public function setPrice(string $price): Offer
    {
        $this->price = $price;
        return $this;
    }
}
