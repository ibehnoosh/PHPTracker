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
    #[Column(name: 'amount', type: Types::DECIMAL,precision: 13,scale: 3)]
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

    public function getId(): int
    {
        return $this->id;
    }

    public function getDescriptions(): string
    {
        return $this->descriptions;
    }

    public function setDescriptions(string $descriptions): Transaction
    {
        $this->descriptions = $descriptions;
        return $this;
    }


    public function getDate(): \DateTime
    {
        return $this->date;
    }


    public function setDate(\DateTime $date): Transaction
    {
        $this->date = $date;
        return $this;
    }


    public function getAmount(): float
    {
        return $this->amount;
    }


    public function setAmount(float $amount): Transaction
    {
        $this->amount = $amount;
        return $this;
    }


    public function getPassword(): string
    {
        return $this->password;
    }


    public function setPassword(string $password): Transaction
    {
        $this->password = $password;
        return $this;
    }


    public function getCreateAt(): \DateTime
    {
        return $this->createAt;
    }


    public function setCreateAt(\DateTime $createAt): Transaction
    {
        $this->createAt = $createAt;
        return $this;
    }


    public function getUpdateAt(): \DateTime
    {
        return $this->updateAt;
    }


    public function setUpdateAt(\DateTime $updateAt): Transaction
    {
        $this->updateAt = $updateAt;
        return $this;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): Transaction
    {
        $user->addTransaction($this);
        $this->user = $user;
        return $this;
    }

    public function getCategory(): Category
    {
        return $this->category;
    }

    public function setCategory(Category $category): Transaction
    {
        $category->addTransaction($this);
        $this->category = $category;
        return $this;
    }

    public function getReceipts(): Collection
    {
        return $this->receipts;
    }

    public function addReceipt(Receipt $receipt): Transaction
    {
        $this->receipts->add($receipt);
        return $this;
    }

}