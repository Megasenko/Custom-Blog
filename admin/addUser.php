<?php require_once 'header.php'; ?>
<?php
if (!isset ($_SESSION['role']) && $_SESSION['role'] !== 1) {
    header('Location:/');
} ?>
<?php
if (isset($_POST)) {
    registerUser($_POST);
} ?>

    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/admin/main.php">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Add new</li>
            </ol>
            <div class="row">
                <div class="col-12">
                    <?php if (getErrorMessage()): ?>
                        <div style="margin-top: 30px" class="text-danger">
                            <?php echo getErrorMessage(); ?>
                        </div>
                    <?php endif; ?>

                    <form method="post" action="">
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label class="container">
                                        Username*:
                                        <br>
                                        <input size="50px" type="text" name="name" value="" class="form-control"
                                               autofocus required>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="container">
                                        Last name:
                                        <br>
                                        <input size="50px" type="text" name="last_name" value="" class="form-control">
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label class="container">
                                        Login*:
                                        <br>
                                        <input size="50px" type="text" name="login" value="" class="form-control"
                                               autofocus required>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="container">
                                        Email*:
                                        <br>
                                        <input size="50px" type="email" name="email" value="" class="form-control"
                                               autofocus required>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label class="container">
                                        Password*:
                                        <br>
                                        <input size="50px" type="password" name="password" class="form-control"
                                               autofocus required>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="container">
                                        Password Confirm*:
                                        <br>
                                        <input size="50px" type="password" name="passwordConfirm" class="form-control"
                                               autofocus required>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <button style="margin: 15px" type="submit" name="add" class="btn btn-success">Добавить запись
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid-->

<?php require_once 'footer.php'; ?>