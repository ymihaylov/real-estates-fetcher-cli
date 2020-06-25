<?php
declare(strict_types=1);

namespace App\OfferProviders;


use Illuminate\Support\Facades\Http;
use PHPHtmlParser\Dom;

class Olx implements OfferProviderInterface
{
    public function fetchOffers(string $url)
    {
        $dom = new Dom();
        /** @var \Illuminate\Http\Client\Response $reponse */
        $response = Http::get($url);

        $html = $dom->load($response->body());

        $allOffers = $html->find('div.offer-wrapper');
        foreach ($allOffers as $offerHtml) {
            $linkToOffer = $offerHtml->find('.title-cell')[0]->find('a')[0]->getAttribute('href');
            $titleOfOffer = trim(strip_tags($offerHtml->find('.title-cell')[0]->find('a')[0]->innerHtml));;

            DB::table('estate_offers')->insert(
                [
                    'title' => $titleOfOffer,
                    'provider' => 'olx',
                    'link_to_offer' => $linkToOffer,
                    'link_to_offer_hash' => md5($linkToOffer),
                ]
            );
        }

        $offers = DB::table('estate_offers')->get();
        die;
    }
}
