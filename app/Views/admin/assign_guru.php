<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col p-md-0">
                <h4>Assign Guru ke Mapel</h4>
            </div>
        </div>

        <!-- Form Assign
        <div class="row">
            <div class="col-lg-12 col-xxl-12 col-xl-5">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card forms-card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Assign Guru</h4>
                                <div class="basic-form">
                                    <form action="<?= base_url('admin/assign_guru_simpan') ?>" method="post">
                                        <div class="form-group">
                                            <label>Pilih Guru</label>
                                            <select name="id_users" class="form-control" required>
                                                <option value="">-- Pilih Guru --</option>
                                                <?php foreach ($list_guru as $guru): ?>
                                                    <option value="<?= $guru->id_users ?>"><?= $guru->nama_lengkap ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
    <label>Pilih Detail Mapel</label>
    <select name="id_detail_mapel" class="form-control" required>
        <option value="">-- Pilih Detail Mapel --</option>
        <?php foreach ($list_detail_mapel as $dm): ?>
            <option value="<?= $dm->id_detail_mapel ?>">
                <?= $dm->nama_mapel ?> - <?= $dm->kelas_mapel ?> - <?= $dm->tahun_mapel ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>


                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- Tabel Hasil Assign -->
        <div class="row mt-4">
            <div class="col-lg-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <h5>Guru yang Sudah Diassign</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped text-dark">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Guru</th>
                                        <th>Nama Mapel</th>
                                        <th>Kelas</th>
                                        <th>Tahun</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; foreach ($assigned as $item): ?>
                                        <tr>
                                            <td><font color="black"><?= $no++ ?></font></td>
                                            <td><font color="black"><?= esc($item->nama_lengkap) ?></font></td>
                                            <td><font color="black"><?= esc($item->nama_mapel) ?></font></td>
                                            <td><font color="black"><?= esc($item->kelas_mapel) ?></font></td>
                                            <td><font color="black"><?= esc($item->tahun_mapel) ?></font></td>
                                            
                                            <td>
                                            <a href="#" data-toggle="modal" data-target="#editAssignModal<?= $item->id_guru_mapel ?>" class="btn btn-warning btn-sm">Edit</a>

                                                <a href="<?= base_url('admin/hapus_assign_guru?id=' . $item->id_guru_mapel) ?>"
                                                   class="btn btn-danger btn-sm"
                                                   onclick="return confirm('Yakin ingin menghapus assign ini?')">Hapus</a>
                                            </td>
                                        </tr>
    <!-- Modal Edit Assign -->
    <div class="modal fade" id="editAssignModal<?= $item->id_guru_mapel ?>" tabindex="-1" role="dialog" aria-labelledby="editAssignLabel<?= $item->id_guru_mapel ?>" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="<?= base_url('admin/update_assign_guru') ?>" method="post">
      <input type="hidden" name="id_guru_mapel" value="<?= $item->id_guru_mapel ?>">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Assign Pengajar</h5>
          <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Nama Guru</label>
            <select name="id_users" class="form-control" required>
              <?php foreach ($list_guru as $guru): ?>
                <option value="<?= $guru->id_users ?>" <?= $guru->id_users == $item->id_users ? 'selected' : '' ?>>
                  <?= $guru->nama_lengkap ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group">
            <label>Detail Mapel</label>
            <select name="id_detail_mapel" class="form-control" required>
              <?php foreach ($list_detail_mapel as $dm): ?>
                <option value="<?= $dm->id_detail_mapel ?>" <?= $dm->id_detail_mapel == $item->id_detail_mapel ? 'selected' : '' ?>>
                  <?= $dm->kelas_mapel ?> - <?= $dm->tahun_mapel ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Simpan Perubahan</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        </div>
      </div>
    </form>
  </div>
</div>

                                    <?php endforeach ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Guru</th>
                                        <th>Nama Mapel</th>
                                        <th>Kelas</th>
                                        <th>Tahun</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <?php if (session()->getFlashdata('success')): ?>
                            <div class="alert alert-success mt-3"><?= session()->getFlashdata('success') ?></div>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--**********************************
    Content body end
***********************************-->
