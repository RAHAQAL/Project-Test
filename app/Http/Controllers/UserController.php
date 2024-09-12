<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;

class UserController extends Controller
{
    public function index()
    {
        $user = User::orderBy('name', 'asc')->get();

        return view('user.user', [
            'user' => $user
        ]);
    }
    public function create()
    {
        return view('user.user-add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:t_users',
            'password' => 'required',
        ]);

        $user = User::create($request->all());

        Alert::success('Success', 'User has been saved !');
        return redirect('/user');
    }

    public function edit($id_user)
    {
        $user = user::findOrFail($id_user);

        return view('user.user-edit', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, $id_user)
    {
        \Log::info('Updating user', ['user_id' => $id_user, 'data' => $request->all()]);
    
        $validated = $request->validate([
            'name' => 'required|max:100|unique:t_users,name,' . $id_user . ',id_user',
            'email' => 'required|email|unique:t_users,email,' . $id_user . ',id_user',
            'password' => 'required',
        ]);
    
        $user = User::findOrFail($id_user);
        $user->update($validated);
    
        \Log::info('User updated successfully', ['user_id' => $id_user]);
    
        Alert::info('Success', 'User has been updated!');
        return redirect('/user')->with('status', 'User updated successfully!');
    }
    public function destroy($id_user)
    {
        try {
            $deleteduser = User::findOrFail($id_user);

            $deleteduser->delete();

            Alert::error('Success', 'User has been deleted !');
            return redirect('/user');
        } catch (Exception $ex) {
            Alert::warning('Error', 'Cant deleted, User already used !');
            return redirect('/user');
        }
    }
}
