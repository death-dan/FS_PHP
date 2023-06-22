<?php

namespace Source\Models;

use Source\DataBase\Conect;

abstract class Model
{
    /** @var object|null */
    protected $data;

    /** @var \PDOException|null */
    protected $fail;

    /** @var string|null */
    protected $message;

    public function __set($name, $value)
    {
        if (empty($this->data)) {
            $this->data = new \stdClass();
        }

        $this->data->$name = $value;
    }

    public function __isset($name)
    {
        return isset($this->data->$name);
    }

    public function __get($name)
    {
        return ($this->data->$name ?? null);
    }

    /**
     * @return null|object
     */
    public function data(): ?object
    {
        return $this->data;
    }

    /**
     * @return null|\PDOException
     */
    public function fail(): ?\PDOException
    {
        return $this->fail;
    }

    /**
     * @return null|string
     */
    public function message(): ?string
    {
        return $this->message;
    }

    protected function create(string $entity, array $data): ?int
    {
        try {
            $columns = implode(", ", array_keys($data));
            $values = ":" . implode(", :", array_keys($data));

            $stmt = Conect::getInstance()->prepare("INSERT INTO {$entity} ({$columns}) VALUES ({$values})");
            $stmt->execute($this->filter($data));

            return Conect::getInstance()->lastInsertId();

        } catch (\PDOException $execpetion) {
            $this->fail = $execpetion;
            return null;
        }
    }

    protected function read(string $select, string $params = null): ?\PDOStatement
    {
        try {
            $stmt = Conect::getInstance()->prepare($select);
            if ($params) {
                parse_str($params, $params);
                foreach($params as $key => $value) {
                    $type = (is_numeric($value) ? \PDO::PARAM_INT : \PDO::PARAM_STR);
                    $stmt->bindValue(":{$key}", $value, $type);
                }
            }

            $stmt->execute();
            return $stmt;

        } catch (\PDOException $execpetion) {
            $this->fail = $execpetion;
            return null;
        }
    }

    protected function update()
    {

    }

    protected function delete()
    {

    }

    protected function safe(): ?array
    {
        $safe = (array)$this->data;
        foreach(static::$safe as $unset) {
            unset($safe[$unset]);
        }

        return $safe;
    }

    private function filter(array $data): ?array
    {
        $filter = [];
        foreach($data as $key => $value) {
            $filter[$key] = (is_null($value) ? null : filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS));
        }

        return $filter;
    }
}