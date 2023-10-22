<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(5);
        return view('backoffice.users.index', compact('users'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'userType' => 'required',
            'profileImage' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'coverImage' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $data = $request->all();

        if ($request->hasFile('profileImage')) {
            $profileImage = $request->file('profileImage');
            $profileImageName = time() . '_' . $profileImage->getClientOriginalName();
            $profileImage->move(public_path('images/profile'), $profileImageName);
            $data['profileImage'] = 'images/profile/' . $profileImageName;
        }

        if ($request->hasFile('coverImage')) {
            $coverImage = $request->file('coverImage');
            $coverImageName = time() . '_' . $coverImage->getClientOriginalName();
            $coverImage->move(public_path('images/cover'), $coverImageName);
            $data['coverImage'] = 'images/cover/' . $coverImageName;
        }

        User::create($data);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
            'userType' => 'required',
            'profileImage' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'coverImage' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $data = $request->all();

        $user = User::findOrFail($id);

        if ($request->hasFile('profileImage')) {
            $profileImage = $request->file('profileImage');
            $profileImageName = time() . '_' . $profileImage->getClientOriginalName();
            $profileImage->move(public_path('images/profile'), $profileImageName);
            $data['profileImage'] = 'images/profile/' . $profileImageName;
        }

        if ($request->hasFile('coverImage')) {
            $coverImage = $request->file('coverImage');
            $coverImageName = time() . '_' . $coverImage->getClientOriginalName();
            $coverImage->move(public_path('images/cover'), $coverImageName);
            $data['coverImage'] = 'images/cover/' . $coverImageName;
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
