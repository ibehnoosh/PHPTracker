<?php

namespace App\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;

#[Entity, Table('receipts')]
class Receipt
{
    #[Id, Column(options:['unsigned'=> true] ), GeneratedValue]
    private int $id;

    #[Column(name:'file_name')]
    private string $fileName;

    #[Column(name: 'created_at')]
    private  \DateTime $createAt;

}