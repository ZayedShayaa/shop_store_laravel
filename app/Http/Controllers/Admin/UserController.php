<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::all();
        return view('admin.users.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->is_admin);
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|max:255',
                'password' => 'required|string|max:255|confirmed',
            ]);
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'is_admin' => $request->is_admin ?? 0,
                'phone' => $request->phone,
                'address' => $request->address,
                'password' => bcrypt($request->password),
            ]);

            return redirect()->route('users.index')->with('success', __('app.User_created_successfully'));
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', __('app.Error') . ': ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    // public function show(user $user)
    // {
    //     return view('admin.users.show', compact('user'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.users.create', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'password' => 'nullable|string|max:255|confirmed',
        ]);
        $password = $user->password;
        if ($request->password) {
            $password = bcrypt($request->password);
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'is_admin' => $request->is_admin ?? 0,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => $password,
        ]);

        return redirect()->route('users.index')->with('success', __('app.User_updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // check if user is online
        if (Auth::user()->id == $user->id) {
            return redirect()->back()->with('error', __('app.Cannot_Delete_User'));
        }
        $user->delete();

        return redirect()->route('users.index')->with('success', __('app.User_deleted_successfully'));
    }
}
