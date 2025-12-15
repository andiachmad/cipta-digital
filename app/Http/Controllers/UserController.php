<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of users for Admin.
     */
    public function index()
    {
        $users = \App\Models\User::latest()->paginate(15);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy($id)
    {
        $user = \App\Models\User::findOrFail($id);
        $user->delete();
        
        return redirect()->back()->with('success', 'User deleted successfully.');
    }
}
