<?php

namespace App\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;
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

    #[ManyToOne(inversedBy:'receipts')]
    private Transaction $transaction;

    public function getId(): int
    {
        return $this->id;
    }

    public function getFileName(): string
    {
        return $this->fileName;
    }

    public function setFileName(string $fileName): Receipt
    {
        $this->fileName = $fileName;
        return $this;
    }

    public function getCreateAt(): \DateTime
    {
        return $this->createAt;
    }

    public function setCreateAt(\DateTime $createAt): Receipt
    {
        $this->createAt = $createAt;
        return $this;
    }

    public function getTransaction(): Transaction
    {
        return $this->transaction;
    }

    public function setTransaction(Transaction $transaction): Receipt
    {
        $transaction->addReceipt($this);
        $this->transaction = $transaction;
        return $this;
    }

}