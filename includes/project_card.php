<?php

$projects = [
    [
        'title' => 'Dinamik E-Ticaret Platformu',
        'description' => 'PHP ve MySQL kullanarak geliştirdiğim, kullanıcı dostu arayüze sahip, ürün yönetimi, sepet ve ödeme sistemleri içeren kapsamlı bir e-ticaret sitesi.'
    ],
    [
        'title' => 'Kurumsal Firma Web Sitesi',
        'description' => 'Modern tasarım trendlerine uygun, firmanın hizmetlerini ve portfolyosunu sergilediği, iletişim formu entegrasyonu yapılmış, tamamen duyarlı (responsive) bir web sitesi.'
    ],
    [
        'title' => 'Kişisel Blog Sistemi',
        'description' => 'Yazarların kolayca içerik ekleyip düzenleyebileceği, kategori ve etiketleme özelliklerine sahip, SEO dostu bir blog yönetim sistemi.'
    ],
    [
        'title' => 'Restoran Sipariş Uygulaması',
        'description' => 'Müşterilerin menüyü inceleyip online sipariş verebildiği, yönetici paneli üzerinden sipariş takibi ve menü yönetimi yapılabilen bir web uygulaması.'
    ],
    [
        'title' => 'Etkinlik Takvimi Portalı',
        'description' => 'Kullanıcıların yaklaşan etkinlikleri listeleyebildiği, tarihe göre filtreleme yapabildiği ve etkinlik detaylarını görüntüleyebildiği interaktif bir portal.'
    ],
    [
        'title' => 'Portfolyo Web Sitesi Şablonu',
        'description' => 'Tıpkı bu site gibi, geliştiricilerin ve tasarımcıların projelerini sergileyebileceği, temiz ve minimalist bir tasarıma sahip, özelleştirilebilir portfolyo şablonu.'
    ]
];

function generateProjectCard($title, $description) {
    $safe_title = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
    $safe_description = htmlspecialchars($description, ENT_QUOTES, 'UTF-8');

    return "
    <div class=\"card\">
        <h2>{$safe_title}</h2>
        <p>{$safe_description}</p>
    </div>";
}