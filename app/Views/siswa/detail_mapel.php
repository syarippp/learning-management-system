        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col p-md-0">
                        <h4>Detail Mata Pelajaran</h4>
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
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th width="50">No</th>
                                            <th width="300">Nama Mapel</th>
                                            <th width="150">Kelas Mapel</th>
                                            <th width="150">Tahun Mapel</th>
                                            <th width="150">Pengajar</th>
                                            <th><center>Aksi</center></th>
                                    </thead>

                                    <tbody style="color: black;">
                                        <?php $no = 1; ?>
                                        <?php foreach ($mapel_aktif as $ma): ?>
                                        <tr>
                                            <td><center><?php echo $no; ?></center></td>
                                            <td><?php echo $ma->nama_mapel; ?></td>
                                            <td><center><?php echo $ma->kelas_mapel; ?></center></td>
                                            <td><center><?php echo $ma->tahun_mapel; ?></center></td>
                                            <td><center><?php echo $ma->nama_lengkap; ?></center></td>
                                            <td><center><a href="<?= base_url('siswa/akses_mapel?id_dm='.$ma->id_detail_mapel.''); ?>"><button type="button" class="btn btn-success">Buka <span class="btn-icon-right"><i
                                                class="fa fa-arrow-circle-right "></i></span>
                                            </button></a></center></td>
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
                                            <th>Pengajar</th>
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
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->