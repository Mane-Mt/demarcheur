
@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <body class="profile-page sidebar-collapse">
                <div class="page-header page-header-xs" data-parallax="true" style="background-image: url('./assets/img/uriel-soberanes.jpg');">
                    <div class="filter"><h1 class="text-white">Annonces</h1></div>
                </div>

                <div class="container col-md-9 col-offset-5 ">
                    <form action="/saveannonce" method="POST" enctype="multipart/form-data" >
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
                                            <label for="inputGroupSelect01" class="col-md-3">Type de chambre</label>
                                            <div class="input-group col-md-9">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text" for="inputGroupSelect01">Categorie de chambre</label>
                                                </div>
                                                <select class="custom-select" id="inputGroupSelect01" name="type_chamb" required>
                                                    <option value="Une Piece" selected>Une Piece</option>
                                                    <option value="Chambre salon">Chambre salon</option>
                                                    <option value="Deux chambres salon">Deux chambres salon</option>
                                                    <option value="Villa">Villa</option>
                                                    <option value="autre">autre</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- pour taper le quartier dans lequel l'on cherche la chambre à louer -->
                                            <div class="form-group row">
                                            <label for="quartier" class="col-md-3">Quartier</label>
                                            <div class="col-md-9">
                                                <input class="form-control" id="inputGroupSelect01" name="quartier" required>

                                                </input>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="description" class="col-md-3">Description</label>
                                            <div class="col-md-9">
                                                    <textarea class="form-control col-md-12" id="description" placeholder="la description de la chambre et de la maisaon ou de l'endroit" name="description" required></textarea>
                                                </label>
                                            </div>
                                        </div>
{{--
                                        <div class="form-group row">
                                            <label for="exampleFormControlTextarea1" class="col-md-3"></label>

                                        </div> --}}
                                        <br>
                                        @can('isAdmin')
                                        <div class="form-group row">
                                            <label for="File1" class="col-md-3">Photo N°1</label>
                                            <div class="col-md-9">
                                                <label class="custom-file-label" for="File1">
                                                    <input type="file" id="File1" name="photo1" placeholder="Choisir la photo de face de la chambre"  onchange="previewFile(this)" required>

                                                </label>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group row">
                                            <label for="File2" class="col-md-3">Photo N°2</label>
                                            <div class="col-md-9">
                                                <label class="custom-file-label" for="File2">
                                                    <input type="file" id="File2" name="photo2" placeholder="Choisir la photo l'interieur de la chambre" onchange="previewFile(this)">
                                                </label>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group row">
                                            <label for="File3" class="col-md-3">Photo N°3</label>
                                            <div class="col-md-9">
                                                <label class="custom-file-label" for="File3">
                                                    <input type="file" id="File3" name="photo3" onchange="previewFile(this)"></label>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group row">
                                            <label for="File4" class="col-md-3">Photo N°4</label>
                                            <div class="col-md-9">
                                                <label class="custom-file-label" for="File4">
                                                    <input type="file" id="File4" name="photo4" onchange="previewFile(this)"></label>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group row">
                                            <label for="File5" class="col-md-3">Photo N°5</label>
                                            <div class="col-md-9">
                                                <label class="custom-file-label" for="File5">
                                                    <input type="file" id="File5" name="photo5" onchange="previewFile(this)"></label>
                                            </div>
                                        </div>
                                        <br><br>
                                    <div class="card-footer">
                                        <div class="row">
                                            <img src="./assets/img/uriel-soberanes.jpg" id="previewImg1" alt="room image1" style="max-width: 170px; margin-top: 20px;" class="col-md-3">
                                            <img src="./assets/img/uriel-soberanes.jpg" id="previewImg2" alt="room image2" style="max-width: 160px; margin-top: 20px;" class="col-md-2">
                                            <img src="./assets/img/uriel-soberanes.jpg" id="previewImg3" alt="room image3" style="max-width: 180px; margin-top: 20px;" class="col-md-2">
                                            <img src="./assets/img/uriel-soberanes.jpg" id="previewImg4" alt="room image4" style="max-width: 160px; margin-top: 20px;" class="col-md-2">
                                            <img src="./assets/img/uriel-soberanes.jpg" id="previewImg5" alt="room image5" style="max-width: 170px; margin-top: 20px;" class="col-md-3">
                                        </div>
                                        @endcan

                                        <br><br>
                                        <div class="position-">
                                            <a href="dashboard" class="btn btn-danger">annuller</a>
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
            </body>
            @can('isAdmin')
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

            </script>
            @endcan

        </div>
    </div>
</div>
@endsection
