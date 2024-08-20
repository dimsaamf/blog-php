<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class AccountController extends Controller
{
    /**
     * Display a listing of the accounts.
     */
    public function index()
    {
        $accounts = Account::all();
        return view('accounts.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new account.
     */
    public function create()
    {
        return view('accounts.create');
    }

    /**
     * Store a newly created account in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:accounts|max:45',
            'password' => 'required|min:6',
            'name' => 'required|max:45',
            'role' => 'required|in:Admin,Author',
        ]);

        Account::create($request->all());

        return redirect()->route('accounts.index')->with('success', 'Account created successfully.');
    }

    /**
     * Show the form for editing the specified account.
     */
    public function edit($username)
    {
        $account = Account::findOrFail($username);
        return view('accounts.edit', compact('account'));
    }

    /**
     * Update the specified account in storage.
     */
    public function update(Request $request, $username)
    {
        $request->validate([
            'password' => 'nullable|min:6',
            'name' => 'required|max:45',
            'role' => 'required|in:Admin,Author',
        ]);

        $account = Account::findOrFail($username);

        $data = $request->only(['name', 'role']);
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        $account->update($data);

        return redirect()->route('accounts.index')->with('success', 'Account updated successfully.');
    }

    /**
     * Remove the specified account from storage.
     */
    public function destroy($username)
    {
        $account = Account::findOrFail($username);
        $account->delete();

        return redirect()->route('accounts.index')->with('success', 'Account deleted successfully.');
    }
}
