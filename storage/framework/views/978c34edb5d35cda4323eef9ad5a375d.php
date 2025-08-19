<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form role="form" method="POST" action="/backoffice/submission/izin-sakit/store" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pnegajuan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="card card-outline card-primary">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Mulai Pengajuan <span class="text-danger">*</span></label>
                                <input type="date"  name="start_date" class="form-control <?php if($errors->has('start_date')): ?> is-invalid <?php endif; ?>" placeholder="Mulai Pengajuan" value="<?php echo e(old('start_date')); ?>"
                                required oninvalid="this.setCustomValidity('Mulai Pengajuan harus diisi')" oninput="this.setCustomValidity('')" min="<?php echo e(date('Y-m-d')); ?>">
                                <?php if($errors->has('start_date')): ?>
                                <small class="help-block" style="color: red"><?php echo e($errors->first('start_date')); ?></small>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label>Selesai Pengajuan <span class="text-danger">*</span></label>
                                <input type="date"  name="end_date" class="form-control <?php if($errors->has('end_date')): ?> is-invalid <?php endif; ?>" placeholder="Selesai Pengajuan" value="<?php echo e(old('end_date')); ?>"
                                required oninvalid="this.setCustomValidity('Selesai Pengajuan harus diisi')" oninput="this.setCustomValidity('')" min="<?php echo e(date('Y-m-d')); ?>">
                                <?php if($errors->has('end_date')): ?>
                                <small class="help-block" style="color: red"><?php echo e($errors->first('end_date')); ?></small>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label>Tipe <span class="text-danger">*</span></label>
                                <select name="type" class="form-control <?php if($errors->has('type')): ?> is-invalid <?php endif; ?>" required
                                oninvalid="this.setCustomValidity('Tipe harus diisi')" oninput="this.setCustomValidity('')">
                                    <option value="">-- Pilih tipe pengajuan --</option>
                                    <option value="sakit">Sakit</option>
                                    <option value="izin">Izin</option>
                                </select>
                                <?php if($errors->has('type')): ?>
                                <small class="help-block" style="color: red"><?php echo e($errors->first('type')); ?></small>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label>Surat Izin/Sakit</label>
                                <input type="file" class="form-control" name="file" accept="*/*">
                            </div>
                            <div class="form-group">
                                <label>Alasan Pengajuan <span class="text-danger">*</span></label>
                                <textarea name="description" class="form-control <?php if($errors->has('description')): ?> is-invalid <?php endif; ?>" placeholder="Alasan Pengajuan"
                                required oninvalid="this.setCustomValidity('Alasan Pengajuan harus diisi')" oninput="this.setCustomValidity('')"></textarea>
                                <?php if($errors->has('description')): ?>
                                <small class="help-block" style="color: red"><?php echo e($errors->first('description')); ?></small>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="fa fa-arrow-left"></span> Kembali</button>
                    <button type="submit" class="btn btn-success"><span class="fa fa-save"></span> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div><?php /**PATH D:\PROYEK AKHIR\PA-Adigra\resources\views/backoffice/submission/izin-sakit/modal/add.blade.php ENDPATH**/ ?>