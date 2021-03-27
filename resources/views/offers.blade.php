@foreach ($offersByFilter as $filterName => $offers)
    <table>
        <thead>
            <tr>
                <th colspan="2">{{ $filterName }}</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($offers as $offer)
            <tr>
                <td><a href="{{$offer->getLink()}}">{{ $offer->getTitle() }}</a></td>
                <td>{{$offer->getPrice()}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endforeach



<style>
    table {
        width: 40%;
        font-size: 30px;
    }

    table, th, td {
        border: 1px solid black;
    }

    th, td {
        padding: 10px;
    }
</style>
