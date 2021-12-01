<?php
namespace App\Services;

use App\Models\Annonce;

class AnnonceService{
    private $annonceType = ['Boutique','Une Piece','Chambre salon','Deux chambres salon','Villa','Maison','Terrain','Magasin','Meublée'];
    public function all(){
        return Annonce::all();
    }

    public function getAnnonceType(){
        // $this->annonceType = sort($this->annonceType);
       return  $this->annonceType;
        // return  sort();
    }

    public function userAnnonce($user){
        return $user->annonces->sortByDesc('updated_at');
    }
}
