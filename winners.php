<?php include('includes/header.php');?>

    <!-- Body -->

    <h1 class="display-3 text-center">הזוכים היומיים</h1>
    <div class="text-center">
    <?php if(isset($_SESSION['user'])): ?>
        <table class="table table-hover table-sm">
            <thead>
                <tr>
                    <th scope="row">#</th>
                    <th>שם</th>
                    <th>תוצאה</th>
                </tr>
            </thead>
            <tbody>
                <tr class="table-success">
                    <th scope="row">1</td>
                        <td>אמיר אייזן</td>
                        <td>120</td>
                </tr>
                <tr class="table-warning">
                    <td scope="row">2</td>
                    <td>עידן אהרון</td>
                    <td>119</td>
                </tr>
                <tr class="table-danger">
                    <td scope="row">3</td>
                    <td>סאלי דלאל</td>
                    <td>118</td>
                </tr>
                <tr>
                    <td scope="row">4</td>
                    <td>איתי פרידמן</td>
                    <td>117</td>
                </tr>
                <tr>
                    <td scope="row">5</td>
                    <td>פלוני אלמוני</td>
                    <td>116</td>
                </tr>
            </tbody>
        </table>
<?php else: ?>
<h4 class="text-danger">לצפייה בזוכים היומיים עליך להתחבר</h3>
<?php endif; ?>
    </div>
<?php include('includes/footer.php');?>