<?php
class Base extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 */
	public $description = 'base';

/**
 * Actions to be performed
 *
 * @var array $migration
 */
	public $migration = array(
		'up' => array(
			'create_field' => array(
				'posts' => array(
                    'slug'=>array('type'=>'string','null'=>true,'default'=>'')
				),
			),
		),
		'down' => array(
			'alter_field' => array(
				'comments' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => 0, 'key' => 'primary'),
					'post_id' => array('type' => 'integer', 'null' => false, 'default' => 0),
					'comment' => array('type' => 'text'),
				),
			),
		),
	);

/**
 * Before migration callback
 *
 * @param string $direction Direction of migration process (up or down)
 * @return bool Should process continue
 */
	public function before($direction) {
		return true;
	}

/**
 * After migration callback
 *
 * @param string $direction Direction of migration process (up or down)
 * @return bool Should process continue
 */
	public function after($direction) {
		return true;
	}
}
