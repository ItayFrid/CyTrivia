    <!-- Navigation -->
    <?php 
    // Get Users Details From DB
    if(isset($_SESSION['user']))
    {
        $res=mysqli_query($con, "SELECT * FROM users WHERE id=".$_SESSION['user']);
        $userRow=mysqli_fetch_assoc($res);
        mysqli_free_result($res);
        
    }
    if(isset($_SESSION['admin'])){
        $resAdmin=mysqli_query($con, "SELECT * FROM admins_editors WHERE id=".$_SESSION['admin']);
        $adminRow=mysqli_fetch_assoc($resAdmin);
        mysqli_free_result($resAdmin);
    }
    ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="nivut">
        <a class="navbar-brand" href="<?php echo ROOT_URL;?>index.php"><i class="fab fa-ravelry" aria-hidden="true"></i> CyTrivia</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo ROOT_URL;?>index.php">דף הבית</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo ROOT_URL;?>winners.php">טבלה יומית</a>
                </li>

                </li>
                <?php if(isset($_SESSION['user'])): ?>
                <li class="nav-item">
                    <a class="nav-link text-success" href="trivia.php"><h5>התחל לשחק!</h5></a>
                </li>
                <?php endif;?>
            </ul>

        </div>
        <div class="justify-content-left">
            <?php if(!isset($_SESSION['user']) && !isset($_SESSION['admin'])): ?>
            <a href="<?php echo ROOT_URL;?>login.php">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">התחברות</button>
            </a>
            <a href="<?php echo ROOT_URL;?>register.php">
                <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">הרשמה</button>
            </a>
            <?php else:?>
                <?php if(isset($_SESSION['admin'])):?> 
                <!-- User is Admin Or Editor -->
                    <?php if($adminRow['admin_or_editor']==1):?>
                    <!-- User Is Admin -->
                    <a href="<?php echo ROOT_URL;?>adminInterface.php">
                <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">דף מנהל</button>
            </a>
                    <?php else:?>
                    <!-- User Is Editor -->
            <a href="<?php echo ROOT_URL;?>qinterface.php">
                <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">עריכת שאלות</button>
            </a>
                    <?php endif;?>
                <?php endif;?>
                <?php if(isset($_SESSION['user'])):?> 
                <a href="<?php echo ROOT_URL;?>profile.php">
                    <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">פרופיל</button>
                </a>
                <?php endif;?>
            <a href="<?php echo ROOT_URL;?>logout.php?logout">
                <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">התנתקות</button>
            </a>
            <?php endif;?>
        </div>
    </nav>