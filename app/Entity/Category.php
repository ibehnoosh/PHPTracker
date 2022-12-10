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


    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Category
    {
        $this->name = $name;
        return $this;
    }

    public function getCreateAt(): \DateTime
    {
        return $this->createAt;
    }


    public function setCreateAt(\DateTime $createAt): Category
    {
        $this->createAt = $createAt;
        return $this;
    }

    public function getUpdateAt(): \DateTime
    {
        return $this->updateAt;
    }

    public function setUpdateAt(\DateTime $updateAt): Category
    {
        $this->updateAt = $updateAt;
        return $this;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): Category
    {
        $user->addCategory($this);
        $this->user = $user;
        return $this;
    }

    public function getTransactions(): Collection
    {
        return $this->transactions;
    }

    public function addTransactions(Transaction $transaction): Category
    {
        $this->transactions->add($transaction);
        return $this;
    }

}