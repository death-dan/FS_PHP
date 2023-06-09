<?php

namespace Source\Models;

use Source\Core\Model;

class User extends Model
{
    /** @var array $safe no update or create*/
    protected static $safe = ["id", "created_at", "updated_at"];

    /** @var string $entity database table */
    protected static $entity = "users";

    /** @var array $required table fields */
    protected static $required = ["first_name", "last_name", "email", "password"];
    
    /**
     * bootstrap
     *
     * @param  mixed $firstName
     * @param  mixed $lastName
     * @param  mixed $email
     * @param  mixed $password
     * @param  mixed $document
     * @return User
     */
    public function bootstrap(
        string $firstName, 
        string $lastName, 
        string $email, 
        string $password, 
        string $document = null): ?User
    {
        $this->first_name = $firstName;
        $this->last_name =$lastName;
        $this->email = $email;
        $this->password = $password;
        $this->document = $document;

        return $this;
    }
    
    /**
     * find
     *
     * @param  mixed $terms
     * @param  mixed $params
     * @param  mixed $columns
     * @return User|null
     */
    public function find(string $terms, string $params, $columns = "*"): ?User
    {
        $find = $this->read("SELECT {$columns} FROM " . self::$entity . " WHERE {$terms}", $params);
        if ($this->fail() || !$find->rowCount()) {
            return null;
        }
        return $find->fetchObject(__CLASS__);
    }
    
    /**
     * findById
     *
     * @param  mixed $id
     * @param  mixed $columns
     * @return User|null
     */
    public function findById(int $id, string $columns = "*"): ?User
    {
        return $this->find("id = :id", "id={$id}", $columns);
    }
    
    /**
     * find
     *
     * @param  mixed $email
     * @param  mixed $columns
     * @return User
     */
    public function findByEmail(string $email, string $columns = "*"): ?User
    {
        return $this->find("email = :email", "email={$email}", $columns);
    }
    
    /**
     * all
     *
     * @param  mixed $limit
     * @param  mixed $offset
     * @param  mixed $columns
     * @return array
     */
    public function all(int $limit = 30, int $offset = 0, string $columns = "*"): ?array
    {
        $all = $this->read("SELECT {$columns} FROM " . self::$entity . " LIMIT :limit OFFSET :offset", "limit={$limit}&offset={$offset}");
        if ($this->fail() || !$all->rowCount()) {
            return null;
        }
        return $all->fetchAll(\PDO::FETCH_CLASS, __CLASS__);
    }
    
    /**
     * save
     *
     * @return User
     */
    public function save(): ?User
    {
        if (!$this->required()) {
            $this->message()->warning("Nome, sobrenome, e-mail e senha são obrigatórios");
            return null;
        }

        if (!is_email($this->email)) {
            $this->message()->warning("O e-mail informado não tem um formato válido");
            return null;
        }

        if (!is_passwd($this->password)) {
            $min = CONF_PASSWD_MIN_LEN;
            $max = CONF_PASSWD_MAX_LEN;
            $this->message()->warning("A senha de ter entre {$min} e {$max} caracteres");    
            return null;
        } else {
            $this->password = passwd($this->password);
        }

        /** User Update */
        if (!empty($this->id)) {
            $userId = $this->id;

            if ($this->find("email= :e AND id != :i", "e={$this->email}&i={$userId}")) {
                $this->message->warning("O e-mail informado já está cadastrado");
                return null;
            }

            $this->update(self::$entity, $this->safe(), "id = :id", "id={$userId}");

            if ($this->fail()) {
                $this->message->error("Error ao atualizar, verifique os dados!");
                return null;
            }
            $this->message = "Dados atualizados com sucesso!";
        }

        /** User Create */
        if (empty($this->id)) {
            if ($this->findByEmail($this->email)) {
                $this->message->warning("O e-mail informado já está cadastrado");
                return null;
            }

            $userId = $this->create(self::$entity, $this->safe());
            if ($this->fail()) {
                $this->message->error("Error ao cadastrar, verifique os dados!");
                return null;
            }
        }

        $this->data = ($this->findById($userId))->data();
        return $this;   
    }
    
    /**
     * destroy
     *
     * @return User
     */
    public function destroy(): ?User
    {
        if (!empty($this->id)) {
            $this->delete(self::$entity, "id = :id", "id={$this->id}");
        }

        if ($this->fail()) {
            $this->message = "Não foi possivel remover o usuário";
            return null;
        }
        $this->message = "Usuário removido com sucesso!";
        $this->data = null; 
        return $this;
    }
}