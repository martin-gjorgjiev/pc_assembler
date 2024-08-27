<?php

namespace App\Controllers;

use App\Models\Logins;

class Home extends BaseController
{
    public function index()
    {
        $data['page_title']='Home';
        return view('home',$data);
    }

    public function login()
    {
        $session = session();
        if($session->get('logged')){
            //if already logged in
            return redirect()->to('workspace/cpu');
        }else{
            $data['page_title']='login';
            return view('login',$data);
        }        
    }

    public function verify()
    {   
        $data['page_title']='login';
        $model = new Logins();
        $session = session();

        //save to var
        $email= $this->request->getPost('email', FILTER_SANITIZE_EMAIL);
        $pass= $this->request->getPost('password');

        //if logged in redirect to workspace cpu
        if($session->get('logged')){
            //if already logged in
            return redirect()->to('workspace/cpu');

        }else{
            //check if both fields are filled
            if(!isset($email)||!isset($pass)||empty($email)||empty($pass)){
                //return to login view with message that fields weren't filled
                $data['msg']='Please fill all of the fields.';
                return view('login',$data);

            }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                //check for valid mail
                $data['msg']='Invalid email';
                return view('login',$data);

            }else{
                //$data['msg']=$email;
                //return view('login',$data);

                //call respective model
                $temp=$model->getuser($email);

                //login, check password verify input password with database hash
                if(!empty($temp) && $temp['email']===$email && password_verify((string)$pass,$temp['password']) && $temp['accesslvl']>0){
                    //correct, save to session
                    $sesdata= array(
                        'id' => $temp['id'],
                        'email' => $temp['email'],
                        'accesslvl' => $temp['accesslvl'],
                        'logged' => TRUE
                    );
                    unset($temp);
                    $session->set($sesdata);

                    return redirect()->to('workspace/cpu');
                }
                else{
                    //incorrect credentials
                    $data['msg']='Incorrect credentials.';
                    return view('login',$data);
                }
            }
        }
    }

    public function logout()
    {
        $session = session();
        $session->remove('id');
        $session->remove('email');
        $session->remove('logged');
        $session->remove('accesslvl');
        $session->destroy();
        return redirect()->to('/');
    }

    public function yourbuild()
    {
        $data['page_title']='Your build';
        return view('yourbuild',$data);
    }
}
