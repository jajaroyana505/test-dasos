<?php

class User extends CI_Model
{
    function login($email, $pass)
    {
        $user = $this->db->get_where('users', ['email' => "$email"])->row();
        if ($user != null) {
            if (password_verify($pass, $user->password)) {
                return true;
            }
        } else {
            return false;
        }
    }
}
