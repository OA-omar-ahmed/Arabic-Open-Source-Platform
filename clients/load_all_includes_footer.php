<?php // footer
// 5- Close the connection
@$connection ? @mysqli_close($connection) : "";
echo isset($_GET['ohide']) ? "" : "</fieldset>"; // end content js load 
?>
<?php
include_once("../views/footer.php");
?>
<?php /* (C)Omar Ahmed 2019-2021*/ ?>
