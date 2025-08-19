<?php $__env->startSection('content'); ?>
    
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Task / Tugas</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Data Task / Tugas</li>
          </ol>
        </div>
      </div>
    </div>
</section>

<section class="content">

    <div class="row justify-content-center">
        <div class="col-md-12">

            <!-- Default box -->
            <div class="card card-outline card-primary">
                <div class="card-header">

                    <div class="row flex justify-content-between mt-2">
                        <form action="" class="form-inline">
                            <div class="pr-4" style="border-right: 3px solid #0d6efd">
                                <h3 class="card-title">
                                    <b>Task / Tugas</b>
                                </h3>
                            </div>

                            <div class="pl-4">

                            </div>
                            <div class="input-group input-group-sm">
                                <label for="">Cari: </label>
                                <select name="bulan" class="form-control ml-2" required
                                    oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Bulan harus dipilih')">
                                    <option value="">-- Pilih Bulan --</option>
                                    <option value="01" <?php if($bulan == '01'): ?> selected <?php endif; ?>>Januari</option>
                                    <option value="02" <?php if($bulan == '02'): ?> selected <?php endif; ?>>Februari</option>
                                    <option value="03" <?php if($bulan == '03'): ?> selected <?php endif; ?>>Maret</option>
                                    <option value="04" <?php if($bulan == '04'): ?> selected <?php endif; ?>>April</option>
                                    <option value="05" <?php if($bulan == '05'): ?> selected <?php endif; ?>>Mei</option>
                                    <option value="06" <?php if($bulan == '06'): ?> selected <?php endif; ?>>Juni</option>
                                    <option value="07" <?php if($bulan == '07'): ?> selected <?php endif; ?>>Juli</option>
                                    <option value="08" <?php if($bulan == '08'): ?> selected <?php endif; ?>>Agustus</option>
                                    <option value="09" <?php if($bulan == '09'): ?> selected <?php endif; ?>>September</option>
                                    <option value="10" <?php if($bulan == '10'): ?> selected <?php endif; ?>>Oktober</option>
                                    <option value="11" <?php if($bulan == '11'): ?> selected <?php endif; ?>>November</option>
                                    <option value="12" <?php if($bulan == '12'): ?> selected <?php endif; ?>>Desember</option>
                                </select>
                            </div>

                            <div class="input-group input-group-sm">
                                <select name="tahun" class="form-control ml-2" required
                                    oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Tahun harus dipilih')">
                                    <option value="">-- Pilih Tahun --</option>
                                    <?php for($i = 2024; $i <= date('Y'); $i++): ?>
                                        <option value="<?php echo e($i); ?>" <?php if($tahun == $i): ?> selected <?php endif; ?>><?php echo e($i); ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                            
                            <div class="input-group ml-2">
                                <button type="submit" class="btn btn-success btn-sm">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>

                            <?php if($bulan): ?>
                                <div class="input-group ml-2">
                                    <a href="/backoffice/task" class="btn btn-primary btn-sm">
                                        <i class="fas fa-sync-alt"></i>
                                    </a>
                                </div>
                            <?php endif; ?>

                        </form>
    
                        <div class="card-tools">
                            <?php if(auth()->user()->role_id != 1): ?>
                                <button title="Tambah" type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambah">
                                    <span class="fa fa-plus"></span> Tambah
                                </button>
                                <?php echo $__env->make('backoffice.task.modal.add', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                            <?php endif; ?>
    
                            <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse"
                                data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>

                </div>
                <div class="card-body">

                    <?php if(session('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" task="alert">
                        <strong>Berhasil </strong><?php echo e(session('success')); ?>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php endif; ?>

                    <?php if($bulan): ?>

                        <div class="callout callout-info">
                            <div class="d-flex justify-content-between">
                                <div class="search">
                                    <div class="text-center">
                                        <span class="fa fa-search"></span> Hasil Pencarian dari: <b>
                                            <?php if($bulan): ?>
                                                <?php if($bulan == '01'): ?>
                                                    Januari
                                                <?php elseif($bulan == '02'): ?>
                                                    Februari
                                                <?php elseif($bulan == '03'): ?>
                                                    Maret
                                                <?php elseif($bulan == '04'): ?>
                                                    April
                                                <?php elseif($bulan == '05'): ?>
                                                    Mei
                                                <?php elseif($bulan == '06'): ?>
                                                    Juni
                                                <?php elseif($bulan == '07'): ?>
                                                    Juli
                                                <?php elseif($bulan == '08'): ?>
                                                    Agustus
                                                <?php elseif($bulan == '09'): ?>
                                                    September
                                                <?php elseif($bulan == '10'): ?>
                                                    Oktober
                                                <?php elseif($bulan == '11'): ?>
                                                    November
                                                <?php elseif($bulan == '12'): ?>
                                                    Desember
                                                <?php endif; ?>
                                            <?php endif; ?>
                                            <?php if($tahun): ?>
                                                <?php echo e($tahun); ?>

                                            <?php endif; ?>
                                        </b>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                    <?php endif; ?>

                    <table class="table table-bordered table-hover text-center" id="example1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <?php if(auth()->user()->role_id == 1): ?>
                                    <th>Karyawan</th>
                                <?php endif; ?>
                                <th>Dibuat Tanggal</th>
                                <th>Task / Tugas</th>
                                <th>Berkas</th>
                                <?php if(auth()->user()->role_id == 2): ?>
                                    <th>Aksi</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <?php if(auth()->user()->role_id == 1): ?>
                                        <td>
                                            <button class="badge badge-light" data-toggle="modal" data-target="#detail-<?php echo e($task->user->id); ?>" title="Detail User">
                                                <i class="fa fa-eye"></i> <?php echo e($task->user->name); ?>

                                            </button>
                                        </td>
                                    <?php endif; ?>
                                    <td><?php echo e($task->created_at); ?></td>
                                    <td><?php echo e($task->task); ?></td>
                                    <td>
                                        <?php if($task->file): ?>
                                            <a href="/backoffice/task/<?php echo e($task->id); ?>/preview" class="badge badge-light" target="_blank">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <?php echo e($task->filename); ?> 
                                            <!-- | 
                                            <button class="badge badge-danger" data-toggle="modal" data-target="#delete-file-<?php echo e($task->id); ?>" title="Hapus">
                                                <i class="fa fa-trash"></i>
                                            </button> -->
                                        <?php else: ?>
                                            <span class="badge badge-light">Tidak ada berkas</span>
                                        <?php endif; ?>
                                    </td>
                                    <?php if(auth()->user()->role_id == 2): ?>
                                        <td>
                                            <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#edit-<?php echo e($task->id); ?>" title="Ubah">
                                                <i class="fa fa-edit"></i> Ubah
                                            </button>
                                            <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-<?php echo e($task->id); ?>" title="Hapus">
                                                <i class="fa fa-trash"></i> Hapus
                                            </button>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                    </table>

                    
                    <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(auth()->user()->role_id == 1): ?>
                            <?php echo $__env->make('backoffice.task.modal.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        <?php endif; ?>
                        <?php echo $__env->make('backoffice.task.modal.edit', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        <?php echo $__env->make('backoffice.task.modal.delete', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>

            </div>

        </div>
    </div>

</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backoffice.layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\PROYEK AKHIR\PA-Adigra\resources\views/backoffice/task/index.blade.php ENDPATH**/ ?>