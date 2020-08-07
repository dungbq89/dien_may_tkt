<?php if ($field->isPartial()): ?>
    <?php include_partial('vtManageMenu/'.$name, array('vtp_menu' => $vtp_menu, 'form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?>
<?php elseif ($field->isComponent()): ?>
    <?php include_component('vtManageMenu', $name, array('form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?>
<?php else: ?>
    <div class="control-group <?php echo $class ?><?php $form[$name]->hasError() and print ' error' ?>">
        <?php
            $embed = $form->getEmbeddedForms();

        ?>

        <?php echo $form[$name]->renderLabel($label, array('class' => 'control-label')) ?>

        <div class="controls">
            <div class="field-content">
                <?php echo $form[$name]->render($attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes) ?>
                <?php
                    if ( $form[$name]->hasError() && !array_key_exists($name, $embed) )
                    {
                        echo '<span class="help-inline">'.$form[$name]->renderError().'</span>';
                    }
                ?>
            </div>

            <?php if ($help): ?>
                <p class="help-block"><?php echo __(strip_tags($help), array(), 'messages') ?></p>
            <?php elseif ($help = $form[$name]->renderHelp()): ?>
                <p class="help-block"><?php echo strip_tags($help) ?></p>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>