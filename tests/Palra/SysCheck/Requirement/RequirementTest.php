<?php
/**
 * Created by PhpStorm.
 * User: palra
 * Date: 14/10/16
 * Time: 14:53
 */

namespace Palra\SysCheck\Requirement;


class RequirementTest extends \PHPUnit_Framework_TestCase
{
    public function testSetters()
    {
        $r = new StubRequirement();
        $this->assertEquals("Stub requirement", $r->getName());
        $this->assertEquals("test description", $r->getDescription());
        $this->assertInstanceOf('Palra\SysCheck\Comparator\StubComparator', $r->getComparator());

        $r->setRequiredLevel(null); // Tests null values
        $r->setRequiredLevel(array(5, 4, 11));
        $r->setRecommendedLevel(null);
        $r->setRecommendedLevel(array(5, 6, 12));

        $this->assertEquals(array(5, 4, 11), $r->getRequiredLevel());
        $this->assertEquals(array(5, 6, 12), $r->getRecommendedLevel());
    }
}
