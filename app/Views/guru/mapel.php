        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col p-md-0">
                        <h4>Mata Pelajaran</h4>
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

                        <button type="button" class="btn btn-success">Tambah Mapel <span class="btn-icon-right"><i class="fa fa-plus "></i></span></button>

                        <div class="card mt-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th width="50">No</th>
                                            <th width="800">Nama Mapel</th>
                                            <th width="500"><center>Aksi</center></th>
                                    </thead>

                                    <tbody style="color: black;">
                                        <?php $no = 1; ?>
                                        <?php foreach ($mapel_aktif as $ma): ?>
                                        <tr>
                                            <td><?php echo $no; ?></center></td>
                                            <td><?php echo $ma->nama_mapel; ?></td>
                                            <td><center>
                                                <!-- <a href="<?= base_url('guru/detail_mapel?id='.$ma->id_mapel.'') ?>"><button type="button" class="btn btn-sl-sm btn-success">Detail Mapel</button></a> -->
                                                <a href="<?= base_url('guru/detail_mapel?id='.$ma->id_mapel); ?>">
                                                    <button type="button" class="btn btn-success btn-xs">Detail Mapel <span class="btn-icon-right"><i class="fa fa-arrow-circle-right "></i></span></button>
                                                </a>
                                                <a href="#">
                                                    <button type="button" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Anda yakin ingin menghapus mapel ini?')">Hapus Mapel <span class="btn-icon-right"><i class="fa fa-trash"></i></span></button>
                                                </a>
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
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->