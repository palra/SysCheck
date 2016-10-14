<?php
/**
 * Created by PhpStorm.
 * User: palra
 * Date: 14/10/16
 * Time: 16:58
 */

namespace Palra\SysCheck\Factory;
use Palra\SysCheck\Requirement\Requirement;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Represents an abstract requirement factory
 *
 * @package Palra\SysCheck\Factory
 */
abstract class AbstractRequirementFactory
{
    /**
     * Returns the path to the key in the syscheck spec file containing the
     * requirement definition.
     *
     * @return string
     */
    abstract public function getKey();

    /**
     * Builds a Requirement instance according to the value of the key
     *
     * @param string|float|bool|array $param
     * @return Requirement
     */
    abstract public function build($param);

    /**
     * Configure the option resolver for building the requirement.
     *
     * @param OptionsResolver $resolver
     */
    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault('optional', false);
        $resolver->setAllowedTypes('optional', 'bool');
    }
    /**
     * Returns an OptionsResolver according to the `configureOptions` method.
     *
     * @return array
     */
    protected function resolve(array $options)
    {
        $resolver = new OptionsResolver();
        $this->configureOptions($resolver);

        return $resolver->resolve($options);
    }
}