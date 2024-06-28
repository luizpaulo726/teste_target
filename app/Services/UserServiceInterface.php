<?php
namespace App\Services;

interface UserServiceInterface
{
    public function register(array $data);
    public function update($id, array $data);
    public function delete($id);
    public function show($id);
    public function addAddress($userId, array $data);
}
