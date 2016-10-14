<?php
/**
 * Created by PhpStorm.
 * User: palra
 * Date: 14/10/16
 * Time: 19:58
 */

namespace Palra\SysCheck\Command;


use Palra\SysCheck\Exception\FileNotFoundException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Yaml\Yaml;

class CheckCommand extends Command
{
    const NAME = 'check';

    protected function configure()
    {
        $this
            ->setName(self::NAME)
            ->setDescription('Checks system requirements.')
            ->addArgument(
                'requirements-file',
                InputArgument::OPTIONAL,
                'The requirements file to load',
                'requirements.yml'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $file = $input->getArgument('requirements-file');

        if($output->getVerbosity() >= OutputInterface::VERBOSITY_NORMAL) {
            $output->writeln("<info>Loading file `$file`</info>");
        }

        if(!file_exists($file)) {
            throw new FileNotFoundException("File $file not found");
        }

        $content = file_get_contents($file);
        $parsed = Yaml::parse($content);

        $output->writeln(var_export($parsed, true));
    }
}