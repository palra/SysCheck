<?php
/**
 * Created by PhpStorm.
 * User: palra
 * Date: 14/10/16
 * Time: 17:38
 */

namespace Palra\SysCheck\Factory;


use Palra\SysCheck\Requirement\PhpExtensionRequirement;
use Palra\SysCheck\Requirement\Requirement;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PhpExtensionRequirementFactory extends AbstractRequirementFactory
{

    /**
     * Returns the path to the key in the syscheck spec file containing the
     * requirement definition.
     *
     * @return string
     */
    public function getKey()
    {
        return 'php.extension';
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
                'extension' => $param
            );
        }

        $options = $this->resolve($param);

        return new PhpExtensionRequirement($options['extension'], $options['optional']);
    }

    /**
     * Configure the option resolver for building the requirement.
     *
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setRequired('extension');
        $resolver->setAllowedTypes('extension', 'string');

        parent::configureOptions($resolver);
    }
}