<?php
declare(strict_types=1);

namespace App\Services;

use App\OfferProviders\OfferProviderInterface;

class OfferFetcher
{
    public function fetchNewOffers(array $providers): array
    {
        $offers = [];
        foreach ($providers as $providerName => $providerConfig) {
            /** @var OfferProviderInterface $provider */
            $provider = new $providerConfig['class'];
            $offers[$providerName] = $provider->fetchOffers($providerConfig['offers_link']);
        }

        die;
    }
}
