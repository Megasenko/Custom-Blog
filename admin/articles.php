<?php require_once 'header.php' ?>
<?php require_once '../adminAccess.php';?>
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/admin/main.php">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Articles</li>
            </ol>

            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/admin/addArticle.php">Add new</a>
                </li>
            </ol>
            <!-- Example DataTables Card-->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-table"></i> Articles list
                    <span style="margin-left: 30px">Number of articles : <?= count(getArticles())?> </span>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Sub title</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Title</th>
                                <th>Sub title</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php $articles = getArticles(); ?>
                            <?php foreach ($articles as $article): ?>
                            <tr>
                                <td><?= $article['title'] ?></td>
                                <td><?= substr($article['sub_title'], 0, 25); ?></td>
                                <td><?= $article['created_at'] ?></td>
                                <td>
                                    <a href="/admin/updateArticle.php?action=update&url=<?= $article['url'] ?>">Edit</a><br>

                                    <a href="/admin/delArticle.php?action=del&url=<?= $article['url'] ?>">Delete</a>

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