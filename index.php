<?php require_once 'header.php' ?>
<?php

if (!isset ($_SESSION['access']) && !$_SESSION['access']) {
    header('Location: /access_denied.php');
    exit;
}
if (isset($_GET['exit']) == 1) {
    session_destroy();
    header('Location:signIn.php');
    exit;
}
if (isset($_GET['send']) == 1) {
    $_SESSION['error_message'] = "Ваше сообщение отправлено на обработку администратору";

} ?>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/home-bg.jpg') ; margin-top: -80px">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>Clean Blog</h1>
                        <h3>Приветствуем Вас , <?= $_SESSION['name'] ?? $_SESSION['login'] ?>!</h3>
                        <br><br>
                        <?php if (getErrorMessage()): ?>
                            <div class="container-fluid ">
                                <h4><?php echo getErrorMessage(); ?></h4>
                            </div>
                        <?php endif;
                        $_SESSION['error_message'] = false; ?>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 mx-auto">
                <div id="dataTable_filter" class="dataTables_filter">
                    <div class="row">
                        <div class="col-lg-8 col-md-10 mx-auto">
                            <form method="get" action="searchOfArticles.php">
                                <label class="container-fluid form-control">
                                    Поиск статьи по вашему запросу:
                                    <input class="form-control form-control-sm" type="text" name="search">
                                </label>
                        </div>
                        <div class="col-lg-4 col-md-2 mx-auto">
                            <button style="float: right" class="btn btn-info">Поиск</button>
                        </div>
                        </form>


                    </div>

                </div>
            </div>

            <div class="col-lg-8 col-md-12 mx-auto">
                <?php
                if (isset ($_SESSION['role']) && $_SESSION['role'] === 1) {
                    $articlesFunction = getArticles();
                } else {
                    $articlesFunction = getArticlesRole($_SESSION['role']);
                } ?>
                <?php if ($articlesFunction): ?>
                    <?php foreach ($articlesFunction as $article): ?>
                        <?php $author = getAuthor($article['author']); ?>
                        <div class="post-preview">
                            <a href="post.php?url=<?= $article['url']; ?>">
                                <h2 class="post-title">
                                    <?= $article['title']; ?>
                                </h2>
                                <h3 class="post-subtitle">
                                    <?= $article['sub_title']; ?>
                                </h3>
                            </a>
                            <p class="post-meta">Posted by
                                <a href="#"><?= $author['login']; ?></a>
                                <?php $date = DateTime::createFromFormat('Y-m-d H:i:s', $article['created_at']); ?>
                                on <?= $date->format('F d, Y'); ?></p>
                        </div>
                        <hr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Articles not found!</p>
                <?php endif; ?>

                <!-- Pager -->
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <a class="btn btn-primary" href="add.php">Add article &rarr;</a>
                        </div>
                        <div class="col-md-6">
                            <a class="btn btn-primary" href="#">Older Posts &rarr;</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require_once 'footer.php' ?>