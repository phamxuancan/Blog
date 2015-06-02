<?php
/**
 * Created by PhpStorm.
 * Users: Kudo Shinichi
 * Date: 5/26/2015
 * Time: 11:14 AM
 */
App::uses('AppController', 'Controller');
App::uses('Users', '../Model');
App::uses('Model', '../Model');
App::uses('AppModel', '../Model');
class WebController extends AppController{
public $theme = 'Web';

    public function webpage(){
        return $this->render('/Web/home');
    }
    public function signup(){
        try{
            $this->layout = $this->autoRender = false ;
            $this->loadModel('Users');
            $avatar = $this->uploadFiles('img/filess', $this->request->params['form']);
            $data           = $this->request->data;
            if(is_array($avatar)){
                $data['avatar'] ='';
            }else{
                $data['avatar'] = $avatar;
            }
            $user               =    $this->Users->addUser($data);
            if(count($user)){
                return json_encode(array('message'=>"Thêm người dùng thành công",'error'=>0));
            }else{
                return json_encode(array('message'=>"Thêm người dùng không thành công",'error'=>1));
            }

        }catch (Exception $e){
            return json_encode(array('message'=>$e->getMessage(),'error'=>$e->getCode()));
        }
    }
    function uploadFiles($folder, $formdata) {
        // setup dir names absolute and relative
        $file_origin = $this->request->params['form']['avatar']['name'];
        $extension = pathinfo($file_origin, PATHINFO_EXTENSION);
        $folder_url = WWW_ROOT.$folder;
        $rel_url = $folder;

        // create the folder if it does not exist
        if(!is_dir($folder_url)) {
            mkdir($folder_url);
        }

        // list of permitted file types, this is only images but documents can be added
        $permitted = array('image/gif','image/jpeg','image/pjpeg','image/png');

        // loop through and deal with the files
        foreach($formdata as $file) {
            // replace spaces with underscores
            $filename = rand(0,9999999);
            // assume filetype is false
            $typeOK = false;
            // check filetype is ok
            if(in_array($file['type'],$permitted)) $typeOK = true;

            // if file type ok upload the file
            if($typeOK) {
                // switch based on error code
                switch($file['error']) {
                    case 0:
                        // check filename already exists
                        if(!file_exists($folder_url.'/'.$filename)) {
                            // create full filename
                            $now = date('Y-m-d-His');
                            $url = $rel_url.'/'.$now.$filename.'.'.$extension;
                            // upload the file
                            $success = move_uploaded_file($file['tmp_name'], $url);
                        } else {
                            // create unique filename and upload file
                            ini_set('date.timezone', 'Europe/London');
                            $now = date('Y-m-d-His');
                            $url = $rel_url.'/'.$now.$filename.'.'.$extension;
                            $success = move_uploaded_file($file['tmp_name'], $url);
                        }
                        // if upload was successful
                        if($success) {
                            // save the url of the file
                            $result = $url;
                        } else {
                            $result['errors'][] = "Error uploaded $filename. Please try again.";
                        }
                        break;
                    case 3:
                        // an error occured
                        $result['errors'][] = "Error uploading $filename. Please try again.";
                        break;
                    default:
                        // an error occured
                        $result['errors'][] = "System error uploading $filename. Contact webmaster.";
                        break;
                }
            } elseif($file['error'] == 4) {
                // no file was selected for upload
                $result['nofiles'][] = "No file Selected";
            } else {
                // unacceptable file type
                $result['errors'][] = "$filename cannot be uploaded. Acceptable file types: gif, jpg, png.";
            }
        }
        return $result;
    }

}