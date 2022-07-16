<?php declare(strict_types=1);

namespace SwagBasicExample\Core\Content\Example;
use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;

class ExampleEntity extends Entity
{
    use EntityIdTrait;

    /**
     * @var string|null
     */
    protected $name;

    /**
     * @var string|null
     */
    protected $description;

    /**
     * @var bool
     */
    protected $active;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getemail(): ?string
    {
        return $this->email;
    }

    public function setemail(?string $email): void
    {
        $this->email = $email;
    }
    public function getfirstName(): ?string
    {
        return $this->firstName;
    }

    public function setfirstName(?string $firstName): void
    {
        $this->firstName = $firstName;
    }
    
        public function getphone(): ?string
    {
        return $this->phone;
    }

    public function setphone(?string $phone): void
    {
        $this->phone = $phone;
    }
    
    
    public function gettype(): ?string
    {
        return $this->type;
    }

    public function settype(?string $type): void
    {
        $this->type = $type;
    }
    
    public function getpickDate(): ?string
    {
        return $this->pickDate;
    }

    public function setpickDate(?string $pickDate): void
    {
        $this->pickDate = $pickDate;
    }
    

}