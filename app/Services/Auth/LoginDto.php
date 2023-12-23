<?php

namespace App\Services\Auth;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class LoginDto
{

    public function __construct(LoginRequest|Request|null $request)
    {
        if (!$request)
            return $this;

        $this->setEmail($request->email);
        $this->setPassword($request->password);
        $this->setDeviceName($request->device_name);

        return $this;
    }

    private ?string $email = null;
    private ?string $password = null;
    private ?string $deviceName = null;

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
