<?php
// app/models/UserModel.php
namespace Models;

class UserModel
{
    public function getUsers()
    {
        // In a real application, you would query the database. 
        // For demonstration, returning a static array of users.
        return [
            ['id' => 1, 'name' => 'Alice'],
            ['id' => 2, 'name' => 'Bob'],
            ['id' => 3, 'name' => 'Charlie']
        ];
    }
}
