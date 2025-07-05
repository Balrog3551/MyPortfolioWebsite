<?php

$projects = [
    [
        'title' => 'Görüntü İşleme Web Sitesi',
        'description' => 'Python ve Flask kütüphanesiyle geliştirilmiş, kullanıcıların resim yükleyip temel filtreleme işlemleri yapabildiği bir web uygulaması.'
    ],
    [
        'title' => 'Bitirme Projesi: Ben Analizi Uygulaması',
        'description' => 'Flutter ile geliştirilen, çekilen ben fotoğraflarını Python makine öğrenimi modeliyle analiz ederek erken teşhise yardımcı olan bir mobil uygulama.'
    ],
    [
        'title' => 'Getir Mobil Uygulama Klonu',
        'description' => 'Popüler "Getir" uygulamasının arayüzünün ve temel işlevlerinin Flutter ve Firebase kullanılarak yeniden oluşturulduğu bir mobil uygulama projesi.'
    ],
    [
        'title' => 'Kişisel Portfolyo Web Sitesi',
        'description' => 'Projelerimi ve yeteneklerimi sergilemek amacıyla HTML, CSS ve PHP dillerini kullanarak geliştirdiğim kişisel portfolyo sitem.'
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