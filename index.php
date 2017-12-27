<?php include('includes/header.php');
$query = 'SELECT * FROM users ORDER BY score DESC';
$result = mysqli_query($con, $query);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
$yesterday = strtotime('yesterday');
$day = date('Y-m-d',$yesterday);
$score=0;
$winner=0;
foreach($users as $user){
    if($day==$user['date_played'] && $user['score']>$score){
        $score=$user['score'];
        $winner = $user;
    }
}
$day = date('d/m/Y',$yesterday);
?>

    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid text-center">
        <div class="container">
            <i class="fa fa-ravelry fa-5x" aria-hidden="true"></i>
            <h1 class="display-3">טריווית סייבר</h1>
            <?php if(isset($_SESSION['user']) || isset($_SESSION['admin'])): ?>
            <p class="lead">הזוכה היומי האחרון (<?php echo $day;?>):</p>
            <h4 class="text-success"><?php echo $winner['full_name'];?></h4>
            <h4>ציון: <span class="text-success"><?php echo $score;?></span></h4>
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
        <h4 class="text-center"><b>ידע = כח</b></h4>
    </p>

    <?php include('includes/footer.php');?>