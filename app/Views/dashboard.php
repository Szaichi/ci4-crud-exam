<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="mb-4">
        <h3 class="fw-bold mb-1">Welcome, <?= session()->get('name') ?></h3>
        <p class="text-muted">Use the options below to manage your records.</p>
    </div>

    <div class="row g-4 mb-5">
        <div class="col-md-6">
            <div class="card shadow-sm border-0 p-4 h-100">
                <h5 class="fw-bold">Create Record</h5>
                <p class="text-muted mb-3">Add a new entry to the system.</p>
                <a href="/records/create" class="btn btn-primary">Create Record</a>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm border-0 p-4 h-100">
                <h5 class="fw-bold">Manage Records</h5>
                <p class="text-muted mb-3">View, edit, or delete existing records.</p>
                <a href="/records" class="btn btn-primary">Open Records</a>
            </div>
        </div>
    </div>

    <div class="card shadow-sm border-0 p-4">
        <h5 class="fw-bold mb-3">Recent Records</h5>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Category</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($records)): ?>
                    <?php foreach ($records as $row): ?>
                        <tr>
                            <td><?= $row['title'] ?></td>
                            <td><?= $row['description'] ?></td>
                            <td><?= $row['status'] ?></td>
                            <td><?= $row['category'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center text-muted">No records available</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>