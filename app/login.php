<?php
session_start();
if (isset($_SESSION['name'])) {
    header("Location: department.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://unpkg.com/franken-ui-releases@0.0.12/dist/default.min.css" />
</head>

<body>

    <div class="uk-position-center uk-position-vertical">
        <div class="uk-background-secondary uk-border-rounded uk-padding">
            <?php
            if (isset($_GET['message'])) {
                echo '<div class="uk-alert uk-alert-danger uk-margin" uk-alert>
                    <a href class="uk-alert-close" uk-close></a>
                    <div class="uk-alert-description">' . $_GET['message'] . '</div></div>';
            }
            ?>
            <div class="section section-primary">
                <div class="container">
                    <form action="actions/login_process.php" method="post" class="uk-form-stacked">
                        <div class="uk-margin">
                            <label for="name" class="uk-form-label">Name</label>
                            <div class="uk-inline">
                                <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: user"></span>
                                <input type="text" name="name" class="uk-input" placeholder="Name">
                            </div>
                        </div>
                        <div class="uk-margin">
                            <label for="salary" class="uk-form-label">Password</label>
                            <div class="uk-inline">
                                <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: lock"></span>
                                <input type="password" name="password" class="uk-input" placeholder="password">
                            </div>
                        </div>
                        <div class="uk-margin">
                            <button type="submit" name="login" class="uk-button uk-button-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.20.8/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.20.8/dist/js/uikit-icons.min.js"></script>
</body>

</html>