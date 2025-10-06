<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Lauth {
    protected $_lava;

    public function __construct()
    {
        $this->_lava = lava_instance();
        $this->_lava->call->database();
        $this->_lava->call->library('session');
    }

    public function register($username, $password, $role = 'user')
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        return $this->_lava->db->table('users')->insert([
            'username' => $username,
            'password' => $hash,
            'role' => $role,
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }

    public function login($username, $password)
    {
        $user = $this->_lava->db->table('users')
                        ->where('username', $username)
                        ->get();

        if ($user && password_verify($password, $user['password'])) {
            $this->_lava->session->set_userdata([
                'user_id' => $user['id'],
                'username' => $user['username'],
                'role' => $user['role'],
                'logged_in' => true
            ]);
            return true;
        }

        return false;
    }

    public function is_logged_in()
    {
        return (bool) $this->_lava->session->has_userdata('logged_in') && $this->_lava->session->has_userdata('user_id');
    }

    public function has_role($role)
    {
        $r = $this->_lava->session->has_userdata('role') ? $this->_lava->session->userdata['role'] : ($this->_lava->session->has_userdata('user_role') ? $this->_lava->session->userdata['user_role'] : null);
        return $r === $role;
    }

    public function logout()
    {
        $this->_lava->session->unset_userdata(['user_id','username','role','logged_in','user_email','user_role']);
    }
}
