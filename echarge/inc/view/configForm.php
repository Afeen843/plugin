<?php
/** instance of Class configuration */
include_once CLASS_DIR_ .'configuration.php';
$config = new configuration();
$result=$config->viewCredentials();
?>

<html>

<h1> Configuration </h1>

<form class="form-style" action="" method="post">

    <label> EbizCharge:</label>
    <select name="ebiz">
        <option value="enable">Enable</option>
        <option value="enable">Disable</option>
    </select><br>

    <label >SecurityId:</label>
	<input type="text" name="SecurityId" value="<?php echo $result->securityid;?>" required><br>

	<label>UserId:</label>
	<input type="text" name="UserId" value="<?php echo $result->userid;?>" required><br>

	<label>Password:</label>
	<input type="password" name="Password" value="<?php echo $result->password;?>" required><br>

	<button class="form-button">Submit</button>

</form>
</html>