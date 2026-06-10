<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?= $title ?? 'My Website' ?></title>
<link rel="stylesheet" href="<?= base_url('/style.css');?>">
</head>
<body>
<div id="container">
<header>
<h1>Layout Sederhana</h1>
</header>
<nav>
<?php $uri = service('uri')->getSegment(1); ?>
<a href="<?= base_url('/');?>" class="<?= ($uri == '') ? 'active' : '' ?>">Home</a>
<a href="<?= base_url('/artikel');?>" class="<?= ($uri == 'artikel') ? 'active' : '' ?>">Artikel</a>
<a href="<?= base_url('/about');?>" class="<?= ($uri == 'about') ? 'active' : '' ?>">About</a>
<a href="<?= base_url('/contact');?>" class="<?= ($uri == 'contact') ? 'active' : '' ?>">Kontak</a>
</nav>
<section id="wrapper">
<section id="main">
<?= $this->renderSection('content') ?>
</section>
<aside id="sidebar">
<?= view_cell('App\\Cells\\ArtikelTerkini::render', ['kategori' => 'teknologi']) ?>
<?= view_cell('App\\Cells\\KategoriList::render') ?>
<div class="widget-box">
<h3 class="title">Info Singkat</h3>
<p>Website ini dikembangkan menggunakan <strong>CodeIgniter 4</strong> sebagai bagian dari tugas praktikum Pemrograman Web. Menampilkan fitur dasar arsitektur MVC dan Layouting dinamis.</p>
</div>
</aside>
</section>
<footer>
<p>&copy; <?= date('Y'); ?> - Universitas Pelita Bangsa</p>
</footer>
</div>
</body>
</html>