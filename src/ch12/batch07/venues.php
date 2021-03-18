<?php

/*
<!-- listing 12.34 -->
<?php
<!-- /listing 12.34 -->
*/
/* listing 12.34 */
namespace popp\ch12\batch07;

/* /listing 12.34 */
require_once(__DIR__ . "/../../../vendor/autoload.php");
/* listing 12.34 */
try {
    $venuemapper = new VenueMapper();
    $venues = $venuemapper->findAll();
} catch (\Exception) {
    include('error.php');
    exit(0);
}

// default page follows
?>
<html>
<head>
<title>Venues</title>
</head>
<body>
<h1>Venues</h1>

<?php foreach ($venues as $venue) { ?>
    <?php print $venue->getName(); ?><br />
<?php } ?>

</body>
</html>
