<?php
namespace App\Services;

use App\Models\Annonce;

class AnnonceService{

    public function all(){
        return Annonce::all();
    }

    public function userAnnonce($user){
        return $user->annonces->sortByDesc('id');
    }
}
