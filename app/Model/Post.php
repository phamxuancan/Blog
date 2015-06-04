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
        public $actsAs = array(
            'Sluggable.Sluggable' => array(
                'field'     => 'title',  // Field that will be slugged
                'slug'      => 'slug',  // Field that will be used for the slug
                'lowercase' => true,    // Do we lowercase the slug ?
                'separator' => '-',     //
                'overwrite' => false    // Does the slug is auto generated when field is saved no matter what
            )
        );
        public function isOwnedBy($post, $user) {
            return $this->field('id', array('id' => $post, 'user_id' => $user)) !== false;
        }
    }