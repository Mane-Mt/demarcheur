<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Annonce;
use App\Services\AnnonceService;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AnnonceService $annonceService)
    {
        $this->annonceService = $annonceService;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $data['annonces'] =$this->annonceService->userAnnonce(auth()->user());
        $allUsers = User::all();
        $data['allUsers'] =  $allUsers;
        $data['demarcheurs'] = $allUsers->where('usertype','Demarcheur');
        $data['users'] = $allUsers->where('usertype','Simple');
        $data['dashboard'] = true;
        return view('dashboard',$data);
    }
}
