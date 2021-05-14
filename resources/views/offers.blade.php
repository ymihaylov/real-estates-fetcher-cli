@foreach ($offersByFilter as $filterName => $filterToOffers)
    <table style="font-size: 20px; border: 1px solid black;">
        <thead>
            <tr>
                <th colspan="2" style="border: 1px solid black;  padding: 10px;">{{ $filterToOffers['filterName'] }}</th>
            </tr>
        </thead>
        <tbody>

        @foreach ($filterToOffers['offers'] as $offer)
            <tr>
                <td style="border: 1px solid black;  padding: 10px;"><a href="{{$offer->getLink()}}">{{ $offer->getTitle() }}</a></td>
                <td style="border: 1px solid black;  padding: 10px;">{{$offer->getPrice()}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endforeach
