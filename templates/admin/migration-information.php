<?php
if (!defined('ABSPATH')) {
    exit;
}

/**
 * @var array $jigoshop All Jigoshop plugins.
 * @var array $rest Other plugins.
 * @var string $errors
 * @var string $info
 * @var string $phpVersion
 * @var array $overwrittenTemplateFiles
 * @var bool $isAllReady true when all client plugins is stable and ready for JS2
 */

?>
<style>
    button {
        background: none !important;
        border: none;
        padding: 0 !important;
        font-family: arial, sans-serif;
        color: #069;
        text-decoration: underline;
        cursor: pointer;
    }
</style>

<div class="wrap jigoshop jigoshop-migration-information-wrap">
    <h2><?php _e('Jigoshop Migration Information', 'jigoshop'); ?></h2>
    <?php if (isset($info) && !empty($info)): ?>
        <div style="border: 1px silver solid; background-color: #62c462; padding: 10px 16px 5px;">
            <?php echo $info; ?>
        </div>
    <?php endif; ?>
    <?php if (!defined('PHP_VERSION_ID') || PHP_VERSION_ID < 50600): ?>
        <div style="border: 1px silver solid; background-color: lightcoral; padding: 10px 16px 5px;margin-bottom:5px;">
            <p><?php echo "Your PHP version is below 5.6, you might experience issues while migrating to/using <strong>Jigoshop eCommerce</strong>"; ?></p>
            <p><?php echo "<strong>We strongly recommend updating your PHP version</strong>"; ?></p>
        </div>
        <?php $isAllReady = false; ?>
    <?php endif; ?>
    <?php if ($overwrittenTemplateFiles): ?>
        <div style="border: 1px silver solid; background-color: lightcoral; padding: 10px 16px 5px;margin-bottom:5px;">
            <?php echo "We detected that you have overwritten the following templates"; ?>
            <?php foreach ($overwrittenTemplateFiles as $override): ?>
                <?php foreach ($override as $key => $file): ?>
                    <p><?php echo $file; ?></p>
                <?php endforeach; ?>
            <?php endforeach; ?>
            <p><?php echo "Please note, that we do not use these files anymore - your custom changes <strong>will not be visible</strong> in the new version"; ?></p>
        </div>
        <?php $isAllReady = false; ?>
    <?php endif; ?>
    <?php if (isset($errors)): ?>
        <div style="border: 1px silver solid; background-color: lightcoral; padding: 10px 16px 5px;">
            <?php echo $errors; ?>
        </div>

    <?php else: ?>
        <?php if ($isAllReady): ?>
            <div style="border-radius: 4px; background-color: #62c462; color: white; padding: 8px;">
                <span style="font-size: 18px;">100% Compatible!</span><br><br>
                This summarizes your site's compatibility with the migration to Jigoshop eCommerce (previously Jigoshop
                2.0). We encourage our users to update to the newest version, as we will be ceasing to support Jigoshop
                1.x by the end of 2016. <b>We strongly recommend to create a full-site backup before migrating.</b>
            </div>
        <?php endif; ?>
        <table class="wp-list-tablef widefat striped posts" style="width: 100%">
            <thead>
            <tr>
                <th colspan="3"><h2><?php _e('Jigoshop Plugins', 'jigoshop') ?></h2></th>
            </tr>
            <tr>
                <th scope="col" style="width: 45%" class="manage-column column-title column-primary desc">
                    <span><?php _e('Name', 'jigoshop'); ?></span></th>
                <th scope="col" style="width: 35%" class="manage-column column-date desc">
                    <span><?php _e('Compatible for Jigoshop 2', 'jigoshop'); ?></span>
                </th>
                <th scope="col" style="width: 20%" class="manage-column column-date desc"><span><?php _e('Note',
                            'jigoshop'); ?></span></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($jigoshop as $k => $v): ?>
                <tr>
                    <td class="title column-title column-primary page-title">
                        <strong><?php echo esc_attr($v['name']); ?></strong>
                    </td>
                    <td>
                        <?php if ($v['js2Compatible'] == 'Yes'): ?>
                            <div
                                style="border-radius: 2px; background-color: #62c462; padding: 3px 5px; text-align: center; font-weight: bold; width: 80%"><?php _e('Yes, this plugin is fully compatible.',
                                    'jigoshop') ?></div>
                        <?php else: ?>
                            <div>
                                <form action="" method="POST">
                                    <input type="hidden" name="askPluginName"
                                           value="<?php echo esc_attr($v['name']); ?>">
                                    <input type="hidden" name="askRepoUrl"
                                           value="<?php echo esc_attr($v['repoUrl']); ?>">
                                    <button><?php _e('Ask our development team when the plugin will be ready.',
                                            'jigoshop') ?></button>
                                </form>
                            </div>
                        <?php endif; ?>
                    </td>
                    <td><?php echo $v['note']; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
            <tfoot>
            <tr>
                <th scope="col" class="manage-column column-title column-primary desc"><span><?php _e('Name',
                            'jigoshop') ?></span></th>
                <th scope="col" class="manage-column column-date desc"><span><?php _e('Compatible for Jigoshop 2',
                            'jigoshop') ?></span>
                </th>
                <th scope="col" class="manage-column column-date desc"><span><?php _e('Note', 'jigoshop') ?></span></th>
            </tr>
            </tfoot>
        </table>
        <table class="wp-list-table widefat striped posts" style="width: 100%">
            <thead>
            <tr>
                <th colspan="3"><h2><?php _e('Rest Of Your Plugins', 'jigoshop') ?></h2></th>
            </tr>
            <tr>
                <th scope="col" style="width: 45%" class="manage-column column-title column-primary desc">
                    <span><?php _e('Name', 'jigoshop') ?></span></th>
                <th scope="col" style="width: 55%" class="manage-column column-date desc"><span><?php _e('Note',
                            'jigoshop') ?></span>
                </th>
            </tr>
            </thead>
            <tbody>
            <?php if (!empty($rest)): ?>
                <?php foreach ($rest as $k => $v): ?>
                    <tr>
                        <td class="title column-title column-primary page-title">
                            <strong><?php echo $v['name']; ?></strong>
                        </td>
                        <td>
                            <div>
                                <form action="" method="POST">
                                    <input type="hidden" name="feedbackPluginName"
                                           value="<?php echo esc_attr($v['name']); ?>">
                                    <input type="hidden" name="feedbackSlug"
                                           value="<?php echo esc_attr($v['slug']); ?>">
                                    <button
                                        name="prepareFeedback"><?php _e('If you think this is a Jigoshop plugin, please let us know!',
                                            'jigoshop') ?></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
            <tfoot>
            <tr>
                <th scope="col" class="manage-column column-title column-primary desc"><span><?php _e('Name',
                            'jigoshop') ?></span></th>
                <th scope="col" class="manage-column column-date desc"><span><?php _e('Note', 'jigoshop') ?></span></th>
            </tr>
            </tfoot>
        </table>
    <?php endif; ?>
</div>
