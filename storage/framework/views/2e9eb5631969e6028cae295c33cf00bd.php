<?php $__env->startSection('content'); ?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Kantor</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Data Kantor</li>
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
                    <h3 class="card-title">Kantor</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                            data-target="#edit-<?php echo e($office->id); ?>" title="Ubah">
                            <span><i class="fa fa-edit"></i></span>
                        </button>

                    </div>
                </div>
                <div class="card-body">

                    <?php if(session('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" office="alert">
                        <strong class="ml-2 mr-2">Berhasil </strong> | <?php echo e(session('success')); ?>

                        <button type="button" class="close" data-dismiss="alert"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php endif; ?>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="card card-outline card-primary">
                                <div class="card-body">
                                    <div class="text-center">
                                        <?php if($office->image): ?>
                                        <img src="<?php echo e(asset('storage/' . $office->image)); ?>" class="card-img-top"
                                            style="width: 80%; height: 300px" alt="...">
                                        <?php else: ?>
                                        <img src="<?php echo e(asset('images/office-default.jpg')); ?>" class="card-img-top"
                                            style="width: 80%; height: 300px" alt="...">
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="card card-outline card-primary">
                                <div class="card-body">
                                    <div class="text-center">
                                        <div id="map" style="height: 300px"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-outline card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Detail Kantor</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p><b>Nama Kantor</b></p>
                                            <p><?php echo e($office->name); ?></p>
                                            <p><b>Alamat Kantor</b></p>
                                            <p><?php echo e($office->address); ?></p>
                                            <p><b>Koordinat Kantor</b></p>
                                            <p><?php echo e($office->latitude); ?>, <?php echo e($office->longitude); ?></p>
                                            <p><b>Radius (meter)</b></p>
                                            <p><?php echo e($office->radius); ?> meter</p>
                                            <p><b>Jam Kerja</b></p>
                                            <p>Fleksibel (minimal 5 jam per karyawan)</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php echo $__env->make('backoffice.office.modal.edit', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                </div>

            </div>
        </div>
    </div>

</section>

<script>
    const map = L.map('map').setView([<?php echo e($office->latitude); ?>, <?php echo e($office->longitude); ?>], 13);
    
        const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        // start marker
        var marker = L.marker([<?php echo e($office->latitude); ?>, <?php echo e($office->longitude); ?>])
                        .bindPopup('<?php echo e($office->name); ?>')
                        .addTo(map);
        // end marker

        // start circle
        var circle = L.circle([<?php echo e($office->latitude); ?>, <?php echo e($office->longitude); ?>], {
            color: 'red',
            fillColor: '#f03',
            fillOpacity: 0.5,
            radius: <?php echo e($office->radius * 2); ?>

        }).addTo(map).bindPopup('Radius Kantor: <?php echo e($office->radius); ?> meter');
        // end circle
    
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backoffice.layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\PROYEK AKHIR\PA-Adigra\resources\views/backoffice/office/index.blade.php ENDPATH**/ ?>