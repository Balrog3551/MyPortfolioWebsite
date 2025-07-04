<!DOCTYPE html>
<html lang="tr">
<?php include 'includes/head.php'; ?>
<link rel="stylesheet" href="css/style-projects.css">
<body>
    <?php include 'includes/navbar.php'; ?>
    <h1>Projelerim</h1>
    <div class="grid-container">
        <?php
        require 'includes/project_card.php';
        foreach ($projects as $project) {
            echo generateProjectCard($project['title'], $project['description']);
        }
        ?>
    </div>
</body>
</html> 