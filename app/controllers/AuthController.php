<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AuthController extends Controller {
    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        // If already logged in, redirect to home
        if ($this->session->has_userdata('logged_in')) {
            redirect('/');
        }

        if ($this->io->method() == 'post') {
            $email = $this->io->post('email');
            $password = $this->io->post('password');

            $this->call->model('AuthModel');
            $user = $this->AuthModel->get_by_email($email);
            if ($user && password_verify($password, $user['password'])) {
                // set session
                $this->session->set_userdata([
                    'user_id' => $user['id'],
                    'email' => $user['email'],
                    'first_name' => $user['first_name'],
                    'last_name' => $user['last_name'],
                    'role' => isset($user['role']) ? $user['role'] : 'user',
                    'logged_in' => TRUE
                ]);
                redirect('/');
            } else {
                $this->session->set_flashdata('auth_error', 'Invalid email or password');
                $this->call->view('Auth/login');
            }
        } else {
            $this->call->view('Auth/login');
        }
    }

    public function register()
    {
        if ($this->io->method() == 'post') {
            $first_name = $this->io->post('first_name');
            $last_name = $this->io->post('last_name');
            $email = $this->io->post('email');
            $password = $this->io->post('password');

            $this->call->model('AuthModel');
            if ($this->AuthModel->get_by_email($email)) {
                $this->session->set_flashdata('auth_error', 'Email already registered');
                $this->call->view('Auth/register');
                return;
            }

            $data = [
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'role' => 'user',
                'created_at' => date('Y-m-d H:i:s')
            ];

            if ($this->AuthModel->insert($data)) {
                $this->session->set_flashdata('auth_success', 'Registration successful. Please login.');
                redirect('/auth/login');
            } else {
                $this->session->set_flashdata('auth_error', 'Registration failed.');
                $this->call->view('Auth/register');
            }
        } else {
            $this->call->view('Auth/register');
        }
    }

    public function logout()
    {
        // clear session keys
        $this->session->unset_userdata(['user_id','email','first_name','last_name','role','logged_in']);
        redirect('/auth/login');
    }
}

?>
