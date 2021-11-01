    <li> <b>{{$annonce->type}}</b>  @isset($annonce->offerType)  à<b> {{$annonce->offerType }}  </b>@endisset</li>
    <li>Pays :  <b>{{ $annonce->country}}</b></li>
    <li>Ville :  <b>{{ $annonce->town}}</b></li>
    <li>Quartier :  <b>{{ $annonce->quartier}}</b></li>
    <li>Budget :  <b>{{ $annonce->price}}</b></li>
