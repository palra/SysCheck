<?php
/**
 * Created by PhpStorm.
 * User: palra
 * Date: 14/10/16
 * Time: 15:39
 */

namespace Palra\SysCheck\Requirement;

/**
 * Represents a PHP extension requirement
 * @package Palra\SysCheck\Requirement
 */
class PhpExtensionRequirement extends Requirement
{
    /**
     * Constructor that initializes the requirement
     *
     * @param string $extension The targetted extension
     * @param bool   $optional  Is this requirement mandatory or optional ?
     */
    public function __construct($extension, $optional = false)
    {
        $fulfilled = version_compare(PHP_VERSION, $extension) >= 0;

        $description = sprintf(
            'The %s PHP extension %s be loaded',
            $extension,
            ($optional) ? 'should' : 'must'
        );

        $helpMessage = sprintf('Load the %s PHP extension in your `php.ini`s files', $extension);

        parent::__construct($fulfilled, $description, $helpMessage, $optional);
    }
}