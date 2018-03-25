<?php

namespace App\Model;


use Core\Model;

class ArticleModel extends Model
{

    public function saveArticle($data)
    {
        return $this->save('articles', $data);
    }

    public function deleteArticle($id)
    {
        return $this->delete('articles', $id);
    }

    public function findArticleById($id)
    {
        $sql = "SELECT a.id, a.title, a.text, a.created_at, u.name AS author_name, u.id AS author_id FROM articles a LEFT JOIN users u ON u.id = a.author_id WHERE a.id = $id";
        $result = $this->db->query($sql)->fetch($this->db::FETCH_ASSOC);

        return $result;
    }

    public function validate($data)
    {
        $errors = [];

        if (!$this->validateNotEmpty($data['title'])) {
            $errors['title'][] = 'Заголовок не может быть пустым';
        }

        if (!$this->validateMaxLength($data['title'], 140)) {
            $errors['title'][] = 'Длина заголовка не должна привышать 140 символов';
        }

        if (!$this->validateNotEmpty($data['text'])) {
            $errors['text'][] = 'Текст не может быть пустым';
        }

        return $errors;
    }

}