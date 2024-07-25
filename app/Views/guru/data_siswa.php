        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col p-md-0">
                        <h4>Data Siswa</h4>
                    </div>
                    <div class="col p-md-0">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Data Siswa</li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">

                        <h1 class="text-center text-primary">DATA SISWA</h1><h2 class="text-center text-dark">Kelas <?= $kelas; ?></h2>

                                    <div class="mt-3"></div>
                                    <?php if (session()->getFlashKeys()): ?>
                                        <?php echo session()->getFlashdata('berhasiltambahmapel'); ?>
                                <?php endif; ?>

                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Mapel Baru</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                            aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="<?= base_url('guru/tambah_mapel') ?>" method="post">
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="col-form-label">Nama Mapel:</label>
                                                            <input type="text" class="form-control" id="recipient-name" name="nama_mapel" required="">
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

                        <div class="card mt-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th width="">No</th>
                                            <th width="">NISN</th>
                                            <th width="">Nama Lengkap</th>
                                            <th width="">Kelas</th>
                                            <th width="">Alamat</th>
                                            <th width="">No HP</th>
                                            <th width="">Profil Picture</th>
                                    </thead>

                                    <tbody style="color: black;">
                                        <?php $no = 1; ?>
                                        <?php foreach ($getsiswa as $ma): ?>
                                        <tr>
                                            <td><?php echo $no; ?></center></td>
                                            <td><?php echo $ma->nisn; ?></td>
                                            <td><?php echo $ma->nama_lengkap; ?></td>
                                            <td><?php echo $ma->kelas; ?></td>
                                            <td><?php echo $ma->alamat; ?></td>
                                            <td><?php echo $ma->no_hp; ?></td>
                                            <td><img width="100" src="<?= base_url('profil_picture/') ?><?= $ma->profil_picture ?>"></td>
                                        </tr>
                                        <?php $no++; ?>

                                        <?php endforeach; ?>
                                        
                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <th width="">No</th>
                                            <th width="">NISN</th>
                                            <th width="">Nama Lengkap</th>
                                            <th width="">Kelas</th>
                                            <th width="">Alamat</th>
                                            <th width="">No HP</th>
                                            <th width="">Profil Picture</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->