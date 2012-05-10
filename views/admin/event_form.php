<form action="<?php echo current_url(); ?>" method="post" class="form-inline" accept-charset="utf-8">
    <div class="row-fluid">
        <div class="span8">
            <fieldset>
                <div class="control-group">
                    <label for="event-form-title" class="control-label text"><?php echo lang('event-field-title'); ?></label>
                    <div class="controls">
                        <input id="event-form-title" name="title"
                            type="text"
                            value="<?php echo set_value('title',$event->title); ?>"
                            class="text"
                            >
                    </div>
                </div>
                <!--<div class="control-group">
                    <label for="event-form-category" class="select"><?php //echo lang('event-field-category'); ?></label>
                    <div class="controls">
                        <input id="event-form-category" name="category"
                            type="text"
                            value="<?php //echo set_value('category', $event->category ? $event->category->category : NULL ); ?>"
                            autocomplete="off"
                            data-provide="typeahead"
                            data-source='<?php
                                //$opts = array();
                                //foreach ($categories as $c) $opts[] = $c->category;
                                //echo json_encode($opts);
                                ?>'
                            class="text"
                            >
                    </div>
                </div>-->
                <div class="control-group">
                    <label for="event-form-content" class="control-label textarea"><?php echo lang('event-field-content'); ?></label>
                    <div class="controls">
                        <?php $this->load->view('wysihtml5/toolbar_full'); ?>
                        <textarea id="event-form-content" name="content"
                            rows="16" cols="40"
                            data-role="editor"
                            style="width:100%"
                            ><?php echo set_value('content', $event->content); ?></textarea>
                    </div>
                </div>
            </fieldset>
        </div>
        <div class="span4">
            <fieldset class="well">
                <div class="control-group btn-toolbar">
                    <label for="event-form-start" class="text"><?php echo lang('event-field-start-date'); ?></label>
                    <div class="controls">
                        <input id="event-form-start-date" name="start-date"
                            type="text"
                            value="<?php echo set_value('start-date',local_date_format($event->start, 'Y/m/d')); ?>"
                            class="text input-small"
                        <?php if ( ! $event->is_published()): ?>
                            data-role="datepicker"
                        <?php else: ?>
                            disabled="disabled"
                        <?php endif; ?>
                            >
                        <input id="event-form-start-time" name="start-time"
                            type="text"
                            placeholder="12:00"
                            autocomplete="off"
                            value="<?php echo set_value('start-time',local_date_format($event->start, 'g:i A')); ?>"
                            class="text input-mini"
                        <?php if ( ! $event->is_published()): ?>
                            data-role="timepicker"
                        <?php else: ?>
                            disabled="disabled"
                        <?php endif; ?>
                            >
                    </div>
                </div>
                <div class="control-group btn-toolbar">
                    <label for="event-form-end" class="text"><?php echo lang('event-field-end-date'); ?></label>
                    <div class="controls">
                        <input id="event-form-end-date" name="end-date"
                            type="text"
                            value="<?php echo set_value('end-date',local_date_format($event->end, 'Y/m/d')); ?>"
                            class="text input-small"
                        <?php if ( ! $event->is_published()): ?>
                            data-role="datepicker"
                        <?php else: ?>
                            disabled="disabled"
                        <?php endif; ?>
                            >
                        <input id="event-form-end-time" name="end-time"
                            type="text"
                            placeholder="12:00"
                            autocomplete="off"
                            value="<?php echo set_value('end-time',local_date_format($event->end, 'g:i A')); ?>"
                            class="text input-mini"
                        <?php if ( ! $event->is_published()): ?>
                            data-role="timepicker"
                        <?php else: ?>
                            disabled="disabled"
                        <?php endif; ?>
                            >
                    </div>
                </div>
                <hr />
                <div class="control-group btn-toolbar">
                    <label for="event-form-publish" class="text"><?php echo lang('event-field-published_at'); ?></label>
                    <div class="controls">
                        <input id="event-form-publish" name="publish-date"
                            type="text"
                            placeholder="Draft"
                            value="<?php echo set_value('publish-date',local_date_format($event->published_at, 'Y/m/d')); ?>"
                            class="text input-small"
                        <?php if ( ! $event->is_published()): ?>
                            data-role="datepicker"
                        <?php else: ?>
                            disabled="disabled"
                        <?php endif; ?>
                            >
                        <input id="event-form-publish-time" name="publish-time"
                            type="text"
                            placeholder="12:00"
                            autocomplete="off"
                            value="<?php echo set_value('publish-time',local_date_format($event->published_at, 'g:i A')); ?>"
                            class="text input-mini"
                        <?php if ( ! $event->is_published()): ?>
                            data-role="timepicker"
                        <?php else: ?>
                            disabled="disabled"
                        <?php endif; ?>
                            >
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
    <div class="row">
        <fieldset class="form-actions">
            <input id="event-form-save"
                type="submit"
                value="<?php echo lang('form-btn-save'); ?>"
                class="submit btn btn-primary btn-large"
                >
            <input id="event-form-reset"
                type="reset"
                value="<?php echo lang('form-btn-reset'); ?>"
                class="reset btn"
                >
        </fieldset>
    </div>
</form>
