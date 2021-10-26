<?php

namespace App\Http\Controllers;

use App\Services\AnnonceService;
use App\Models\Annonce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnnonceController extends Controller
{
    public function __construct(AnnonceService $annonceService)
    {
        $this->annonceService = $annonceService;
    }
    public function index($annonceType =null){
        if ($annonceType == null) {
            $data['annonces'] = Annonce::orderBy('id','desc')->get();
        }else{
            $data['annonces'] = Annonce::where('annonceType',$annonceType)->orderBy('id','desc')->get();
        }

        return view('annonces.index',$data);

    }
    public function create(){
        return view('annonces.create');
    }

    public function show($id){
        $data['annonce'] = Annonce::find($id);

        return view('annonces.detail',$data);
    }

    public function search(Request $request){
        $value = $request->value;
        $annonces = Annonce::with(['user'])
                        ->where('quartier','LIKE','%'.$value.'%')
                        ->orWhere('country','LIKE','%'.$value.'%')
                        ->orWhere('town','LIKE','%'.$value.'%')
                        ->orWhere('price','LIKE','%'.$value.'%')
                        // ->orWhere('quartier','LIKE','%'.$value.'%')
                        ->get();
        return response()->json($annonces);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $annonce = new Annonce();
        $this->insert($request, $annonce);
        $message = "Annonce creé avec succèss";
        return redirect()->route('home')->with('success', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Annonce  $annonce
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Annonce  $annonce
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
         $data['annonce']= Annonce::findOrFail($id);

        return view('annonces.edit',$data);

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Annonce  $annonce
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $annonce = Annonce::findOrFail($id);
        $this->insert($request,$annonce);
        $message = "Annonce modifié avec succèss";
        return redirect()->route('home')->with('success', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Annonce  $annonce
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $annonce = Annonce::findOrFail($id);
        $type= $annonce->type;
        $quartier = $annonce->quartier;
        $annonce->delete();
        $message = 'vous avez suprimer avec success '.$type.' du quartier '.$quartier;
        return redirect()->route('home')->with('success', $message);
    }

    public function insert(Request $request, $annonce)
    {
        // dd($request->all());
        $type_de_chambre = $request->input('type_chamb');
        $quartier_ou_trouve_chambre =$request->input('quartier');
        $descrition_de_chambre = $request->input('description');
        $etat_annonce = 1;//pour dir que l'annonce est d'aactualite

        //traitement des photos
        // Testons si le fichier a bien été envoyé et s'il n'y a pasd'erreur
        $photo1 = $request->file('photo1');
        $photo2 = $request->file('photo2');
        $photo3 = $request->file('photo3');
        $photo4= $request->file('photo4');
        $photo5= $request->file('photo5');
        if ($photo1!= null AND $_FILES['photo1']['error']== 0)
        {
            // Testons si le fichier n'est pas trop gros
            if ($_FILES['photo1']['size'] <= 1000000)
            {
                // Testons si l'extension est autorisée
                $extensions_autorisees = array('jpg', 'jpeg', 'gif','png');
                if (in_array($photo1->extension(),$extensions_autorisees))
                {
                // On peut valider le fichier et le stockerdéfinitivement
                    $photo1Name = 'chambre'.time().'.'.$photo1->extension();
                    $photo1->move(public_path('images'),$photo1Name);
                    $message = "L'envoi a bien été effectué !";
                }
                else{
                    $messagex =" l'extension de votre fichier n'esst pas supporte pas le systeme";
                }
            }else{
                $messaget = "la taile de votre fichier est trop grand veillez choisir un un fichier de taile plus  petite";
            }
        }else{
            $photo1Name = null;
            $messageup = " pohto non uploadé";
        }


        if ($photo2!= null AND $_FILES['photo2']['error']== 0)
        {
            // Testons si le fichier n'est pas trop gros
            if ($_FILES['photo2']['size'] <= 1000000)
            {
                // Testons si l'extension est autorisée
                $extensions_autorisees = array('jpg', 'jpeg', 'gif','png');
                if (in_array($photo2->extension(),$extensions_autorisees))
                {
                // On peut valider le fichier et le stockerdéfinitivement
                    $photo2Name = 'chambre'.time().'1'.'.'.$photo2->extension();
                    $photo2->move(public_path('images'),$photo2Name);
                    $message = "L'envoi a bien été effectué !";
                }
                else{
                    $messagex =" l'extension de votre fichier n'esst pas supporte pas le systeme";
                }
            }else{
                $messaget = "la taile de votre fichier est trop grand veillez choisir un un fichier de taile plus  petite";
            }
        }else{
            $photo2Name = null;
            $messageup = " pohto non uploadé";
        }

        if ($photo3!= null AND $_FILES['photo3']['error']== 0)
        {
            // Testons si le fichier n'est pas trop gros
            if ($_FILES['photo3']['size'] <= 1000000)
            {
                // Testons si l'extension est autorisée
                $extensions_autorisees = array('jpg', 'jpeg', 'gif','png');
                if (in_array($photo3->extension(),$extensions_autorisees))
                {
                // On peut valider le fichier et le stockerdéfinitivement
                    $photo3Name = 'chambre'.time().'2'.'.'.$photo3->extension();
                    $photo3->move(public_path('images'),$photo3Name);
                    $message = "L'envoi a bien été effectué !";
                }
                else{
                    $messagex =" l'extension de votre fichier n'esst pas supporte pas le systeme";
                }
            }else{
                $messaget = "la taile de votre fichier est trop grand veillez choisir un un fichier de taile plus  petite";
            }
        }else{
            $photo3Name = null;
            $messageup = " pohto non uploadé";
        }

        if ($photo4!= null AND $_FILES['photo4']['error']== 0)
        {
            // Testons si le fichier n'est pas trop gros
            if ($_FILES['photo4']['size'] <= 1000000)
            {
                // Testons si l'extension est autorisée
                $extensions_autorisees = array('jpg', 'jpeg', 'gif','png');
                if (in_array($photo4->extension(),$extensions_autorisees))
                {
                // On peut valider le fichier et le stockerdéfinitivement
                    $photo4Name = 'chambre'.time().'3'.'.'.$photo4->extension();
                    $photo4->move(public_path('images'),$photo4Name);
                    $message = "L'envoi a bien été effectué !";
                }
                else{
                    $messagex =" l'extension de votre fichier n'esst pas supporte pas le systeme";
                }
            }else{
                $messaget = "la taile de votre fichier est trop grand veillez choisir un un fichier de taile plus  petite";
            }
        }else{
            $photo4Name = null;
            $messageup = " pohto non uploadé";
        }

        if ($photo5!= null AND $_FILES['photo5']['error']== 0)
        {
            // Testons si le fichier n'est pas trop gros
            if ($_FILES['photo5']['size'] <= 1000000)
            {
                // Testons si l'extension est autorisée
                $extensions_autorisees = array('jpg', 'jpeg','png');
                if (in_array($photo5->extension(),$extensions_autorisees))
                {
                // On peut valider le fichier et le stockerdéfinitivement
                    $photo5Name = 'chambre'.time().'4'.'.'.$photo5->extension();
                    $photo5->move(public_path('images'),$photo5Name);
                    $message = "L'envoi a bien été effectué !";
                }
                else{
                    $messagex =" l'extension de votre fichier n'esst pas supporte pas le systeme";
                }
            }else{
                $messaget = "la taile de votre fichier est trop grand veillez choisir un un fichier de taile plus  petite";
            }
        }else{
            $photo5Name = null;
            $messageup = " pohto non uploadé";
        }

        $annonce->annonceType = $request->annonceType;
        $annonce->country = $request->country;
        $annonce->town = $request->town;
        $annonce->price = $request->price;
        $annonce->type = $type_de_chambre;
        $annonce->quartier = $quartier_ou_trouve_chambre;
        $annonce->description  = $descrition_de_chambre;
        $annonce->status  = $etat_annonce;

        $annonce->user_id = Auth::id(); // l'id du demarcheur qui a poster l'annonce
        $annonce->photo1 = $photo1Name;
        $annonce->photo2  = $photo2Name;
        $annonce->photo3  = $photo3Name;
        $annonce->photo4  = $photo4Name;
        $annonce->photo5  = $photo5Name;
        $annonce->save();

    }

    // public function manage_picture(file $photo1, file $photo2, file $photo3, file $photo4, file $photo5)
    // {

    // }
}
