<?php
use Orm\Model;

class Model_Tip extends Model
{
    protected static $_has_many = array(
        'events' => array(
            'key_from' => 'event_id',
            'model_to' => 'Model_Event',
            'key_to' => 'id'
        )
    );

	protected static $_properties = array(
		'id',
		'title',
		'event_id',
		'content',
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
    
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('title', 'Title', 'required|max_length[255]');
		$val->add_field('event_id', 'Event Id', 'required|int');
		$val->add_field('content', 'Content', 'required');

		return $val;
	}

}
