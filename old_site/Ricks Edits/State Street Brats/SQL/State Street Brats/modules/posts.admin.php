<?php
/*	MythicCMS v0.1, created by Corey Caswick
 *	Copyright © 2009 Mythic Web Design <http://www.mythicwebdesign.com/>
 */

global $db;

// PROCESS REQUESTS
// ...for posts
if ($_POST['UpdatePost']) {	/* Update existing record */
	// Perform database update
	if ( $result = $db->update('posts', $_POST['Post'], 'WHERE PostID = \'' . $_POST['Post']['PostID'] . '\'') ) {
		$status = 1;
	}
	else $status = 0;
}
elseif ($_POST['InsertPost']) {	/* Create new record */
	// Prepare data
	$_POST['Post']['DateCreated'] = date(_DB_DATE_FORMAT);
	// Perform database update
	if ( $result = $db->insert('posts', $_POST['Post']) ) {
		$status = 1;
	}
	else $status = 0;
}
elseif ($_POST['DeletePost']) {	/* Delete record */
	if ( $result = $db->delete('posts', 'WHERE PostID=\'' . $_POST['Post']['PostID'] . '\'') ) {
		$status = 1;
		unset($_POST['Post']);
	}
	else $status = 0;
}

// Check for selected post
if ( array_key_exists('PostID', $_GET) ) {					// Viewing a post
	$showpost = $_GET['PostID'];
}
elseif ( array_key_exists('Post', $_POST) ) {				// After processing a request
	if ( array_key_exists('PostID', $_POST['Post']) ) {
		$showpost = $_POST['Post']['PostID'];			// After update
	}
	else $showpost = $db->getInsertID();					// After insert, obviously
}
else $showpost = FALSE;									// No post selected

// List posts
echo '<div id="panelList">';
if ( $postlist = $db->select('posts', '*, UNIX_TIMESTAMP(DateCreated) AS DateCreated, UNIX_TIMESTAMP(DateModified) AS DateModified', 'ORDER BY `DateCreated` ASC') ) {
	?>

<table class="adminList" border="0" cellspacing="0" cellpadding="0">
<thead>
	<tr>
		<th title="Headline">Headline</th>
		<th title="Date">Date</th>
	</tr>
</thead>
<tbody>
	<?php
	// Prepare count
	$i = 0;
	while ( $post = $db->getRow($postlist) ) {
		// Determine row style
		if ($showpost == $post['PostID']) {
			$rowClass = 'selectedRow';
			++$i;
		}
		else $rowClass = 'row' . (++$i % 2);
		// Print row
		echo '		<tr class="'. $rowClass .'">'
			. '<td><a href="/admin/posts?PostID='.$post['PostID'].'">'
			. htmlspecialchars(substr($post['Title'], 0, 40)) 
			. '</a></td>'
			. '<td><a href="/admin/posts?PostID='.$post['PostID'].'">'
			. date(_DATE_FORMAT, $post['DateCreated']) 
			. '</a></td>'
			. '</tr>'
		;
	}
	?>
</tbody>
</table>
	<?php
}
else echo '<p post="error">Error ' . mysql_errno() . ': ' . mysql_error() . '. Please try again. If this problem persists, please contact your administrator.</p>';

echo '</div>';

echo '<div id="panelEdit">';

// Display status of last operation performed
if (!empty($status)) {
	print_status($status);
}

// Edit form
if ($showpost) {
	$db->select('posts', '*, UNIX_TIMESTAMP(DateCreated) AS DateCreated, UNIX_TIMESTAMP(DateModified) AS DateModified', 'WHERE PostID = \'' . $showpost . '\'');
	$post = $db->getRow();
}
?>

<table class="adminForm" border="0">
<form action="/admin/posts" method="post">
<?php if ($showpost) echo '<input type="hidden" name="Post[PostID]" value="'. $post['PostID'] .'" />'; ?>
	<tr>
		<td><label for="Post[Title]">Headline:</label></td>
		<td><input type="text" name="Post[Title]" id="Post[Title]" value="<?php echo htmlspecialchars($post['Title']) ?>" size="60" onchange="updateAddressFromTitle()" /></td>
	</tr>
<!--
	<tr>
		<td><label for="Post[URI]">Address:</label></td>
		<td>http://<?php echo $_SERVER['SERVER_NAME'] ?>/<input type="text" name="Post[URI]" id="Post[URI]" value="<?php echo htmlspecialchars($post['URI']) ?>" size="22" onchange="updateAddressFromSelf()" /></td>
	</tr>
-->
<?php if ($showpost) { ?>
	<tr>
		<td>Created:</td>
		<td><?php echo date(_DATE_FORMAT, $post['DateCreated']) ?></td>
	</tr><tr>
		<td>Last Modified:</td>
		<td><?php echo date(_DATE_FORMAT, $post['DateModified']) ?></td>
	</tr>
<?php } ?>
	<tr>
		<td colspan="2">
<?php echo '<textarea id="Post[Content]" name="Post[Content]" class="ckeditor">'. htmlspecialchars($post['Content']) .'</textarea>'; ?>
		</td>
	</tr><tr>
		<td align="left">
			<?php if ($showpost) echo '<input type="button" name="BlankPost" value="New" onclick="window.location=\''. $PHP_SELF .'?PostID=0\'" />'; ?>
		</td>
		<td align="right">
<?php
if ( $showpost ) echo '<input type="submit" name="UpdatePost" value="Save" />';
else echo '<input type="submit" name="InsertPost" value="Save" />';
?>
			<input type="reset" value="Reset" />
			<?php if ($showpost) echo '<input type="submit" name="DeletePost" value="Delete" onclick="return confirm(\'Are you sure you want to permenently delete &quot;'. $post['Title'] .'&quot;? This operation cannot be undone.\');" />'; ?>
		</td>
	</tr>
</form>
</table>

<?php

echo '</div>';

print_foot();
?>