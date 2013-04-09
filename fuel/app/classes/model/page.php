<?php
use Orm\Model;

class Model_Page extends Model
{
	protected static $_properties = array(
		'id',
		'name',
		'alias',
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
	
	protected static $_many_many = array(
		'blocks' => array(
			'key_from' => 'id',
			'key_through_from' => 'page_id', 
			'table_through' => 'block_on_page',
			'key_through_to' => 'block_id',
			'model_to' => 'Model_Block',
			'key_to' => 'id',
			'cascade_save' => true,
			'cascade_delete' => false,
		)
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('name', 'Name', 'required|max_length[255]');
		$val->add_field('alias', 'Alias', 'required|max_length[20]');

		return $val;
	}
	
	public static function as_array() 
	{
		$result = array();
		$pages = self::find('all');
		foreach ($pages as $page) {
			$result[$page->id] = $page->name;
		}
		return $result;
	}

}
