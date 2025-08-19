<div class="modal fade" id="edit-<?php echo e($office->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form role="form" method="POST" action="/backoffice/office/<?php echo e($office->id); ?>/update" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <?php echo method_field('PUT'); ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Kantor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="card card-outline card-primary">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Kantor <span class="text-danger">*</span></label>
                                <input type="text"  name="name" class="form-control <?php if($errors->has('name')): ?> is-invalid <?php endif; ?>" placeholder="Kantor" value="<?php echo e($office->name); ?>"
                                required oninvalid="this.setCustomValidity('Kantor harus diisi')" oninput="this.setCustomValidity('')">
                                <?php if($errors->has('name')): ?>
                                <small class="help-block" style="color: red"><?php echo e($errors->first('name')); ?></small>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label>Lokasi <span class="text-danger">*</span></label>
                                <textarea name="address" class="form-control <?php if($errors->has('address')): ?> is-invalid <?php endif; ?>" placeholder="Lokasi" required
                                oninvalid="this.setCustomValidity('Lokasi harus diisi')" oninput="this.setCustomValidity('')"><?php echo e($office->address); ?></textarea>
                                <?php if($errors->has('address')): ?>
                                <small class="help-block" style="color: red"><?php echo e($errors->first('address')); ?></small>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label>Koordinat <span class="text-danger">*</span></label>
                                <div class="d-flex">
                                    <input type="text"  name="latitude" class="form-control mr-1 <?php if($errors->has('latitude')): ?> is-invalid <?php endif; ?>" placeholder="Latitude" value="<?php echo e($office->latitude); ?>"
                                    required oninvalid="this.setCustomValidity('Latitude harus diisi')" oninput="this.setCustomValidity('')">
                                    <input type="text"  name="longitude" class="form-control ml-1 <?php if($errors->has('longitude')): ?> is-invalid <?php endif; ?>" placeholder="Longitude" value="<?php echo e($office->longitude); ?>"
                                    required oninvalid="this.setCustomValidity('Longitude harus diisi')" oninput="this.setCustomValidity('')">
                                </div>
                                <small class="form-text text-muted">Contoh: Latitude: -6.2088, Longitude: 106.8456</small>
                            </div>
                            <div class="form-group">
                                <label>Radius (meter) <span class="text-danger">*</span></label>
                                <input type="number"  name="radius" class="form-control <?php if($errors->has('radius')): ?> is-invalid <?php endif; ?>" placeholder="Radius dalam meter" value="<?php echo e($office->radius); ?>"
                                required oninvalid="this.setCustomValidity('Radius harus diisi')" oninput="this.setCustomValidity('')">
                                <?php if($errors->has('radius')): ?>
                                <small class="help-block" style="color: red"><?php echo e($errors->first('radius')); ?></small>
                                <?php endif; ?>
                                <small class="form-text text-muted">Contoh: 100 (untuk radius 100 meter)</small>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="fa fa-arrow-left"></span> Kembali</button>
                    <button type="submit" class="btn btn-success"><span class="fa fa-edit"></span> Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div><?php /**PATH D:\PROYEK AKHIR\PA-Adigra\resources\views/backoffice/office/modal/edit.blade.php ENDPATH**/ ?>