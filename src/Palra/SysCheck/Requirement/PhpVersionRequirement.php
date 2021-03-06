<?php
/**
 * Created by PhpStorm.
 * User: palra
 * Date: 14/10/16
 * Time: 15:27
 */

namespace Palra\SysCheck\Requirement;

/**
 * Represents a PHP version requirement.
 *
 * @package Palra\SysCheck\Requirement
 */
class PhpVersionRequirement extends Requirement
{
    /**
     * Constructor that initializes the requirement
     *
     * @param string $extension The targetted version
     * @param bool   $optional      Is this requirement mandatory or optional ?
     */
    public function __construct($extension, $optional = false)
    {
        $fulfilled = version_compare(PHP_VERSION, $extension) >= 0;

        $description = sprintf(
            'The %s PHP version %s be installed',
            $extension,
            ($optional) ? 'should' : 'must'
        );

        $helpMessage = sprintf('Install the %s PHP version', $extension);

        parent::__construct($fulfilled, $description, $helpMessage, $optional);
    }
}