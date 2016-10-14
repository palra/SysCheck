<?php
/**
 * Created by PhpStorm.
 * User: palra
 * Date: 14/10/16
 * Time: 11:10
 */

namespace Palra\SysCheck\Requirement;
use Palra\SysCheck\Comparator\Comparator;

/**
 * Describes a system requirement.
 * @package Palra\SysCheck
 */
abstract class Requirement
{
    /**
     * The name of the requirement. (ex: "MySQL Version")
     * @var string
     */
    private $name;

    /**
     * A short description of the requirement.
     * @var string|null
     */
    private $description;

    /**
     * The required level of requirement. If set to null, the requirement is
     * optional.
     * @var string|null
     */
    private $requiredLevel;

    /**
     * The recommended level of requirement. Can be set to null.
     * @var string|null
     */
    private $recommendedLevel;

    /**
     * The comparator bound to the current requirement. Must be set in the
     * implemented class' constructors.
     * @var Comparator
     */
    private $comparator;

    /**
     * Returns the actual level of requirement on the system.
     * @return string
     */
    abstract public function checkActualLevel();

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    protected function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return null|string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param null|string $description
     */
    protected function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return null|string
     */
    public function getRequiredLevel()
    {
        return $this->requiredLevel;
    }

    /**
     * @param null|string $requiredLevel
     */
    public function setRequiredLevel($requiredLevel)
    {
        $this->requiredLevel = $requiredLevel;
    }

    /**
     * @return null|string
     */
    public function getRecommendedLevel()
    {
        return $this->recommendedLevel;
    }

    /**
     * @param null|string $recommendedLevel
     */
    public function setRecommendedLevel($recommendedLevel)
    {
        $this->recommendedLevel = $recommendedLevel;
    }

    /**
     * @return Comparator
     */
    public function getComparator()
    {
        return $this->comparator;
    }

    /**
     * @param Comparator $comparator
     */
    protected function setComparator($comparator)
    {
        $this->comparator = $comparator;
    }
}