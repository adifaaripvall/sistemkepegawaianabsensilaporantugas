<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pengajuan Izin/Sakit</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f8f9fa; color: #222; }
        .container { background: #fff; max-width: 600px; margin: 30px auto; border-radius: 8px; box-shadow: 0 2px 8px #0001; padding: 32px; }
        h2 { color: #0d6efd; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 24px; }
        th, td { text-align: left; padding: 8px 0; }
        th { width: 160px; color: #555; }
        .info { background: #e9ecef; border-radius: 6px; padding: 12px 16px; margin-bottom: 18px; }
        .footer { color: #888; font-size: 0.95em; margin-top: 32px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Pengajuan Izin/Sakit Baru</h2>
        <div class="info">
            <table>
                <tr><th>Mulai</th><td><?php echo e($submission->start_date); ?></td></tr>
                <tr><th>Selesai</th><td><?php echo e($submission->end_date); ?></td></tr>
                <tr><th>Tipe</th><td><?php echo e(ucfirst($submission->type)); ?></td></tr>
                <tr><th>Alasan</th><td><?php echo e($submission->description); ?></td></tr>
                <?php if(isset($sender)): ?>
                <tr><th>Pengaju</th><td><?php echo e($sender->name); ?> (<?php echo e($sender->email); ?>)</td></tr>
                <?php endif; ?>
            </table>
        </div>
        <p>Ada pengajuan izin/sakit baru yang perlu ditinjau/ditindaklanjuti.</p>
        <div class="footer">
            Terima kasih,<br>
            <?php echo e(config('app.name')); ?><br>
            <small>Email ini dikirim otomatis oleh sistem.</small>
        </div>
    </div>
</body>
</html> <?php /**PATH D:\PROYEK AKHIR\PA-Adigra\resources\views/mail/sick_leave_submission.blade.php ENDPATH**/ ?>