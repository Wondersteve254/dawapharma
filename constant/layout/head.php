<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="This Dawa Pharma Invoice System Developed by Dorop">
    <meta name="keywords" content=".freelancer">
    <meta name="author" content="">
    
    <link rel="icon" type="image/png" sizes="16x16" href="assets/uploadImage/Logo/favicon.png">
    
    <title>Dawa Pharma Invoice System</title>

    <link href="assets/css/lib/chartist/chartist.min.css" rel="stylesheet">
    <link href="assets/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="assets/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="assets/css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/helper.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/lib/html5-editor/bootstrap-wysihtml5.css" />
    <link href="assets/css/lib/calendar2/semantic.ui.min.css" rel="stylesheet">
    <link href="assets/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="assets/css/lib/sweetalert/sweetalert.css" rel="stylesheet">
    <link href="assets/css/lib/datepicker/bootstrap-datepicker3.min.css" rel="stylesheet">
</head>

<body class="fix-header fix-sidebar">
    
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> 
        </svg>
    </div>

    <div id="main-wrapper">
        <div class="header">
            <marquee class="d-lg-none d-block">
                <div class="ml-lg-5 pl-lg-5 ">
                    <b id="ti" class="ml-lg-5 pl-lg-5"></b>
                </div>
            </marquee>
        </div>
    </div>

    <script>
        // Function to format time to HH:MM:SS
        function formatTime(date) {
            var hours = date.getHours();
            var minutes = date.getMinutes();
            var seconds = date.getSeconds();
            hours = hours < 10 ? '0' + hours : hours;
            minutes = minutes < 10 ? '0' + minutes : minutes;
            seconds = seconds < 10 ? '0' + seconds : seconds;
            return hours + ':' + minutes + ':' + seconds;
        }

        // Function to update time every second
        function updateTime() {
            var today = new Date();
            var formattedTime = formatTime(today);
            document.getElementById('ti').innerHTML = formattedTime;
        }

        // Call updateTime function every second
        setInterval(updateTime, 1000);

        // Initial call to display time immediately
        updateTime();
    </script>
</body>

</html>
