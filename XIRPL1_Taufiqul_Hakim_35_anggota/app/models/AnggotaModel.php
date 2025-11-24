<?php 

class AnggotaModel 
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllAnggota()
    {
        $this->db->query("SELECT * FROM anggota");
        $this->db->execute();
        return $this->db->resultSel();
    }

    public function tambahAnggota($data)
    {
        $nama = htmlspecialchars($data['nama']);
        $alamat = htmlspecialchars($data['alamat']);
        $email = htmlspecialchars($data['email']);
        $status = $data['status'];

        $photo = $this->uploadPhoto();
        if (!$photo) {
            return false;
        }

        $query = "INSERT INTO anggota (nama, alamat, email, status_keanggotaan, profil) VALUES (:nama, :alamat, :email, :status, :poto)";
        $this->db->query($query);
        $this->db->bind(':nama', $nama);
        $this->db->bind(':alamat', $alamat);
        $this->db->bind(':email', $email);  
        $this->db->bind(':status', $status);
        $this->db->bind(':poto', $photo);
        $this->db->execute();
        return $this->db->rowCount();
        
    }

    public function uploadPhoto()
    {
        $fileName = $_FILES['poto']['name'];
        $fileSize = $_FILES['poto']['size'];
        $error = $_FILES['poto']['error'];
        $tmpName = $_FILES['poto']['tmp_name'];

        if ($error === 4) {
            echo "<script>
                    alert('Pilih foto terlebih dahulu!'); document.location.href = 'http:/XIRPL1_Taufiqul_Hakim_35_anggota/public/anggota';
                  </script>";
            return false;
        }

        $validExtensions = ['jpg', 'jpeg', 'png'];
        $fileExtension = explode('.', $fileName);
        $fileExtension = strtolower(end($fileExtension));

        if (!in_array($fileExtension, $validExtensions)) {
            echo "<script>
                    alert('Yang anda upload bukan foto!'); document.location.href = 'http:/XIRPL1_Taufiqul_Hakim_35_anggota/public/anggota';
                  </script>";
            return false;
        }

        if ($fileSize > 3000000) {
            echo "<script>
                    alert('Ukuran foto terlalu besar!'); document.location.href = 'http:/XIRPL1_Taufiqul_Hakim_35_anggota/public/anggota';
                  </script>";
            return false;
        }

        $newFileName = uniqid() . '.' . $fileExtension;
        move_uploaded_file($tmpName, 'img/' . $newFileName);

        return $newFileName;
    }

    public function hapusAnggota($id)
    {
        $d = $this->getAnggotaById($id);
        unlink('img/' . $d['profil']);

        $this->db->query("DELETE FROM anggota WHERE id_anggota = :id");
        $this->db->bind(':id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getAnggotaById($id)
    {
        $this->db->query("SELECT * FROM anggota WHERE id_anggota = :id");
        $this->db->bind(':id', $id);
        $this->db->execute();
        return $this->db->single();
    }

    public function updateAnggota($data)
    {
        $id = $data['id_anggota'];
        $nama = htmlspecialchars($data['nama']);
        $alamat = htmlspecialchars($data['alamat']);
        $email = htmlspecialchars($data['email']);
        $status = $data['status'];
        $fotolama = htmlspecialchars($data['fotolama']);

        if ($_FILES['poto']['error'] == 4) {
            $photo = $fotolama;
        } else {
            unlink('img/' . $fotolama);
            $photo = $this->uploadPhoto();
            if (!$photo) {
                return false;
            }
        }

        $query = "UPDATE anggota SET nama = :nama, alamat = :alamat, email = :email, status_keanggotaan = :status, profil = :poto WHERE id_anggota = :id";
        $this->db->query($query);
        $this->db->bind(':nama', $nama);
        $this->db->bind(':alamat', $alamat);
        $this->db->bind(':email', $email);  
        $this->db->bind(':status', $status);
        $this->db->bind(':poto', $photo);
        $this->db->bind(':id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}