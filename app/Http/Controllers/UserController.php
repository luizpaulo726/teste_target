<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserServiceInterface;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function show()
    {
        return response()->json($this->userService->show(Auth::id()));
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'string|max:255',
            'email' => 'string|email|max:255|unique:users,email,' . Auth::id(),
            'password' => 'string|min:8',
            'phone' => 'string|max:15',
            'cpf' => 'string|max:14|unique:users,cpf,' . Auth::id(),
        ]);

        return response()->json($this->userService->update(Auth::id(), $validatedData));
    }

    public function destroy()
    {
        $this->userService->delete(Auth::id());

        return response()->json(['message' => 'Usuario removido com sucesso!'], 200);
    }

    public function addPermission(Request $request)
    {
        // Implementar a lógica de atribuição de permissão
    }

    public function addAddress(Request $request)
    {
        $validatedData = $request->validate([
            'logradouro' => 'required|string|max:255',
            'numero' => 'required|string|max:255',
            'bairro' => 'required|string|max:255',
            'complemento' => 'nullable|string|max:255',
            'cep' => 'required|string|max:10',
        ]);

        return response()->json($this->userService->addAddress(Auth::id(), $validatedData));
    }
}
