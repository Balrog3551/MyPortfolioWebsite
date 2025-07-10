<?php require_once 'includes/language.php'; ?>
<!DOCTYPE html>
<html lang="<?php echo $_SESSION['lang']; ?>">
<?php include 'includes/head.php'; ?>
<link rel="stylesheet" href="css/style-projects.css">
<body>
    <?php include 'includes/navbar.php'; ?>
    
    <h1 data-lang-key="my_projects"><?php echo $lang['my_projects']; ?></h1>

    <div class="grid-container">
        <?php
        require 'includes/project_card.php';
        foreach ($project_definitions as $project) {
            echo generateProjectCard($project['title_key'], $project['description_key'], $lang);
        }
        ?>
    </div>
</body>
</html>