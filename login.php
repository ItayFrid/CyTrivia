<?php include('includes/header.php');?>
    <!-- Body -->
    <div class="container text-center">
        <h1 class="display-3">התחברות לאתר</h1>
        <br><br>
        <div class="row justify-content-md-center">
            <div class="col col-lg-2"></div>
            <div class="col-md-auto">
                <ul class="list-group">
                   <li class="list-group-item"><a href="userLogin.php">התחברות משתמשים</a></li>
                   <li class="list-group-item"><a href="adminLogin.php">התחברות מנהלים\עורכים</a></li>
                </ul>
            </div>
            <div class="col col-lg-2"></div>
        </div>
    </div>
<?php include('includes/footer.php');?>

<!-- 
                <label id="seconds">00</label>
                <script type="text/javascript">
                    var minutesLabel = document.getElementById("minutes");
                    var secondsLabel = document.getElementById("seconds");
                    var totalSeconds = 0;
                    setInterval(setTime, 1000);
            
                    function setTime()
                    {
                        ++totalSeconds;
                        secondsLabel.innerHTML = pad(totalSeconds);
                        minutesLabel.innerHTML = pad(parseInt(totalSeconds/60));
                    }
            
                    function pad(val)
                    {
                        var valString = val + "";
                        if(valString.length < 2)
                        {
                            return "0" + valString;
                        }
                        else
                        {
                            return valString;
                        }
                    }
                </script> -->
