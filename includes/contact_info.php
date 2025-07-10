<?php
function generateContactBox($iconClass, $titleKey, $titleText, $text, $textKey = null) {
    $p_tag = ($textKey !== null) 
        ? "<p data-lang-key=\"{$textKey}\">{$text}</p>" 
        : "<p>{$text}</p>";

    return <<<HTML
    <div class="box-contact">
        <div class="icon"><i class="fas {$iconClass}"></i></div>
        <div class="text">
            <h3 data-lang-key="{$titleKey}">{$titleText}</h3>
            {$p_tag}
        </div>
    </div>
HTML;
}
?>