<?php
declare(strict_types=1);

namespace App\Services;

use App\OfferProviders\OfferProviderInterface;
use DB;

class OfferFetcher
{
    public function fetchNewOffers(array $providers): array
    {
        $newOffers = [];
        foreach ($providers as $providerName => $providerConfig) {
            /** @var OfferProviderInterface $provider */
            $provider = new $providerConfig['class'];
            $offers = $provider->fetchOffers($providerConfig['offers_link']);
            $newOffers[$providerName] = $this->filterOnlyNewOffers($offers, $providerName);
        }

        return $newOffers;
    }

    private function filterOnlyNewOffers(array $offers, string $provider): array
    {
        $existingOffers = DB::table('estate_offers')
            ->where('provider', $provider)
            ->get();

        foreach ($existingOffers as $existingOffer) {
            unset($offers[$existingOffer->link_to_offer_hash]);
        }

        return $offers;
    }
}
