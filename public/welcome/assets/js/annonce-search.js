$(document).ready(function () {
    $('.search').keyup(function (e) {
        var value = $(this).val();

        if(value != ''){
            var _token = $('input[name="_token"]').val();
            var find = false;

            var html = '<div class="card-body box">'+
                                'Aucun resultat n\'as été trouvé pour <b> '+ value +' </b>'
                            '</div>'+
                        '</div>';

            $.ajax({
                type: "POST",
                url: "{{ route('annonces.search')}}",
                data: {value:value,_token:_token},
                success: function (response) {

                   if(response != ''){
                         html= '';
                            // if (element.annoceType== "Offre"){
                                        // '<div class=""><img src="public/images/.'+element.photo1+'" alt="" > </div>'+
                                        //    }else{  '<i class="fa fa-question-circle fa-10x text-danger" aria-hidden="true" style="font-size: 3.5rem" ></i>'+
                                        // }
                        $.each(response,function (index, element) {
                            // alert(element.id)
                            html += '<div class="row my-3 box ';
                                    if (element.annonceType == "Demande") {
                            html     += 'box-danger';
                                     }else{
                            html    += 'box-success';
                                     }
                            html+= '">'+

                                    '<h3 class="text-center font-weight-bold">'+element.annonceType+'</h3>'+
                                    '<div class="col-lg-2 col-sm-12 text-center text-lg-right">';
                                     if (element.annonceType =="Ofrre") {
                            html        += '';
                                    }else{
                            html        += '<i class="fa fa-question-circle fa-10x text-danger" aria-hidden="true" style="font-size: 3.5rem" ></i>';
                                    }

                             html      +='</div>'+
                                         '<div class="col-lg-8 col-sm-12 annonce ">'+
                                            '<ul>'+
                                            '<li><b>'+element.type+'</b>';
                                            if (element.offerType != null) {
                           html            += ' à <b> '+element.offerType+'</b>';
                                            }
                            html          +='</li>'+
                                            '<li>Pays: <b>'+element.country+'</b></li>'+
                                            '<li>Ville: <b>'+element.town+'</b></li>'+
                                            '<li>Budget <b>'+element.price+'</b></li>'+
                                            '<li>Quartier:<b>'+element.quartier+'</b></li>'+
                                            ' <li class="overflow-hidden">'+element.description+'</li>'+
                                        '</ul>'+
                                        '</div>';

                                html  +='<div class="col-lg-2 col-sm-12 text-center text-lg-right">'+
                                            '<a href="annonces/",'+element.id+ ')}}" class="btn btn-warning btn-sm-block btn-circle mt-lg-1 mx-lg-0 mt-xs-5" > Details </a>'+
                                        '</div>'+
                                    '</div>';
                       });
                    }
                    // alert(html)
                    $('#section').fadeIn();
                    $('#section').html(html);
               }
            });

        }

    });
});