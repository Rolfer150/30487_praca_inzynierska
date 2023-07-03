<?php

namespace App\Enums;

enum Role: int
{
    case CUSTOMER = 1;
    case COMPANY_OWNER = 2;
    case ADMIN = 3;

    public function isCustomer(): bool
    {
        return $this === self::CUSTOMER;
    }

    public function isCompanyOwner(): bool
    {
        return $this === self::COMPANY_OWNER;
    }

    public function isAdmin(): bool
    {
        return $this === self::ADMIN;
    }

    public function getRoleText(): string
    {
        return match ($this)
        {
            self::CUSTOMER => 'Klient',
            self::COMPANY_OWNER => 'Właściciel Firmy',
            self::ADMIN => 'Administrator'
        };
    }

    public function getRoleColor(): string
    {
        return match ($this)
        {
            self::CUSTOMER => 'bg-green-600',
            self::COMPANY_OWNER => 'bg-yellow-600',
            self::ADMIN => 'bg-blue-600'
        };
    }

    public function getRoleHTML(): string
    {
        return sprintf('<span class="rounded-md px-2 py-1 text-white $s">$s</span>', $this->getRoleColor(), $this->getRoleText());
    }
}
