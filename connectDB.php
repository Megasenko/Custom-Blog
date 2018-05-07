<?php
function connectDb()
{
    try {
        $dbh = new PDO('mysql:host=localhost; dbname=custom_blog; charset=utf8', 'root', 'dimidi19');

        return $dbh;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";

        return false;
    }
}