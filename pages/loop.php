<?php
ini_set("display_errors", 1);
require_once("../includes.php");

if(!empty($_POST['begin']) && !empty($_POST['end'])) {
    $begin = new DateTime($_POST['begin']);
    $end = new DateTime($_POST['end']);

    $interval = DateInterval::createFromDateString('1 day');
    $period = new DatePeriod($begin, $interval, $end->add($interval));

    $weekdays = 0;
    foreach($period as $dt) {
        if(isWeekday(strtotime($dt->format('Y-m-d H:i:s')))) {
            $weekdays++;
        }
    }
    header("location: " . $_SERVER['PHP_SELF'] . "?weekdays=" . $weekdays);
}

function isWeekday($date) {
    return (date('N', $date) < 6);
}

require_once(SERVER_ROOT . "/templates/header.php");
?>
    <main>
        <h1>Loop</h1>
        <p>Select a start and end date to see how many weekdays there are between them.</p>
        <p>(Includes dates picked in calculation)</p>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="text" name="begin" placeholder="Start Date" id="start_date" />
            <input type="text" name="end" placeholder="End Date" id="end_date" />
            <input type="submit" value="Get Week Days" />
        </form>
        <h2><?php if(isset($_GET['weekdays'])) { echo $_GET['weekdays'] . " Weekdays"; }; ?></h2>
    </main>
<?php require_once(SERVER_ROOT . "/templates/footer.php"); ?>