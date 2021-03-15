<?php
declare(strict_types=1);

namespace App\OfferProviders;

use App\Services\Offer;

interface OfferProviderInterface
{
    /**
     * @param string $url
     * @return Offer[]
     */
    public function fetchOffers(string $url): array;

    /**
     * @return string
     */
    public static function getProviderName(): string;
}
