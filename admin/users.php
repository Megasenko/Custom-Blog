<?php require_once 'header.php' ?>
<?php
if (!isset ($_SESSION['role']) && $_SESSION['role'] !== 1) {
    header('Location:/');
} ?>
    <div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin/main.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Users</li>
        </ol>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin/addUser.php">Add new</a>
            </li>
        </ol>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Users list
                <span style="margin-left: 30px">Number of users : <?= count(getUsers())-1;?> </span>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Last Name</th>
                            <th>Login</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Last Name</th>
                            <th>Login</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        <?php $users = getUsers(); ?>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?= $user['id'] ?></td>
                                <td><?= $user['name'] ?></td>
                                <td><?= $user['last_name'] ?></td>
                                <td><?= $user['login'] ?></td>
                                <td><?= $user['email'] ?></td>
                                <td>
                                    <a href="javascript:void(0)">Edit</a><br>
                                    <a href="/admin/delUser.php?action=del&id=<?= $user['id'] ?>">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <!-- /.container-fluid-->

<?php require_once 'footer.php' ?>