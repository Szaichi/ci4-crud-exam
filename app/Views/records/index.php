<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<style>
    .action-btn {
        background: #ffffff;
        color: #ff4da6;
        border: 2px solid #ff4da6;
        font-weight: 500;
        transition: all .25s ease;
    }

    .action-btn:hover {
        background: #ff4da6;
        color: #ffffff;
        transform: scale(1.05);
    }
</style>

<div class="card p-4 shadow">
    <h3 class="mb-3">Records</h3>

    <a href="/records/create" class="btn btn-primary mb-3">
        Create Record
    </a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($records as $r): ?>
                <tr>
                    <td><?= $r['title'] ?></td>
                    <td><?= $r['description'] ?></td>
                    <td><?= $r['status'] ?></td>
                    <td><?= $r['category'] ?></td>
                    <td>
                        <button class="btn action-btn btn-sm" data-bs-toggle="modal" data-bs-target="#viewModal<?= $r['id'] ?>">View</button>
                        <button class="btn action-btn btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $r['id'] ?>">Edit</button>
                        <a href="/records/delete/<?= $r['id'] ?>" onclick="return confirm('Are you sure?')" class="btn action-btn btn-sm">Delete</a>
                    </td>
                </tr>

                <!-- View Modal -->
                <div class="modal fade" id="viewModal<?= $r['id'] ?>" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Record Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <p><strong>Title:</strong> <?= $r['title'] ?></p>
                                <p><strong>Description:</strong> <?= $r['description'] ?></p>
                                <p><strong>Status:</strong> <?= $r['status'] ?></p>
                                <p><strong>Category:</strong> <?= $r['category'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Modal -->
                <div class="modal fade" id="editModal<?= $r['id'] ?>" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="/records/update/<?= $r['id'] ?>" method="post">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Record</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control mb-2" name="title" value="<?= $r['title'] ?>" required>

                                    <label class="form-label">Description</label>
                                    <textarea class="form-control mb-2" name="description" required><?= $r['description'] ?></textarea>

                                    <label class="form-label">Status</label>
                                    <input type="text" class="form-control mb-2" name="status" value="<?= $r['status'] ?>" required>

                                    <label class="form-label">Category</label>
                                    <input type="text" class="form-control mb-2" name="category" value="<?= $r['category'] ?>" required>
                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                    <button class="btn btn-primary w-100">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        <?= $pager->links() ?>
    </div>

</div>

<?= $this->endSection() ?>