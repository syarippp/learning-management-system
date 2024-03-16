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

                        <!-- <button type="button" class="btn btn-success">Tambah Mapel <span class="btn-icon-right"><i class="fa fa-plus "></i></span></button> -->

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
                                                <a href="<?= base_url('guru/hapus_mapel?id_detail_mapel='.$ma->id_detail_mapel.''); ?>">
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