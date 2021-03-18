<?php

namespace popp\ch18\batch04\woo\view;

$request = ViewHelper::getRequest();
?>

<html>
<head>
<title>Woo! it's WOO!</title>
</head>
<body>

<table>
<tr>
<td>
<?php print $request->getFeedbackString("</td></tr><tr><td>"); ?>
</td>
</tr>
</table>

</body>
</html>
