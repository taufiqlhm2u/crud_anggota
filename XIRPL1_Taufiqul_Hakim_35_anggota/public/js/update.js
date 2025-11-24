$(function() {
 
    $('#btnTambah').on('click', function() {
        $('.modal-header .modal-title').html('Tambah Data Anggota');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('.modal-content form').attr('action', 'http://localhost/XIRPL1_Taufiqul_Hakim_35_anggota/public/anggota/tambah');
    });

    $('.btnUpdate').on('click', function() {
        $('.modal-header .modal-title').html('Update Data Anggota');
        $('.modal-footer button[type=submit]').html('Update Data');
       $('.modal-content form').attr('action', 'http://localhost/XIRPL1_Taufiqul_Hakim_35_anggota/public/anggota/update');
        
        const id = $(this).data('id');
        
        $.ajax({
            url : 'http://localhost/XIRPL1_Taufiqul_Hakim_35_anggota/public/anggota/getUbah',
            data : {id : id},
            method : 'post',
            dataType : 'json',
            success : function(data) {
                $('#nama').val(data.nama);
                $('#alamat').val(data.alamat);
                $('#email').val(data.email);
                $('#status').val(data.status_keanggotaan);
                $('#id_anggota').val(data.id_anggota);
                $('#fotolama').val(data.profil);
            }
        })
    });
})