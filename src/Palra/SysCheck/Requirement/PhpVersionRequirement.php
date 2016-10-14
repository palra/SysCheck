<?php
/**
 * Created by PhpStorm.
 * User: palra
 * Date: 14/10/16
 * Time: 14:17
 */

namespace Palra\SysCheck\Requirement;

use Palra\SysCheck\Comparator\VersionComparator;

/**
 * Requirement for the PHP version
 * @package Palra\SysCheck\Requirement
 */
class PhpVersionRequirement extends Requirement
{
    /**
     * PhpVersionRequirement constructor.
     */
    public function __construct()
    {
        $this->setName("PHP Version");
        $this->setDescription("Checks the current PHP version");
        $this->setComparator(new VersionComparator());
    }

    /**
     * Returns the actual level of requirement on the system.
     * @return string
     */
    public function checkActualLevel()
    {
        return PHP_VERSION;
    }
}