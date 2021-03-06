<?php require_once 'header.php' ?>
<?php
if (!isset ($_SESSION['access']) && ($_SESSION['role'] !== 1 || $_SESSION['role'] !== 3)) {
    header('Location: /access_denied.php');
    exit;
}
?>
<!-- Page Header -->
<header class="masthead" style="background-image: url('img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">



                <?php if (getArticle($_GET)):?>
                    <?php foreach (getArticle($_GET) as $article): ?>
                        <?php $author = getAuthor($article['author']); ?>
                        <div class="post-heading">
                            <h1><?= $article['title']; ?></h1>
                            <h2 class="subheading"><?= $article['sub_title']; ?></h2>
                            <span class="meta">Posted by
                            <a href="#"><?= $author['login']; ?></a>
                                <?php $date = DateTime::createFromFormat('Y-m-d H:i:s', $article['created_at']); ?>
                                on <?= $date->format('F d, Y'); ?></span>
                        </div>
                        <hr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Article not found!</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>


<!-- Post Content -->
<article>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <?= $article['content']; ?>
            </div>
        </div>
    </div>
</article>

<a style="margin-left:100px" href="/" class="btn btn-info" >Back to articles</a>
<?php require_once 'footer.php' ?>
