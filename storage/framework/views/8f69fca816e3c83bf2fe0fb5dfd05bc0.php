<?php $__env->startSection('content'); ?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Absensi hari ini</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active">Absensi hari ini</li>
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
          <div class="row flex justify-content-between mt-2">
            <form action="/backoffice/dashboard" class="form-inline">
              <div class="pr-4" style="border-right: 3px solid #0d6efd">
                <h3 class="card-title">
                  <b>Absensi</b>
                </h3>
              </div>

              <div class="pl-4">

              </div>
              <div class="input-group input-group-sm">
                <label for="">Kategori: </label>
                <select name="category" class="form-control ml-2">
                  <option value="">Hadir</option>
                  <option value="cuti" <?php echo e($category=='cuti' ? 'selected' : ''); ?>>Cuti</option>
                  <option value="izin" <?php echo e($category=='izin' ? 'selected' : ''); ?>>Izin</option>
                  <option value="sakit" <?php echo e($category=='sakit' ? 'selected' : ''); ?>>Sakit</option>
                  <option value="belum-hadir" <?php echo e($category=='belum-hadir' ? 'selected' : ''); ?>>Belum Hadir</option>
                </select>
              </div>
              <div class="input-group ml-2">
                <button type="submit" class="btn btn-success btn-sm">
                  <i class="fas fa-search"></i>
                </button>
              </div>

              <?php if($category): ?>
              <div class="input-group ml-2">
                <a href="/backoffice/dashboard" class="btn btn-primary btn-sm">
                  <i class="fas fa-sync-alt"></i>
                </a>
              </div>
              <?php endif; ?>

            </form>
            
            <div class="card-tools">
              <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>

        </div>
        <div class="card-body">

          <?php if(session('success')): ?>
          <div class="alert alert-success alert-dismissible fade show" absen="alert">
            <strong>Berhasil </strong><?php echo e(session('success')); ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php endif; ?>

          <div class="row">
            <div class="col-md-3">
              <div class="card bg-success">
                <div class="card-body">
                  <h3>Hadir: <b><?php echo e($countAbsenToday); ?></b> </h3>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card bg-danger">
                <div class="card-body">
                  <h3>Belum Hadir: <b><?php echo e($countUserNoAbsen); ?></b> </h3>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class="card bg-primary">
                <div class="card-body">
                  <h3>Cuti: <b><?php echo e($countCutiToday); ?></b></h3>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class="card bg-primary">
                <div class="card-body">
                  <h3>Izin: <b><?php echo e($countIzinToday); ?></b></h3>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class="card bg-primary">
                <div class="card-body">
                  <h3>Sakit: <b><?php echo e($countSakitToday); ?></b></h3>
                </div>
              </div>
            </div>
          </div>

          <hr>

          <div class="row">
            <div class="col-md-12">
              <div class="d-flex justify-content-around">
                <div>
                  <?php if($category): ?>
                    <div class="search">
                      <div class="text-center">
                        <h3>---
                          <span class="fa fa-search"></span> Kategori Absen:
                          <?php if($category == 'cuti'): ?>
                          <b>Cuti</b>
                          <?php elseif($category == 'izin'): ?>
                          <b>Izin</b>
                          <?php elseif($category == 'sakit'): ?>
                          <b>Sakit</b>
                          <?php elseif($category == 'belum-hadir'): ?>
                          <b>Belum Hadir</b>
                          <?php endif; ?>
                        ---</h3>
                      </div>
                    </div>
                  <?php elseif($category == null): ?>
                    <div class="search">
                      <div class="text-center">
                        <h3>---
                          <span class="fa fa-search"></span> Kategori Absen: <b>Hadir</b>
                        ---</h3>
                      </div>
                    </div>
                  <?php endif; ?>
                </div>
                <div>
                  <h2>--
                    <span class="fa fa-calendar-alt"></span> <?php echo e(\Carbon\Carbon::parse(now())->locale('id')->isoFormat('dddd, D MMMM YYYY')); ?> 
                  --</h2>
                </div>
              </div>
            </div>
          </div>

          <hr>

          <table class="table table-bordered table-hover text-center" id="example1">
            <thead>
              <tr>
                <th>#</th>
                <th>Karyawan</th>
                <?php if($category != 'belum-hadir'): ?>
                  <?php if($category == null): ?>
                    <th>Jam Masuk</th>
                    <th>Jam Pulang</th>
                    <th>Jam Kerja</th>
                    <th>Status Jam Kerja</th>
                  <?php endif; ?>
                  <th>Kantor</th>
                <?php endif; ?>
                  <th>Status</th>
                  <th>Keterangan</th>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $absens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $absen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($key+1); ?></td>
                <?php if($category == 'belum-hadir'): ?>
                  <td>
                    <button class="badge badge-light" data-toggle="modal" data-target="#detail-<?php echo e($absen->id); ?>"
                      title="Detail User">
                      <i class="fa fa-eye"></i> <?php echo e($absen->name); ?>

                    </button>
                  </td>
                <?php else: ?>
                  <td>
                    <?php if($absen->user_id == null): ?>
                      <h5>
                        <span class="badge badge-danger">Karyawan resign</span>
                      </h5>
                    <?php else: ?>
                      <button class="badge badge-light" data-toggle="modal" data-target="#detail-<?php echo e($absen->user->id); ?>"
                        title="Detail User">
                        <i class="fa fa-eye"></i> <?php echo e($absen->user->name); ?>

                      </button>
                    <?php endif; ?>
                  </td>
                  <?php if($category == null): ?>
                    <td><?php echo e($absen->start ? \Carbon\Carbon::parse($absen->start)->format('H:i') : '-'); ?></td>
                    <td><?php echo e($absen->end ? \Carbon\Carbon::parse($absen->end)->format('H:i') : '-'); ?></td>
                    <td>
                      <?php if($absen->start && $absen->end): ?>
                        <?php
                          $start = \Carbon\Carbon::parse($absen->start);
                          $end = \Carbon\Carbon::parse($absen->end);
                          $workMinutes = $end->diffInMinutes($start);
                          $workHours = floor($workMinutes / 60);
                          $workMinutesRemaining = $workMinutes % 60;
                        ?>
                        <?php if($workHours > 0): ?>
                          <?php echo e($workHours); ?> jam <?php echo e($workMinutesRemaining); ?> menit
                        <?php else: ?>
                          <?php echo e($workMinutesRemaining); ?> menit
                        <?php endif; ?>
                      <?php elseif($absen->start && !$absen->end): ?>
                        <?php
                          $start = \Carbon\Carbon::parse($absen->start);
                          $current = \Carbon\Carbon::now();
                          $workMinutes = $current->diffInMinutes($start);
                          $workHours = floor($workMinutes / 60);
                          $workMinutesRemaining = $workMinutes % 60;
                        ?>
                        <?php if($workHours > 0): ?>
                          <?php echo e($workHours); ?> jam <?php echo e($workMinutesRemaining); ?> menit
                        <?php else: ?>
                          <?php echo e($workMinutesRemaining); ?> menit
                        <?php endif; ?>
                        <br><small class="text-info">(Sedang bekerja)</small>
                      <?php else: ?>
                        -
                      <?php endif; ?>
                    </td>
                    <td>
                      <?php if($absen->start && $absen->end): ?>
                        <?php
                          $start = \Carbon\Carbon::parse($absen->start);
                          $end = \Carbon\Carbon::parse($absen->end);
                          $workMinutes = $end->diffInMinutes($start);
                          $requiredMinutes = $absen->user ? ($absen->user->minimum_work_hours * 60) : 300;
                        ?>
                        <?php if($workMinutes >= $requiredMinutes): ?>
                          <span class="badge badge-success">✅ Minimal terpenuhi</span>
                        <?php else: ?>
                          <span class="badge badge-warning">⚠️ Belum memenuhi minimal</span>
                        <?php endif; ?>
                      <?php elseif($absen->start && !$absen->end): ?>
                        <?php
                          $start = \Carbon\Carbon::parse($absen->start);
                          $current = \Carbon\Carbon::now();
                          $workMinutes = $current->diffInMinutes($start);
                          $requiredMinutes = $absen->user ? ($absen->user->minimum_work_hours * 60) : 300;
                          $remainingMinutes = $requiredMinutes - $workMinutes;
                        ?>
                        <?php if($remainingMinutes > 0): ?>
                          <span class="badge badge-warning">⏰ Belum cukup</span>
                        <?php else: ?>
                          <span class="badge badge-success">✅ Minimal terpenuhi</span>
                        <?php endif; ?>
                      <?php else: ?>
                        <span class="badge badge-secondary">-</span>
                      <?php endif; ?>
                    </td>
                  <?php endif; ?>
                  <td><?php echo e($absen->office->name); ?></td>
                <?php endif; ?>
                <td><?php echo e($absen->status); ?></td>
                <td><?php echo e($absen->description); ?></td>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>

          
          <?php $__currentLoopData = $absens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $absen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($absen->user_id != null): ?>
              <?php if($category == 'belum-hadir'): ?>
                <?php echo $__env->make('backoffice.dashboard.modal.user-no-absen', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
              <?php else: ?>
                <?php echo $__env->make('backoffice.dashboard.modal.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
              <?php endif; ?>
            <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>

      </div>

    </div>
  </div>

</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backoffice.layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\PROYEK AKHIR\PA-Adigra\resources\views/backoffice/dashboard/index.blade.php ENDPATH**/ ?>