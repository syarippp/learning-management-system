        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col p-md-0">
                        <h4>Semua Mata Pelajaran</h4>
                    </div>
                    <div class="col p-md-0">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Mapel</li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">

                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"
                                        data-whatever="@mdo">Tambah Detail Mapel Baru<span class="btn-icon-right"><i class="fa fa-plus "></i></span>
                                    </button>

                                    <div class="mt-3"></div>

                                    <?php if (session()->getFlashKeys()): ?>
                                        <?php echo session()->getFlashdata('berhasiltambahdetailmapel'); ?>
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
                                                    <form action="<?= base_url('guru/tambah_detail_mapel') ?>" method="post">
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="col-form-label">Nama Mapel:</label>
                                                            <input type="text" class="form-control" id="recipient-name" name="nama_mapel" value="<?php foreach ($mapel_nama as $mn): echo $mn->nama_mapel; ?> <?php endforeach; ?>" readonly="">
                                                            <input type="text" class="form-control" id="recipient-name" name="id_mapel" value="<?php foreach ($mapel_nama as $mn): echo $mn->id_mapel; ?> <?php endforeach; ?>" hidden>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="col-form-label">Kelas:</label>
                                                            <select name="kelas_mapel" class="form-control">
                                                                <option value="10">10</option>
                                                                <option value="11">11</option>
                                                                <option value="12">12</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="col-form-label">Tahun Mapel:</label>
                                                            <input type="number" class="form-control" name="tahun_mapel" min="1900" max="2100" required="">
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
                                            <th width="50">No</th>
                                            <th width="400">Nama Mapel</th>
                                            <th width="150">Kelas Mapel</th>
                                            <th width="150">Tahun Mapel</th>
                                            <th><center>Aksi</center></th>
                                            <th><center>Status</center></th>
                                    </thead>

                                    <tbody style="color: black;">
                                        <?php $no = 1; ?>
                                        <?php foreach ($mapel_aktif as $ma): ?>
                                        <tr>
                                            <td><center><?php echo $no; ?></center></td>
                                            <td><?php echo $ma->nama_mapel; ?></td>
                                            <td><center><?php echo $ma->kelas_mapel; ?></center></td>
                                            <td><center><?php echo $ma->tahun_mapel; ?></center></td>
                                            <td width="800">
                                                <center>
                                                <a href="<?= base_url('guru/akses_mapel?id_dm='.$ma->id_detail_mapel.''); ?>">
                                                    <button type="button" class="btn btn-success btn-xs">Akses Mapel <span class="btn-icon-right"><i class="fa fa-arrow-circle-right "></i></span></button>
                                                </a>
                                                <a href="<?= base_url('guru/hapus_detail_mapel?id_detail_mapel='.$ma->id_detail_mapel.''); ?>">
                                                    <button type="button" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Anda yakin ingin menghapus mapel ini?')">Hapus Mapel <span class="btn-icon-right"><i class="fa fa-trash"></i></span></button>

                                                </a>
                                            </center>
                                            </td>
                                            <td>
                                                <?php
                                                    if($ma->status == "aktif"){
                                                        echo "
                                                        <a href='". base_url('guru/update_status_mapel_ketidakaktif?iddetailmapel='.$ma->id_detail_mapel) ."'>
                                                            <button type='button' class='btn btn-outline-danger btn-ft' onclick='return confirm(\"Apakah Anda yakin ingin menonaktifkan?\")'>Non Aktifkan</button>
                                                        </a>";
                                                    }else{
                                                        echo"
                                                        <a href='". base_url('guru/update_status_mapel_keaktif?iddetailmapel='.$ma->id_detail_mapel) ."'>
                                                            <button type='button' class='btn btn-outline-info btn-ft' onclick='return confirm(\"Apakah Anda yakin ingin mengaktifkan kembali?\")'>Aktifkan</button>
                                                        </a>";
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                        <?php $no++; ?>

                                        <?php endforeach; ?>
                                        
                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Mapel</th>
                                            <th>Kelas Mapel</th>
                                            <th>Tahun Mapel</th>
                                            <th><center>Aksi</center></th>
                                            <th><center>Status</center></th>
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