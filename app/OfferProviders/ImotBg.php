<?php
declare(strict_types=1);

namespace App\OfferProviders;


use App\Services\Offer;
use Illuminate\Support\Facades\Http;
use PHPHtmlParser\Dom;

class ImotBg implements OfferProviderInterface
{
    public function fetchOffers(string $url): array
    {
        /** @var \Illuminate\Http\Client\Response $response */
        $response = Http::get($url);
        $body = mb_convert_encoding($response->body(), "utf-8", "windows-1251");

        $html = (new Dom())->load($body);

        $allOffersList = $html->find('a.lnk2');

        $offersOnPage = [];
        foreach ($allOffersList as $offerLink) {
            $price = null;

            $offerPrice = $offerLink->getParent()->find('.price')->toArray()[0]->text();;
            $offerHref = trim($offerLink->getAttribute('href'), '//');
            $offerTitle = trim(strip_tags(iconv('utf-8', 'windows-1251', $offerLink->innerHtml())));
            $offerHash = md5($offerHref);


            $offersOnPage[$offerHash] = (new Offer())
                ->setProvider(self::getProviderName())
                ->setTitle($offerTitle)
                ->setLink('https://'.$offerHref)
                ->setHash($offerHash)
                ->setPrice($offerPrice);
        }

        return $offersOnPage;
    }

    public static function getProviderName(): string
    {
        return "imot.bg";
    }
}
