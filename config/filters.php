<?php
declare(strict_types=1);

return [
//    'olx_2_bedrooms' => [
//        'class' => \App\OfferProviders\Olx::class,
//        'offers_link' => 'https://www.olx.bg/nedvizhimi-imoti/prodazhbi/apartamenti/oblast-sofiya-grad/?search%5Bfilter_float_price%3Ato%5D=80000&search%5Bfilter_enum_atype%5D%5B0%5D=2&search%5Bfilter_enum_atype%5D%5B1%5D=3&search%5Bfilter_float_space%3Afrom%5D=80&search%5Bfilter_float_cyear%3Ato%5D=2020&search%5Bfilter_enum_ctype%5D%5B0%5D=tuhla&search%5Bfilter_enum_floor%5D%5B0%5D=2&search%5Bfilter_enum_floor%5D%5B1%5D=3&search%5Bfilter_enum_floor%5D%5B2%5D=4&search%5Bfilter_enum_floor%5D%5B3%5D=5&search%5Bfilter_enum_floor%5D%5B4%5D=6&search%5Bfilter_enum_nlf%5D%5B0%5D=1',
//    ],

    'imot_bg_bukstoun' => [
        'name' => "Бъкстоун 2 стайни и 3 стайни",
        'class' => \App\OfferProviders\ImotBg::class,
        'offers_link' => 'https://www.imot.bg/pcgi/imot.cgi?act=3&slink=6j0pqk&f1=1',
    ],
];
