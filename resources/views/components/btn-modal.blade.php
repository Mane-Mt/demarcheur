
    <button type="button" class="btn {{ $class }} mt-sm-auto mt-lg-0" data-toggle="modal" data-target="#modal-{{ $modalId }}" title="{{ $actionTitle ?? '' }}">
        {{$btnName}}
     </button>
     <div class="modal fade" id="modal-{{ $modalId }}" tabindex="-1" role="dialog" aria-labelledby="modal-{{ $modalId }}Label" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
             <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title mt-0" id="modal-{{ $modalId }}Label">{{ $modalTitle }}</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 {{$modalBody}}
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-warning" data-dismiss="modal">Annuler</button>
                 <form action="{{ $link }}" method="POST">
                     {{ method_field($submitMethod) }}
                     @csrf
                     <button type="submit" class="btn btn-{{$saveBtnColor}}" id="{{$id ?? ''}}">{{ $savebtnTitle }}</button>
                 </form>
             </div>
             </div>
         </div>
         </div>

