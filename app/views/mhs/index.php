<div class="container mt-5">

    <div class="row">
        <div class="col-lg-6">
            <?= Flasher::flash() ?>
        </div>
    </div>


    <div class="row">
        <div class="col-6">

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary tambahData" data-toggle="modal" data-target="#exampleModal">
                tambahkan data mahasiswa
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">tambah</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form action="<?= BASEURL; ?>/mhs/tambah" method="POST">

                                <input type="hidden" name="id" id="id">

                                <div class="form-group">
                                    <label for="nama">nama</label>
                                    <input type="text" class="form-control" id="nama" aria-describedby="emailHelp" placeholder="nama" name="nama">
                                </div>
                                <div class="form-group">
                                    <label for="email">email</label>
                                    <input type="text" class="form-control" id="email" placeholder="email" name="email">
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- daftar mahasiswa -->
            <h1><?= $data['judul'] ?></h1>
            <div>

                <ul class="list-group">
                    <?php
                    foreach ($data['mhs'] as $m) : ?>
                        <li class="list-group-item "><?= $m['nama_mhs'] ?>
                            <a href="<?= BASEURL; ?>/mhs/hapus/<?= $m['id_mhs'] ?>" class="badge-danger badge-pill float-end mx-1 text-danger" onclick="return confirm('yakin?')">hapus</a>
                            <a href="<?= BASEURL; ?>/mhs/edit/<?= $m['id_mhs'] ?>" class="badge-primary badge-pill float-end mx-1 text-success editData" data-toggle="modal" data-target="#exampleModal" data-id="<?= $m['id_mhs']; ?>">edit</a>
                            <a href="<?= BASEURL; ?>/mhs/detail/<?= $m['id_mhs'] ?>" class="badge-primary badge-pill float-end mx-1">Detail</a>
                        </li>
                    <?php endforeach; ?>
                </ul>

            </div>
        </div>
    </div>

</div>