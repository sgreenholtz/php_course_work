<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<?php define('SITE_ROOT', '/php-course-work/project_3') ?>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Sebastian's Blog</title>

        <link href="<?= SITE_ROOT ?>/css/blog.css" rel="stylesheet" />
        <script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
        <script>tinymce.init({selector:'textarea'});</script>
    </head>

<body>

    <header>
        <h1><a href="index.php">Sebastian's Blog</a></h1>
    </header>

    <nav>
        <ul>
            <li><a href="<?= SITE_ROOT ?>/index.php">Home</a></li>
            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
            <li><a href="<?= SITE_ROOT ?>/admin/admin.php">Admin</a></li>
        </ul>
    </nav>
