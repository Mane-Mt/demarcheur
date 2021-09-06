<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Annonce;
class WelcomeController extends Controller
{
    public function index()
    {
    // 	$chambre = DB::select('select * from annonces where posteur = "demarcheur" ORDER BY id DESC LIMIT 10');

    // 	$lastPiece = DB::select('select * from annonces where posteur = "demarcheur" and type = ? ORDER BY id DESC LIMIT 1',['Une Piece']);


    // 	$Chambre_salon = DB::select('select * from annonces where posteur = "demarcheur" and type = ? ORDER BY id DESC LIMIT 1',['Chambre salon']);


    // 	$Deux_chambres_salon = DB::select('select * from annonces where posteur = "demarcheur" and type = ? ORDER BY id DESC LIMIT 1',['Deux chambres salon']);

    // 	$Villa = DB::select('select * from annonces where posteur = "demarcheur" and type = ? ORDER BY id DESC LIMIT 1',['Villa']);

    //     $annonces = DB::select("select * from annonces where posteur = 'null' ORDER BY id DESC LIMIT 10");
    //     $bestDemarcheur = DB::select("select * from users ORDER BY grade DESC LIMIT 3");

    //     if ($chambre) {
    //         $chambres =['chambre'=>$chambre,
    //         'lastPiece'=>$lastPiece,
    //         'Chambre_salon'=>$Chambre_salon,
    //         'Deux_chambres_salon'=>$Deux_chambres_salon,
    //         'Villa'=>$Villa,
    //         'annonces'=>$annonces,
    //         //'demarcheurchambre'=>$demarcheurchambre

    //         ];
    //         if ($lastPiece) {
    //             $chambres =['chambre'=>$chambre,
    //             'lastPiece'=>$lastPiece,
    //             'Chambre_salon'=>$Chambre_salon,
    //             'Deux_chambres_salon'=>$Deux_chambres_salon,
    //             'Villa'=>$Villa,
    //             'annonces'=>$annonces,

    //             ];
    //             if ($Chambre_salon) {
    //                 # code...
    //                 $chambres =['chambre'=>$chambre,
    //                 'lastPiece'=>$lastPiece,
    //                 'Chambre_salon'=>$Chambre_salon,
    //                 'Deux_chambres_salon'=>$Deux_chambres_salon,
    //                 'Villa'=>$Villa,
    //                 'annonces'=>$annonces,

    //                 ];
    //                 if ($Deux_chambres_salon) {
    //                     # code...
    //                     $chambres =['chambre'=>$chambre,
    //                     'lastPiece'=>$lastPiece,
    //                     'Chambre_salon'=>$Chambre_salon,
    //                     'Deux_chambres_salon'=>$Deux_chambres_salon,
    //                     'Villa'=>$Villa,
    //                     'annonces'=>$annonces,

    //                     ];
    //                     if ($Villa) {
    //                         # code...
    //                         $chambres =['chambre'=>$chambre,
    //                         'lastPiece'=>$lastPiece,
    //                         'Chambre_salon'=>$Chambre_salon,
    //                         'Deux_chambres_salon'=>$Deux_chambres_salon,
    //                         'Villa'=>$Villa,
    //                         'annonces'=>$annonces,

    //                         ];
    //                     }else{
    //                         $chambres =['chambre'=>$chambre,
    //                         'lastPiece'=>$lastPiece,
    //                         'Chambre_salon'=>$Chambre_salon,
    //                         'Deux_chambres_salon'=>$Deux_chambres_salon,
    //                         'Villa'=>$Villa,
    //                         'annonces'=>$annonces,

    //                         ];
    //                     }
    //                 }else{
    //                     $chambres =['chambre'=>$chambre,
    //                     'lastPiece'=>$lastPiece,
    //                     'Chambre_salon'=>$Chambre_salon,
    //                     'Deux_chambres_salon'=>$Deux_chambres_salon,
    //                     'Villa'=>$Villa,
    //                     'annonces'=>$annonces,
    //                     // 'demarcheurchambre'=>$demarcheurchambre,
    //                     // 'demarcheurlastPiece'=>$demarcheurlastPiece,
    //                     // 'demarcheurChambre_salon'=>$demarcheurChambre_salon
    //                     ];
    //                 }
    //             }else{
    //                 $chambres =['chambre'=>$chambre,
    //                 'lastPiece'=>$lastPiece,
    //                 'Chambre_salon'=>$Chambre_salon,
    //                 'Deux_chambres_salon'=>$Deux_chambres_salon,
    //                 'Villa'=>$Villa,
    //                 'annonces'=>$annonces,
    //                 // 'demarcheurchambre'=>$demarcheurchambre,
    //                 // 'demarcheurlastPiece'=>$demarcheurlastPiece
    //                 ];
    //             }
    //         }else{
    //             $chambres =['chambre'=>$chambre,
    //             'lastPiece'=>$lastPiece,
    //             'Chambre_salon'=>$Chambre_salon,
    //             'Deux_chambres_salon'=>$Deux_chambres_salon,
    //             'Villa'=>$Villa,
    //             'annonces'=>$annonces,
    //             // 'demarcheurchambre'=>$demarcheurchambre
    //             ];
    //         }
    //     }else{
    //         $chambres =['chambre'=>$chambre,
    //         'lastPiece'=>$lastPiece,
    //         'Chambre_salon'=>$Chambre_salon,
    //         'Deux_chambres_salon'=>$Deux_chambres_salon,
    //         'Villa'=>$Villa,
    //         'annonces'=>$annonces
    //         ];
    //     }
        // dd($chambres,$bestDemarcheur);
        // return view('welcome',['chambres'=>$chambres,'bestDemarcheur'=>$bestDemarcheur]);
        $annonces = Annonce::with('user')->orderBy('id','desc')->get();

        $data['request_annonces'] = $annonces->where('annonceType','Demande')->take(10);
        $data['offer_annonces'] = $annonces->where('annonceType','Offre')->take(10);
        
        $data['une_piece_annonce'] = $annonces->where('type','Une Piece')->where('annonceType','Offre')->first();
        $data['villa_annonce'] = $annonces->where('type','Villa')->where('annonceType','Offre')->first();
        $data['chambre_salon_annonce'] = $annonces->where('type','Chambre salon')->where('annonceType','Offre')->first();
        $data['deux_chambre_annonce'] = $annonces->where('type','Deux chambres salon')->where('annonceType','Offre')->first();
        // dd($annonces, $data['request_annonces']);
        return view('welcome',$data);
    }

}
