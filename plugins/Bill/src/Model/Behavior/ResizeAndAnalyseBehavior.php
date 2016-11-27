<?php
namespace Bill\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;

use Intervention\Image\ImageManager;
use Intervention\Image\Image;

use Bill\Utility\Analyser;

use Cake\Collection\Collection;


/**
 * ResizeAndAnalyse behavior
 */
class ResizeAndAnalyseBehavior extends Behavior
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [
    	'width' => 1000 
    ];

    public function afterSave($event, $entity, $options)
    {
    	$manager = new ImageManager();
    	$img = $manager->make( WWW_ROOT . $entity->file );
    	$img->resize($this->_config['width'], null, function ($constraint) {
		    $constraint->aspectRatio();
		    $constraint->upsize();
		});
		$img->encode('jpg', 70);
		$img->orientate();
		$data = $img->exif();

		if($data['Orientation'] == 3) {
			$img->rotate(90);	
		}



		$img->save(WWW_ROOT . $entity->file);

		$analyser = new Analyser($entity->file);
		$result = $analyser->analyse();

		$entity->results = $result;
		$Receipts = TableRegistry::get('Receipts');
		$Receipts->save($entity);


		$Meals = TableRegistry::get('Emissions.Meals');
		$meal = $Meals->newEntity();
		$collection =  new Collection(json_decode($result, TRUE));
		$result = $collection->toArray()['ParsedResults'][0]['ParsedText'];	
		$data = array();

		if(stripos($result, 'burger') !== false) {
			$data['is_meat'] = true;
		} else if(stripos($result, 'meat') !== false){
			$data['is_meat'] = true;
		} else {
			$data['is_meat'] = false;
		}

		$data['is_outside'] = true;

		$rand = $value = rand(0,1) == 1;
		$data['is_community'] = $rand;

		$data['amount'] = 200;

		$Meals->patchEntity($meal, $data);
		$Meals->save($meal);

    }
}
