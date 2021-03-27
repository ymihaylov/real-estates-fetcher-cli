<?php
declare(strict_types=1);

namespace App\Mail;



use Illuminate\Mail\Mailable;

class NewOffers extends Mailable
{
    private $offersByFilter;

    public function __construct(array $offers)
    {
        $this->offersByFilter = $offers;
    }

    public function build()
    {
        return $this
            ->view('offers')
            ->with('offersByFilter', $this->offersByFilter);
    }
}
