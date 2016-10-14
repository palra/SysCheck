<?php
/**
 * Created by PhpStorm.
 * User: palra
 * Date: 14/10/16
 * Time: 16:07
 */

namespace Palra\SysCheck\Requirement;

/**
 * Represents a requirement in which the fulfillment condition is a string that
 * will be eval()'ed.
 *
 * @package Palra\SysCheck\Requirement
 */
class EvalRequirement extends Requirement
{
    /**
     * EvalRequirement constructor.
     *
     * @param string $fulfilled The string to be eval() 'ed, returns a boolean.
     * @param string $description Descriptive message explaining the
     *                            requirement
     * @param string $helpMessage Help message in order to tell the user what
     *                            to do to fulfill the requirement
     * @param bool   $optional    Is the requirement optional ? Defaults to
     *                            `false`.
     */
    public function __construct($fulfilled, $description, $helpMessage, $optional)
    {
        $eval = "return $fulfilled;";
        $return = eval($eval);

        if(!is_bool($return)) {
            throw new \InvalidArgumentException(sprintf(
                "The eval()'ed string `%s` must return a boolean, got `%s` instead",
                $eval,
                var_export($return, true)
            ));
        }

        parent::__construct((bool) $return, $description, $helpMessage, $optional);
    }
}