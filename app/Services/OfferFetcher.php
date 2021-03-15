<?php
declare(strict_types=1);

namespace App\Services;

use App\OfferProviders\OfferProviderInterface;
use DB;

class OfferFetcher
{
    /**
     * @param array $filters
     * @return array
     * @throws \Exception
     */
    public function fetchNewOffers(array $filters): array
    {
        $allNewOffers = [];
        foreach ($filters as $filterName => $filterConfig) {
            /** @var OfferProviderInterface $provider */
            $provider = new $filterConfig['class'];

            if (!$provider instanceof OfferProviderInterface) {
                throw new \Exception("Invalid configuration for filter: {$filterName}. Class value should be instance of OfferProviderInterface!");
            }

            $offers = $provider->fetchOffers($filterConfig['offers_link']);
            $newOffersByFilter = $this->filterOnlyNewOffers($offers, $filterName);


            if (!empty($newOffersByFilter)) {
                $allNewOffers[$filterName] = $newOffersByFilter;
            }
        }

        return $allNewOffers;
    }

    /**
     * @param Offer[] $offers
     * @param string $filterName
     * @return array
     */
    private function filterOnlyNewOffers(array $offers, string $filterName): array
    {
        $existingOffers = DB::table('estate_offers')
            ->where('filter_name', $filterName)
            ->get();

        foreach ($existingOffers as $existingOffer) {
            unset($offers[$existingOffer->link_to_offer_hash]);
        }

        return $offers;
    }
}
