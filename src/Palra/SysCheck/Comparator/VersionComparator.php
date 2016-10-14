<?php
/**
 * Created by PhpStorm.
 * User: palra
 * Date: 14/10/16
 * Time: 14:21
 */

namespace Palra\SysCheck\Comparator;


class VersionComparator extends Comparator
{
    /**
     * @param mixed $a The first level to compare
     * @param mixed $b The second level to compare
     * @return mixed
     */
    public function compare($a, $b)
    {
        return version_compare($a, $b);
    }
}