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
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Mapel</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th style="width: 50px;">No</th>
                                        <th>Nama Mapel</th>
                                        <th>Kelas Mapel</th>
                                        <th>Tahun Mapel</th>
                                        <th style="width: 150px;"><center>Aksi</center></th>
                                    </tr>
                                </thead>

                                <tbody style="color: black;">
                                    <?php $no = 1; ?>
                                    <?php foreach ($mapel_user as $mapel): ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= esc($mapel->nama_mapel) ?></td>
                                        <td><?= esc($mapel->kelas_mapel) ?></td>
                                        <td><?= esc($mapel->tahun_mapel) ?></td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="<?= base_url('guru/akses_mapel?id_dm=' . $mapel->id_detail_mapel); ?>" class="btn btn-success btn-sm">
                                                    Buka <i class="fa fa-arrow-circle-right ml-1"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Mapel</th>
                                        <th>Kelas Mapel</th>
                                        <th>Tahun Mapel</th>
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
<!--**********************************
    Content body end
***********************************-->
