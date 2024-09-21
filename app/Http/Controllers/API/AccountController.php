<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;

class AccountController extends Controller
{
    // Get all accounts
    public function index()
    {
        return response()->json(Account::all(), 200);
    }

    // Store a new account
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'username' => 'required|unique:accounts',
            'password' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'no_hp' => 'required',
            'role_id' => 'required|exists:roles,id',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        $account = Account::create($validatedData);

        return response()->json($account, 201);
    }

    // Show an account by ID
    public function show($id)
    {
        $account = Account::find($id);

        if (!$account) {
            return response()->json(['message' => 'Account not found'], 404);
        }

        return response()->json($account, 200);
    }

    // Update an account by ID
    public function update(Request $request, $id)
    {
        $account = Account::find($id);

        if (!$account) {
            return response()->json(['message' => 'Account not found'], 404);
        }

        $validatedData = $request->validate([
            'nama' => 'required',
            'username' => 'required|unique:accounts,username,' . $id,
            'password' => 'sometimes',
            'alamat' => 'required',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'no_hp' => 'required',
            'role_id' => 'required|exists:roles,id',
        ]);

        if ($request->has('password')) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        }

        $account->update($validatedData);

        return response()->json($account, 200);
    }

    // Delete an account by ID
    public function destroy($id)
    {
        $account = Account::find($id);

        if (!$account) {
            return response()->json(['message' => 'Account not found'], 404);
        }

        $account->delete();

        return response()->json(['message' => 'Account deleted'], 200);
    }
}
