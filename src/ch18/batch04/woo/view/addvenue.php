<?php

namespace popp\ch18\batch04\woo\view;

$request = ViewHelper::getRequest();
?>

<html>
<head>
<title> Add a Venue </title>
</head>
<body>

<table>
<tr>
<td>
<?php print $request->getFeedbackString("</td></tr><tr><td>"); ?>
</td>
</tr>
</table>

<form method="post">
    <input type="text" value="<?php echo $request->getProperty('space_name') ?>" name="venue_name" />
    <input type="submit" value="submit" />
</form>

</body>
</html>
