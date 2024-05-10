<div class="container-fluid">
    <div>
        <h1>Welcome To Data Buku</h1>
    </div>

    <?= $this->session->flashdata('pesan'); ?>
    
<section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="<?php echo base_url('buku/tambah'); ?>" method="POST" autocomplete="off">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="mb-2" >Kode Buku</label>
                                        <input type="text" class="form-control" placeholder="Masukan Kode Buku" name="kode_buku" value="<?= set_value('kode_buku') ?>">
                                        <?= form_error('kode_buku', '<div class="text-small text-danger">', '</div>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-2 mt-3" >Nama Buku</label>
                                        <input type="text" class="form-control" placeholder="Masukan Nama Buku" name="nama_buku" value="<?= set_value('nama_buku') ?>">
                                        <?= form_error('nama_buku', '<div class="text-small text-danger">', '</div>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-2 mt-3" >Penerbit</label>
                                        <input type="text" class="form-control" placeholder="Masukan Penerbit" name="penerbit" value="<?= set_value('penerbit') ?>">
                                        <?= form_error('penerbit', '<div class="text-small text-danger">', '</div>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="mb-2" >Deskripsi</label>
                                        <textarea rows="9" type="text" class="form-control" placeholder="Masukan Deskripsi" name="deskripsi" ><?= set_value('deskripsi') ?></textarea>
                                        <?= form_error('deskripsi', '<div class="text-small text-danger">', '</div>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1 mt-3">Submit</button>
                                <button type="reset" class="btn btn-light-secondary me-1 mb-1 mt-3">Reset</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<section class="section">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Buku</th>
                                <th>Nama Buku</th>
                                <th>Penerbit</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <?php 
                        $no = 1;
                        foreach($buku as $b) :
                        ?>
                        <tbody>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $b->kode_buku ?></td>
                                <td><?= $b->nama_buku ?></td>
                                <td><?= $b->penerbit ?></td>
                                <td><?= $b->deskripsi ?></td>
                                <td>
                                    <button data-bs-toggle="modal" data-bs-target="#edit<?= $b->id_buku ?>" class="btn btn-warning"><i class="ti ti-edit"></i></button>
                                    <a href="<?= base_url('buku/delete/' . $b->id_buku) ?>" onclick="return confirm('Apakah Anda yakin akan menghapus data ini?')" class="btn btn-danger "><i class="ti ti-trash"></i></a>
                                </td>
                            </tr>
                        </tbody>
                        <?php endforeach ?>
                    </table>
                </div>
            </div>
        </div>

         <!-- Modal -->
    <?php foreach($buku as $b) { ?>
    <div class="modal fade" id="edit<?= $b->id_buku ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form" action="<?= base_url('buku/edit/' . $b->id_buku ) ?>" method="POST">
                        <div class="row">
                            <div class="form-group">
                                <label>Kode Buku</label>
                                <input type="text" class="form-control" placeholder="Masukan Kode Buku" name="kode_buku" value="<?= $b->kode_buku ?>">
                                <?= form_error('kode_buku', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Nama Buku</label>
                                <input type="text" class="form-control" placeholder="Masukan Nama Buku" name="nama_buku" value="<?= $b->nama_buku ?>" >
                                <?= form_error('nama_buku', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Penerbit</label>
                                <input type="text" class="form-control" placeholder="Masukan Penerbit" name="penerbit" value="<?= $b->penerbit ?>" >
                                <?= form_error('penerbit', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea type="text" class="form-control" placeholder="Masukan Deskripsi" name="deskripsi"><?= $b->deskripsi ?></textarea>
                                <?= form_error('deskripsi', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                            <button type="button" class="btn btn-secondary me-1 mb-1" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>

    </section>

    <script>
        // Set timeout untuk menghapus alert setelah 3 detik
        setTimeout(function() {
            $('.alert').alert('close');
        }, 3000);
    </script>

    
</div>