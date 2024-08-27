<?php

namespace App\Controllers;

use App\Models\Components;
use CodeIgniter\API\ResponseTrait;

class Api extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        echo 'error';
    }

    //table ones
    public function cpu()
    {
        $model = new Components();
        $post = json_encode($model->getcpu());
        return $post;
    }

    public function motherboard()
    {
        $model = new Components();
        $post = json_encode($model->getmotherboard());
        return $post;
    }

    public function ram()
    {
        $model = new Components();
        $post = json_encode($model->getram());
        return $post;
    }

    public function gpu()
    {
        $model = new Components();
        $post = json_encode($model->getgpu());
        return $post;
    }

    public function psu()
    {
        $model = new Components();
        $post = json_encode($model->getpsu());
        return $post;
    }

    public function storage()
    {
        $model = new Components();
        $post = json_encode($model->getstorage());
        return $post;
    }

    public function pccase()
    {
        $model = new Components();
        $post = json_encode($model->getpccase());
        return $post;
    }

    //query ones
    public function cpuquery()
    {
        if(null!=$this->request->getVar('questionsselected')&&is_countable($this->request->getVar('questionsselected'))){
            $questionsselected=$this->request->getVar('questionsselected');
            $model = new Components();
            if(count($questionsselected)==6){
                $post = $model->getcpu($questionsselected[5]);
            }else{
                $post = $model->cpuoptions($questionsselected);
            }
            return $this->setResponseFormat('json')->respond($post, 200);
        }
        else{
            return $this->setResponseFormat('json')->fail('Body parameters are lacking', 400);
        }
    }

    public function motherboardquery()
    {
        if(null!=$this->request->getVar('questionsselected')&&is_countable($this->request->getVar('questionsselected'))){
            $questionsselected=$this->request->getVar('questionsselected');
            $model = new Components();
            if(count($questionsselected)==6){
                $post = $model->getmotherboard($questionsselected[5]);
            }else{
                $post = $model->motherboardoptions($questionsselected);
            }
            return $this->setResponseFormat('json')->respond($post, 200);
        }
        else{
            return $this->setResponseFormat('json')->fail('Body parameters are lacking', 400);
        }
    }

    public function ramquery()
    {
        if(null!=$this->request->getVar('questionsselected')&&is_countable($this->request->getVar('questionsselected'))){
            $questionsselected=$this->request->getVar('questionsselected');
            $model = new Components();
            if(count($questionsselected)==5){
                $post = $model->getram($questionsselected[4]);
            }else{
                $post = $model->ramoptions($questionsselected);
            }
            return $this->setResponseFormat('json')->respond($post, 200);
        }
        else{
            return $this->setResponseFormat('json')->fail('Body parameters are lacking', 400);
        }
    }

    public function gpuquery()
    {
        if(null!=$this->request->getVar('questionsselected')&&is_countable($this->request->getVar('questionsselected'))){
            $questionsselected=$this->request->getVar('questionsselected');
            $model = new Components();
            if(count($questionsselected)==3){
                $post = $model->getgpu($questionsselected[2]);
            }else{
                $post = $model->gpuoptions($questionsselected);
            }
            return $this->setResponseFormat('json')->respond($post, 200);
        }
        else{
            return $this->setResponseFormat('json')->fail('Body parameters are lacking', 400);
        }
    }

    public function psuquery()
    {
        if(null!=$this->request->getVar('questionsselected')&&is_countable($this->request->getVar('questionsselected'))){
            $questionsselected=$this->request->getVar('questionsselected');
            $model = new Components();
            if(count($questionsselected)==3){
                $post = $model->getpsu($questionsselected[2]);
            }else{
                $post = $model->psuoptions($questionsselected);
            }
            return $this->setResponseFormat('json')->respond($post, 200);
        }
        else{
            return $this->setResponseFormat('json')->fail('Body parameters are lacking', 400);
        }
    }

    public function storagequery()
    {
        if(null!=$this->request->getVar('questionsselected')&&is_countable($this->request->getVar('questionsselected'))){
            $questionsselected=$this->request->getVar('questionsselected');
            $model = new Components();
            if(count($questionsselected)==4){
                $post = $model->getstorage($questionsselected[3]);
            }else{
                $post = $model->storageoptions($questionsselected);
            }
            return $this->setResponseFormat('json')->respond($post, 200);
        }
        else{
            return $this->setResponseFormat('json')->fail('Body parameters are lacking', 400);
        }
    }

    public function chipsetcompare($idcpu,$chipset){
        if(null!=$idcpu&&null!=$chipset){
            $model = new Components();
            $result = $model->chipsetcompare($idcpu,$chipset);
            //var_dump($result);
            if(count($result)===1){
                return $this->setResponseFormat('json')->respond(true, 200);
            }
            return $this->setResponseFormat('json')->respond(false, 200);
        }else{
            return $this->setResponseFormat('json')->fail('Body parameters are lacking', 400);
        }
    }

    public function testq(){
        helper('filesystem');
        //var_dump($this->request->getPost('questionsselected'));
        //write_file('smth.txt',var_export($_POST,true));
        //write_file('smth.txt',var_export(file_get_contents('php://input'),true));
        write_file('smth.txt',var_export($this->request->getVar('questionsselected'),true));
        $post = ['test1','test2'];
        return json_encode($post);
    }

    public function test2(){
        $post = [
            'success' => true,
            'id'      => 123,
        ];
        return $this->setResponseFormat('json')->respond($post, 200);
    }

    public function test3(){
        helper('cookie');
        $var=json_decode(get_cookie('Motherboard'));
        return var_dump($var);
    }
}
