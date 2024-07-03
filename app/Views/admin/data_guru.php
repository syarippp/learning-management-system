        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col p-md-0">
                        <h4>Tambah Data Guru</h4>
                    </div>
                    <div class="col p-md-0">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Tambah Data Guru</li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-xxl-12 col-xl-12">
                        <div class="row">


                            <div class="col-12">
                                <a href="<?= base_url('admin/tambah_guru') ?>">
                                <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#exampleModal"
                                        data-whatever="@mdo">Tambah Data Guru<span class="btn-icon-right"><i class="fa fa-plus "></i></span>
                                    </button>
                                </a>

                                <?php if (session()->getFlashKeys()): ?>
                                            <?php echo session()->getFlashdata('gagalbuatakun'); ?>
                                            <?php echo session()->getFlashdata('berhasilbuatakun'); ?>
                                        <?php endif; ?>

                        <div class="card mt-3">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Guru</th>
                                            <th>No HP</th>
                                            <th>Alamat</th>
                                            <th width="400"><center>Aksi</center></th>
                                        </tr>
                                    </thead>
                                    <tbody style="color: black;">


                                        <?php $no = 1; ?>
                                        <?php foreach ($guru as $g): ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $g->nama_lengkap ?></td>
                                            <td><?= $g->no_hp ?></td>
                                            <td><?= $g->alamat ?></td>
                                            <td>
                                                <center>
                                                <a href="<?= base_url('admin/edit_guru?id_users='.$g->id_users.''); ?>">
                                                    <button type="button" class="btn btn-warning btn-xs">Edit Data<span class="btn-icon-right"><i class="fa fa-arrow-circle-right "></i></span></button>
                                                </a>
                                                <a href="<?= base_url('admin/hapus_guru?id_users='.$g->id_users.''); ?>">
                                                    <button type="button" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus Data <span class="btn-icon-right"><i class="fa fa-trash"></i></span></button>

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
                                            <th>Nama Guru</th>
                                            <th>No HP</th>
                                            <th>Alamat</th>
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