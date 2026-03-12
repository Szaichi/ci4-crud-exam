<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="card p-4 shadow-sm">

<h3 class="mb-4">Edit Profile</h3>

<?php if(session()->getFlashdata('errors')): ?>
    <div class="alert alert-danger">
        <?php foreach(session()->getFlashdata('errors') as $error): ?>
            <div><?= esc($error) ?></div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<form action="/profile/update" method="post" enctype="multipart/form-data">

    <?= csrf_field() ?>

    <div style="position:relative; width:150px;">

        <?php if(!empty($user['profile_image'])): ?>

            <img
                id="preview"
                src="<?= base_url('uploads/profiles/'.$user['profile_image']) ?>"
                width="150"
                height="150"
                style="object-fit:cover;"
                class="border mb-3"
            >

        <?php else: ?>

            <img
                id="preview"
                src=""
                width="150"
                height="150"
                style="object-fit:cover; display:none;"
                class="border mb-3"
            >

        <?php endif; ?>

        <button
            id="removeBtn"
            type="button"
            onclick="removeImage()"
            style="
                position:absolute;
                top:5px;
                right:5px;
                background:red;
                color:white;
                border:none;
                width:25px;
                height:25px;
                border-radius:50%;
                cursor:pointer;
                font-weight:bold;
                display: <?= !empty($user['profile_image']) ? 'block' : 'none' ?>;
            ">
            ×
        </button>

    </div>

    <input type="hidden" name="remove_image" id="removeImageInput" value="0">

    <input
        type="file"
        id="fileInput"
        name="profile_image"
        class="form-control mb-3"
        accept="image/*"
        onchange="previewImage(event)"
    >


    <input name="name" class="form-control mb-2"
    value="<?= old('name', $user['name'] ?? '') ?>"
    placeholder="Name">

    <input name="email" class="form-control mb-2"
    value="<?= old('email', $user['email'] ?? '') ?>"
    placeholder="Email">

    <input name="student_id" class="form-control mb-2"
    value="<?= old('student_id', $user['student_id'] ?? '') ?>"
    placeholder="Student ID">

    <input name="course" class="form-control mb-2"
    value="<?= old('course', $user['course'] ?? '') ?>"
    placeholder="Course">

    <input name="year_level" class="form-control mb-2"
    value="<?= old('year_level', $user['year_level'] ?? '') ?>"
    placeholder="Year Level">

    <input name="section" class="form-control mb-2"
    value="<?= old('section', $user['section'] ?? '') ?>"
    placeholder="Section">

    <input name="phone" class="form-control mb-2"
    value="<?= old('phone', $user['phone'] ?? '') ?>"
    placeholder="Phone">

    <textarea name="address" class="form-control mb-3"
    placeholder="Address"><?= old('address', $user['address'] ?? '') ?></textarea>

    <button class="btn btn-primary">Update Profile</button>

</form>

</div>

<script>

function previewImage(event){

    const file = event.target.files[0];

    if(!file) return;

    const allowedTypes = [
        "image/jpeg",
        "image/jpg",
        "image/png",
        "image/webp"
    ];

    if(!allowedTypes.includes(file.type)){

        alert("Only JPG, JPEG, PNG, and WEBP images are allowed.");

        event.target.value = "";

        return;
    }

    const reader = new FileReader();

    reader.onload = function(){

        const preview = document.getElementById('preview');
        const removeBtn = document.getElementById('removeBtn');

        preview.src = reader.result;
        preview.style.display = "block";

        removeBtn.style.display = "block";

        document.getElementById('removeImageInput').value = 0;

    }

    reader.readAsDataURL(file);

}


function removeImage(){

    const preview = document.getElementById('preview');
    const removeBtn = document.getElementById('removeBtn');
    const fileInput = document.getElementById('fileInput');

    preview.src = "";
    preview.style.display = "none";

    removeBtn.style.display = "none";

    fileInput.value = "";

    document.getElementById('removeImageInput').value = 1;

}

</script>

<?= $this->endSection() ?>
