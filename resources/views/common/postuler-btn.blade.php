@if($annonce->annonceType == 'Offre')
    <button type="button" class="btn btn-success btn-sm-block btn-circle mt-lg-1 mt-xs-5 " data-bs-toggle="modal" data-bs-target="#exampleModal{{$annonce->id}}">
    Numero
  </button>
 
@else
    @auth
        @if(auth()->user()->usertype == 'Demarcheur'|| auth()->user()->usertype == 'Admin')
            <button type="button" class="btn btn-success btn-sm-block btn-circle mt-lg-1 mt-xs-5 " data-bs-toggle="modal" data-bs-target="#exampleModal{{$annonce->id}}">
                Numero
            </button>
        @endif
    @endauth
@endif


      <!-- Modal -->

  <div class="modal fade" id="exampleModal{{$annonce->id}}" tabindex="-1" aria-labelledby="exampleModal{{$annonce->id}}Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModal{{$annonce->id}}Label">Saisie de l'annonce(Cliquez un icon pour commencer la discution)</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          &emsp;&emsp;
          @if ($annonce->user != null)
            <span class="call-button">
              <a href="tel:+{{$annonce->user->phone}}"><i class="fa fa-phone"></i>
                +{{$annonce->user->phone}} &emsp;&emsp;
              </a>
            </span>
            <span class="call-button">
              <a href="https://api.whatsapp.com/send?phone={{$annonce->user->phone}}&text={{$annonce->description}}"><i class="fa fa-whatsapp"></i></a>
            </span>
          @else
            <span class="call-button">
              <a href="tel:+{{$annonce->phone}}"><i class="fa fa-phone"></i> 
                +{{$annonce->phone}} &emsp;&emsp;
              </a>
            </span>
            <span class="call-button">
              <a href="https://api.whatsapp.com/send?phone={{$annonce->phone}}&text={{$annonce->description}}"><i class="fa fa-whatsapp"></i></a>
            </span>
          @endif
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ok</button>
  
        </div>
      </div>
    </div>
  </div>

