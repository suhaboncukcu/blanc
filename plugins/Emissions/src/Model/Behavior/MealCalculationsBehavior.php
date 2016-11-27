<?php
namespace Emissions\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\ORM\Table;
use Cake\Log\Log;

/**
 * MealCalculations behavior
 */
class MealCalculationsBehavior extends Behavior
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function beforeSave($event, $entity)
    {
    	$fixedFactor = 0.00093;
    	$impact = $fixedFactor;
    	$entity->set('emission_factor', $fixedFactor);
    	$amount = $entity->get('amount');

        Log::debug($impact);

    	if($entity->get('is_meat') === true) {
    		$impact = $impact * 10;
            Log::debug($impact);
    	}

    	if($entity->get('is_community') === true) { 
    		$impact =  $impact / 2;
            Log::debug($impact);
    	}

    	if($entity->get('is_outside') === true) { 
    		$impact =  $impact * 3;
            Log::debug($impact);
    	}

        Log::debug($impact);


    	$entity->set('impact', $impact);
    }
}
