<div class="table-responsive">
    <?php if(@count($sources) > 0): ?>
    <table id="demo-foo-addrow" class="table m-t-0 m-b-0 table-hover no-wrap contact-list" data-page-size="10">
        <thead>
            <tr>
                <th class="sources_col_name"><?php echo e(cleanLang(__('lang.name'))); ?></th>
                <th class="sources_col_date"><?php echo e(cleanLang(__('lang.date_created'))); ?></th>
                <th class="sources_col_created_by"><?php echo e(cleanLang(__('lang.created_by'))); ?></th>
                <th class="sources_col_action"><a href="javascript:void(0)"><?php echo e(cleanLang(__('lang.action'))); ?></a></th>
            </tr>
        </thead>
        <tbody id="sources-td-container">
            <!--ajax content here-->
            <?php echo $__env->make('pages.settings.sections.sources.table.ajax', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!--ajax content here-->
        </tbody>
        <tfoot>
            <tr>
                <td colspan="20">
                    <!--load more button-->
                    <?php echo $__env->make('misc.load-more-button', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <!--load more button-->
                </td>
            </tr>
        </tfoot>
    </table>
    <?php endif; ?>
    <?php if(@count($sources) == 0): ?>
    <!--nothing found-->
    <?php echo $__env->make('notifications.no-results-found', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--nothing found-->
    <?php endif; ?>
</div><?php /**PATH /home/htmlbask/public_html/dashboard/application/resources/views/pages/settings/sections/sources/table/table.blade.php ENDPATH**/ ?>