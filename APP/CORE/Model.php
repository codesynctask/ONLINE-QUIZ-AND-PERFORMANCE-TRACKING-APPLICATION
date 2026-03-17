<?php

abstract class Model{
    protected PDO $db;
    protected string $table;

    public function __construct(){
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function all(array $columns = [],$offset=0,$limit=100):array{
        // making array cols as string 
        $cols = empty($columns) ? '*' : implode(',', $columns);

        // preparing SQL statements
        $sql = "SELECT {$cols} FROM {$this->table} LIMIT :offset , :limit";
        $stmt = $this->db->prepare($sql);

        // Binding values
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);

        // Executing
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function create(array $data):bool{
        $columns = implode(',', array_keys($data));
        $placeholders = ':' . implode(',:', array_keys($data));

        $sql = "INSERT INTO {$this->table} ({$columns}) VALUES ({$placeholders})";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }

    public function findOneBy(string $column, $value){
        $sql = "SELECT * FROM {$this->table} WHERE {$column} = :value LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':value', $value);
        $stmt->execute();

        return $stmt->fetch();
    }


    public function deleteBy(string $column, $value): bool{
        $sql = "DELETE FROM {$this->table} WHERE {$column} = :value";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':value', $value);

        return $stmt->execute();
    }

    public function updateBy(string $whereColumn, $whereValue, array $data): bool{
        $fields = [];
        foreach ($data as $column => $value) {
            $fields[] = "{$column} = :{$column}";
        }

        $setClause = implode(', ', $fields);

        $sql = "UPDATE {$this->table}
                SET {$setClause}
                WHERE {$whereColumn} = :whereValue";

        $stmt = $this->db->prepare($sql);

        foreach ($data as $column => $value) {
            $stmt->bindValue(":{$column}", $value);
        }

        $stmt->bindValue(':whereValue', $whereValue);

        return $stmt->execute();
    }

}
