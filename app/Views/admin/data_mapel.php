<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col p-md-0">
                <h4>Data Mapel</h4>
            </div>
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Data Mapel</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                    Tambah Mapel Baru <span class="btn-icon-right"><i class="fa fa-plus "></i></span>
                </button>

                <div class="mt-3"></div>

                <?php if (session()->getFlashKeys()): ?>
                    <?= session()->getFlashdata('berhasiltambahmapel'); ?>
                <?php endif; ?>

                <!-- Modal Tambah Mapel -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Mapel Baru</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url('admin/tambah_mapel') ?>" method="post">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Nama Mapel:</label>
                                        <input type="text" class="form-control" name="nama_mapel" required>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-success">Tambah</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Table Mapel -->
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th width="10">No</th>
                                        <th>Nama Mapel</th>
                                        <th width="400"><center>Aksi</center></th>
                                    </tr>
                                </thead>
                                <tbody style="color: black;">
                                    <?php $no = 1; ?>
                                    <?php foreach ($mapel as $g): ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= esc($g->nama_mapel) ?></td>
                                        <td class="text-center">
    <div class="d-sm-flex align-items-center" style="gap: 6px;">

        <!-- Detail Mapel -->
        <button type="button" class="btn btn-xs btn-purple w-50" data-toggle="modal" data-target="#modalDetailMapel<?= $g->id_mapel ?>">
            Detail Mapel <i class="fa fa-plus ml-1"></i>
        </button>

        <!-- Edit -->
        <a href="<?= base_url('admin/edit_mapel?id_mapel=' . $g->id_mapel) ?>" class="w-10">
            <button type="button" class="btn btn-warning btn-sm w-10">Edit</button>
        </a>

        <!-- Hapus -->
        <a href="<?= base_url('admin/hapus_mapel?id_mapel=' . $g->id_mapel) ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus mapel ini?')" class="w-10">
            <button type="button" class="btn btn-danger btn-sm w-10">Hapus</button>
        </a>

    </div>    
</td>
                                    </tr>

<!-- Modal Tambah Detail Mapel -->
<div class="modal fade" id="modalDetailMapel<?= $g->id_mapel ?>" tabindex="-1" role="dialog"
        aria-labelledby="modalLabel<?= $g->id_mapel ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel<?= $g->id_mapel ?>">Tambah Detail Mapel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('guru/tambah_detail_mapel') ?>" method="post">

                        <?php $tahun_sekarang = date('Y'); ?>
                        <div class="form-group mb-3">
                            <label for="tahun_mapel" class="font-weight-bold">Tahun Mapel</label>
                            <input type="text" class="form-control" value="<?= $tahun_sekarang ?>" readonly>
                            <input type="hidden" name="tahun_mapel" value="<?= $tahun_sekarang ?>">
                        </div>

                        <div class="form-group mb-3">
                            <label for="nama_mapel" class="font-weight-bold">Nama Mapel</label>
                            <input type="text" class="form-control" id="nama_mapel" name="nama_mapel" value="<?= $g->nama_mapel ?>" readonly>
                            <input type="hidden" name="id_mapel" value="<?= $g->id_mapel ?>">
                        </div>

                        <div class="form-group mb-3">
                            <label for="kelas_mapel" class="font-weight-bold">Kelas</label>
                            <select name="kelas_mapel" id="kelas_mapel" class="form-control" required>
                                <option value="">-- Pilih Kelas --</option>
                                <option value="X TKJ 1">X TKJ 1</option>
                                <option value="X TKJ 2">X TKJ 2</option>
                                <option value="X TKJ 3">X TKJ 3</option>
                                <option value="X TKJ 4">X TKJ 4</option>
                                <option value="XI TKJ 1">XI TKJ 1</option>
                                <option value="XI TKJ 2">XI TKJ 2</option>
                                <option value="XI TKJ 3">XI TKJ 3</option>
                                <option value="XI TKJ 4">XI TKJ 4</option>
                                <option value="XII TKJ 1">XII TKJ 1</option>
                                <option value="XII TKJ 2">XII TKJ 2</option>
                                <option value="XII TKJ 3">XII TKJ 3</option>
                                <option value="XII TKJ 4">XII TKJ 4</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="id_users" class="font-weight-bold">Nama Pengajar</label>
                            <select name="id_users" id="id_users" class="form-control" required>
                                <option value="">-- Pilih Guru --</option>
                                <?php foreach ($daftar_guru as $guru): ?>
                                    <option value="<?= $guru->id_users ?>"><?= $guru->nama_lengkap ?> (<?= $guru->username ?>)</option>
                                <?php endforeach; ?>
                            </select>
                        </div>


                        


                        <div class="modal-footer d-flex justify-content-between">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success">Tambah</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->                                    
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Mapel</th>
                                        <th><center>Aksi</center></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- End Row -->
        </div>
    </div>
</div>
<!--**********************************
    Content body end
***********************************-->
