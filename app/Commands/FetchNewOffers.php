<?php

namespace App\Commands;

use App\Services\Offer;
use App\Services\OfferFetcher;
use Illuminate\Console\Scheduling\Schedule;
use DB;
use Illuminate\Support\Facades\Mail;
use LaravelZero\Framework\Commands\Command;
use Illuminate\Support\Facades\Http;
use PHPHtmlParser\Dom;

class FetchNewOffers extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'fetch-new-offers';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Fetch new offers from the websites and notify!';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        /** @var OfferFetcher $offerFetcher */
        Mail::raw("hello world");
//        $offerFetcher = $this->app->make('OfferFetcher');
//        $newOffersByFilters = $offerFetcher->fetchNewOffers(config('filters'));
//
//        foreach ($newOffersByFilters as $filterName => $offers) {
//            $this->insertNewOffersInDb($filterName, $offers);
//
//        }
    }

    /**
     * @param string $filterName
     * @param $offers
     */
    private function insertNewOffersInDb(string $filterName, $offers)
    {
        /** @var Offer $offer */
        foreach ($offers as $offer) {
            DB::table('estate_offers')
                ->insert([
                    'title' => $offer->getTitle(),
                    'filter_name' => $filterName,
                    'provider' => $offer->getProvider(),
                    'link_to_offer' => $offer->getLink(),
                    'link_to_offer_hash' => $offer->getHash(),
                ]);
        }
    }

    /**
     * Define the command's schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}
