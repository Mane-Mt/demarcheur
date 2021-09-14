 <?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\userManager;
use Illuminate\Http\Request;
use App\Models\User;

class UserManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showUser()
    {
        $users = User::all();
        return view('adminLte/listUser')->with('users',$users);
    }

    public function getAddUser()
    {
        return view('adminLte/addUser');
    }


     public function postAddUser(Request $request)
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
     * @param  \App\Models\userManager  $userManager
     * @return \Illuminate\Http\Response
     */
    public function edituser(Request $request, $id)
    {
        //
        $users = User::findOrFail($id);
        return view('adminLte.editUser')->with('users', $users);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\userManager  $userManager
     * @return \Illuminate\Http\Response
     */
    public function updateuser(Request $request, $id)
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
     * @param  \App\Models\userManager  $userManager
     * @return \Illuminate\Http\Response
     */
    public function deleteuser(Request $request, $id)
    {
        //
        $users = User::findOrFail($id);
        $oldname= $users->name;
        $users->delete();
        $message = 'your successfuly delete <strong>'.$oldname.'</strong>';
        return redirect('/admin/listUser')->with('successdelete', $message);


    }
}
