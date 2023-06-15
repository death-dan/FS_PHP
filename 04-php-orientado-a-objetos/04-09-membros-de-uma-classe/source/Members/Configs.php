<?php

namespace Source\Members;

class Configs
{
    public const COMPANY = "BrasFeet";
    protected const DOMAIN = "www.upinnside.com.br";
    private const SECTOR = "Educação";

    public static $company;
    public static $domain;
    public static $sector;

    public static function setConfig($company, $domain, $sector)
    {
        self::$company = $company;
        self::$domain = $domain;
        self::$sector = $sector;
    }
}