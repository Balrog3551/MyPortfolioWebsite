<?php
$contactDetails = [
    [
        'icon' => 'fa-map-marker-alt',
        'title' => 'Adres',
        'text' => 'Niğde, Türkiye'
    ],
    [
        'icon' => 'fa-envelope',
        'title' => 'E-posta',
        'text' => '<a href="mailto:muhammetcevik5551@gmail.com">muhammetcevik5551@gmail.com</a>'
    ],
    [
        'icon' => 'fa-phone',
        'title' => 'Telefon',
        'text' => '<a href="tel:+905354725851">+90 535 472 58 51</a>'
    ]
];

function generateContactBox($iconClass, $title, $text) {
    return <<<HTML
    <div class="box-contact">
        <div class="icon"><i class="fas {$iconClass}"></i></div>
        <div class="text"><h3>{$title}</h3><p>{$text}</p></div>
    </div>
HTML;
}

