<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CI4 CRUD Exam</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #ffe6f2;
        }

        .center {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .navbar {
            background: #ff66b2;
        }

        .btn-primary {
            background: #ff4da6;
            border: none;
        }

        .btn-primary:hover {
            background: #ff1a8c;
        }

        .card {
            border-radius: 20px;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 230px;
            background: #ff4da6;
            color: white;
            padding: 30px 20px;
        }

        .sidebar h4 {
            font-weight: bold;
            margin-bottom: 40px;
        }

        .sidebar a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 12px 0;
            font-weight: 500;
        }

        .sidebar a:hover {
            opacity: 0.8;
        }

        .content {
            flex: 1;
            background: #fff5f9;
            padding: 40px;
        }
    </style>

</head>

<body>

<?php $segment = service('uri')->getSegment(1); ?>

<?php if ($segment != 'login' && $segment != 'register'): ?>

<div class="layout">

    <div class="sidebar">
        <h4>Dashboard</h4>
        <a href="/dashboard">Home</a>
        <a href="/records/create">Create Record</a>
        <a href="/records">Manage Records</a>
        <a href="/logout">Logout</a>
    </div>

    <div class="content">
        <?= $this->renderSection('content') ?>
    </div>

</div>

<?php else: ?>

<div class="center">
    <?= $this->renderSection('content') ?>
</div>

<?php endif; ?>

</body>
</html>