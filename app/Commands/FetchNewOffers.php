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
    protected $signature = 'fetcher:fetch-new-offers';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Fetch new offers from the websites';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $dom = new Dom();
        /** @var \Illuminate\Http\Client\Response $reponse */
        $response = Http::get('https://www.olx.bg/nedvizhimi-imoti/prodazhbi/apartamenti/oblast-sofiya-grad/?search%5Bfilter_float_price%3Ato%5D=80000&search%5Bfilter_enum_atype%5D%5B0%5D=2&search%5Bfilter_enum_atype%5D%5B1%5D=3&search%5Bfilter_float_space%3Afrom%5D=80&search%5Bfilter_float_cyear%3Ato%5D=2020&search%5Bfilter_enum_ctype%5D%5B0%5D=tuhla&search%5Bfilter_enum_floor%5D%5B0%5D=2&search%5Bfilter_enum_floor%5D%5B1%5D=3&search%5Bfilter_enum_floor%5D%5B2%5D=4&search%5Bfilter_enum_floor%5D%5B3%5D=5&search%5Bfilter_enum_floor%5D%5B4%5D=6');
        $html = $dom->load($response->body());
        $tds = $html->find('#offers_table tr');
//        $tds->each()
        die;
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
