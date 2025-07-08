<?php
function generateContactBox($iconClass, $title, $text) {
    return <<<HTML
    <div class="box-contact">
        <div class="icon"><i class="fas {$iconClass}"></i></div>
        <div class="text"><h3>{$title}</h3><p>{$text}</p></div>
    </div>
HTML;
}
?>