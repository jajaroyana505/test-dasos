<?php

class RegisterController extends CI_Controller
{
    public function index()
    {
        echo $this->load->view('auth/register');
    }
}
