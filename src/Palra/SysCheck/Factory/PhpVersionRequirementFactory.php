<?php
/**
 * Created by PhpStorm.
 * User: palra
 * Date: 14/10/16
 * Time: 17:19
 */

namespace Palra\SysCheck\Factory;

use Palra\SysCheck\Requirement\PhpVersionRequirement;
use Palra\SysCheck\Requirement\Requirement;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PhpVersionRequirementFactory extends AbstractRequirementFactory
{

    /**
     * Returns the path to the key in the syscheck spec file containing the
     * requirement definition.
     *
     * @return string
     */
    public function getKey()
    {
        return 'php.version';
    }

    /**
     * Builds a Requirement instance according to the value of the key
     *
     * @param string|float|bool|array $param
     * @return Requirement
     */
    public function build($param)
    {
        if(is_string($param)) {
            $param = array(
                'version' => $param
            );
        }

        $options = $this->resolve($param);

        return new PhpVersionRequirement($options['version'], $options['optional']);
    }

    /**
     * Configure the option resolver for building the requirement.
     *
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setRequired('version');
        $resolver->setAllowedTypes('version', 'string');

        parent::configureOptions($resolver);
    }
}