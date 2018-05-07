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
?>

    <!-- Page Header -->
    <header  class="masthead" style="background-image: url('img/home-bg.jpg') ; margin-top: -80px">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>Clean Blog</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <?php if (getArticles()): ?>
                    <?php foreach (getArticles() as $article): ?>
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
                <div class="clearfix">
                    <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
                </div>
            </div>
        </div>
    </div>

<?php require_once 'footer.php' ?>