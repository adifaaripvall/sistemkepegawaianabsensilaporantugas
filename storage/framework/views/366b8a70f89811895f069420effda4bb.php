<div class="modal fade" id="detail-<?php echo e($submission->user->id); ?>">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Karyawan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="card card-outline card-primary">
                    <div class="card-body">
                        <div class=" text-center">
                            <label for="foto">Foto</label>
                            <?php if($submission->user->foto): ?>
                                <img src="<?php echo e(Storage::disk('s3')->url($submission->user->foto)); ?>" 
                                class="gambarPreviewuser img-fluid d-block" alt=""
                                style="width: 150px; height: 150px; margin-left: auto; margin-right: auto">
                            <?php else: ?>
                                <img src="<?php echo e(asset('images/profile-default.jpg')); ?>" class="gambarPreviewuser rounded img-fluid mb-3 d-block" alt=""
                                style="width: 150px; height: 150px; margin-left: auto; margin-right: auto">
                            <?php endif; ?>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-md-6">
                                <div class=" d-flex justify-content-between pl-4 pr-4">
                                    <p>
                                        <b>Nama:</b> 
                                    </p>
                                    <p>
                                        <?php echo e($submission->user->name); ?>

                                    </p>
                                </div>
                                <div class=" d-flex justify-content-between pl-4 pr-4">
                                    <p>
                                        <b>Email:</b> 
                                    </p>
                                    <p>
                                        <?php echo e($submission->user->email); ?>

                                    </p>
                                </div>
                                <div class=" d-flex justify-content-between pl-4 pr-4">
                                    <p>
                                        <b>Peran:</b> 
                                    </p>
                                    <p>
                                        <?php echo e($submission->user->role->name); ?>

                                    </p>
                                </div>
                                <div class=" d-flex justify-content-between pl-4 pr-4">
                                    <p>
                                        <b>Jenis Kelamin:</b> 
                                    </p>
                                    <?php if($submission->user->gender == null): ?>
                                        <p class="badge badge-warning">
                                            <i class="fa fa-exclamation-triangle"></i> Belum melengkapi data
                                        </p>
                                    <?php else: ?>
                                        <p>
                                            <?php echo e($submission->user->gender); ?>

                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class=" d-flex justify-content-between pl-4 pr-4">
                                    <p>
                                        <b>Agama:</b> 
                                    </p>
                                    <?php if($submission->user->religion == null): ?>
                                        <p class="badge badge-warning">
                                            <i class="fa fa-exclamation-triangle"></i> Belum melengkapi data
                                        </p>
                                    <?php else: ?>
                                        <p>
                                            <?php echo e($submission->user->religion); ?>

                                        </p>
                                    <?php endif; ?>
                                </div>
                                <div class=" d-flex justify-content-between pl-4 pr-4">
                                    <p>
                                        <b>Tempat, Tanggal Lahir:</b> 
                                    </p>
                                    <?php if($submission->user->place_birth == null  && $submission->user->date_birth == null): ?>
                                        <p class="badge badge-warning">
                                            <i class="fa fa-exclamation-triangle"></i> Belum melengkapi data
                                        </p>
                                    <?php else: ?>
                                        <p>
                                            <?php echo e($submission->user->place_birth); ?>, <?php echo e(date('d F Y', strtotime($submission->user->date_birth))); ?>

                                        </p>
                                    <?php endif; ?>
                                </div>
                                <div class=" d-flex justify-content-between pl-4 pr-4">
                                    <p>
                                        <b>Alamat:</b> 
                                    </p>
                                    <?php if($submission->user->address == null): ?>
                                        <p class="badge badge-warning">
                                            <i class="fa fa-exclamation-triangle"></i> Belum melengkapi data
                                        </p>
                                    <?php else: ?>
                                        <p>
                                            <?php echo e($submission->user->address); ?>

                                        </p>
                                    <?php endif; ?>
                                </div>
                                <div class=" d-flex justify-content-between pl-4 pr-4">
                                    <p>
                                        <b>No Hp:</b> 
                                    </p>
                                    <?php if($submission->user->no_hp == null): ?>
                                        <p class="badge badge-warning">
                                            <i class="fa fa-exclamation-triangle"></i> Belum melengkapi data
                                        </p>
                                    <?php else: ?>
                                        <p>
                                            <?php echo e($submission->user->no_hp); ?>

                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>  
                        
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?php /**PATH D:\PROYEK AKHIR\PA-Adigra\resources\views/backoffice/submission/izin-sakit/modal/user.blade.php ENDPATH**/ ?>