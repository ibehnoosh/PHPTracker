<?php
declare(strict_types=1);
namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\HasLifecycleCallbacks;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\PrePersist;
use Doctrine\ORM\Mapping\PreUpdate;
use Doctrine\ORM\Mapping\Table;

#[Entity, Table('users')]
#[HasLifecycleCallbacks]
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

    public function getId():int
    {
        return $this->id;
    }
    #[PrePersist,PreUpdate]
    public function updateTimestamps(LifecycleEventArgs $arg):void
    {
        if(! isset($this->createAt)) {
            $this->createAt = new \DateTime();
        }
        $this->updateAt= new \DateTime();
    }
    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): User
    {
        $this->name = $name;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): User
    {
        $this->email = $email;
        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): User
    {
        $this->password = $password;
        return $this;
    }

    public function getCreateAt(): \DateTime
    {
        return $this->createAt;
    }

    public function setCreateAt(\DateTime $createAt): User
    {
        $this->createAt = $createAt;
        return $this;
    }

    public function getUpdateAt(): \DateTime
    {
        return $this->updateAt;
    }

    public function setUpdateAt(\DateTime $updateAt): User
    {
        $this->updateAt = $updateAt;
        return $this;
    }

    public function getCategories(): ArrayCollection|Collection
    {
        return $this->categories;
    }

    public function addCategories(Category $category): User
    {
        $this->categories->add($category);
        return $this;
    }

    public function getTransactions(): ArrayCollection|Collection
    {
        return $this->transactions;
    }

    public function addTransactions(Transaction $transaction): User
    {
        $this->transactions->add($transaction);
        return $this;
    }


}