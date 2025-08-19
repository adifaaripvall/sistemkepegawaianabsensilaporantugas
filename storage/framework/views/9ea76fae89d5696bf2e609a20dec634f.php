<?php $__env->startSection('content'); ?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Jadwal Meeting</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Data Jadwal Meeting</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">

    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card card-outline card-primary">
                
                <div class="card-header">
                    <h3 class="card-title">Meeting</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah">
                            <i class="fas fa-plus"></i> <?php echo e(Auth::user()->role_id == 1 ? 'Tambah' : 'Ajukan'); ?> Meeting
                        </button>
                        <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse"
                            data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>

                <div class="card-body">

                    <?php if(session('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Berhasil </strong><?php echo e(session('success')); ?>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php endif; ?>

                    <?php if(session('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error! </strong><?php echo e(session('error')); ?>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php endif; ?>

                    <table class="table table-bordered table-hover text-center" id="example1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Judul</th>
                                <th>Tanggal</th>
                                <th>Waktu</th>
                                <th>Kategori</th>
                                <th>Status</th>
                                <th>Status Pengajuan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $__currentLoopData = $meets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $meet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                            <tr class="meeting-row" data-start="<?php echo e(\Carbon\Carbon::parse($meet->date . ' ' .        $meet->start)); ?>" data-end="<?php echo e(\Carbon\Carbon::parse($meet->date . ' ' . $meet->end)); ?>">
                            <td><?php echo e($key+1); ?></td>
                            <td><?php echo e($meet->title); ?></td>
                            <td><?php echo e(\Carbon\Carbon::parse($meet->date)->translatedFormat('l, d F Y')); ?></td>
                            <td><?php echo e($meet->start); ?> - <?php echo e($meet->end); ?></td>
                            <td>
                                <?php if($meet->category == 'internal'): ?>
                                    <span class="badge badge-info">Meeting Internal</span>
                                <?php elseif($meet->category == 'online'): ?>
                                    <span class="badge badge-primary">Meeting Online</span>
                                <?php else: ?>
                                    <span class="badge badge-warning">Meeting Keluar Kota</span> <br>
                                    <?php if(isset($meet->sik) && $meet->sik): ?>
                                        <?php
                                            $ext = strtolower(pathinfo($meet->sik, PATHINFO_EXTENSION));
                                            $url = asset('storage/surat_izin/' . $meet->sik);
                                        ?>
                                        <?php if($ext === 'pdf'): ?>
                                            <a href="<?php echo e($url); ?>" target="_blank" class="btn btn-sm btn-info ml-2">Preview Surat Izin (PDF)</a>
                                        <?php elseif(in_array($ext, ['jpg','jpeg','png','gif','bmp','webp'])): ?>
                                            <button type="button" class="btn btn-sm btn-info ml-2" onclick="showSuratIzinPreview('<?php echo e($url); ?>')">Preview Surat Izin (Gambar)</button>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </td>
                            <td class="status">
                                <?php if($meet->status == 'pending'): ?>
                                    <span class="badge badge-warning">Pending</span>
                                <?php elseif($meet->status == 'onboarding'): ?>
                                    <span class="badge badge-info">Onboarding</span>
                                <?php else: ?>
                                    <span class="badge badge-success">Selesai</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($meet->acc == 1): ?>
                                    <span class="badge badge-success">Diterima</span>
                                <?php elseif($meet->acc == 2): ?>
                                    <span class="badge badge-danger">Ditolak</span>
                                <?php else: ?>
                                    <span class="badge badge-warning">Pending</span>
                                <?php endif; ?>
                            </td>
                                <td>
                                    <?php if($meet->acc == 0 && $meet->status != 'completed' && Auth::user()->role_id == 1): ?>
                                        <!-- Tombol Terima -->
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#acceptModal<?php echo e($meet->id); ?>" title="Terima">
                                            <i class="fas fa-check"></i>
                                        </button>

                                        <!-- Tombol Tolak -->
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#rejectModal<?php echo e($meet->id); ?>" title="Tolak">
                                            <i class="fas fa-times"></i>
                                        </button>

                                        <!-- Modal Konfirmasi Terima -->
                                        <div class="modal fade" id="acceptModal<?php echo e($meet->id); ?>" tabindex="-1" aria-labelledby="acceptModalLabel<?php echo e($meet->id); ?>" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-success text-white">
                                                        <h5 class="modal-title" id="acceptModalLabel<?php echo e($meet->id); ?>">Konfirmasi Terima</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Apakah Anda yakin ingin <strong>menerima</strong> pertemuan ini?</p>
                                                        <p><strong>Judul:</strong> <?php echo e($meet->title); ?></p>
                                                        <p><strong>Tanggal:</strong> <?php echo e(\Carbon\Carbon::parse($meet->date)->translatedFormat('l, d F Y')); ?></p>
                                                        <p><strong>Waktu:</strong> <?php echo e($meet->start); ?> - <?php echo e($meet->end); ?></p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="<?php echo e(route('meet.accept', $meet->id)); ?>" method="POST" style="display: inline;">
                                                            <?php echo csrf_field(); ?>
                                                            <button type="submit" class="btn btn-success">
                                                                <i class="fas fa-check"></i> Ya, Terima
                                                            </button>
                                                        </form>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                            <i class="fas fa-times"></i> Batal
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Modal Konfirmasi Tolak -->
                                        <div class="modal fade" id="rejectModal<?php echo e($meet->id); ?>" tabindex="-1" aria-labelledby="rejectModalLabel<?php echo e($meet->id); ?>" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-danger text-white">
                                                        <h5 class="modal-title" id="rejectModalLabel<?php echo e($meet->id); ?>">Konfirmasi Tolak</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Apakah Anda yakin ingin <strong>menolak</strong> pertemuan ini?</p>
                                                        <p><strong>Judul:</strong> <?php echo e($meet->title); ?></p>
                                                        <p><strong>Tanggal:</strong> <?php echo e(\Carbon\Carbon::parse($meet->date)->translatedFormat('l, d F Y')); ?></p>
                                                        <p><strong>Waktu:</strong> <?php echo e($meet->start); ?> - <?php echo e($meet->end); ?></p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="<?php echo e(route('meet.reject', $meet->id)); ?>" method="POST" style="display: inline;">
                                                            <?php echo csrf_field(); ?>
                                                            <button type="submit" class="btn btn-danger">
                                                                <i class="fas fa-times"></i> Ya, Tolak
                                                            </button>
                                                        </form>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                            <i class="fas fa-arrow-left"></i> Batal
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
  

                                        ||
                                    <?php endif; ?>
                                    <?php if($meet->status != 'pending' && $meet->acc == 1): ?>
                                        
                                        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#notulensi<?php echo e($meet->id); ?>" title="Notulensi">
                                            <i class="fas fa-file-alt"></i>
                                        </button>
                                    <?php endif; ?>
                                    
                                    <?php if(Auth::user()->role_id == 1): ?>
                                        <?php if($meet->acc == 1): ?>
                                        <form action="<?php echo e(route('meet.complete', $meet->id)); ?>" method="POST" style="display: inline;">
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Apakah meeting ini sudah selesai?')" title="Selesai">
                                                <i class="fas fa-check"></i>
                                            </button>
                                        </form>
                                        <?php endif; ?>
                                        <?php if($meet->status !== 'completed'): ?>

                                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit-<?php echo e($meet->id); ?>" title="Ubah">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        <?php endif; ?>
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-<?php echo e($meet->id); ?>" title="Hapus">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>

                    
                    <?php $__currentLoopData = $meets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $meet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make('backoffice.meet.modal.edit', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php echo $__env->make('backoffice.meet.modal.delete', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php echo $__env->make('backoffice.meet.modal.notulensi', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>

            </div>

        </div>
    </div>

</section>
<script>
    setInterval(function () {
        $.ajax({
            url: "<?php echo e(route('meetings.updateStatus')); ?>",
            method: "GET",
            success: function (response) {
                console.log("Status meeting berhasil diperbarui.");
                // Optional: reload halaman agar status baru tampil
                // location.reload();
            },
            error: function (err) {
                console.error("Gagal update status meeting:", err);
            }
        });
    }, 60000); // 60 detik sekali
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<?php echo $__env->make('backoffice.meet.modal.tambah', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    $(document).ready(function() {
        // Initialize DataTable
        $('#example1').DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });
</script>
<?php $__env->stopPush(); ?>

<!-- Modal Preview Surat Izin Gambar -->
<div id="suratIzinPreviewModal" style="display:none; position:fixed; z-index:9999; left:0; top:0; width:100vw; height:100vh; background:rgba(0,0,0,0.7); align-items:center; justify-content:center;">
    <div style="position:relative; background:transparent; display:flex; align-items:center; justify-content:center; width:100vw; height:100vh;">
        <img id="suratIzinPreviewImage" src="" alt="Preview Surat Izin" style="max-width:98vw; max-height:95vh; border-radius:12px; border:4px solid #fff; box-shadow:0 0 30px #000; padding:12px; background:#fff;">
        <button onclick="closeSuratIzinPreviewModal()" style="position:absolute; top:30px; right:40px; background:#fff; border:none; border-radius:50%; width:48px; height:48px; font-size:2em; font-weight:bold; color:#333; cursor:pointer; box-shadow:0 2px 12px #0003;">&times;</button>
    </div>
</div>
<script>
function showSuratIzinPreview(imgUrl) {
    document.getElementById('suratIzinPreviewImage').src = imgUrl;
    document.getElementById('suratIzinPreviewModal').style.display = 'flex';
}
function closeSuratIzinPreviewModal() {
    document.getElementById('suratIzinPreviewModal').style.display = 'none';
}
var suratIzinModal = document.getElementById('suratIzinPreviewModal');
if (suratIzinModal) {
    suratIzinModal.addEventListener('click', function(e) {
        if (e.target === this) closeSuratIzinPreviewModal();
    });
}
</script>

<?php echo $__env->make('backoffice.layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\PROYEK AKHIR\PA-Adigra\resources\views/backoffice/meet/index.blade.php ENDPATH**/ ?>