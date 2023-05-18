<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request){
        $users = null;
        if($request->search){
            $users = User::where('name', 'LIKE', '%'.$request->search.'%')->
                orWhere('email', 'LIKE', '%'.$request->search.'%')
                ->with('role')->get();
        }
        else{
            $users = User::with('role')->get();
        }
        return view('adm.users', ['users' => $users]);
    }
    public function ban(User $user){
        $user->update([
            'is_active' => false,
        ]);
        return back()->with('error' , __('validation.user_ban'));
    }

    public function unban(User $user){
        $user->update([
            'is_active' => true,
        ]);
        return back()->with('message' , __('validation.user_unban'));
    }

    public function edit(User $user){
        return view('adm.edit', ['user' => $user, 'roles' => Role::all()]);
    }

    public function update(Request $request, User $user){
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role_id' => $request->input('role_id'),
        ]);
        return redirect()->route('adm.users.index')->with('message', __('validation.role_upd'));
    }

    public function destroy(User $user){
        $user->delete();
        return redirect()->route('adm.users.index')->with('error' ,__('messages.Delete'));
    }

}
