<?php
/**
 * Created by PhpStorm.
 * User: palra
 * Date: 14/10/16
 * Time: 17:40
 */

namespace Palra\SysCheck\Factory;


use Palra\SysCheck\Requirement\EvalRequirement;
use Palra\SysCheck\Requirement\Requirement;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EvalRequirementFactory extends AbstractRequirementFactory
{

    /**
     * Returns the path to the key in the syscheck spec file containing the
     * requirement definition.
     *
     * @return string
     */
    public function getKey()
    {
        return 'eval';
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
                'expression' => $param
            );
        }

        $options = $this->resolve($param);
        return new EvalRequirement($options['expression'], $options['description'], $options['help'], $options['optional']);
    }

    /**
     * Configure the option resolver for building the requirement.
     *
     * @param OptionsResolver $resolver
     */
    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'description' => 'eval()\'ed expression must return true',
            'help' => 'eval()\'ed expression must return true'
        ));

        $resolver->setRequired('expression');
        $resolver->setAllowedTypes('expression', 'string');
        $resolver->setAllowedTypes('description', 'string');
        $resolver->setAllowedTypes('help', 'string');

        parent::configureOptions($resolver);
    }
}