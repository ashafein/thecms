<?php
use Orm\Model;

class Model_Module extends Model
{
	protected static $_properties = array(
		'id',
		'name',
		'description',
		'namespace',
		'enable',
		'css',
		'js',
		'version',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);
	
	protected static $_has_many = array(
		'blocks' => array(
			'key_from' => 'id',
			'model_to' => 'Model_Block',
			'key_to' => 'module_id',
			'cascade_save' => true,
			'cascade_delete' => true,
		)
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('name', 'Name', 'required|max_length[255]');
		//$val->add_field('alias', 'Alias', 'required|max_length[20]');

		return $val;
	}
	

}
