<?php 

class AnggotaController extends Controller
{
    public function index() {

        $data['anggota'] = $this->model('AnggotaModel')->getAllAnggota();
        $data['title'] = 'Anggota';

        $this->view('templates/header', $data);
        $this->view('anggota/index' , $data);
        $this->view('templates/footer');
    }

    public function tambah() {
        if ($this->model('AnggotaModel')->tambahAnggota($_POST) > 0) {
            echo "<script>
                    alert('Data anggota berhasil ditambahkan!'); document.location.href = 'http://localhost/XIRPL1_Taufiqul_Hakim_35_anggota/public/anggota';
                  </script>";
        } else {
            echo "<script>
                    alert('Data anggota gagal ditambahkan!'); document.location.href = 'http://localhost/XIRPL1_Taufiqul_Hakim_35_anggota/public/anggota';
                  </script>";
        }
    }

    public function hapus($id) {
        if ($this->model('AnggotaModel')->hapusAnggota($id) > 0) {
            echo "<script>
                    alert('Data anggota berhasil dihapus!'); document.location.href = 'http://localhost/XIRPL1_Taufiqul_Hakim_35_anggota/public/anggota';
                  </script>";
        } else {
            echo "<script>
                    alert('Data anggota gagal dihapus!'); document.location.href = 'http://localhost/XIRPL1_Taufiqul_Hakim_35_anggota/public/anggota';
                  </script>";
        }
        
    }

    public function getUbah() {
        echo json_encode($this->model('AnggotaModel')->getAnggotaById($_POST['id']));
    }

    public function update() {
        if ($this->model('AnggotaModel')->updateAnggota($_POST) > 0) {
            echo "<script>
                    alert('Data anggota berhasil diubah!'); document.location.href = 'http://localhost/XIRPL1_Taufiqul_Hakim_35_anggota/public/anggota';
                  </script>";
        } else {
            echo "<script>
                    alert('Data anggota gagal diubah!'); document.location.href = 'http://localhost/XIRPL1_Taufiqul_Hakim_35_anggota/public/anggota';
                  </script>";
        }
    }
}