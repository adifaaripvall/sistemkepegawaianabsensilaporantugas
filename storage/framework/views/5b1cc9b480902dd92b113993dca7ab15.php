<?php $__env->startSection('content'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Jatah Cuti Karyawan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Jatah Cuti</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-outline card-primary mb-4">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title mb-0">Filter & Tambah/Update Jatah Cuti Tahunan</h3>
                </div>
                <div class="card-body">
                    <form action="" class="form-inline mb-3">
                        <div class="form-group mr-2">
                            <label for="year" class="mr-2">Tahun</label>
                            <select name="year" class="form-control" required>
                                <option value="">-- Pilih Tahun --</option>
                                <?php for($i = 2020; $i <= date('Y') + 2; $i++): ?>
                                    <option value="<?php echo e($i); ?>" <?php if($year == $i): ?> selected <?php endif; ?>>
                                        <?php echo e($i); ?>

                                    </option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success mr-2">
                            <i class="fas fa-search"></i> Filter
                        </button>
                        <?php if($year): ?>
                            <a href="/backoffice/leave-quota" class="btn btn-primary">
                                <i class="fas fa-sync-alt"></i> Reset
                            </a>
                        <?php endif; ?>
                    </form>
                    <hr>
                    <form method="post" action="<?php echo e(route('leave-quota.store')); ?>" class="row align-items-end">
                        <?php echo csrf_field(); ?>
                        <div class="form-group col-md-4 mb-2">
                            <label for="user_id">Karyawan</label>
                            <select class="form-control" id="user_id" name="user_id" required>
                                <option value="">-- Pilih Karyawan --</option>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['user_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class="text-danger"><?php echo e($message); ?></small>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group col-md-3 mb-2">
                            <label for="year">Tahun</label>
                            <select class="form-control" id="year" name="year" required>
                                <?php for($i = 2020; $i <= date('Y') + 2; $i++): ?>
                                    <option value="<?php echo e($i); ?>" <?php if($year == $i): ?> selected <?php endif; ?>>
                                        <?php echo e($i); ?>

                                    </option>
                                <?php endfor; ?>
                            </select>
                            <?php $__errorArgs = ['year'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class="text-danger"><?php echo e($message); ?></small>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group col-md-3 mb-2">
                            <label for="quota">Jatah Cuti (Hari)</label>
                            <input type="number" class="form-control" id="quota" name="quota" min="0" max="365" value="30" required>
                            <?php $__errorArgs = ['quota'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class="text-danger"><?php echo e($message); ?></small>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group col-md-2 mb-2">
                            <button type="submit" class="btn btn-success w-100"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                    </form>
                </div>
            </div>

            <?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil!</strong> <?php echo e(session('success')); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>

            <div class="card card-outline card-info">
                <div class="card-header bg-info text-white">
                    <h3 class="card-title mb-0">Daftar Jatah Cuti Karyawan Tahun <?php echo e($year ?? date('Y')); ?></h3>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-center mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th style="width: 40px;">#</th>
                                    <th>Nama Karyawan</th>
                                    <th>Tahun</th>
                                    <th>Jatah Cuti</th>
                                    <th>Sudah Diambil</th>
                                    <th>Sisa</th>
                                    <th style="width: 180px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $leaveQuotas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($key+1); ?></td>
                                    <td class="text-left"><?php echo e($item->user->name ?? '-'); ?></td>
                                    <td><?php echo e($item->year); ?></td>
                                    <td class="text-center"><?php echo e($item->quota); ?></td>
                                    <td class="text-center"><?php echo e($item->used); ?></td>
                                    <td class="text-center">
                                        <?php $sisa = $item->quota - $item->used; ?>
                                        <span class="badge <?php echo e($sisa <= 0 ? 'badge-danger' : 'badge-success'); ?>" style="font-size:1em;"><?php echo e($sisa); ?></span>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-row flex-nowrap align-items-center justify-content-center" style="gap: 0.5rem;">
                                            <form method="post" action="<?php echo e(route('leave-quota.update', $item->id)); ?>" class="d-flex flex-row flex-nowrap align-items-center" style="gap: 0.25rem;">
                                                <?php echo csrf_field(); ?>
                                                <div class="input-group input-group-sm" style="width: 130px;">
                                                    <input type="number" name="quota" value="<?php echo e($item->quota); ?>" min="0" max="365" class="form-control text-center" style="width:55px;" title="Edit jatah cuti">
                                                    <input type="number" name="used" value="<?php echo e($item->used); ?>" min="0" class="form-control text-center" style="width:55px;" title="Edit cuti terpakai">
                                                    <div class="input-group-append">
                                                        <button type="submit" class="btn btn-primary" title="Update data"><i class="fa fa-save"></i></button>
                                                    </div>
                                                </div>
                                            </form>
                                            <a href="<?php echo e(route('leave-quota.delete', $item->id)); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus data?')" title="Hapus data"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="7" class="text-center">Tidak ada data</td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('backoffice.layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\PROYEK AKHIR\PA-Adigra\resources\views/backoffice/leave-quota/index.blade.php ENDPATH**/ ?>