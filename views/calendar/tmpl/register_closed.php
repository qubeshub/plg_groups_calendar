<?php
/**
 * @package    hubzero-cms
 * @copyright  Copyright 2005-2019 HUBzero Foundation, LLC.
 * @license    http://opensource.org/licenses/MIT MIT
 */

// No direct access
defined('_HZEXEC_') or die();

$year  = date("Y", strtotime($this->event->get('publish_up')));
$month = date("m", strtotime($this->event->get('publish_up')));
?>

<?php if ($this->getError()) { ?>
	<p class="error"><?php echo $this->getError(); ?></p>
<?php } ?>

<ul id="page_options">
	<li>
		<a class="icon-date btn date" title="" href="<?php echo Route::url('index.php?option='.$this->option.'&cn='.$this->group->cn.'&active=calendar&year='.$year.'&month='.$month); ?>">
			<?php echo Lang::txt('Back to Calendar'); ?>
		</a>
	</li>
</ul>

<div class="event-title-bar">
	<span class="event-title">
		<?php echo $this->event->get('title'); ?>
	</span>
	<?php if ($this->user->get('id') == $this->event->get('created_by') || $this->authorized == 'manager') : ?>
		<a class="delete" href="<?php echo Route::url('index.php?option='.$this->option.'&cn='.$this->group->get('cn').'&active=calendar&action=delete&event_id='.$this->event->get('id')); ?>">
			Delete
		</a>
		<a class="edit" href="<?php echo Route::url('index.php?option='.$this->option.'&cn='.$this->group->get('cn').'&active=calendar&action=edit&event_id='.$this->event->get('id')); ?>">
			Edit
		</a>
	<?php endif; ?>
</div>

<div class="event-sub-menu">
	<ul>
		<li>
			<a href="<?php echo Route::url('index.php?option='.$this->option.'&cn='.$this->group->get('cn').'&active=calendar&action=details&event_id='.$this->event->get('id')); ?>">
				<span><?php echo Lang::txt('Details'); ?></span>
			</a>
		</li>
		<?php if ($this->event->get('registerby') && $this->event->get('registerby') != '0000-00-00 00:00:00') : ?>
			<li class="active">
				<a href="<?php echo Route::url('index.php?option='.$this->option.'&cn='.$this->group->get('cn').'&active=calendar&action=register&event_id='.$this->event->get('id')); ?>">
					<span><?php echo Lang::txt('Register'); ?></span>
				</a>
			</li>
			<?php if ($this->user->get('id') == $this->event->get('created_by') || $this->authorized == 'manager') : ?>
				<li>
					<a href="<?php echo Route::url('index.php?option='.$this->option.'&cn='.$this->group->get('cn').'&active=calendar&action=registrants&event_id='.$this->event->get('id')); ?>">
						<span><?php echo Lang::txt('Registrants ('.$this->registrants.')'); ?></span>
					</a>
				</li>
			<?php endif; ?>
		<?php endif; ?>
	</ul>
	<div class="clear"></div>
</div>

<form action="index.php" id="hubForm">
	<p class="warning">
		<?php echo Lang::txt('Registration is closed for this event.'); ?>
	</p>
</form>