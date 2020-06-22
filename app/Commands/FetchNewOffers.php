<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
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
        $dom = new Dom();
        /** @var \Illuminate\Http\Client\Response $reponse */
        $response = Http::get('https://www.olx.bg/nedvizhimi-imoti/prodazhbi/apartamenti/oblast-sofiya-grad/?search%5Bfilter_float_price%3Ato%5D=80000&search%5Bfilter_enum_atype%5D%5B0%5D=2&search%5Bfilter_enum_atype%5D%5B1%5D=3&search%5Bfilter_float_space%3Afrom%5D=80&search%5Bfilter_float_cyear%3Ato%5D=2020&search%5Bfilter_enum_ctype%5D%5B0%5D=tuhla&search%5Bfilter_enum_floor%5D%5B0%5D=2&search%5Bfilter_enum_floor%5D%5B1%5D=3&search%5Bfilter_enum_floor%5D%5B2%5D=4&search%5Bfilter_enum_floor%5D%5B3%5D=5&search%5Bfilter_enum_floor%5D%5B4%5D=6&search%5Bfilter_enum_nlf%5D%5B0%5D=1');

        $html = $dom->load($response->body());

        $allOffers = $html->find('div.offer-wrapper');
        foreach ($allOffers as $offerHtml) {
            $linkToOffer = $offerHtml->find('.title-cell')[0]->find('a')[0]->getAttribute('href');
            $titleOfOffer = trim(strip_tags($offerHtml->find('.title-cell')[0]->find('a')[0]->innerHtml));;
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
