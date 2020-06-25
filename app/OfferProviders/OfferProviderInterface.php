<?php
declare(strict_types=1);

namespace App\OfferProviders;


interface OfferProviderInterface
{
    public function fetchOffers(string $url);
}
