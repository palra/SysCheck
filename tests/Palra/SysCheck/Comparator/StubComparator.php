<?php
/**
 * Created by PhpStorm.
 * User: palra
 * Date: 14/10/16
 * Time: 14:55
 */

namespace Palra\SysCheck\Comparator;


class StubComparator extends Comparator
{

    /**
     * @param mixed $a The first level to compare
     * @param mixed $b The second level to compare
     * @return mixed
     */
    public function compare($a, $b)
    {
        foreach (array_keys($a) as $i) {
            if(($val = version_compare($a[$i], $b[$i])) != 0)
                return $val;
        }

        return 0;
    }
}