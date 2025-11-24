<?php 

class LoginModel 
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function validasi($user, $pass)
    {
        $valid = '';

        $this->db->query('SELECT * FROM admin WHERE username = :user');

        $this->db->bind('user', $user);
        $this->db->execute();
        if ($this->db->rowCount() > 0) {
            $row = $this->db->single();

            if (password_verify($pass, $row['password'])) {
                $valid = 1;
            } else {
                $valid = 0;
            }
        } else {
            $valid = -1;
        }

        return $valid;
    }
}