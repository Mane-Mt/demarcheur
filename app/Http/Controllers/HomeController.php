<?php

namespace App\Http\Controllers;
use App\Services\AnnonceService;
use App\Models\Annonce;

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
        // dd($data['annonces']);
        return view('dashboard',$data);
    }
}
