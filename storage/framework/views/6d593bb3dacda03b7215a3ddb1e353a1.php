<div class="modal fade" id="notulensi<?php echo e($meet->id); ?>" tabindex="-1" aria-labelledby="notulensiLabel<?php echo e($meet->id); ?>" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form role="form" method="POST" action="<?php echo e(route('meet.notulensi', $meet->id)); ?>">
                <?php echo csrf_field(); ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="notulensiLabel<?php echo e($meet->id); ?>">Tambah Notulensi Meeting</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Notulensi <span class="text-danger">*</span></label>
                        <textarea name="notulensi" class="form-control" rows="5" required><?php echo e($meet->notulensi); ?></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </button>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div> <?php /**PATH D:\PROYEK AKHIR\PA-Adigra\resources\views/backoffice/meet/modal/notulensi.blade.php ENDPATH**/ ?>