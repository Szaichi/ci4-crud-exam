<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="card p-4 shadow-sm">

<h3 class="mb-4">Student Profile</h3>

<?php if(session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
</div>
<?php endif; ?>

<?php if (!empty($user['profile_image'])): ?>

    <img 
        src="<?= base_url('uploads/profiles/' . esc($user['profile_image'])) ?>" 
        width="150"
        height="150"
        style="object-fit:cover;"
        class="mb-3 border"
    >

<?php else: ?>

    <div 
        style="
            width:150px;
            height:150px;
            background:#f2f2f2;
            display:flex;
            align-items:center;
            justify-content:center;
            margin-bottom:15px;
            border:1px solid #ddd;
        ">
        No Image
    </div>

<?php endif; ?>

<p><b>Name:</b> <?= esc($user['name'] ?? '') ?></p>
<p><b>Email:</b> <?= esc($user['email'] ?? '') ?></p>
<p><b>Student ID:</b> <?= esc($user['student_id'] ?? '') ?></p>
<p><b>Course:</b> <?= esc($user['course'] ?? '') ?></p>
<p><b>Year Level:</b> <?= esc($user['year_level'] ?? '') ?></p>
<p><b>Section:</b> <?= esc($user['section'] ?? '') ?></p>
<p><b>Phone:</b> <?= esc($user['phone'] ?? '') ?></p>
<p><b>Address:</b> <?= esc($user['address'] ?? '') ?></p>

<hr>

<?php if(!empty($user['created_at'])): ?>
    <p>
        <b>Account Created:</b> 
        <?= date('F d, Y', strtotime($user['created_at'])) ?>
    </p>
<?php endif; ?>

<?php if(!empty($user['updated_at'])): ?>
    <p>
        <b>Last Updated:</b> 
        <?= date('F d, Y', strtotime($user['updated_at'])) ?>
    </p>
<?php endif; ?>


<a href="/profile/edit" class="btn btn-primary mt-3">
    Edit Profile
</a>

</div>

<?= $this->endSection() ?>
