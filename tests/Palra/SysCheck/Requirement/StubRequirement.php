<?php
/**
 * Created by PhpStorm.
 * User: palra
 * Date: 14/10/16
 * Time: 14:50
 */

namespace Palra\SysCheck\Requirement;


use Palra\SysCheck\Comparator\StubComparator;

class StubRequirement extends Requirement
{
    /**
     * StubRequirement constructor.
     */
    public function __construct()
    {
        $this->setName("Stub requirement");
        $this->setDescription(null);
        $this->setDescription("test description");
        $this->setComparator(new StubComparator());
    }


    /**
     * Returns the actual level of requirement on the system.
     * @return string
     */
    public function checkActualLevel()
    {
        return array(PHP_MAJOR_VERSION, PHP_MINOR_VERSION, PHP_RELEASE_VERSION);
    }
}