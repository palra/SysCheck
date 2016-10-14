<?php
/**
 * Created by PhpStorm.
 * User: palra
 * Date: 14/10/16
 * Time: 11:50
 */

namespace Palra\SysCheck\Comparator;

abstract class Comparator
{
    /**
     * @param mixed $a The first level to compare
     * @param mixed $b The second level to compare
     * @return mixed
     */
    abstract public function compare($a, $b);
}