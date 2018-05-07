<?php
session_start();
// Создание красивого заголовка
function viewTitle()
{
    $arr = explode('.', $_SERVER['REQUEST_URI']);
    $str = substr($arr[0], 1);
    if ($str) {
        echo 'Custom Blog - ' . ucfirst($str);
    } else {
        echo 'Custom Blog';
    }
}

// Соединение с базой данных
require 'connectDB.php';

// Выбор всех статей из базы
function getArticles()
{
    $db = connectDb();
    if ($db) {
        $sql = "SELECT *
                FROM articles
                ";

        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}

// Выбор одной статьи по URL-у
function getArticle($dataArticle)
{
    $db = connectDb();
    if ($db) {
        $sql = "SELECT *
            FROM articles WHERE url=:url
            ";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':url', $dataArticle['url'], PDO::PARAM_STR);
        $stmt->execute();
        return $article = $stmt->fetchAll();
    }
}

// Создание URL-а на единицу больше чем в базе для записи в базу
function getUrl()
{
    $db = connectDb();
    if ($db) {
        $sql = "SELECT *
            FROM articles 
            ";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $articles = $stmt->fetchAll();
        $countA = count($articles);
        return $countA + 1;
    }

    return false;
}

// Публикация автора статьи
function getAuthor($id)
{
    $db = connectDb();
    if ($db) {
        $sql = "SELECT *
                FROM users
                WHERE id=$id
                ";

        return $db->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    return false;
}

// Добавление статьи в базу
function insertArticle($dataArticle)
{
    $db = connectDb();
    if ($db) {
        $sql = "INSERT INTO articles(title , sub_title , content , created_at , url , author) 
            VALUES ( :title , :sub_title , :content , :created_at , :url , :author)";

        $stmt = $db->prepare($sql);

        $stmt->bindValue(':title', strip_tags(trim($dataArticle['title'])), PDO::PARAM_STR);
        $stmt->bindValue(':sub_title', strip_tags(trim($dataArticle['sub_title'])), PDO::PARAM_STR);
        $stmt->bindValue(':content', strip_tags(trim($dataArticle['content'])), PDO::PARAM_STR);
        $stmt->bindValue(':created_at', strip_tags(trim($dataArticle['created_at'])), PDO::PARAM_INT);
        $stmt->bindValue(':url', strip_tags(trim($dataArticle['url'])), PDO::PARAM_INT);
        $stmt->bindValue(':author', strip_tags(trim($dataArticle['author'])), PDO::PARAM_INT);

       return $stmt->execute();

    }
    return false;
}

// Обновление статьи
function updateArticle($dataArticle, $urlArticle)
{
    $db = connectDb();
    if ($db) {
        $title=strip_tags(trim($dataArticle['title']));
        $sub_title=strip_tags(trim($dataArticle['sub_title']));
        $content=strip_tags(trim($dataArticle['content']));
        $created_at=strip_tags(trim($dataArticle['created_at']));
        $url=strip_tags(trim($dataArticle['url']));
        $author=strip_tags(trim($dataArticle['author']));

        $sql = "UPDATE articles SET title='$title',sub_title='$sub_title',content='$content',
                created_at='$created_at',url='$url',author='$author' WHERE url='$urlArticle'";

       return $db->prepare($sql)->execute();
    }
    return false;
}

// Удаление статьи
function deleteArticle($url)
{
    $db = connectDb();
    if ($db) {
        $sql = "DELETE FROM articles WHERE url=$url";

        return $db->prepare($sql)->execute();
    }

    return false;
}

// Добавление пользователей в базу при регистрации
function insertUser($userData)
{
    $db = connectDb();
    if ($db) {
        $password = md5($userData['password']);
        $sql = "INSERT INTO users(name, last_name, login , email , password)
        VALUES ( :name, :last_name , :login , :email , :password)";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':name', $userData['name'], PDO::PARAM_STR);
        $stmt->bindParam(':last_name', $userData['last_name'], PDO::PARAM_STR);
        $stmt->bindParam(':login', $userData['login'], PDO::PARAM_STR);
        $stmt->bindParam(':email', $userData['email'], PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        return $stmt->execute();
    }
}

// Регистрация пользователей
function registerUser(array $userData)
{


    if (!isset($userData['login']) || empty ($userData['login'])) {
        $_SESSION['error_message'] = 'Login can not be empty';
        return;
    }
    if (!isset($userData['email']) || empty ($userData['email'])) {
        $_SESSION['error_message'] = 'Email can not be empty';
        return;
    }
    if (!isset($userData['password']) || empty ($userData['passwordConfirm'])) {
        $_SESSION['error_message'] = 'Password can not be empty';
        return;
    }
    if ($userData['password'] !== $userData['passwordConfirm']) {
        $_SESSION['error_message'] = 'Inputted passwords not confirm!';
        return;
    }

    if (insertUser($userData)) {
        $_SESSION['error_message'] = false;
        header('Location: signIn.php');
    } else {
        $_SESSION['error_message'] = 'Register user not complete';
    }

}

// Отображение ошибок
function getErrorMessage()
{
    return $_SESSION['error_message'] ?? false;
}

// Проверка логина в базе
function getLogin(array $userData)
{
    $db = connectDb();

    $sql = 'SELECT * FROM users WHERE login = :login';

    $stmt = $db->prepare($sql);
    $stmt->bindValue(':login', $userData['login'], PDO::PARAM_STR);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Вход на сайт
function auth(array $userData)
{
    $_SESSION['access'] = false;
    if (!isset($userData['login']) || empty ($userData['login'])) {
        $_SESSION['error_message'] = 'Login can not be empty';
        return;
    }
    if (!isset($userData['password']) || empty ($userData['password'])) {
        $_SESSION['error_message'] = 'Password can not be empty';
        return;
    }
    if (getLogin($userData)) {
        $rows = getLogin($userData);
        if (count($rows) > 0) {
            if (md5($userData['password']) == $rows[0]['password']) {
                if ($rows[0]['login'] === 'admin') {
                    $_SESSION['adminka'] = true;
                    $_SESSION['access'] = true;
                    $_SESSION['author'] = $rows[0]['id'];
                    $_SESSION['name'] = $rows[0]['name'];
                    $_SESSION['email'] = $rows[0]['email'];
                    header('Location:adminPanel.php');
                    exit;
                } else {
                    $_SESSION['access'] = true;
                    $_SESSION['author'] = $rows[0]['id'];
                    $_SESSION['name'] = $rows[0]['name'];
                    header('Location:/');
                    exit;
                }

            } else {
                $_SESSION['error_message'] = 'You entered the wrong password ';
            }
        }
    } else {
        $_SESSION['error_message'] = 'Логин <b>' . $userData['login'] . '</b> не найден!';

    }


}




