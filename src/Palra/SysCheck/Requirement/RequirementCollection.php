<?php
/**
 * Created by PhpStorm.
 * User: palra
 * Date: 14/10/16
 * Time: 15:51
 */

namespace Palra\SysCheck;

use Palra\SysCheck\Requirement\Requirement;
use Traversable;

class RequirementCollection implements \IteratorAggregate
{
    /**
     * @var Requirement[]
     */
    private $requirements;

    /**
     * RequirementCollection constructor.
     * @param Requirement[] $requirements
     */
    public function __construct(array $requirements)
    {
        $this->requirements = $requirements;
    }

    /**
     * @return Requirement[]
     */
    public function getRequirements()
    {
        return $this->requirements;
    }


    /**
     * Retrieve an external iterator
     * @link http://php.net/manual/en/iteratoraggregate.getiterator.php
     * @return Traversable An instance of an object implementing <b>Iterator</b> or
     * <b>Traversable</b>
     * @since 5.0.0
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->requirements);
    }

    public function addRequirement($fulfilled, $description, $helpMessage, $optional = false)
    {
        $this->requirements[] = new Requirement($fulfilled, $description, $helpMessage, $optional);
    }
}