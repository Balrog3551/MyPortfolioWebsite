<?php
$project_definitions = [
    [
        'title_key'       => 'project1_title',
        'description_key' => 'project1_desc'
    ],
    [
        'title_key'       => 'project2_title',
        'description_key' => 'project2_desc'
    ],
    [
        'title_key'       => 'project3_title',
        'description_key' => 'project3_desc'
    ],
    [
        'title_key'       => 'project4_title',
        'description_key' => 'project4_desc'
    ]
];

function generateProjectCard($title_key, $description_key, $lang_array) {
    $safe_title = htmlspecialchars($lang_array[$title_key] ?? 'Başlık Bulunamadı', ENT_QUOTES, 'UTF-8');
    $safe_description = htmlspecialchars($lang_array[$description_key] ?? 'Açıklama bulunamadı.', ENT_QUOTES, 'UTF-8');

    return "
    <div class=\"card\">
        <h2 data-lang-key=\"{$title_key}\">{$safe_title}</h2>
        <p data-lang-key=\"{$description_key}\">{$safe_description}</p>
    </div>";
}
?>