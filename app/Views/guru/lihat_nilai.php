        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col p-md-0">
                        <h4>Akses Mata Pelajaran</h4>
                    </div>
                    <div class="col p-md-0">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Akses Materi</li>
                        </ol>
                    </div>
                </div>

                <a href="<?= base_url('guru/akses_mapel?id_dm='.$id_dm) ?>"><button type="button" class="btn btn-primary">Kembali<span class="btn-icon-right"><i class="fa fa-arrow-left "></i></span></button></a>
                
                <div class="card mt-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th width="50">No</th>
                                            <th width="400">Nama Lengkap</th>
                                            <th width="150">Nilai</th>
                                    </thead>

                                    <tbody style="color: black;">
                                        <?php $no = 1; ?>
                                        <?php foreach ($lihat_nilai as $ma): ?>
                                        <tr>
                                            <td><center><?php echo $no; ?></center></td>
                                            <td><?php echo $ma->nama_lengkap; ?></td>
                                            <td><center><?php echo $ma->nilai; ?></center></td>
                                        </tr>
                                        <?php $no++; ?>

                                        <?php endforeach; ?>
                                        
                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <th width="50">No</th>
                                            <th width="400">Nama Lengkap</th>
                                            <th width="150">Nilai</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                </div>
                            </div>
                        </div>


                        <a href="<?= base_url('guru/export_pdf?id_dm=' . $id_dm . '&kelas=' . $lihat_nilai[0]->kelas_mapel . '&id_mat=' . $id_mat) ?>">
                            <button class="btn btn-danger" style="width: 100%;">Export PDF</button>
                        </a>


            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->