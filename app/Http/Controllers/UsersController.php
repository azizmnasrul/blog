<?php

namespace App\Http\Controllers;
use App\User; 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;

class UsersController extends Controller
{
    //
    public function index()
    {
        $users=User::where('id', '>', 0)->paginate(5);
        
        return view('index',compact('users'));
    }

    public function create(){
        return view('create');
    }
    
    public function store(Request $request){
        $validasi = $this->validate($request, [
        'email' => 'unique:users,email',
        'password'=>'required|min:6|confirmed',
        'password_confirmation' => 'required_with:password|same:password'
        ]);
        
        $user = new User;
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->born_city = $request->get('born_city');
        $user->born_date = $request->get('born_date');
        $user->gender = $request->get('gender');
        $user->address = $request->get('address');
        $user->phone_number = $request->get('phone_number');
        $user->password = $request->get('password');
        if (empty($validasi)){ 
            $user->save();
            return redirect()->route('users.create')->with('status', 'data created!');
        }
        else{
            return back();
        }
        
        //return redirect('users')->with('success', 'Selamat data user berhasil disimpan');

        
        
        
    }
    
    public function edit($id){
        $users = User::where('id', $id)->get();
        return view('edit', compact('users'));
        
    }
    
        public function update(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->born_city = $request->born_city;
        $user->born_date = $request->born_date;
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->phone_number = $request->phone_number;
        $user->password = $request->password;
        $user->save();
        return redirect()->route('users.index')->with('alert-success', 'Data berhasil diubah!');
    }
    
    public function destroy($id)
{
    $user = User::where('id', $id)->first();
    //$user->delete();
    return redirect()->route('users.index');
}
}
