<?php
/*	MythicCMS v0.1, created by Corey Caswick
 *	Copyright © 2009 Mythic Web Design <http://www.mythicwebdesign.com/>
 */

global $db;
$savedir = _PHP_ROOTDIR . _IMGDIR . 'photos/header/';
$viewdir = _ROOTDIR . _IMGDIR . 'photos/header/';

// PROCESS REQUESTS
// ...for images
if ($_POST['UpdateImage']) {	/* Update existing record */
	// Prepare data
	// Perform database update
	if ( $result = $db->update('images', $_POST['Image'], 'WHERE `ImageID` = \'' . $_POST['Image']['ImageID'] . '\'') ) {
		$status = 1;
	}
	else $status = 0;
}
elseif ($_POST['InsertImage']) {	/* Create new record */
	// Prepare data
	$_POST['Image']['DateCreated'] = date(_DB_DATE_FORMAT);
	$_POST['Image']['Filename'] = $_FILES['FileUpload']['name'];
	// Perform database update
	if ( $result = $db->insert('images', $_POST['Image']) ) {
		// Deal with file upload
		if (array_key_exists('FileUpload', $_FILES)) {
			if ( procUpload('FileUpload', $savedir) ) {
				$status = 1;
			}
			else $status = 0;
		}
		else $status = 0;
	}
	else $status = 0;
}
elseif ($_POST['DeleteImage']) {	/* Delete record */
	if ( $result = $db->delete('images', 'WHERE ImageID=\'' . $_POST['Image']['ImageID'] . '\'') ) {
		if ( unlink($savedir . $_POST['Image']['Filename'] ) ) {
			$status = 1;
			unset($_POST['Image']);
		}
		else $status = 0;
	}
	else $status = 0;
}

// Check for selected image
if ( array_key_exists('ImageID', $_GET) ) {					// Viewing a image
	$showimage = $_GET['ImageID'];
}
elseif ( array_key_exists('Image', $_POST) ) {				// After processing a request
	if ( array_key_exists('ImageID', $_POST['Image']) ) {
		$showimage = $_POST['Image']['ImageID'];			// After update
	}
	else $showimage = $db->getInsertID();					// After insert, obviously
}
else $showimage = FALSE;									// No image selected

// List images
echo '<div id="panelList">';
if ( $imagelist = $db->select('images', '*, UNIX_TIMESTAMP(DateCreated) AS DateCreated, UNIX_TIMESTAMP(DateModified) AS DateModified', 'ORDER BY `Order` ASC') ) {
	?>

<table class="adminList" border="0" cellspacing="0" cellpadding="0">
<thead>
	<tr>
		<th title="Slideshow Order">Order</th>
		<th title="Image Title">Image</th>
		<th title="Date of Last Update">Updated</th>
	</tr>
</thead>
<tbody>
	<?php
	// Prepare count
	$i = 0;
	while ( $image = $db->getRow($imagelist) ) {
		// Determine row style
		if ($showimage == $image['ImageID']) {
			$rowClass = 'selectedRow';
			++$i;
		}
		else $rowClass = 'row' . (++$i % 2);
		// Print row
		echo '		<tr class="'. $rowClass .'">'
			. '<td><a href="/admin/slideshow?ImageID='.$image['ImageID'].'">'
			. htmlspecialchars($image['Order']) 
			. '</a></td>'
			. '<td><a href="/admin/slideshow?ImageID='.$image['ImageID'].'">'
			. htmlspecialchars(substr($image['Title'], 0, 40)) 
			. '</a></td>'
			. '<td><a href="/admin/slideshow?ImageID='.$image['ImageID'].'">'
			. date(_DATE_FORMAT_SHORT, $image['DateModified']) 
			. '</a></td>'
			. '</tr>'
		;
	}
	?>
</tbody>
</table>
	<?php
}
else echo '<p image="error">Error ' . mysql_errno() . ': ' . mysql_error() . '. Please try again. If this problem persists, please contact your administrator.</p>';

echo '</div>';

echo '<div id="panelEdit">';

// Display status of last operation performed
if (!empty($status)) {
	print_status($status);
}

// Edit form
if ($showimage) {
	$db->select('images', '*, UNIX_TIMESTAMP(DateCreated) AS DateCreated, UNIX_TIMESTAMP(DateModified) AS DateModified', 'WHERE ImageID = \'' . $showimage . '\'');
	$image = $db->getRow();
}
?>

<table class="adminForm" border="0">
<form enctype="multipart/form-data" action="/admin/slideshow" method="post">
	<input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
	<tr>
<?php 
	if ($showimage) {
		echo '
<td colspan="2">
<input type="hidden" name="Image[ImageID]" value="'. $image['ImageID'] .'" />
<input type="hidden" name="Image[Filename]" value="'. $image['Filename'] .'" />
<img src="'. _ROOTDIR .'thumbnail.php?img='. $viewdir . $image['Filename'] . '&width=202&height=184" width="202" height="184" />
</td>
		';
	}
	else echo '<td valign="top"><label for="FileUpload">File:</td><td><input type="file" name="FileUpload" id="FileUpload" /><br /><strong style="font-size: small">Must be 507px wide by 458px high. JPEG recommended.</strong></td>';
?>
	</tr><tr>
		<td><label for="Image[Title]">Title:</label></td>
		<td><input type="text" name="Image[Title]" id="Image[Title]" value="<?php echo htmlspecialchars($image['Title']) ?>" size="60" /></td>
	</tr><tr>
		<td><label for="Image[Order]">Order:</label></td>
		<td><input type="text" name="Image[Order]" id="Image[Order]" value="<?php echo htmlspecialchars($image['Order']) ?>" size="5" /></td>
	</tr>
<?php if ($showimage) { ?>
	<tr>
		<td>Created:</td>
		<td><?php echo date(_DATE_FORMAT, $image['DateCreated']) ?></td>
	</tr><tr>
		<td>Last Modified:</td>
		<td><?php echo date(_DATE_FORMAT, $image['DateModified']) ?></td>
	</tr>
<?php } ?>
	<tr>
		<td align="left">
			<?php if ($showimage) echo '<input type="button" name="BlankImage" value="New" onclick="window.location=\''. $PHP_SELF .'?ImageID=0\'" />'; ?>
		</td>
		<td align="right">
<?php
if ( $showimage ) echo '<input type="submit" name="UpdateImage" value="Save" />';
else echo '<input type="submit" name="InsertImage" value="Save" />';
?>
			<input type="reset" value="Reset" />
			<?php if ($showimage) echo '<input type="submit" name="DeleteImage" value="Delete" onclick="return confirm(\'Are you sure you want to permenently delete &quot;'. $image['Title'] .'&quot;? This operation cannot be undone.\');" />'; ?>
		</td>
	</tr>
</form>
</table>

<?php

echo '</div>';

print_foot();
?>