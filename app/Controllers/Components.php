<?php

namespace App\Controllers;

class Components extends BaseController
{
    public function index()
    {
        $data['page_title']='CPU';
        return view('components',$data);
    }

    public function cpu()
    {
        $data['page_title']='CPU';
        return view('components',$data);
    }

    public function motherboard()
    {
        $data['page_title']='Motherboard';
        return view('components',$data);
    }

    public function ram()
    {
        $data['page_title']='RAM';
        return view('components',$data);
    }

    public function gpu()
    {
        $data['page_title']='GPU';
        return view('components',$data);
    }

    public function powersupply()
    {
        $data['page_title']='Power Supply';
        return view('components',$data);
    }

    public function storage()
    {
        $data['page_title']='Storage';
        return view('components',$data);
    }

    public function pccase()
    {
        $data['page_title']='PC Case';
        return view('components',$data);
    }
}
