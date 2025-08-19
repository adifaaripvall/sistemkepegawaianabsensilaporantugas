<div class="modal fade" id="delete-<?php echo e($meet->id); ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Kantor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-outline card-primary">
                    <div class="card-body">
                        <p>Apakah anda yakin ingin menghapus <?php echo e($meet->title); ?>?</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-warning" data-dismiss="modal">
                    <i class="fas fa-arrow-left"></i> Kembali
                </button>
                
                <a href="/backoffice/meet/<?php echo e($meet->id); ?>/delete" class="btn btn-danger">
                    <i class="fas fa-trash"></i> Hapus
                </a>
            </div>
        </div>
    </div>
</div>
<?php /**PATH D:\PROYEK AKHIR\PA-Adigra\resources\views/backoffice/meet/modal/delete.blade.php ENDPATH**/ ?>