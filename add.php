<?php require_once 'header.php' ?>
<?php if (!isset ($_SESSION['adminka']) && !$_SESSION['adminka']) {
    header('Location: /access_denied.php');
    exit;
} ?>
<?php
if ($_POST) {
    insertArticle($_POST);
    header('Location:post.php?url='.$_POST['url']);
}

?>
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/home-bg.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto col-md-10-offset-1" >
                    <div style="margin-top:60px "  class="container">
                        <h1  class="text-success">Добавление статьи</h1>
                        <div>

                            <form id="admin" method="post" action="" charsset="utf8">
                                <label class="container">
                                    Заголовок
                                </label>
                                <input size="80px" type="text" name="title" value="" class="form-item" autofocus required>
                                <label class="container">
                                    Краткое описание
                                </label>
                                <input size="80px" type="text" name="sub_title" value="" class="form-item" >
                                <label class="container">
                                    Содержимое статьи
                                </label>
                                <textarea rows="10" cols="81" type="text" name="content"  class="form-item" required></textarea>
                                <label class="container">
                                    Дата создания
                                </label>
                                <input  type="date" name="created_at" value="" class="form-item" required >
                                <label class="container">
                                    Ссылка на страницу
                                </label>
                                <input type="text" name="url" value="<?=getUrl()?>" class="form-item" >
                                <label class="container">
                                    Автор
                                </label>
<!--                                placeholder="--><?php //echo $_SESSION['name'] ?><!--"-->
                                <input type="text" name="author" value="<?php echo $_SESSION['author'] ?>"  class="form-item" required>
                                <br>
                                <button style="margin: 15px" type="submit" class="btn btn-success" >Добавить запись</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>





<?php require_once 'footer.php' ?>