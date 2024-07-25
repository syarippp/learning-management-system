        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col p-md-0">
                        <h4>Edit Mapel</h4>
                    </div>
                    <div class="col p-md-0">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Edit Mapel</li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-xxl-12 col-xl-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="card forms-card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Edit Nama Mapel</h4>
                                        <div class="basic-form">
                                            <form method="post" action="<?php echo base_url('admin/update_mapel'); ?>">
                                                <div class="form-group">
                                                    <label class="text-label">Nama Mapel Sebelum</label>
                                                    <input type="name" name="nama_sebelum" class="form-control" value="<?php foreach ($mapel as $g): ?> <?=$g->nama_mapel;?> <?php endforeach; ?>" readonly="">
                                                    <input type="name" name="id_mapel" class="form-control" value="<?php foreach ($mapel as $g): ?> <?=$g->id_mapel;?> <?php endforeach; ?>" hidden>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-label">Nama Mapel Baru</label>
                                                    <input type="name" name="nama_sesudah" class="form-control" required>
                                                </div>
                                                <button type="submit" class="btn btn-primary btn-form mr-2">Edit</button>
                                                <a href="<?= base_url('admin/data_mapel') ?>"><button type="button" class="btn btn-light text-dark btn-form">Cancel</button></a>
                                            </form>
                                        </div>
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