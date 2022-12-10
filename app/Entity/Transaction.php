<?php
declare(strict_types=1);
namespace App\Entity;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;

#[Entity, Table('transactions')]
class Transaction
{
    #[Id, Column(options:['unsigned'=> true] ), GeneratedValue]
    private int $id;
    #[Column]
    private string $descriptions;
    #[Column]
    private  \DateTime $date;
    #[Column(name: 'amount', Type: Types::DECIMAL,precision: 13,scale: 3)]
    private float $amount;
    #[Column]
    private string $password;
    #[Column(name: 'created_at')]
    private  \DateTime $createAt;
    #[Column(name: 'updated_at')]
    private  \DateTime $updateAt;
}