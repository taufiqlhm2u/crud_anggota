<?php

class LoginController extends Controller
{
    public function index()
    {
        $this->view('login');
    }

    public function proses() 
    {
       var_dump($_POST);
      if ($this->model('LoginModel')->validasi($_POST['username'] , $_POST['pass']) > 0) {
        $_SESSION['login'] = true;
         echo "<script>
                    alert('Hore kamu berhasil masuk!'); document.location.href = 'http://localhost/XIRPL1_Taufiqul_Hakim_35_anggota/public/home';
                  </script>";
      }
    }

    public function logout() 
     {
     session_unset();
     session_destroy();
     $_SESSION = [];
     header('location:' . BASEURL . 'login');    
    }
}