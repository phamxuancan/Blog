<?php
class Change extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 */
	public $description = 'change';

/**
 * Actions to be performed
 *
 * @var array $migration
 */
	public $migration = array(
		'up' => array(
			'create_field' => array(
				'comments' => array(
					'created_at' => array('type' => 'timestamp', 'null' => true, 'default' => null, 'after' => 'comment'),
				),
				'posts' => array(
					'slug' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1', 'after' => 'user_id'),
				),
			),
			'alter_field' => array(
				'comments' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
					'post_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'key' => 'index'),
					'comment' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'latin1_general_ci', 'charset' => 'latin1'),
				),
			),
		),
		'down' => array(
			'drop_field' => array(
				'comments' => array('created_at'),
				'posts' => array('slug'),
			),
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
