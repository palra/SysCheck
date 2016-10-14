<?php
/**
 * Created by PhpStorm.
 * User: palra
 * Date: 14/10/16
 * Time: 11:10
 */

namespace Palra\SysCheck\Requirement;
/**
 * Describes a system requirement.
 * @package Palra\SysCheck
 */
class Requirement
{
    /**
     * Is the requirement fulfilled ?
     * @var bool
     */
    private $fulfilled;

    /**
     * Describes the requirement
     * @var string
     */
    private $description;

    /**
     * Is the requirement optional ?
     * @var boolean
     */
    private $optional;

    /**
     * A message that will help the user to fulfill the requirement
     * @var string
     */
    private $helpMessage;

    /**
     * Requirement constructor.
     * @param bool   $fulfilled   Is the requirement fulfilled ?
     * @param string $description Descriptive message explaining the
     *                            requirement
     * @param string $helpMessage Help message in order to tell the user what
     *                            to do to fulfill the requirement
     * @param bool   $optional    Is the requirement optional ? Defaults to
     *                            `false`.
     */
    public function __construct($fulfilled, $description, $helpMessage, $optional = false)
    {
        $this->fulfilled = (bool) $fulfilled;
        $this->description = $description;
        $this->helpMessage = $helpMessage;
        $this->optional = (bool) $optional;
    }

    /**
     * @return boolean
     */
    public function isFulfilled()
    {
        return $this->fulfilled;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return boolean
     */
    public function isOptional()
    {
        return $this->optional;
    }

    /**
     * @return string
     */
    public function getHelpMessage()
    {
        return $this->helpMessage;
    }
}