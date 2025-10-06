<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AuthController extends Controller
{
    public function register()
    {
        $this->call->library('Lauth');

        if ($this->io->method() == 'post') {
            $username = $this->io->post('username');
            $password = $this->io->post('password');
            $role = $this->io->post('role') ?? 'user';

            if ($this->Lauth->register($username, $password, $role)) {
                redirect('auth/login');
            }
        }

        $this->call->view('auth/register');
    }

    public function login()
    {
        $this->call->library('Lauth');

        if ($this->io->method() == 'post') {
            $username = $this->io->post('username');
            $password = $this->io->post('password');

            if ($this->Lauth->login($username, $password)) {
                redirect('auth/dashboard');
            } else {
                echo 'Login failed!';
            }
        }

        $this->call->view('auth/login');
    }

    public function dashboard()
    {
        $this->call->library(['Lauth', 'session']);

        if (!$this->Lauth->is_logged_in()) {
            redirect('auth/login');
        }

        if (!$this->Lauth->has_role('admin')) {
            echo 'Access denied!';
            exit;
        }

        $this->call->view('auth/dashboard', ['session' => $this->session]);
    }

    public function logout()
    {
        $this->call->library('Lauth');
        $this->Lauth->logout();
        redirect('auth/login');
    }
}
