<?php

namespace Palra\SysCheck;

use Symfony\Component\Console\Application;

/**
 * Created by PhpStorm.
 * User: palra
 * Date: 13/10/16
 * Time: 16:51
 */
class App extends Application
{
    protected static $appName = 'SysCheck';
    protected static $version = '0.1.0';

    /**
     * SysCheck constructor.
     */
    public function __construct()
    {
        parent::__construct(self::$appName, self::$version);
    }
}