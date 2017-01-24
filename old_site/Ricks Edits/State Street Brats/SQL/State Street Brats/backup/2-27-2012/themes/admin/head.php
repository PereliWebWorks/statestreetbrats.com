<?php check_auth(); ?>
<script src="<?=_ROOTDIR . _SCRIPTDIR?>ckeditor/ckeditor.js" type="text/javascript"></script>
<script src="<?=_ROOTDIR . _SCRIPTDIR?>admin.js" type="text/javascript"></script>

<div id="adminHead">
	<h1><img src="<?=_ROOTDIR . _THEMEDIR?>admin/mythiccms_logo01.png" width="235" height="60" hspace="2" alt="MythicCMS, by Mythic Web Design" /></h1>
	<div class="title">Managing <?=_SITE_TITLE?></div>
	<?php printAdminMenu(); ?>
</div>
