<?php

namespace Source\Models;

class UserModel extends Model
{
    /** @var array $safe no update or create*/
    protected static $safe = ["id", "created_at", "updated_at"];

    /** @var string $entity database table */
    protected static $entity = "users";

    public function bootstrap()
    {

    }

    public function find($email)
    {

    }

    public function all($limit = 30, $offset = 0)
    {
        
    }

    public function save()
    {
        
    }

    public function destroy()
    {
        
    }

    private function required()
    {
        
    }

}