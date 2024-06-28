<?php

namespace App\Services;

use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;
class UserService implements UserServiceInterface {

    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(array $data)
    {
        $data['password'] = Hash::make($data['password']);
        return $this->userRepository->create($data);
    }

    public function update($id, array $data)
    {
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }
        return $this->userRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->userRepository->delete($id);
    }

    public function show($id)
    {
        return $this->userRepository->find($id);
    }

    public function destroy()
    {
        $this->userRepository->delete(Auth::id());

        return response()->json(['message' => 'Usuario removido com sucesso!'], 200);
    }

//    public function addPermission(Request $request)
//    {
//        // Implementar a lógica de atribuição de permissão
//    }

    public function addAddress($userId, array $data)
    {
        return $this->userRepository->addAddress($userId, $data);
    }
}
