<?php

namespace App\Eloquent\User;

use App\Eloquent\EloquentDto;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;

class UserEloquentDto extends EloquentDto
{

    public function __construct(Request|RegisterRequest $request = null)
    {
        if (!$request) {
            return $this;
        }

        $this->setId($request->id);
        $this->setName($request->name);
        $this->setEmail($request->email);
        $this->setPassword($request->password);
        $this->setDeviceName($request->device_name);

        return $this;
    }

    private ?string $name = null;
    private ?string $email = null;
    private ?string $password = null;
    private ?string $deviceName = null;

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string|null $password
     */
    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string|null
     */
    public function getDeviceName(): ?string
    {
        return $this->deviceName;
    }

    /**
     * @param string|null $deviceName
     */
    public function setDeviceName(?string $deviceName): void
    {
        $this->deviceName = $deviceName;
    }


}
