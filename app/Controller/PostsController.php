<?php
/**
 * Created by PhpStorm.
 * User: Kudo Shinichi
 * Date: 6/1/2015
 * Time: 1:24 PM
 */
App::uses('AppController', 'Controller');
class PostsController extends AppController{
        public $name = 'Posts';
        public $helpers = array('Html','From');
        public function index(){
            $this->loadModel('Post');
            $this->set('posts',$this->Post->find('all'));
            $this->render('/Posts/index');
        }
        public function view($id = null)
        {
            try {
                $this->loadModel('Post');
                if ($this->request->method('get')) {
                    if (!$id) {
                        throw new NotFoundException(__('Invalid post'));
                    }
                    $post = $this->Post->findById($id);
                    if (!$post) {
                        throw new NotFoundException(__('Invalid post'));
                    }
                    $this->set('post', $post);
//                    var_dump($post);exit;
                   // $this->render('view');
                }
            }catch (Exception $e){
                throw new NotFoundException(($e->getMessage()));
            }
        }
        public function add() {
            if ($this->request->is('post')) {
                $this->Post->create();
                $this->request->data['Post']['user_id'] = $this->Auth->user('id');
                if ($this->Post->save($this->request->data)) {
                    $this->Session->setFlash(__('post_success'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('Unable to add your post.'));
            }
        }
        public function edit($id = null) {
            if (!$id) {
                throw new NotFoundException(__('Invalid post'));
            }

            $post = $this->Post->findById($id);
            if (!$post) {
                throw new NotFoundException(__('Invalid post'));
            }

            if ($this->request->is('post')) {
                $this->Post->id = $id;
                $data = $this->request->data;
                if ($this->Post->save($this->request->data)) {
                    $this->Session->setFlash(__('edit_success'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('Unable to update your post.'));
            }

            if (!$this->request->data) {
                $this->request->data = $post;
            }
        }
        public function delete($id) {
            if ($this->request->is('get')) {
                throw new MethodNotAllowedException();
            }

            if ($this->Post->delete($id)) {
                $this->Session->setFlash(
                    __('The post with id: %s has been deleted.', h($id))
                );
            } else {
                $this->Session->setFlash(
                    __('The post with id: %s could not be deleted.', h($id))
                );
            }

            return $this->redirect(array('action' => 'index'));
        }
    public function isAuthorized($user) {
        // All registered users can add posts
        if ($this->action === 'add') {
            return true;
        }

        // The owner of a post can edit and delete it
        if (in_array($this->action, array('edit', 'delete'))) {
            $postId = (int) $this->request->params['pass'][0];
            if ($this->Post->isOwnedBy($postId, $user['id'])) {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }
    }