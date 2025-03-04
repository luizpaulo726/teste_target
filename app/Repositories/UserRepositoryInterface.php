<?php
namespace App\Repositories;

interface UserRepositoryInterface
{
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
    public function find($id);
    public function findByEmail($email);
    public function addAddress($userId, array $data);
}
