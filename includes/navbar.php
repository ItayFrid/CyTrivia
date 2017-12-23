    <!-- Navigation -->
    <?php 
    // Get Users Details From DB
    if(isset($_SESSION['user']))
    {
        $res=mysqli_query($con, "SELECT * FROM users WHERE id=".$_SESSION['user']);
        $userRow=mysqli_fetch_assoc($res);
    }

    ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="nivut">
        <a class="navbar-brand" href="index.php"><i class="fa fa-ravelry" aria-hidden="true"></i> CyTrivia</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">דף הבית</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="winners.php">טבלה יומית</a>
                </li>

                </li>
                <?php if(isset($_SESSION['user'])): ?>
                <li class="nav-item">
                    <a class="nav-link" href="#">התחל לשחק!</a>
                </li>
                <?php endif;?>
            </ul>

        </div>
        <div class="justify-content-left">
            <?php if(!isset($_SESSION['user'])): ?>
            <a href="login.php">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">התחברות</button>
            </a>
            <a href="register.php">
                <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">הרשמה</button>
            </a>
            <?php else:?>
            <a href="logout.php?logout">
                <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">התנתקות</button>
            </a>
            <?php endif;?>
        </div>
    </nav>