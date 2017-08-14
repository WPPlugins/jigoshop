<?php
if (!defined('ABSPATH')) {
	exit;
}

?>

<?php if ($logs) : ?>
	<div id="log-viewer-select">
		<div class="alignleft">
			<h3><?php printf(__('Log file: %s (%s)', 'jigoshop'), esc_html($viewed_log), date_i18n(get_option('date_format').' '.get_option('time_format'), filemtime(JIGOSHOP_LOG_DIR.$viewed_log))); ?></h3>
		</div>
		<div class="alignright">
			<form action="<?php echo admin_url('admin.php?page=jigoshop_system_info&tab=logs'); ?>" method="post">
				<select name="log_file">
					<?php foreach ($logs as $log_key => $log_file) : ?>
						<option	value="<?php echo esc_attr($log_key); ?>" <?php selected(sanitize_title($viewed_log), $log_key); ?>><?php echo esc_html($log_file); ?>
							(<?php echo date_i18n(get_option('date_format').' '.get_option('time_format'), filemtime(JIGOSHOP_LOG_DIR.$log_file)); ?>
							)
						</option>
					<?php endforeach; ?>
				</select>
				<input type="submit" class="button" value="<?php esc_attr_e('View', 'jigoshop'); ?>" />
			</form>
		</div>
		<div class="clear"></div>
	</div>
	<div id="log-viewer">
		<textarea cols="70" rows="25"><?php echo esc_textarea(file_get_contents(JIGOSHOP_LOG_DIR.$viewed_log)); ?></textarea>
	</div>
<?php else : ?>
	<div class="updated jigoshop-message below-h2">
		<p><?php _e('There are currently no logs to view.', 'jigoshop'); ?></p></div>
<?php endif; ?>
