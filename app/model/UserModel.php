<?php

namespace App\Model;


use Core\Model;

class UserModel extends Model
{

    public function saveUser($data)
    {
        return $this->save('users', $data);
    }

    public function deleteUser($id)
    {
        return $this->delete('users', $id);
    }

    public function findUserById($id)
    {
        $sql = "SELECT * FROM users WHERE id = $id";
        $result = $this->db->query($sql)->fetch($this->db::FETCH_ASSOC);

        return $result;
    }

    public function validate($data)
    {
        $errors = [];

        if (!$this->validateNotEmpty($data['name'])) {
            $errors['name'][] = 'Имя не может быть пустым';
        }

        return $errors;
    }

}