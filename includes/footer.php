<script src="public/chart.js/chart.js"></script>


<script src="public/bootstrap-5.0.1-dist/js/bootstrap.bundle.min.js"></script>
<script>
$(document).ready(function() {
    $(".toast").toast('show');
});
</script>

</body>

</html>

<?php

// display lang to - measure the speed of rendering page

$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$finish = $time;
$total_time = round(($finish - $start), 4);
$_SESSION['total_time'] = (float)$total_time;
?>

<?php
ob_end_flush();
?>