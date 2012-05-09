<section id="admin-event-edit" class="event" data-event="<?php echo $event->id; ?>">
    <header>
        <ul class="breadcrumb">
            <li>
                <a href="<?php echo site_url('admin/events'); ?>"><?php echo lang('event-edit-title'); ?></a>
            </li>
        <?php if ($event->id): ?>
            <li class="active"><span class="divider">/</span><?php echo $event->title; ?></li>
        <?php endif; ?>
        </ul>
    </header>
    <div class="section-content">
        <?php $this->load->view('events/admin/event_form'); ?>
    </div>
</section>
