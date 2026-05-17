        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles"> 
                    <div class="col p-md-0">
                        <h4>Tambah Data Siswa</h4>
                    </div>
                    <div class="col p-md-0">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Tambah Data Siswa</li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-xxl-12 col-xl-12">
                        <div class="row">


                            <div class="col-12">
                                
                                <!-- Button to trigger modal -->
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#optionsModal">
                                    Tambah Data Siswa
                                </button>

                                <div class="modal fade" id="optionsModal" tabindex="-1" role="dialog" aria-labelledby="optionsModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="optionsModalLabel">Pilih Metode</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div id="options">
                                                    <a href="#"><button type="button" class="btn btn-primary btn-block" id="manualButton">Tambah Data Manual</button></a><br>
                                                    <button type="button" class="btn btn-secondary btn-block" id="importButton">Import Menggunakan Excel</button>
                                                </div>
                                                <div id="importForm" class="d-none">
                                                    <form action="<?= base_url('admin/importSiswa') ?>" method="post" enctype="multipart/form-data">
                                                        <div class="form-group">
                                                            <label for="file" style="color: black;">Upload File Excel</label>
                                                            <input type="file" name="file" class="form-control">
                                                        </div>
                                                        <div class="form-group" style="color: red;">
                                                            <label for="file" style="font-size: 12px;">*Jika belum punya template excel nya, silahkan download di <a href="<?= base_url('temp/temp_import_siswa.xlsx')?> "><b> Download Template Excel Disini</a></b></label>
                                                            <label for="file" style="font-size: 12px;">*Pastikan untuk mengisi semua data pada field yang telah tersedia</label>
                                                        </div>
                                                        <button type="submit" class="btn btn-success">Tambah Data Siswa</button>
                                                        <button type="button" class="btn btn-secondary" id="backButton">Back</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card mt-4 mb-5">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="example" class="display" style="min-width: 845px">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>NIS</th>
                                                    <th>Nama Siswa</th>
                                                    <th>No HP</th>
                                                    <th>Alamat</th>
                                                    <th>Kelas</th>
                                                    <th><center>Aksi</center></th>
                                                </tr>
                                            </thead>
                                            <tbody style="color: black;">


                                                <?php $no = 1; ?>
                                                <?php foreach ($siswa as $g): ?>
                                                <tr>
                                                    <td><?= $no; ?></td>
                                                    <td><?= $g->nis; ?></td>
                                                    <td><?= $g->nama_lengkap ?></td>
                                                    <td><?= $g->no_hp ?></td>
                                                    <td><?= $g->alamat ?></td>
                                                    <td><?= $g->kelas ?></td>
                                                    <td>
                                                    <div class="col-12 text-center" style="width: 350px;">
                                                        <a href="<?= base_url('admin/edit_siswa?id_users='.$g->id_users.''); ?>">
                                                            <button type="button" class="btn btn-warning btn-xs">Edit <span class="btn-icon-right"><i class="fa fa-arrow-circle-right "></i></span></button>
                                                        </a>
                                                        <a href="<?= base_url('admin/hapus_guru?id_users='.$g->id_users.''); ?>">
                                                            <button type="button" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus <span class="btn-icon-right"><i class="fa fa-trash"></i></span></button>

                                                        </a>
                                                    </div>
                                                    </td>
                                                </tr>
                                                <?php $no++; ?>
                                                <?php endforeach; ?>


                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>No</th>
                                                    <th>NIS</th>
                                                    <th>Nama Siswa</th>
                                                    <th>No HP</th>
                                                    <th>Alamat</th>
                                                    <th>Kelas</th>
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