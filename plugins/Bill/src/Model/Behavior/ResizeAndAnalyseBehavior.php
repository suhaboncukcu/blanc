<?php
namespace Bill\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;

use Intervention\Image\ImageManager;
use Intervention\Image\Image;

use Bill\Utility\Analyser;


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

		$img->save(WWW_ROOT . $entity->file);

		$analyser = new Analyser($entity->file);
		$result = $analyser->analyse();

		$entity->results = $result;
		$Receipts = TableRegistry::get('Receipts');
		$Receipts->save($entity);

    }
}
