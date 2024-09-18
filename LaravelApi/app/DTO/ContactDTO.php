<?php

namespace App\DTO;

class ContactDTO
{
    /**
     * @var int
     */
    private ?int $id;
    /**
     * @var string
     */
    private string $name;
    /**
     * @var string
     */
    private string $email;
    /**
     * @var string
     */
    private string $designation;
    /**
     * @var string
     */
    private string $contact_no;

    /**
     * @param int $id
     * @param string $name
     * @param string $email
     * @param string $designation
     * @param string $contact_no
     */
    public function __construct(?int $id, string $name, string $email, string $designation, string $contact_no)
    {
        $this->setId($id);
        $this->setName($name);
        $this->setEmail($email);
        $this->setDesignation($designation);
        $this->setContactNo($contact_no);
    }

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return void
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return void
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getDesignation(): string
    {
        return $this->designation;
    }

    /**
     * @param string $designation
     * @return void
     */
    public function setDesignation(string $designation): void
    {
        $this->designation = $designation;
    }

    /**
     * @return string
     */
    public function getContactNo(): string
    {
        return $this->contact_no;
    }

    /**
     * @param string $contact_no
     * @return void
     */
    public function setContactNo(string $contact_no): void
    {
        $this->contact_no = $contact_no;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        foreach (get_object_vars($this) as $k => $v)
            is_object($v) ? $res[$k] = $v->toArray() : $res[$k] = $v;
        return $res ?? [];
    }

}
