<?php
namespace App\Repositories;

use App\Models\User;

class UserRepository implements UserRepositoryInterface {

    public function create(array $data)
    {
        return User::create($data);
    }

    public function update($id, array $data)
    {
        $user = User::find($id);
        if ($user) {
            $user->update($data);
        }
        return $user;
    }

    public function delete($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
        }
        return $user;
    }

    public function find($id)
    {
        return User::find($id);
    }

    public function findByEmail($email)
    {
        return User::where('email', $email)->first();
    }

    public function addAddress($userId, array $data)
    {
        $user = User::find($userId);
        if ($user) {
            return $user->addresses()->create($data);
        }
        return null;
    }
}
