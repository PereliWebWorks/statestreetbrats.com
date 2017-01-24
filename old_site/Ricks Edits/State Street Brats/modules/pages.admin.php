<?php
/*	MythicCMS v0.1, created by Corey Caswick
 *	Copyright © 2009 Mythic Web Design <http://www.mythicwebdesign.com/>
 */

global $db;

// PROCESS REQUESTS
// ...for pages
if ($_POST['UpdatePage']) {	/* Update existing record */
	// Prepare data
	if (!array_key_exists('InMenu', $_POST['Page'])) $_POST['Page']['InMenu'] = 0;
	// Perform database update
	if ( $result = $db->update('pages', $_POST['Page'], 'WHERE PageID = \'' . $_POST['Page']['PageID'] . '\'') ) {
		$status = 1;
	}
	else $status = 0;
}
elseif ($_POST['InsertPage']) {	/* Create new record */
	// Prepare data
	$_POST['Page']['DateCreated'] = date(_DB_DATE_FORMAT);
	if (!array_key_exists('InMenu', $_POST['Page'])) $_POST['Page']['InMenu'] = 0;
	// Perform database update
	if ( $result = $db->insert('pages', $_POST['Page']) ) {
		$status = 1;
	}
	else $status = 0;
}
elseif ($_POST['DeletePage']) {	/* Delete record */
	if ( $result = $db->delete('pages', 'WHERE PageID=\'' . $_POST['Page']['PageID'] . '\'') ) {
		$status = 1;
		unset($_POST['Page']);
	}
	else $status = 0;
}

// Check for selected page
if ( array_key_exists('PageID', $_GET) ) {					// Viewing a page
	$showpage = $_GET['PageID'];
}
elseif ( array_key_exists('Page', $_POST) ) {				// After processing a request
	if ( array_key_exists('PageID', $_POST['Page']) ) {
		$showpage = $_POST['Page']['PageID'];			// After update
	}
	else $showpage = $db->getInsertID();					// After insert, obviously
}
else $showpage = FALSE;									// No page selected

// List pages
echo '<div id="panelList">';
if ( $pagelist = $db->select('pages', '*, UNIX_TIMESTAMP(DateCreated) AS DateCreated, UNIX_TIMESTAMP(DateModified) AS DateModified', 'WHERE `ContentLocked`=0 ORDER BY `InMenu` ASC, `MenuPosition` ASC') ) {
	?>

<table class="adminList" border="0" cellspacing="0" cellpadding="0">
<thead>
	<tr>
		<th title="Menu Position">&nbsp;</th>
		<th title="Page Title">Page</th>
		<th title="Date of Last Update">Last Update</th>
	</tr>
</thead>
<tbody>
	<?php
	// Prepare count
	$i = 0;
	while ( $page = $db->getRow($pagelist) ) {
		// Determine row style
		if ($showpage == $page['PageID']) {
			$rowClass = 'selectedRow';
			++$i;
		}
		else $rowClass = 'row' . (++$i % 2);
		// Print row
		echo '		<tr class="'. $rowClass .'">'
			. '<td><a href="/admin/pages?PageID='.$page['PageID'].'">'
		;
		if ($page['InMenu']) echo htmlspecialchars($page['MenuPosition']);
		else echo '*';
		echo '</a></td>'
			. '<td><a href="/admin/pages?PageID='.$page['PageID'].'">'
			. htmlspecialchars(substr($page['Title'], 0, 40)) 
			. '</a></td>'
			. '<td><a href="/admin/pages?PageID='.$page['PageID'].'">'
			. date(_DATE_FORMAT_SHORT, $page['DateModified']) 
			. '</a></td>'
			. '</tr>'
		;
	}
	?>
</tbody>
</table>
	<?php
}
else echo '<p page="error">Error ' . mysql_errno() . ': ' . mysql_error() . '. Please try again. If this problem persists, please contact your administrator.</p>';

echo '</div>';

echo '<div id="panelEdit">';

// Display status of last operation performed
if (!empty($status)) {
	print_status($status);
}

// Edit form
if ($showpage) {
	$db->select('pages', '*, UNIX_TIMESTAMP(DateCreated) AS DateCreated, UNIX_TIMESTAMP(DateModified) AS DateModified', 'WHERE PageID = \'' . $showpage . '\'');
	$page = $db->getRow();
}
?>

<table class="adminForm" border="0">
<form action="/admin/pages" method="post">
<?php if ($showpage) echo '<input type="hidden" name="Page[PageID]" value="'. $page['PageID'] .'" />'; ?>
	<tr>
		<td><label for="Page[Title]">Title:</label></td>
		<td><input type="text" name="Page[Title]" id="Page[Title]" value="<?php echo htmlspecialchars($page['Title']) ?>" size="60" onchange="updateAddressFromTitle()" /></td>
	</tr><tr>
		<td><label for="Page[URI]">Address:</label></td>
		<td>http://<?php echo $_SERVER['SERVER_NAME'] ?>/<input type="text" name="Page[URI]" id="Page[URI]" value="<?php echo htmlspecialchars($page['URI']) ?>" size="22" onchange="updateAddressFromSelf()" /></td>
<?php if ($showpage) { ?>
	</tr><tr>
		<td>Created:</td>
		<td><?php echo date(_DATE_FORMAT, $page['DateCreated']) ?></td>
	</tr><tr>
		<td>Last Modified:</td>
		<td><?php echo date(_DATE_FORMAT, $page['DateModified']) ?></td>
	</tr><tr>
		<td colspan="2"><?php print_check('Page[InMenu]', '1', $page['InMenu']) ?> <label for="Page[InMenu]">Show in menu</label> <label for="Page[MenuPosition]">at position:</label> <input type="text" name="Page[MenuPosition]" id="Page[MenuPosition]" value="<?php echo $page['MenuPosition'] ?>" size="4" /></td>
<?php } else { ?>
	</tr><tr>
		<td colspan="2"><?php print_check('Page[InMenu]', '1', '1') ?> <label for="Page[InMenu]">Show in menu</label> <label for="Page[MenuPosition]">at position:</label> <input type="text" name="Page[MenuPosition]" id="Page[MenuPosition]" value="<?php echo $page['MenuPosition'] ?>" size="4" /></td>
<?php } ?>
	</tr><tr>
		<td colspan="2">
<?php 
if ($page['ContentLocked']) {
	echo '<div style="width: 580px; height: 150px; padding: 3px; font-style: italic; color: #000000; border-style: solid; border-color: #000000; border-width: 1px; background-color: #eeeeee;">The content of this page is dynamically generated, and can not be edited manually. To make changes to this page, please contact your Web Developer.</div>';
}
else echo '<textarea id="Page[Content]" name="Page[Content]" class="ckeditor">'. htmlspecialchars($page['Content']) .'</textarea>';
?>
		</td>
	</tr><tr>
		<td align="left">
			<?php if ($showpage) echo '<input type="button" name="BlankPage" value="New" onclick="window.location=\''. $PHP_SELF .'?PageID=0\'" />'; ?>
		</td>
		<td align="right">
<?php
if ( $showpage ) echo '<input type="submit" name="UpdatePage" value="Save" />';
else echo '<input type="submit" name="InsertPage" value="Save" />';
?>
			<input type="reset" value="Reset" />
			<?php if ( ($showpage) && (!$page['ContentLocked']) && ($page['URI'] != 'index') ) echo '<input type="submit" name="DeletePage" value="Delete" onclick="return confirm(\'Are you sure you want to permenently delete &quot;'. $page['Title'] .'&quot;? This operation cannot be undone.\');" />'; ?>
		</td>
	</tr>
</form>
</table>

<?php

echo '</div>';

print_foot();
?>