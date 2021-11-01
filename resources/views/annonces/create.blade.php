
@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="profile-page sidebar-collapse">
                <div class="page-header page-header-xs" data-parallax="true" >
                    <div class="filter"><h1 class="text-white">Annonces</h1></div>
                </div>
                {{-- {{dd(auth()->user()->usertype)}} --}}
                <div class="container col-md-9 col-offset-5 ">
                    <form action="{{ route('annonces.store')}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="card">
                            <!-- Main content -->
                            <section class="content">
                                <div class="col-md-12">
                                  <div class="card card-outline card-info">

                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <br>
                                        <br>
                                        <div class="form-group row">
                                            <label for="annonceType" class="col-md-3">Type d'annonce</label>
                                            <div class="input-group col-md-9">
                                                {{-- {{dd(auth()->user()->usertype)}} --}}
                                                <select class="custom-select" id="annonceType" name="annonceType" required>
                                                    @can('postAnnonce')
                                                    <option value="Offre"  {{ auth()->user()->usertype == 'Demarcheur'|| auth()->user()->usertype == 'Admin' ?'selected':'' }}>Offre</option>
                                                    @endcan

                                                    <option value="Demande"  {{ (auth()->user()->usertype == 'Simple' )?'selected':'' }}>Demande</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputGroupSelect01" class="col-md-3">Type de chambre</label>
                                            <div class="input-group col-md-9">

                                                <select class="custom-select" id="inputGroupSelect01" name="type_chamb" required>
                                                    <option value="Une Piece" selected>Une Piece</option>
                                                    <option value="Chambre salon">Chambre salon</option>
                                                    <option value="Deux chambres salon">Deux chambres salon</option>
                                                    <option value="Villa">Villa</option>
                                                    <option value="Terrain">Terrain</option>
                                                    <option value="Maison">Maison</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputGroupSelect01" class="col-md-3">Type de demande / offre</label>
                                            <div class="input-group col-md-9">

                                                <select class="custom-select" id="inputGroupSelect01" name="offerType" required>
                                                    <option value="louer" selected>A louer</option>
                                                    <option value="vendre" id="sell" hidden>A vendre</option>
                                                    <option value="acheter" id="buy" hidden>A acheter</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="country" class="col-md-3">Pays</label>
                                            <div class="col-md-9">
                                                <input class="form-control" id="inputGroupSelect01" name="country" required>
                                            </div>
                                        </div>

                                        <!-- pour taper le quartier dans lequel l'on cherche la chambre à louer -->
                                        <div class="form-group row">
                                            <label for="town" class="col-md-3">Ville</label>
                                            <div class="col-md-9">
                                                <input class="form-control" id="inputGroupSelect01" name="town" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="quartier" class="col-md-3">Quartier</label>
                                            <div class="col-md-9">
                                                <input class="form-control" id="inputGroupSelect01" name="quartier" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="price" class="col-md-3">budget / Prix</label>
                                            <div class="col-md-9">
                                                <input class="form-control" id="inputGroupSelect01" name="price" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="description" class="col-md-3">Description</label>
                                            <div class="col-md-9">
                                                    <textarea class="form-control col-md-12" id="description" placeholder="la description de la chambre et de la maisaon ou de l'endroit" name="description" required></textarea>
                                                </label>
                                            </div>
                                        </div>

                                        <br>
                                        {{-- @can('postAnnonce') --}}
                                        <div id="photos"  {{ (auth()->user()->usertype == 'Simple')?'hidden':'' }} >
                                            <div class="form-group row">
                                                <label for="File1" class="col-md-3">Photo N°1</label>
                                                <div class="col-md-9">
                                                    <label class="custom-file-label" for="File1">
                                                        <input type="file" id="File1" name="photo1" placeholder="Choisir la photo de face de la chambre"  class="file" onchange="previewFile(this)">

                                                    </label>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-group row">
                                                <label for="File2" class="col-md-3">Photo N°2</label>
                                                <div class="col-md-9">
                                                    <label class="custom-file-label" for="File2">
                                                        <input type="file" id="File2" name="photo2" placeholder="Choisir la photo l'interieur de la chambre" class="file" onchange="previewFile(this)">
                                                    </label>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-group row">
                                                <label for="File3" class="col-md-3">Photo N°3</label>
                                                <div class="col-md-9">
                                                    <label class="custom-file-label" for="File3">
                                                        <input type="file" id="File3"  name="photo3" class="file" onchange="previewFile(this)"></label>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-group row">
                                                <label for="File4" class="col-md-3">Photo N°4</label>
                                                <div class="col-md-9">
                                                    <label class="custom-file-label" for="File4">
                                                        <input type="file" id="File4" name="photo4" class="file" onchange="previewFile(this)"></label>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-group row">
                                                <label for="File5" class="col-md-3">Photo N°5</label>
                                                <div class="col-md-9">
                                                    <label class="custom-file-label" for="File5">
                                                        <input type="file" id="File5" name="photo5" class="file" onchange="previewFile(this)"></label>
                                                </div>
                                            </div>
                                            <br><br>

                                            <div class="row">
                                                <img src="{{asset('welcome/assets/images/contact-form-bg.png')}}" id="previewImg1" alt="room image1" style="max-width: 170px; margin-top: 20px;" class="col-md-3">
                                                <img src="{{asset('welcome/assets/images/contact-form-bg.png')}}" id="previewImg2" alt="room image2" style="max-width: 160px; margin-top: 20px;" class="col-md-2">
                                                <img src="{{asset('welcome/assets/images/contact-form-bg.png')}}" id="previewImg3" alt="room image3" style="max-width: 180px; margin-top: 20px;" class="col-md-2">
                                                <img src="{{asset('welcome/assets/images/contact-form-bg.png')}}" id="previewImg4" alt="room image4" style="max-width: 160px; margin-top: 20px;" class="col-md-2">
                                                <img src="{{asset('welcome/assets/images/contact-form-bg.png')}}" id="previewImg5" alt="room image5" style="max-width: 170px; margin-top: 20px;" class="col-md-3">
                                            </div>
                                        {{-- @endcan --}}
                                        </div>
                                        {{-- @endcan --}}


                                        <br><br>
                                    <div class="card-footer">
                                        <div class="">
                                            <a href="dashboard" class="btn btn-danger">annuler</a>
                                            <button type="submit" class="btn btn-primary">Publier</button>
                                        </div>

                                    </div>
                                  </div>
                                </div>
                                <!-- /.col-->
                              </div>

                              <!-- ./row -->
                            </section>
                            <!-- /.content -->
                            <!-- /.content-wrapper -->

                        </div>
                      </form>
                </div>
            </div>


        </div>
    </div>
</div>
@endsection
@push('js')
<script>

function previewFile(input){
            var file1 = $("input[type=file]").get(0).files[0];
            var file2 = $("input[type=file]").get(1).files[0];
            var file3 = $("input[type=file]").get(2).files[0];
            var file4 = $("input[type=file]").get(3).files[0];
            var file5 = $("input[type=file]").get(4).files[0];

            if(file1) {
                var reader1 = new FileReader();
                reader1.onload = function(){
                    $('#previewImg1').attr("src",reader1.result);
                }
                reader1.readAsDataURL(file1);
            }
            if(file2) {
                var reader2 = new FileReader();
                reader2.onload = function(){
                    $('#previewImg2').attr("src",reader2.result);
                }
                reader2.readAsDataURL(file2);
            }
            if(file3) {
                var reader3 = new FileReader();
                reader3.onload = function(){
                    $('#previewImg3').attr("src",reader3.result);
                }
                reader3.readAsDataURL(file3);
            }
            if (file4) {
                var reader4 = new FileReader();
                reader4.onload = function(){
                    $('#previewImg4').attr("src",reader4.result);
                }
                reader4.readAsDataURL(file4);
            }
            if (file5) {
                var reader5 = new FileReader();
                reader5.onload = function(){
                    $('#previewImg5').attr("src",reader5.result);
                }
                reader5.readAsDataURL(file5);
            }
        }

    $(document).ready(function () {
            // alert('ok');
        $('#annonceType').change(function (e) {
            e.preventDefault();

           if( $(this).val() == 'Offre'){
            $('#photos').attr('hidden', false);
            $('#File1').attr('required',true);
            $('#sell').attr('hidden', false);
            $('#buy').attr('hidden', true);

           }else{
            $('#photos').attr('hidden', true);
            $('#File1').attr('required',false);
            $('#sell').attr('hidden', true);
            $('#buy').attr('hidden', false);
           }
        });
    });

   
</script>
@endpush
