<script type="text/javascript">
    $(document).ready(function() {
        $("#modules_form").on("change","input:checkbox",function(event) {
            var request = $.ajax({
                        url: '/moduleadministration/modules_save_state/'
                                + '50' +
                                '/'
                                + (($(this).attr("checked")) ? true : false),
                        type: 'POST',
            })

            request.done(function(msg) {
                            $("#log").html(msg);
            });
            request.fail(function (jqXHR, textStatus) {
                            $("#log").html(textStatus);
            });
        });

    });
</script>

<div class="modules">
    <div class="message">
            <div id="log"></div>
    </div>
    <?= Form::open(array('action' => "/moduleadministration/modules_save_state",'name' => 'moduleadministration', 'id' => 'modules_form')); ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td><?= __('moduleadm.table.enabled') ?>    </td>
                    <td><?= __('moduleadm.table.name') ?>       </td>
                    <td><?= __('moduleadm.table.description') ?></td>
                    <td><?= __('moduleadm.table.configure') ?>  </td>
                </tr>
            </thead>
            <tbody>
                <? foreach($modules as $modul): ?>
                    <tr>
                        <td><?= Form::checkbox( $modul['id'], 'true', (($modul['enable'] === '1') ? true : false)); ?></td>
                        <td><?= $modul['name']; ?></td>
                        <td><?= $modul['description']; ?></td>
                        <td><?= Html::anchor('#', __('moduleadm.settings'), array(), $secure = null); ?></td>
                    </tr>
                <? endforeach; ?>
            </tbody>
        </table>
    <?= Form::close(); ?>
</div>