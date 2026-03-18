<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\PasswordUpdateRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Models\Topping;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Show a list of all of the application's users.
     */
    public function fetchAll()
    {
        // On récupère tous les utilisateurs
        $users = Topping::all();

        // On retourne les informations des utilisateurs en JSON
        return response()->json($users);
    }

    /**
     * Display all users
     * 
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $users = User::all();

        return view('profilsidebar', compact('users'));
    }

    /**
     * Show form for creating user
     * 
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
        return view('users.create');
    }

    /**
     * Store a newly created user
     * 
     * @param User $user
     * @param StoreUserRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(User $user, StoreUserRequest $request) 
    {
        //For demo purposes only. When creating user or inviting a user
        // you should create a generated random password and email it to the user
        $user->create(array_merge($request->validated(), [
            'password' => 'test' 
        ]));

        return redirect()->route('users.index')
            ->withSuccess(__('User created successfully.'));
    }

    /**
     * Show user data
     * 
     * @param User $user
     * 
     * @return \Illuminate\Http\Response
     */
    public function show() 
    {
        $users = User::all();
        if(auth()->user()->role_id > 0)
        return view('listuser', compact('users'));
    }

    /**
     * Edit user data
     * 
     * @param User $user
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user) 
    {
        return view('users.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update user data
     * 
     * @param User $user
     * @param UserUpdateRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user) 
    {
        $user->update($request->validated());
    
        return redirect()->route('users.index')
            ->withSuccess(__('Profil modifié avec succès!'));
    }


 
public function changePasswordIndex(){
    return view('changemdp');
}
public function updatePassword(PasswordUpdateRequest $request,User $user)
{
    
    $validatedData = $request->validated();

    $validatedData['password'] = Hash::make($validatedData['newpassword']);

    $user->update($validatedData);

    return redirect()->back()->with('success', 'Mot de passe mis à jour avec succès.');
}


    /**
     * Delete user data
     * 
     * @param User $user
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user) 
    {
        $user->delete();

        return redirect()->route('users.index')
            ->withSuccess(__('User deleted successfully.'));
    }
}
