<?php
namespace App\Controllers;
use App\Libraries\GroceryCrud;
use App\Models\Logins;
use CodeIgniter\Files\File;

class Workspace extends BaseController
{

    protected $helpers = ['form'];

    public function index()
    {
        return view('workspace/cpu');
    }

    public function cpu()
    {
        $session = session();
        if($session->get('accesslvl')>0){
            $crud = new GroceryCrud();
            $crud->setTable('cpu');
            $crud->setRelation('idmaker', 'maker', 'name');
            $crud->setRelation('idseries', 'series', 'name','is_cpu=1');
            $crud->setRelation('idsocket', 'socket', 'name');
            $crud->displayAs('idmaker','Maker');
            $crud->displayAs('idseries','Series');
            $crud->displayAs('idsocket','Socket');
            $crud->displayAs('tdp','TDP (W)');
            $crud->displayAs('supportedmemspeed','Max memory speed (MHz)');
            $crud->displayAs('supportedmemsize','Max memory size (GB)');
            $crud->displayAs('imgloc','Image location');
            $crud->setClone();
	        $output = $crud->render();
		    return $this->_exampleOutput($output);
        }else{
            return redirect()->to('/');
        }
    }

    public function gpu()
    {
        $session = session();
        if($session->get('accesslvl')>0){
            $crud = new GroceryCrud();
            $crud->setTable('gpu');
            $crud->setRelation('idmaker', 'maker', 'name');
            $crud->setRelation('idseries', 'series', 'name','is_cpu=0');
            $crud->displayAs('idmaker','Maker');
            $crud->displayAs('idseries','Series');
            $crud->displayAs('rec_wattage','Recommended PSU (W)');
            $crud->displayAs('imgloc','Image location');
            $crud->setClone();
	        $output = $crud->render();
		    return $this->_exampleOutput($output);
        }else{
            return redirect()->to('/');
        }
    }

    public function motherboard()
    {
        $session = session();
        if($session->get('accesslvl')>0){
            $crud = new GroceryCrud();
            $crud->setTable('mobo');
            $crud->setRelation('idmaker', 'maker', 'name');
            $crud->setRelation('idchipset', 'chipset', 'name');
            $crud->setRelation('idsocket', 'socket', 'name');
            $crud->setRelation('idramtype', 'ramtype', 'ram_type');
            $crud->displayAs('idmaker','Maker');
            $crud->displayAs('idchipset','Chipset');
            $crud->displayAs('idsocket','Socket');
            $crud->displayAs('idramtype','Ram type');
            $crud->displayAs('maxmemspeed','Max memory speed (MHz)');
            $crud->displayAs('maxmemsize','Max memory size (GB)');
            $crud->displayAs('maxmemslots','Memory slots');
            $crud->displayAs('maxm2slots','M.2 slots');
            $crud->displayAs('imgloc','Image location');
            $crud->setClone();
	        $output = $crud->render();
		    return $this->_exampleOutput($output);
        }else{
            return redirect()->to('/');
        }
    }

    public function storage()
    {
        $session = session();
        if($session->get('accesslvl')>0){
            $crud = new GroceryCrud();
            $crud->setTable('storage');
            $crud->setRelation('idmaker', 'maker', 'name');
            $crud->setRelation('idtypeslot', 'storagetype', 'name');
            $crud->displayAs('idmaker','Maker');
            $crud->displayAs('idtypeslot','Type');
            $crud->displayAs('storagesize','Size (GB)');
            $crud->displayAs('imgloc','Image location');
            $crud->setClone();
	        $output = $crud->render();
		    return $this->_exampleOutput($output);
        }else{
            return redirect()->to('/');
        }
    }

    public function ram()
    {
        $session = session();
        if($session->get('accesslvl')>0){
            $crud = new GroceryCrud();
            $crud->setTable('rammemory');
            $crud->setRelation('idmaker', 'maker', 'name');
            $crud->setRelation('idramtype', 'ramtype', 'ram_type');
            $crud->displayAs('idmaker','Maker');
            $crud->displayAs('idramtype','Ram type');
            $crud->displayAs('speed','Speed (MHz)');
            $crud->displayAs('size','Size (GB)');
            $crud->displayAs('slots','Memory slots');
            $crud->displayAs('imgloc','Image location');
            $crud->setClone();
	        $output = $crud->render();
		    return $this->_exampleOutput($output);
        }else{
           return redirect()->to('/');
        }
    }

    public function psu()
    {
        $session = session();
        if($session->get('accesslvl')>0){
            $crud = new GroceryCrud();
            $crud->setTable('psu');
            $crud->setRelation('idmaker', 'maker', 'name');
            $crud->displayAs('idmaker','Maker');
            $crud->displayAs('imgloc','Image location');
            $crud->setClone();
	        $output = $crud->render();
		    return $this->_exampleOutput($output);
        }else{
            return redirect()->to('/');
        }
    }

    public function maker()
    {
        $session = session();
        if($session->get('accesslvl')>0){
            $crud = new GroceryCrud();
            $crud->setTable('maker');
	        $output = $crud->render();
		    return $this->_exampleOutput($output);
        }else{
            return redirect()->to('/');
        }
    }

    public function series()
    {
        $session = session();
        if($session->get('accesslvl')>0){
            $crud = new GroceryCrud();
            $crud->setTable('series');
	        $output = $crud->render();
		    return $this->_exampleOutput($output);
        }else{
            return redirect()->to('/');
        }
    }

    public function chipset()
    {
        $session = session();
        if($session->get('accesslvl')>0){
            $crud = new GroceryCrud();
            $crud->setTable('chipset');
	        $output = $crud->render();
		    return $this->_exampleOutput($output);
        }else{
            return redirect()->to('/');
        }
    }

    public function socket()
    {
        $session = session();
        if($session->get('accesslvl')>0){
            $crud = new GroceryCrud();
            $crud->setTable('socket');
	        $output = $crud->render();
		    return $this->_exampleOutput($output);
        }else{
            return redirect()->to('/');
        }
    }

    public function pccase()
    {
        $session = session();
        if($session->get('accesslvl')>0){
            $crud = new GroceryCrud();
            $crud->setTable('pccase');
            $crud->setRelation('idmaker', 'maker', 'name');
            $crud->displayAs('idmaker','Maker');
            $crud->displayAs('imgloc','Image location');
            $crud->setClone();
	        $output = $crud->render();
		    return $this->_exampleOutput($output);
        }else{
            return redirect()->to('/');
        }
    }

    public function ramtype()
    {
        $session = session();
        if($session->get('accesslvl')>0){
            $crud = new GroceryCrud();
            $crud->setTable('ramtype');
	        $output = $crud->render();
		    return $this->_exampleOutput($output);
        }else{
            return redirect()->to('/');
        }
    }

    public function storagetype()
    {
        $session = session();
        if($session->get('accesslvl')>0){
            $crud = new GroceryCrud();
            $crud->setTable('storagetype');
            $crud->displayAs('name','Storage type');
	        $output = $crud->render();
		    return $this->_exampleOutput($output);
        }else{
            return redirect()->to('/');
        }
    }

    public function users2()
    {
        $session = session();
        if($session->get('accesslvl')>1){
            $crud = new GroceryCrud();
            $crud->setTable('user');
            $crud->columns(['email','accesslvl']);
            $crud->displayAs('accesslvl','Level of access');
            $crud->setRule('email', 'email', 'required|valid_email');
            $crud->unsetExport();
            $crud->unsetPrint();
            $crud->fieldType('password','password');

            $crud->callbackBeforeInsert(function ($stateParameters){
                $stateParameters->data['password']=password_hash($stateParameters->data['password'], PASSWORD_DEFAULT);
                return $stateParameters;
            });
            $crud->callbackBeforeUpdate(function ($stateParameters){
                $stateParameters->data['password']=password_hash($stateParameters->data['password'], PASSWORD_DEFAULT);
                return $stateParameters;
            });

	        $output = $crud->render();
		    return $this->_exampleOutput($output);
        }else{
            return redirect()->to('/');
        }
    }

    public function users()
    {
        $session = session();
        if($session->get('accesslvl')>1){
            $crud = new GroceryCrud();
            $crud->setTable('user');
            $crud->columns(['email','accesslvl']);
            $crud->displayAs('accesslvl','Level of access');
            $crud->setRule('email', 'email', 'required|valid_email');
            $crud->unsetExport();
            $crud->unsetPrint();
            $crud->unsetEdit();
            $crud->fieldType('password','password');
            $crud->setActionButton('Edit', 'ui-button-icon-primary ui-icon ui-icon-pencil', function ($row) {
                return base_url().'workspace/users/edituserform/'.$row;
            }, false);

            $crud->callbackBeforeInsert(function ($stateParameters){
                $stateParameters->data['password']=password_hash($stateParameters->data['password'], PASSWORD_DEFAULT);
                return $stateParameters;
            });
            $crud->callbackBeforeUpdate(function ($stateParameters){
                $stateParameters->data['password']=password_hash($stateParameters->data['password'], PASSWORD_DEFAULT);
                return $stateParameters;
            });

	        $output = $crud->render();
		    return $this->_exampleOutput($output);
        }else{
            return redirect()->to('/');
        }
    }

    public function supportedcpu()
    {
        $session = session();
        if($session->get('accesslvl')>0){
            $crud = new GroceryCrud();
            $crud->setTable('supportedcpu');
            $crud->setRelation('idcpu', 'cpu', 'name');
            $crud->setRelation('idchipset', 'chipset', 'name');
            $crud->displayAs('idcpu', 'Cpu');
            $crud->displayAs('idchipset', 'Chipset');
	        $output = $crud->render();
    		return $this->_exampleOutput($output);
        }else{
            return redirect()->to('/');
        }
    }

    public function images()
    {
        $session = session();
        if($session->get('accesslvl')>0){
            helper('filesystem');
            $dir = "./img";
            $files = directory_map($dir);
            $data['page_title']='Images';
            $data['files']=$files;
            $data['dir']=base_url().$dir.'/';
            return view('images',$data);
        }else{
            return redirect()->to('/');
        }
    }

    public function imgupload()
    {
        $session = session();
        $folderpath = ROOTPATH.'public/img';
        if($session->get('accesslvl')>0){

            $data = array();
            $data['page_title']='Images';

            $validationRule = [
                'file' => [
                    'label' => 'Image File',
                    'rules' => [
                        'uploaded[file]',
                        'is_image[file]',
                        'mime_in[file,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                        'max_size[file,8000]',
                    ],
                ],
            ];

            if (!$this->validate($validationRule)){
                $session->setFlashdata('errors' , $this->validator->getErrors());
                return redirect()->to('workspace/images');
            }

            $img = $this->request->getFile('file');

            if (!$img->hasMoved()){
                $imgname=rawurlencode($img->getName());
                $img->move($folderpath,$imgname);
                return redirect()->to('workspace/images');
            }

            $session->setFlashdata('errors' , 'The file has already been moved.');
            return redirect()->to('workspace/images');
        }else{
            return redirect()->to('/');
        }
    }

    public function imgopt($action=null,$actpath=null)
    {
        $session = session();
        $folderpath = ROOTPATH.'public/img/';
        if($session->get('accesslvl')>0){

            if($action!=null && $actpath!=null && $action=='delete'){
                //delete file
                if(is_file($folderpath.$actpath)){
                    try{
                        unlink($folderpath.$actpath);                        
                    }catch (\Exception $e){
                        $session->setFlashdata('errors' , (array)'Internal error, contact administrator to check the logs.');
                        //$e->getMessage() log in file future
                    }
                }
                return redirect()->to('workspace/images');
            }

            //echo $action.' '.$actpath;
            if($this->request->getPost('action')!=null && $this->request->getPost('oldname')!=null && $this->request->getPost('action')=='rename'){
                $actpath=$this->request->getPost('oldname');
                //rename file
                if(is_file($folderpath.$actpath) && $this->request->getPost('name')!=null){
                    try{
                        $file = new \CodeIgniter\Files\File($folderpath.$actpath);
                        $file->move($folderpath,$this->request->getPost('name'));
                    }catch (\Exception $e){
                        $session->setFlashdata('errors' , array('Internal error, contact administrator to check the logs.'));
                        //$e->getMessage() log in file future
                    }
                }
                return redirect()->to('workspace/images');
            }

            return redirect()->to('workspace/images');
        }else{
            return redirect()->to('/');
        }
    }

    //WIP
    public function edituserform($id){
        $session = session();
        if($session->get('accesslvl')>1){
            //get id from GET method
            //get user email and access level from model
            //fill parameters in view
            $data = array();
            $model = new Logins();
            $data = $model->getformuser($id);
            return view('cruduserform',$data);
        }else{
            return redirect()->to('/');
        }
    }

    public function edituser(){
        $session = session();
        if($session->get('accesslvl')>1){
            //get parameters from edituserform
            //use model to update the parameters for user
            //redirect to workspace/users
            $request = \Config\Services::request();
            $id=$request->getPost('id');
            $data = [
                'email' => $request->getPost('email'),
                'accesslvl' => $request->getPost('accesslvl')
            ];
            //if there is a password hash it and save it
            if($request->getPost('password')!==null){
                $data['password']=password_hash($request->getPost('password'), PASSWORD_DEFAULT);
            }

            $model = new Logins();
            $data = $model->updateformuser($id,$data);
            return redirect()->to('/workspace/users/success/1');
        }else{
            return redirect()->to('/');
        }
    }

    private function _exampleOutput($output = null) {
        return view('workspace', (array)$output);
    }
}
