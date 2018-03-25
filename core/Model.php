<?php

namespace Core;


class Model
{

    protected $db;

    public function __construct()
    {
        $this->db = DB::getInstance()->getConnection();
    }

    public function getSphinx()
    {
        require 'sphinxapi.php';

        return new \SphinxClient();
    }

    protected function save($table, $data)
    {
        $bindNames = array_keys($data);
        $fields = implode(',', $bindNames);

        foreach ($bindNames as & $bindName) {
            $bindName = ':' . $bindName;
        }

        $bindNames = implode(',', $bindNames);

        $sql = "REPLACE INTO $table ($fields) VALUES ($bindNames)";

        $stmt = $this->db->prepare($sql);

        foreach ($data as $key => $value) {
            if ($key == 'created_at') {
                $value = (new \DateTime($value))->getTimestamp();
            }

            $stmt->bindValue(':' . $key, $value);
        }

        return $stmt->execute();
    }

    protected function delete($table, $id)
    {
        if (!is_numeric($id)) {
            return false;
        }

        $sql = "DELETE FROM $table WHERE id = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);

        return $stmt->execute();
    }

    protected function validateNotEmpty($item)
    {
        return !empty($item);
    }

    protected function validateMinLength($item, $length)
    {
        return mb_strlen($item) >= $length;
    }

    protected function validateMaxLength($item, $length)
    {
        return mb_strlen($item) <= $length;
    }

}