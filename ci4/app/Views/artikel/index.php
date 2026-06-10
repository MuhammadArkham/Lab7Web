<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<h1>Daftar Artikel</h1>
<hr>

<?php if ($artikel): foreach ($artikel as $row): ?>
<article class="entry" style="margin-bottom: 30px; padding: 20px; background: #fff; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.02); border: 1px solid #edf2f7;">
    <h2 class="article-title" style="margin-bottom: 10px;"><a href="<?= base_url('/artikel/' . $row['slug']); ?>"><?= $row['judul']; ?></a></h2>
    <p style="color: #718096; font-size: 13px; margin-bottom: 15px;">
        <span style="background: #ebf8ff; color: #3182ce; padding: 4px 10px; border-radius: 20px; font-weight: 600;">Kategori: <?= $row['nama_kategori'] ?? '-'; ?></span>
    </p>
    <?php if ($row['gambar']): ?>
        <img src="<?= base_url('/gambar/' . $row['gambar']); ?>" alt="<?= $row['judul']; ?>" style="max-width:100%; height:auto; border-radius:8px; margin-bottom:15px; display:block; object-fit: cover; max-height: 300px;" onerror="this.style.display='none'">
    <?php endif; ?>
    <p><?= substr($row['isi'], 0, 200); ?>...</p>
    <a href="<?= base_url('/artikel/' . $row['slug']); ?>" class="btn btn-sm" style="margin-top: 15px; display: inline-block;">Baca Selengkapnya →</a>
</article>
<?php endforeach; else: ?>
<article class="entry">
    <h2>Belum ada data.</h2>
</article>
<?php endif; ?>

<?= $this->endSection() ?>
