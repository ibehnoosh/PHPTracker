<?php
declare(strict_types=1);
namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;
use PhpParser\ErrorHandler\Collecting;

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

    #[ManyToOne(inversedBy:'transactions')]
    private User $user;

    #[ManyToOne(inversedBy:'transactions')]
    private Category $category;

    #[OneToMany(mappedBy: 'transaction', targetEntity: Receipt::class)]
    private Collection $receipts;

    public function __construct()
    {
        $this->receipts = new ArrayCollection();
    }
}