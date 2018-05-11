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

// Выбор всех пользователей из базы
function getUsers()
{
    $db = connectDb();
    if ($db) {
        $sql = "SELECT *
                FROM users
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
function getUrl1()
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

// автор для статьи
function getAuthorArticle()
{
    $db = connectDb();
    if ($db) {
        $a = $_SESSION['login'];
        $sql = "SELECT id
                FROM users
                WHERE login='$a'
                ";

        $row = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
        return $row['id'];
    }


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
        $sql = "INSERT INTO articles(title , sub_title , content , created_at , url , author , role)
            VALUES ( :title , :sub_title , :content , :created_at , :url , :author , :role)";

        $stmt = $db->prepare($sql);


        $datetime = new DateTime();
        $createdAt = $datetime->format('Y-m-d H:i:s');
        $url = getUrl($dataArticle['title']);
        $author = getAuthorArticle();
        $role=1;

        $stmt->bindValue(':title', strip_tags(trim($dataArticle['title'])), PDO::PARAM_STR);
        $stmt->bindValue(':sub_title', strip_tags(trim($dataArticle['sub_title'])), PDO::PARAM_STR);
        $stmt->bindValue(':content', strip_tags(trim($dataArticle['content'])), PDO::PARAM_STR);
        $stmt->bindValue(':created_at', $createdAt, PDO::PARAM_STR);
        $stmt->bindValue(':url', $url, PDO::PARAM_STR);
        $stmt->bindValue(':author', $author, PDO::PARAM_STR);
        $stmt->bindValue(':role', $role, PDO::PARAM_STR);

       return $stmt->execute();
    }
    return false;
}

// генерируем URL
function getUrl($str)
{
    $articleUrl = str_replace(' ', '-', $str);
    $articleUrl = transliteration($articleUrl);
    $articleIsset = getArticleByUrl($articleUrl);
    if (!$articleIsset) {
        return $articleUrl;
    } else {
        $url = $articleIsset['url'];
        $exUrl = explode('-', $url);
        if ($exUrl) {
            $temp = (int)end($exUrl);
            $newUrl = $exUrl[0] . '-' . ++$temp;
        } else {
            $temp = 0;
            $newUrl = $articleUrl . '-' . ++$temp;
        }

        return getUrl($newUrl);
    }
}

// получение статьи по URL
function getArticleByUrl($str)
{
    $db = connectDb();
    if ($db) {
        $sql = "SELECT *
                FROM articles
                WHERE url='$str'
                ";

        return $db->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    return false;
}

// перевод тектса
function transliteration($str)
{
    $st = strtr($str,
        array(
            'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd',
            'е' => 'e', 'ё' => 'e', 'ж' => 'zh', 'з' => 'z', 'и' => 'i',
            'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
            'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u',
            'ф' => 'ph', 'х' => 'h', 'ы' => 'y', 'э' => 'e', 'ь' => '',
            'ъ' => '', 'й' => 'y', 'ц' => 'c', 'ч' => 'ch', 'ш' => 'sh',
            'щ' => 'sh', 'ю' => 'yu', 'я' => 'ya', ' ' => '_', '<' => '_',
            '>' => '_', '?' => '_', '"' => '_', '=' => '_', '/' => '_',
            '|' => '_'
        )
    );
    $st2 = strtr($st,
        array(
            'А' => 'a', 'Б' => 'b', 'В' => 'v', 'Г' => 'g', 'Д' => 'd',
            'Е' => 'e', 'Ё' => 'e', 'Ж' => 'zh', 'З' => 'z', 'И' => 'i',
            'К' => 'k', 'Л' => 'l', 'М' => 'm', 'Н' => 'n', 'О' => 'o',
            'П' => 'p', 'Р' => 'r', 'С' => 's', 'Т' => 't', 'У' => 'u',
            'Ф' => 'ph', 'Х' => 'h', 'Ы' => 'y', 'Э' => 'e', 'Ь' => '',
            'Ъ' => '', 'Й' => 'y', 'Ц' => 'c', 'Ч' => 'ch', 'Ш' => 'sh',
            'Щ' => 'sh', 'Ю' => 'yu', 'Я' => 'ya'
        )
    );
    $translit = $st2;

    return $translit;
}

// Обновление статьи
function updateArticle($dataArticle, $urlArticle)
{
    $db = connectDb();
    if ($db) {
        $title = strip_tags(trim($dataArticle['title']));
        $sub_title = strip_tags(trim($dataArticle['sub_title']));
        $content = strip_tags(trim($dataArticle['content']));
//        $created_at=strip_tags(trim($dataArticle['created_at']));
//        $url=strip_tags(trim($dataArticle['url']));
        $author = getAuthorArticle();
        $role = strip_tags(trim($dataArticle['role']));

        $sql = "UPDATE articles SET title='$title',sub_title='$sub_title',content='$content',
               author='$author',role=$role WHERE url='$urlArticle'";

        return $db->prepare($sql)->execute();
    }
    return false;
}

// Удаление статьи
function deleteArticle($url)
{
    $db = connectDb();
    if ($db) {
        $sql = "DELETE FROM articles WHERE url='$url'";

        return $db->prepare($sql)->execute();
    }

    return false;
}

// Добавление пользователей в базу при регистрации
function insertUser($userData)
{
    $db = connectDb();
    if ($db) {
        $role=3;
        $password = md5($userData['password']);
        $sql = "INSERT INTO users(name, last_name, login , email , password, role)
        VALUES ( :name, :last_name , :login , :email , :password , :role)";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':name', $userData['name'], PDO::PARAM_STR);
        $stmt->bindParam(':last_name', $userData['last_name'], PDO::PARAM_STR);
        $stmt->bindParam(':login', $userData['login'], PDO::PARAM_STR);
        $stmt->bindParam(':email', $userData['email'], PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->bindParam(':role', $role, PDO::PARAM_STR);
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
        header('Location:/admin/users.php');
        exit;
    } else {
        $_SESSION['error_message'] = 'Register user not complete';
    }

}

// Отображение ошибок
function getErrorMessage()
{
    return $_SESSION['error_message'] ?? false;
}

// Извлечение пользователя с базы по логину
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
                    $_SESSION['access'] = true;
                    $role=$rows[0]['role']*1;
                    $_SESSION['role'] = $role;
                    $_SESSION['author'] = $rows[0]['id'];
                    $_SESSION['login'] = $rows[0]['login'];
                    $_SESSION['email'] = $rows[0]['email'];
                    $_SESSION['name'] = $rows[0]['name'];
                    header('Location:/admin/main.php');
                    exit;
                } else {
                    $_SESSION['access'] = true;
                    $_SESSION['role'] = $rows[0]['role'];
                    $_SESSION['author'] = $rows[0]['id'];
                    $_SESSION['login'] = $rows[0]['login'];
                    $_SESSION['name'] = $rows[0]['name'];
                    $_SESSION['email'] = $rows[0]['email'];
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

// Удаление пользователя
function deleteUser($id)
{
    $db = connectDb();
    if ($db) {
        $sql = "DELETE FROM users WHERE id=$id";

        return $db->prepare($sql)->execute();
    }

    return false;
}

// вывод статей по роли пользователя
function getArticlesRole($role)
{
    $db = connectDb();
    if ($db) {
        $sql = "SELECT *
                FROM articles WHERE role='$role'";

        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}

// поиск статьи по запросу пользователя
function getArticleByUser($search)
{
    $search = "%$search%";
    $db = connectDb();
    if ($db) {
        $stm = $db->prepare("SELECT * FROM articles WHERE (title LIKE '$search') 
                              OR (sub_title LIKE '$search') OR (content LIKE '$search')");
        $stm->execute(array($search));
        return $stm->fetchAll();
    }

}

// обновление информации о пользователе или установка роли
function updateRole($userData, $id)
{
    $db = connectDb();
    if ($db) {

        $role = $userData['role'];

        $sql = "UPDATE users SET role=$role WHERE id='$id'";

        return $db->prepare($sql)->execute();
    }
    return false;


}

// Выбор одного пользователя по id
function getUser($userData)
{
    $db = connectDb();
    if ($db) {
        $sql = "SELECT *
            FROM users WHERE id=:id
            ";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':id', $userData['id'], PDO::PARAM_STR);
        $stmt->execute();
        return $article = $stmt->fetchAll();
    }
}