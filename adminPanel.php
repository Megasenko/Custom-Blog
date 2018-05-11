<?php require_once 'header.php' ?>
<?php require_once 'adminAccess.php';?>
<?php
if ($_POST) {
    insertArticle($_POST);
} ?>
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/home-bg.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 mx-auto col-md-6-offset-6">
                    <div style="margin-top:60px " class="container">
                        <h1>Admin panel</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>




    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto col-md-6-offset-4">
                <h2>Редактирование статей</h2>
                <br>
            </div>


        </div>
        <div class="row">
            <div class="col-md-4 mx-auto">
                <a href="add.php" class="btn btn-success">Add article</a>
            </div>
            <div class="col-md-4 mx-auto">
                <div class="dropdown">
                    <button class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                        Update article<span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li class="dropdown-header">Articles</li>
                        <li class="dropdown-divider"></li>
                    <?php if (getArticles()): ?>
                    <?php foreach (getArticles() as $article): ?>
                            <?='<li>'.'<a href="update.php?url='.$article['url'].'">'.$article['title'].'</a>'.'</li>'; ?>
                    <?php endforeach; ?>
                    <?php else: ?>
                         <li>Articles not found!</li>
                    <?php endif; ?>
                    </ul>
                </div>

            </div>
            <div  class="col-md-4 mx-auto">
                <div class="dropdown">
                    <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                        Delete article<span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li class="dropdown-header">Articles</li>
                        <li class="dropdown-divider"></li>
                        <?php if (getArticles()): ?>
                            <?php foreach (getArticles() as $article): ?>
                                <?='<li>'.'<a href="delete.php?url='.$article['url'].'">'.$article['title'].'</a>'.'</li>'; ?>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <li>Articles not found!</li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>


<?php require_once 'footer.php' ?>