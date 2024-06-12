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
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Data Mapel</li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-xxl-12 col-xl-12">
                        <div class="row">


                            <div class="col-12">
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"
                                        data-whatever="@mdo">Tambah Mapel Baru<span class="btn-icon-right"><i class="fa fa-plus "></i></span>
                                </button>

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
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?= base_url('admin/tambah_mapel') ?>" method="post">
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Nama Mapel:</label>
                                                        <input type="text" class="form-control" id="recipient-name" name="nama_mapel" value="" required="">
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
                                            <td><?= $no; ?></td>
                                            <td><?= $g->nama_mapel ?></td>
                                            <td>
                                                <center>
                                                <a href="<?= base_url('admin/edit_mapel?id_mapel='.$g->id_mapel.''); ?>">
                                                    <button type="button" class="btn btn-warning btn-xs">Edit Data<span class="btn-icon-right"><i class="fa fa-arrow-circle-right "></i></span></button>
                                                </a>
                                                <a href="<?= base_url('admin/hapus_mapel?id_mapel='.$g->id_mapel.''); ?>">
                                                    <button type="button" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Anda yakin ingin menghapus mapel ini?')">Hapus Data <span class="btn-icon-right"><i class="fa fa-trash"></i></span></button>

                                                </a>
                                            </center>
                                            </td>
                                        </tr>
                                        <?php $no++; ?>
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