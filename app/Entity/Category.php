<?php
declare(strict_types=1);
namespace App\Entity;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;

#[Entity, Table('categories')]
class Category
{
    #[Id, Column(options:['unsigned'=> true] ), GeneratedValue]
    private int $id;

    #[Column]
    private string $name;

    #[Column(name: 'created_at')]
    private  \DateTime $createAt;

    #[Column(name: 'updated_at')]
    private  \DateTime $updateAt;

    #[ManyToOne(inversedBy:'categories')]
    private User $user;

    #[OneToMany(mappedBy: 'categories', targetEntity: Transaction::class)]
    private Collection $transactions;

}