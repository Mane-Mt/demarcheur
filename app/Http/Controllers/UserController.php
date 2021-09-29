<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(User $model)
    {
        $data['users'] = User::all();
        return view('users.index',$data);
    }

    public function show()
    {
        $users = User::all();
        return view('adminLte/listUser')->with('users',$users);
    }

    public function create()
    {
        return view('users.create');
    }


     public function store(Request $request)
    {
        $users = new User;
        $users->name = $request->input('name');
        $users->phone = $request->input('phone');
        $users->email = $request->input('email');
        $users->password =  Hash::make($request->input('password'));

        $confirm = $request->input('confirm');

        if ($request->input('password') == $request->input('confirm')){
           $users->save();
           $message = 'your successfuly save user '.$users->name;
            return redirect('/admin/addUser')->with('success', $message);
        }else{
             $message = 'your password doesn\'t match'.$request->input('password').' # '.$confirm;
             return redirect('/admin/addUser')->with('fail', $message);
        }
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //
        $users = User::findOrFail($id);
        return view('adminLte.editUser')->with('users', $users);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $users = User::find($id);
        $oldname= $users->name;
        $users->name = $request->input('username');
        $users->usertype = $request->input('usertype');
        $users->update();
        $message = 'your successfuly updated <strong>'.$oldname.'</strong>';
        return redirect('/admin/listUser')->with('successupdate', $message);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        //
        $users = User::findOrFail($id);
        $oldname= $users->name;
        $users->delete();
        $message = 'your successfuly delete <strong>'.$oldname.'</strong>';
        return redirect('/admin/listUser')->with('successdelete', $message);


    }
}
