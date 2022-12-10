<?php
declare(strict_types=1);
namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;

#[Entity, Table('users')]
class User
{
    #[Id, Column(options:['unsigned'=> true] ), GeneratedValue]
    private int $id;
    #[Column]
    private string $name;
    #[Column]
    private string $email;
    #[Column]
    private string $password;
    #[Column(name: 'created_at')]
    private  \DateTime $createAt;
    #[Column(name: 'updated_at')]
    private  \DateTime $updateAt;

    #[OneToMany(mappedBy: 'user', targetEntity: Category::class)]
    private Collection $categories;

    #[OneToMany(mappedBy: 'user', targetEntity: Transaction::class)]
    private Collection $transactions;



    public function __construct()
    {
        $this->categories   = new ArrayCollection();
        $this->transactions = new ArrayCollection();

    }

}