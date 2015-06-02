<?php
/**
 * Created by PhpStorm.
 * User: Kudo Shinichi
 * Date: 6/1/2015
 * Time: 1:21 PM
 */
    class Post extends AppModel{
        public $validate = array(
            'title' => array(
                'rule' => 'notEmpty'
            ),
            'body' => array(
                'rule' => 'notEmpty'
            )
        );
        public function isOwnedBy($post, $user) {
            return $this->field('id', array('id' => $post, 'user_id' => $user)) !== false;
        }
    }