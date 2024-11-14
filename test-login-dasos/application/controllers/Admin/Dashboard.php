<?php
class Dashboard extends CI_Controller
{
    public function index()
    {
        if (!$this->session->userdata('login')) {
            return redirect(base_url('/login'));
        }
        $this->load->view('admin/dashboard');
    }
}
