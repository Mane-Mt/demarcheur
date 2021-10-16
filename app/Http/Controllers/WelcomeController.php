<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Annonce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function index()
    {

        $annonces = Annonce::with('user')->orderBy('id','desc')->get();
        $data['annonces'] = $annonces;
        $data['request_annonces'] = $annonces->where('annonceType','Demande')->take(10);
        $data['offer_annonces'] = $annonces->where('annonceType','Offre')->take(10);

        $data['une_piece_annonce'] = $annonces->where('type','Une Piece')->where('annonceType','Offre')->first();
        $data['villa_annonce'] = $annonces->where('type','Villa')->where('annonceType','Offre')->first();
        $data['chambre_salon_annonce'] = $annonces->where('type','Chambre salon')->where('annonceType','Offre')->first();
        $data['deux_chambre_annonce'] = $annonces->where('type','Deux chambres salon')->where('annonceType','Offre')->first();

        $allUsers = User::all();
        $data['demarcheurs'] = $allUsers->where('usertype','Demarcheur');
        $data['users'] = $allUsers->where('usertype','Simple');
        return view('welcome',$data);
    }

}
