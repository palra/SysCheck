<?php

namespace Palra\SysCheck;

use Palra\SysCheck\Command\CheckCommand;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\InputInterface;

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
        $this->add(new CheckCommand());
    }

    protected function getCommandName(InputInterface $input)
    {
        return CheckCommand::NAME;
    }

    protected function getDefaultCommands()
    {
        $defaultCommands = parent::getDefaultCommands();
        $defaultCommands[] = new CheckCommand();

        return $defaultCommands;
    }

    public function getDefinition()
    {
        $inputDefinition = parent::getDefinition();
        $inputDefinition->setArguments();

        return $inputDefinition;
    }
}