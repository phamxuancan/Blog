<?php
class CreateAtAdd extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 */
	public $description = 'create_at_add';

/**
 * Actions to be performed
 *
 * @var array $migration
 */
	public $migration = array(
		'up' => array(
			'create_field' => array(
				'posts' => array(
					'slug' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1', 'after' => 'user_id'),
				),
			),
			'drop_table' => array(
				'comments'
			),
		),
		'down' => array(
			'drop_field' => array(
				'posts' => array('slug'),
			),
			'create_table' => array(
				'comments' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => 0, 'key' => 'primary'),
					'post_id' => array('type' => 'integer', 'null' => false, 'default' => 0),
					'comment' => array('type' => 'text'),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => true),
						'post_id' => array('column' => 'post_id'),
					),
					'tableParameters' => array('engine' => 'InnoDB', 'charset' => 'latin1', 'collate' => 'latin1_general_ci'),
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
