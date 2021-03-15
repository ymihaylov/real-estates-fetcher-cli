<?php
declare(strict_types=1);

namespace App\OfferProviders;


use App\Services\Offer;
use Illuminate\Support\Facades\Http;
use PHPHtmlParser\Dom;

class Olx implements OfferProviderInterface
{
    public function fetchOffers(string $url)
    {
        /** @var \Illuminate\Http\Client\Response $response */
        $response = Http::get($url);

        $dom = new Dom();
        $html = $dom->load($response->body());

        $offers = [];
        $allOffersHtml = $html->find('div.offer-wrapper');

        foreach ($allOffersHtml as $offerHtml) {
            $offerLink = $offerHtml->find('.title-cell')[0]->find('a')[0]->getAttribute('href');
            $offerTitle = trim(strip_tags($offerHtml->find('.title-cell')[0]->find('a')[0]->innerHtml));;

            $offerHash = md5($offerLink);

            $offers[$offerHash] = (new Offer())
                ->setTitle($offerTitle)
                ->setLink($offerLink)
                ->setHash($offerHash);
        }

        return $offers;
    }
}
