<?php


namespace App\Kernel\Snowflake;


use Hyperf\Snowflake\IdGenerator\SnowflakeIdGenerator;

class UserIdGenerator
{
    /**
     * @var SnowflakeIdGenerator
     */
    protected $idGenerator;

    public function __construct(SnowflakeIdGenerator $idGenerator)
    {
        $this->idGenerator = $idGenerator;
    }

    public function generate(int $userId)
    {
        $meta = $this->idGenerator->getMetaGenerator()->generate();

        return $this->idGenerator->generate($meta->setWorkerId($userId % 31));
    }

    public function degenerate(int $id)
    {
        return $this->idGenerator->degenerate($id);
    }
}