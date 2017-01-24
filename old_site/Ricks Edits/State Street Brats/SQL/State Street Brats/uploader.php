<?php
/*	MythicCMS v0.1, created by Corey Caswick
 *	Copyright © 2009 Mythic Web Design <http://www.mythicwebdesign.com/>
 */

global $db;

// PROCESS REQUESTS
// ...for images
if ($_POST['UpdateImage']) {	/* Update existing record */
	// Prepare data
	if (!array_key_exists('Show', $_POST['Image'])) $_POST['Image']['Show'] = 0;
	// Perform database update
	if ( $result = $db->update('images', $_POST['Image'], 'WHERE ImageID = \'' . $_POST['Image']['ImageID'] . '\'') ) {
		$status = 1;
	}
	else $status = 0;
}
elseif ($_POST['InsertImage']) {	/* Create new record */
	// Prepare data
	$_POST['Image']['DateCreated'] = date(_DB_DATE_FORMAT);
	$_POST['Image']['Filename'] = $_FILES['FileUpload']['name'];
	if (!array_key_exists('Show', $_POST['Image'])) $_POST['Image']['Show'] = 0;
	// Perform database update
	if ( $result = $db->insert('images', $_POST['Image']) ) {
		// Deal with file upload
		if (array_key_exists('FileUpload', $_FILES)) {
			$savepath = _IMGDIR . 'art/' . $db->getInsertID() . '/';
			if ( procUpload('FileUpload', $savepath) ) {
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
		if ( unlink(_IMGDIR . 'art/' . $_POST['Image']['ImageID'] . '/' . $_POST['Image']['Filename'] ) ) {
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
if ( $imagelist = $db->select('images', '*, UNIX_TIMESTAMP(DateCreated) AS DateCreated, UNIX_TIMESTAMP(DateModified) AS DateModified', 'ORDER BY `Title` ASC') ) {
	?>

<table class="adminList" border="0" cellspacing="0" cellpadding="0">
<thead>
	<tr>
		<th title="Category">Category</th>
		<th title="Image Title">Image</th>
		<th title="Date of Last Update">Last Update</th>
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
			. '<td><a href="/admin/images?ImageID='.$image['ImageID'].'">'
		;
		echo htmlspecialchars(getCatName($image['CategoryID']));
		echo '</a></td>'
			. '<td><a href="/admin/images?ImageID='.$image['ImageID'].'">'
			. htmlspecialchars(substr($image['Title'], 0, 40)) 
			. '</a></td>'
			. '<td><a href="/admin/images?ImageID='.$image['ImageID'].'">'
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
<form enctype="multipart/form-data" action="/admin/images" method="post">
	<input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
	<tr>
		<td>File:</td>
		<td>
<?php 
	if ($showimage) {
		echo '
<input type="hidden" name="Image[ImageID]" value="'. $image['ImageID'] .'" />
<input type="hidden" name="Image[Filename]" value="'. $image['Filename'] .'" />
<img src="'. _ROOTDIR .'thumbnail.php?img='. _IMGDIR . 'art/' . $image['ImageID'] .'/'. $image['Filename'] . '&width=100&height=100" width="100" height="100" />
		';
	}
	else echo '<input type="file" name="FileUpload" id="FileUpload" />';
?>
		</td>
	</tr><tr>
		<td><label for="Image[Title]">Title:</label></td>
		<td><input type="text" name="Image[Title]" id="Image[Title]" value="<?php echo htmlspecialchars($image['Title']) ?>" size="60" /></td>
	</tr><tr>
		<td><label for="Image[Dimensions]">Dimensions:</label></td>
		<td><input type="text" name="Image[Dimensions]" id="Image[Dimensions]" value="<?php echo htmlspecialchars($image['Dimensions']) ?>" size="20" /></td>
	</tr><tr>
		<td><label for="Image[Media]">Media:</label></td>
		<td><input type="text" name="Image[Media]" id="Image[Media]" value="<?php echo htmlspecialchars($image['Media']) ?>" size="20" /></td>
	</tr><tr>
		<td><label for="Image[Price]">Price:</label></td>
		<td>
			<input type="text" name="Image[Price]" id="Image[Price]" value="<?php echo htmlspecialchars($image['Price']) ?>" size="10" />
<?php if ($showimage) { ?>
		<?php print_check('Image[ForSale]', '1', $image['ForSale']) ?> <label for="Image[ForSale]">For Sale</label>
		<?php print_check('Image[Sold]', '1', $image['Sold']) ?> <label for="Image[Sold]">Sold</label>
<?php } else { ?>
		<?php print_check('Image[ForSale]', '1', '1') ?> <label for="Image[ForSale]">For Sale</label>
		<?php print_check('Image[Sold]', '1', '0') ?> <label for="Image[Sold]">Sold</label>
<?php } ?>
		</td>
	</tr><tr>
		<td><label for="Image[PrintDim]">Print Dimensions:</label></td>
		<td><input type="text" name="Image[PrintDim]" id="Image[PrintDim]" value="<?php echo htmlspecialchars($image['PrintDim']) ?>" size="20" /></td>
	</tr><tr>
		<td><label for="Image[Price]">Print Price:</label></td>
		<td><input type="text" name="Image[PrintPrice]" id="Image[PrintPrice]" value="<?php echo htmlspecialchars($image['PrintPrice']) ?>" size="10" /></td>
	</tr>
<?php if ($showimage) { ?>
	<tr>
		<td>Created:</td>
		<td><?php echo date(_DATE_FORMAT, $image['DateCreated']) ?></td>
	</tr><tr>
		<td>Last Modified:</td>
		<td><?php echo date(_DATE_FORMAT, $image['DateModified']) ?></td>
	</tr><tr>
		<td colspan="2"><?php print_check('Image[Show]', '1', $image['Show']) ?> <label for="Image[Show]">Show</label> in <?php print_cat_select('Image', $image['CategoryID'])?></td>
	</tr>
<?php } else { ?>
	<tr>
		<td colspan="2"><?php print_check('Image[Show]', '1', '1') ?> <label for="Image[Show]">Show</label> in <?php print_cat_select('Image', $image['CategoryID'])?></td>
	</tr>
<?php } ?>
	<tr>
		<td colspan="2">
			<textarea id="Image[Description]" name="Image[Description]" class="ckeditor"><?php echo $image['Description'] ?></textarea>
		</td>
	</tr><tr>
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