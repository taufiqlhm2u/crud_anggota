<main class="mt-5 d-flex justify-content-center">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3>Data Anggota</h3>
            <!-- Button trigger modal -->
            <button type="button" id="btnTambah" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#memberModal">
                Tambah
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th width="1%" style="white-space: nowrap;">Id</th>
                            <th style="white-space: nowrap;">Nama</th>
                            <th style="white-space: nowrap;">Alamat</th>
                            <th style="white-space: nowrap;">Email</th>
                            <th style="white-space: nowrap;">Profil</th>
                            <th style="white-space: nowrap;">Status</th>
                            <th width="20%" style="white-space: nowrap;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['anggota'] as $a): ?>
                            <tr>
                                <td style="white-space: nowrap;"><?= $a['id_anggota'] ?></td>
                                <td style="white-space: nowrap;"><?= $a['nama'] ?></td>
                                <td style="white-space: nowrap;"><?= $a['alamat'] ?></td>
                                <td style="white-space: nowrap;"><?= $a['email'] ?></td>
                                <td style="white-space: nowrap;"><img src="<?= BASEURL . 'img/' . $a['profil'] ?>"
                                        alt="Profil" width="50"></td>
                                <td style="white-space: nowrap;">
                                    <?php if ($a['status_keanggotaan'] == 'Aktif'): ?>
                                        <span class="text-success fw-semibold"><?= $a['status_keanggotaan'] ?></span>
                                    <?php else: ?>
                                        <span class="text-danger fw-semibold"><?= $a['status_keanggotaan'] ?></span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="<?= BASEURL . 'anggota/update/' . $a['id_anggota']?>" class="btn btn-warning btn-sm btnUpdate" data-bs-toggle="modal" data-bs-target="#memberModal" data-id="<?= $a['id_anggota'] ?>">Edit</a>
                                    <a onclick="return confirm('Apakah kamu ingin menghapus data?')" href="<?= BASEURL . 'anggota/hapus/' . $a['id_anggota'] ?>" class="btn btn-danger btn-sm">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="memberModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= BASEURL . 'anggota/tambah' ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required>
                            <label for="nama">Nama</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                required>
                            <label for="email">Email</label>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Foto Profil</label>
                            <input class="form-control" type="file" name="poto" id="formFile">
                        </div>
                        <div class="mb-3">
                            <label>Status keanggotaan</label>
                            <select class="form-select" id="status" aria-label="status keanggotaan" name="status">
                                <option>-- Status --</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Nonaktif">Nonaktif</option>
                            </select>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" required>
                            <label for="alamat">Alamat</label>
                        </div>
                        <input type="hidden" name="fotolama" id="fotolama">
                        <input type="hidden" name="id_anggota" id="id_anggota">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</main>