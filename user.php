<?= $this->extend('admin/layout'); ?>

<?= $this->section('main-content'); ?>

<div class="page page-center">
    <div class="container-tight py-4">
        <div class="empty">
            <div class="empty-img"><img src="./static/illustrations/undraw_quitting_time_dm8t.svg" height="128" alt="">
            </div>
            <p class="empty-title">"Daftar User" for maintenance</p>
            <p class="empty-subtitle text-secondary">
                Sorry for the inconvenience but we’re performing some maintenance at the moment. We’ll be back online shortly!
            </p>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
