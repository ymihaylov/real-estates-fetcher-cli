<?php
declare(strict_types=1);

namespace App\Services;

class Offer
{
    /** @var string */
    private $title;

    /** @var string */
    private $link;

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
}
