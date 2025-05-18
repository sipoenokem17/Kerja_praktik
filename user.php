<?= $this->extend('admin/layout'); ?>

<?= $this->section('main-content'); ?>
<div class="page-wrapper">
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Users
                    </h2>
                    <div class="text-secondary mt-1">Jumlah Users</div>
                </div>
                <!-- Page title actions -->

                <div class="col-auto ms-auto d-print-none">
                    <div class="d-flex">
                        <input type="search" class="form-control d-inline-block w-9 me-3" placeholder="Search user…" />
                        <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modalTambah">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 5l0 14" />
                                <path d="M5 12l14 0" />
                            </svg>
                            New user
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <?php if (session()->getFlashdata('msg_add')) : ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <div class="d-flex">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon alert-icon">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M5 12l5 5l10 -10"></path>
                            </svg>
                        </div>
                        <div>
                            <?= session()->getFlashdata('msg_add'); ?>
                        </div>
                    </div>
                    <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('msg_del')) : ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <div class="d-flex">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon alert-icon">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                                <path d="M12 8v4"></path>
                                <path d="M12 16h.01"></path>
                            </svg>
                        </div>
                        <div>
                            <?= session()->getFlashdata('msg_del'); ?>
                        </div>
                    </div>
                    <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('msg_upd')) : ?>
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <div class="d-flex">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon alert-icon">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M5 12l5 5l10 -10"></path>
                            </svg>
                        </div>
                        <div>
                            <?= session()->getFlashdata('msg_upd'); ?>
                        </div>
                    </div>
                    <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                </div>
            <?php endif; ?>

            <div class="row row-cards">
                <?php foreach ($dataUsers as $row): ?>
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                            <div class="card-body p-4 text-center">
                                <span class="avatar avatar-xl mb-3 rounded"><?= $row['inisial'] ?></span>
                                <h3 class="m-0 mb-1"><a href="#" data-bs-toggle="modal" data-bs-target="#modal-simple"><?= $row['nama'] ?></a></h3>
                                <div class="text-secondary"><?= $row['nama_booth'] ?></div>
                            </div>
                            <div class="d-flex">
                                <span data-bs-toggle="modal" data-bs-target="#modalLihat">
                                    <a href="#" class="card-btn btn-detail" data-id="<?= $row['id_user'] ?>"
                                        data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Lihat">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                            <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"></path>
                                        </svg>
                                    </a>
                                </span>

                                <span data-bs-toggle="modal" data-bs-target="#modalUbah">
                                    <a href="#" class="card-btn btn-ubah" data-uid="<?= $row['id_user'] ?>"
                                        data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Ubah">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                            <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                            <path d="M16 5l3 3" />
                                        </svg>
                                    </a>
                                </span>

                                <a href="https://wa.me/<?= $row['No_hp'] ?>" target="_blank" class="card-btn" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="WhatsApp">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-brand-whatsapp">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9" />
                                        <path d="M9 10a.5 .5 0 0 0 1 0v-1a.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a.5 .5 0 0 0 0 -1h-1a.5 .5 0 0 0 0 1" />
                                    </svg>
                                </a>

                                <span data-bs-toggle="modal" data-bs-target="#modalHapus">
                                    <a href="#" class="card-btn btn-hapus" data-did="<?= $row['id_user'] ?>"
                                        data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Hapus">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" style="vertical-align:middle; margin-top:-1px;" viewBox="0 0 20 20" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M4 7l16 0"></path>
                                            <path d="M10 11l0 6"></path>
                                            <path d="M14 11l0 6"></path>
                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                        </svg>
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Modal Tambah -->
        <div class="modal modal-blur fade" id="modalTambah" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form class="mt-3" method="post" action="tambahUser" enctype="multipart/form-data">
                        <div class="container-xl mt-3 mb-3">
                            <div class="row row-cards">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row row-cards">
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="mb-3">
                                                        <label class="form-label">Nama Lengkap</label>
                                                        <input type="text" class="form-control" name="nama" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="mb-3">
                                                        <label class="form-label">Username</label>
                                                        <input type="text" class="form-control" name="username" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="mb-3">
                                                        <label class="form-label">Password</label>
                                                        <div class="input-group input-group-flat">
                                                            <input type="password" id="pasword" name="pasword" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="mb-3">
                                                        <label class="form-label">No. Handphone</label>
                                                        <input type="text" class="form-control" name="noHandphone" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="mb-3">
                                                        <label class="form-label">Booth</label>
                                                        <select name="id_booth" class="form-control">
                                                            <option value="">-Pilih Booth-</option>
                                                            <?php foreach ($dataBooth as $booth): ?>
                                                                <option value="<?= $booth['id_booth'] ?>"><?= $booth['nama_booth'] ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="mb-3">
                                                        <label class="form-label"></label>
                                                        <label class="form-check">
                                                            <input class="form-check-input" type="radio" name="userLevel" value="0">
                                                            <span class="form-check-label">Admin</span>
                                                            <i class="text-danger">*Pilih role admin</i>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer mt-3">
                            <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                                Batal
                            </a>
                            <button type="submit" class="btn btn-primary ms-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 5l0 14" />
                                    <path d="M5 12l14 0" />
                                </svg>
                                Tambah Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Lihat -->
        <div class="modal modal-blur fade" id="modalLihat" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Data User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="container-xl mt-3 mb-3">
                        <div class="row row-cards">

                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <div class="mb-3">
                                            <span class="avatar avatar-xl rounded" id="inisial"></span>
                                        </div>
                                        <div class="card-title mb-1" id="namaLengkap"></div>
                                        <div class="text-secondary" id="booth"></div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row row-cards">
                                            <div class="col-sm-6 col-md-2">
                                                <div class="mb-3">
                                                    <label class="form-label">Id User</label>
                                                    <input type="text" id="idUser" class="form-control" readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-3">
                                                <div class="mb-3">
                                                    <label class="form-label">Username</label>
                                                    <input type="text" class="form-control" id="username" readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-3">
                                                <div class="mb-3">
                                                    <label class="form-label">Password</label>
                                                    <div class="input-group input-group-flat">
                                                        <input type="password" id="password" name="password" class="form-control" readonly>
                                                        <span class="input-group-text">
                                                            <a class="link-secondary" type="button" id="togglePass">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                    <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                                    <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                                                </svg>
                                                            </a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">No. Handphone</label>
                                                    <input type="text" id="noHp" class="form-control" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="#" class="btn btn-danger ms-auto" data-bs-dismiss="modal">
                                    Tutup
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                $('.btn-detail').on('click', function() {
                    const id_user = $(this).data('id');

                    // Memanggil endpoint untuk mendapatkan data detail profil
                    $.get('detailUser/' + id_user, function(response) {

                        // Isi data profil di elemen input
                        $('#inisial').text(response[0].inisial);
                        $('#namaLengkap').text(response[0].nama);
                        $('#booth').text(response[0].nama_booth);
                        $('#idUser').val(response[0].id_user);
                        $('#username').val(response[0].username);
                        $('#password').val(response[0].password);
                        $('#noHp').val(response[0].No_hp);

                        // Tampilkan modal
                        $('#modalLihat').modal('show');
                    });
                });
            });
        </script>

        <script>
            $(document).ready(function() {
                $('#togglePass').on('click', function() {
                    const passwordInput = $('#password');
                    const icon = $(this).find('i');

                    if (passwordInput.attr('type') === 'password') {
                        passwordInput.attr('type', 'text');
                        icon.removeClass('fa-eye').addClass('fa-eye-slash');
                    } else {
                        passwordInput.attr('type', 'password');
                        icon.removeClass('fa-eye-slash').addClass('fa-eye');
                    }
                });
            });
        </script>

        <!-- Modal ubah -->
        <div class="modal modal-blur fade" id="modalUbah" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ubah Data User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form class="mt-3" method="post" action="ubahDataUser" enctype="multipart/form-data">
                        <div class="container-xl mt-3 mb-3">
                            <div class="row row-cards">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row row-cards">
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="mb-3">
                                                        <label class="form-label">Nama Lengkap</label>
                                                        <input type="text" class="form-control" name="u_nama" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="mb-3">
                                                        <label class="form-label">Username</label>
                                                        <input type="text" class="form-control" name="u_username" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="mb-3">
                                                        <label class="form-label">Password</label>
                                                        <div class="input-group input-group-flat">
                                                            <input type="password" id="pasword" name="u_password" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="mb-3">
                                                        <label class="form-label">No. Handphone</label>
                                                        <input type="text" class="form-control" name="u_noHp" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="mb-3">
                                                        <label class="form-label">Booth</label>
                                                        <select name="u_id_booth" class="form-control">
                                                            <option value="">-Pilih Booth-</option>
                                                            <?php foreach ($dataBooth as $booth): ?>
                                                                <option value="<?= $booth['id_booth'] ?>" <?= $booth['id_booth'] == $row['id_booth'] ? 'selected' : '' ?>>
                                                                    <?= $booth['nama_booth'] ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="mb-3">
                                                        <label class="form-label"></label>
                                                        <label class="form-check">
                                                            <input class="form-check-input" type="radio" name="user_Level" value="0">
                                                            <span class="form-check-label text-danger">*Jadikan Admin</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <input type="number" name="u_id" class="form-control" required hidden>

                        <div class="modal-footer mt-3">
                            <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                                Batal
                            </a>
                            <button type="submit" class="btn btn-warning ms-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-send">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M10 14l11 -11" />
                                    <path d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5" />
                                </svg>
                                Ubah Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                // Event listener untuk tombol 'btn-ubah'
                $('.btn-ubah').on('click', function() {
                    const id_user = $(this).data('uid');

                    // Mengirim permintaan GET ke endpoint detailUser untuk mendapatkan data user
                    $.get('detailUser/' + id_user, function(response) {
                        if (response && response.length > 0) {
                            $('input[name="u_id"]').val(response[0].id_user);
                            $('input[name="u_nama"]').val(response[0].nama);
                            $('input[name="u_username"]').val(response[0].username);
                            $('input[name="u_password"]').val(response[0].password);
                            $('input[name="u_noHp"]').val(response[0].No_hp);
                            $('input[name="u_namaBooth"]').val(response[0].nama_booth);

                            // Set select option booth sesuai id_booth milik user
                            $('select[name="u_id_booth"]').val(response[0].id_booth);

                            $('#modalUbah').modal('show');
                        } else {
                            alert('Data tidak ditemukan. Silakan coba lagi.');
                        }
                    }).fail(function() {
                        alert('Terjadi kesalahan saat memuat data. Silakan coba lagi.');
                    });
                });
            });
        </script>
        <!-- <script>
            $(document).ready(function() {
                // Event listener untuk tombol 'btn-ubah'
                $('.btn-ubah').on('click', function() {

                    const id_user = $(this).data('uid');

                    // Mengirim permintaan GET ke endpoint detailProfil untuk mendapatkan data profil berdasarkan NIM
                    $.get('detailUser/' + id_user, function(response) {
                        // Pastikan response berupa array dan memiliki data


                        if (response && response.length > 0) {

                            $('input[name="u_id"]').val(response[0].id_user);
                            $('input[name="u_nama"]').val(response[0].nama);
                            $('input[name="u_username"]').val(response[0].username);
                            $('input[name="u_password"]').val(response[0].password);
                            $('input[name="u_noHp"]').val(response[0].No_hp);
                            $('input[name="u_namaBooth"]').val(response[0].nama_booth);

                            $('#modalUbah').modal('show');
                        } else {
                            // Jika tidak ada data yang diterima, tampilkan pesan error (opsional)
                            alert('Data tidak ditemukan. Silakan coba lagi.');
                        }
                    }).fail(function() {
                        // Penanganan jika request gagal
                        alert('Terjadi kesalahan saat memuat data. Silakan coba lagi.');
                    });
                });
            });
        </script> -->

        <!-- Modal Hapus -->
        <div class="modal modal-blur fade" id="modalHapus" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-status bg-danger"></div>
                    <div class="modal-body text-center py-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 9v4"></path>
                            <path d="M10.363 3.591l-8.106 13.534a1.914 1.914 0 0 0 1.636 2.871h16.214a1.914 1.914 0 0 0 1.636 -2.87l-8.106 -13.536a1.914 1.914 0 0 0 -3.274 0z"></path>
                            <path d="M12 16h.01"></path>
                        </svg>
                        <h3>Anda yakin?</h3>
                        <div class="text-secondary">Ini akan menghapus data
                            <br>
                            <span><strong id="id_nama"></strong></span>
                        </div>
                    </div>
                    <form class="mt-3" method="post" action="hapusUser">
                        <input type="number" name="delid" required hidden>
                        <div class="modal-footer">
                            <div class="w-100">
                                <div class="row">
                                    <div class="col">
                                        <a href="#" class="btn w-100" data-bs-dismiss="modal">Batal</a>
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="btn btn-danger w-100">Ya, hapus!</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                $('.btn-hapus').on('click', function() {
                    const id_user = $(this).data('did');

                    // Memanggil endpoint untuk mendapatkan data detail profil
                    $.get('detailUser/' + id_user, function(response) {

                        // Mengisi data nim dan nama ke dalam modal
                        $('#id_nama').text(' - ' + response[0].nama + '-');

                        // Mengisi data nim sebagai ID untuk proses penghapusan
                        $('input[name="delid"]').val(response[0].id_user);

                        // Tampilkan modal
                        $('#modalHapus').modal('show');
                    });
                });
            });
        </script>
        <!-- script Waktu Alert -->
        <script>
            setTimeout(function() {
                $('.alert').alert('close');
            }, 3000);
        </script>
        <?= $this->endSection(); ?>
