<?php

namespace App\Model;


use Core\Model;

class SearchModel extends Model
{

    public function search($term = null, $author = null, $dateFrom = null, $dateTill = null)
    {
        if (empty($term)) {
            return [];
        }

        $sphinx = $this->getSphinx();
        $sphinx->SetServer('localhost', 9312);

        $sphinx->SetSortMode(SPH_SORT_RELEVANCE);
        $sphinx->SetFieldWeights(array ('text' => 20, 'title' => 5));

        if (!empty($author)) {
            $sphinx->SetFilter('author_id', [$author]);
        }

        if (!empty($dateFrom) && empty($dateTill)) {
            $sphinx->SetFilterRange('created_at', $dateFrom, 99999999999999999999999999999);
        }

        if (empty($dateFrom) && !empty($dateTill)) {
            $sphinx->SetFilterRange('created_at', 0, $dateTill);
        }

        if (!empty($dateFrom) && !empty($dateTill)) {
            $sphinx->SetFilterRange('created_at', $dateFrom, $dateTill);
        }

        $result = $sphinx->Query($term, '*');

        if (empty($result['matches'])) {
            return [];
        }

        $ids = [];

        foreach ($result['matches'] as $item) {
            $ids[] = $item['attrs']['article_id'];
        }

        $ids = implode(',', $ids);

        $sql = "SELECT id, title, text FROM articles WHERE id IN ($ids) ORDER BY FIELD(id, $ids)";
        $result = $this->db->query($sql)->fetchAll($this->db::FETCH_ASSOC);

        return $result;
    }

    public function findById($id)
    {
        $sql = "SELECT a.title, a.text, a.created_at, u.name AS author FROM articles a LEFT JOIN users u ON u.id = a.author_id WHERE a.id = $id";
        $result = $this->db->query($sql)->fetch($this->db::FETCH_ASSOC);

        return $result;
    }

    public function findAllUsers()
    {
        $sql = "SELECT * FROM users";
        $result = $this->db->query($sql)->fetchAll($this->db::FETCH_ASSOC);

        return $result;
    }

    public function findAllArticles()
    {
        $sql = "SELECT a.id, a.title, a.text, a.created_at, u.name AS author FROM articles a 
                LEFT JOIN users u ON u.id = a.author_id
                ORDER BY a.created_at DESC 
                ";
        $result = $this->db->query($sql)->fetchAll($this->db::FETCH_ASSOC);

        return $result;
    }

}