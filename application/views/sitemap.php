<?php
  header('Content-type: application/xml; charset="ISO-8859-1"',true);  
  $datetime1 = new DateTime(date('Y-m-d H:i:s'));
?>
 
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <url>
    <loc><?= base_url() ?></loc>
    <lastmod><?= $datetime1->format(DATE_ATOM); ?></lastmod>
    <changefreq>daily</changefreq>
    <priority>0.1</priority>
  </url>
  <url>
    <loc><?= base_url() . 'kegiatans' ?></loc>
    <lastmod><?= $datetime1->format(DATE_ATOM); ?></lastmod>
    <changefreq>daily</changefreq>
    <priority>0.1</priority>
  </url>
  <url>
    <loc><?= base_url() . 'katalog/produk_list' ?></loc>
    <lastmod><?= $datetime1->format(DATE_ATOM); ?></lastmod>
    <changefreq>daily</changefreq>
    <priority>0.1</priority>
  </url>
  <url>
    <loc><?= base_url() . 'katalog/produk_gambar' ?></loc>
    <lastmod><?= $datetime1->format(DATE_ATOM); ?></lastmod>
    <changefreq>daily</changefreq>
    <priority>0.1</priority>
  </url>
  <url>
    <loc><?= base_url() . 'tentang_kami' ?></loc>
    <lastmod><?= $datetime1->format(DATE_ATOM); ?></lastmod>
    <changefreq>daily</changefreq>
    <priority>0.1</priority>
  </url>
  <?php foreach($post as $item) { $datetime = new DateTime($item['tgl_buat']);?>
  <url>
    <loc><?= base_url('kegiatan/' . $item['url']) ?></loc>
    <lastmod><?= $datetime->format(DATE_ATOM); ?></lastmod>
    <changefreq>daily</changefreq>
    <priority>0.5</priority>
  </url>
  <?php } ?>
</urlset>