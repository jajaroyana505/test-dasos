<?php
class LoginController extends CI_Controller
{
    public function index()
    {
        if ($this->input->method() == 'post') {
            return $this->proses();
        }
        $this->load->view('auth/header');
        $this->load->view('auth/login');
        $this->load->view('auth/footer');
    }

    public function logout()
    {
        $this->session->sess_destroy();
    }

    private function proses()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == TRUE) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $this->load->model('User');
            $user = $this->User->login($email, $password);
            if ($user) {
                $this->session->set_userdata([
                    'login' => true
                ]);
                $response = [
                    'status' => 'success',

                ];
            } else {
                $response = [
                    'status' => 'error',
                    'message' => 'Email atau password salah',
                    'errors' => [
                        'general' => 'Email atau password salah'
                    ]
                ];
            }
        } else {
            $errors = [
                'email' => form_error('email'),
                'password' => form_error('password')
            ];
            $response = [
                'status' => 'error',
                'message' => 'Validasi gagal',
                'errors' => $errors
            ];
        }

        // Mengirim respons JSON dengan header yang sesuai
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
}
