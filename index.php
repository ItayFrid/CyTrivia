<?php include('includes/header.php');
$query = 'SELECT * FROM users ORDER BY score DESC';
$result = mysqli_query($con, $query);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
$today = date('d/m/y');
?>

    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid text-center">
        <div class="container">
            <i class="fa fa-ravelry fa-5x" aria-hidden="true"></i>
            <h1 class="display-3">טריווית סייבר</h1>
            <?php if(isset($_SESSION['user'])): ?>
            <p class="lead">הזוכה היומי לתאריך <?php echo $today;?>:</p>
            <h4 class="text-success"><?php echo $users[0]['full_name'];?></h4>
            <?php else: ?>
                <p class="lead text-danger">כדי להשתתף בטריוויה ולצפות בתכנים עליך להתחבר</p>
            <?php endif;?>
        </div>
    </div>
    <p class="text-center">היום כבר יותר מתמיד ברור לכולם כי תחום הסייבר משתלט על חיינו ונוגע בכל תחומי החיים:
        <br> בתעשייה, במסחר, בכלכלה בזירה המדינית והעולמית, בבטחון המדינה בבטחון המידע האישי של כל אחד ואחת מאיתנו ועוד!
        <br>
        <br> מרכז הסייבר הישראלי מאגד בתוכו את מיטב האנשים בתחום. המאפשרים לכם להתמחות בעולם הסייבר.
        <br>
        <br> למידה וכניסה לתחום הסייבר בגיל צעיר מקנה את מירב היכולות המקצועיות בכדי לייצר איש סייבר מהטובים בעולם!
        <br>
        <br> ישראל הינה מעצמת סייבר בזכות הידע וההתמקצעות המרכיבים את אנשיה בקהילת הסייבר.
        <br>
        <br> אנשי קהילת הסייבר בישראל מבוקשים למשרות בכל העולם והינם בעלי חברות ואף עשו מאות אקזיטים בתחום של מליארדי דולרים!
        <br>
        <br>
        <b>ידע= כח</b>
    </p>
    <?php include('includes/footer.php');?>