<?php
/**
 * Created by PhpStorm.
 * User: palra
 * Date: 14/10/16
 * Time: 14:28
 */

namespace Palra\SysCheck\Requirement;

class PhpVersionRequirementTest extends \PHPUnit_Framework_TestCase
{
    public function testCheck()
    {
        $requirement = new PhpVersionRequirement();
        $this->assertEquals(PHP_VERSION, $requirement->checkActualLevel());
    }
}
