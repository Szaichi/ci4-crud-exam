<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<?php if (session()->getFlashdata('errors')): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<div class="card p-4 shadow">
    <h3>Edit Record</h3>

    <form method="post" action="/records/update/<?= $record['id'] ?>">
        <?= csrf_field() ?>

        <label class="form-label">Title</label>
        <input class="form-control mb-3" name="title" value="<?= $record['title'] ?>">

        <label class="form-label">Description</label>
        <textarea class="form-control mb-3" name="description"><?= $record['description'] ?></textarea>

        <label class="form-label">Status</label>
        <input class="form-control mb-3" name="status" value="<?= $record['status'] ?>">

        <label class="form-label">Category</label>
        <input class="form-control mb-3" name="category" value="<?= $record['category'] ?>">

        <button class="btn btn-primary">Update</button>
    </form>
</div>

<?= $this->endSection() ?>