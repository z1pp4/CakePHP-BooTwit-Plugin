<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Console.Templates.default.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<div class="row-fluid">
	<div class="span12 page-header">
		<h1><?php echo "<?php echo __('{$pluralHumanName}');?>";?></h1>
	</div>
</div>

<div class="row-fluid">
	<div class="actions well span3">
		<ul class="nav nav-list">
			<li class="nav-header"> <?php echo "<?php echo __('Actions'); ?>"; ?> </li>
			<li><?php echo "<?php echo \$this->Html->link(__('New " . $singularHumanName . "'), array('action' => 'add')); ?>";?></li>
		<?php
			$done = array();
			foreach ($associations as $type => $data) {
				foreach ($data as $alias => $details) {
					if ($details['controller'] != $this->name && !in_array($details['controller'], $done)) {
						echo "\t\t<li><?php echo \$this->Html->link(__('List " . Inflector::humanize($details['controller']) . "'), array('controller' => '{$details['controller']}', 'action' => 'index')); ?> </li>\n";
						echo "\t\t<li><?php echo \$this->Html->link(__('New " . Inflector::humanize(Inflector::underscore($alias)) . "'), array('controller' => '{$details['controller']}', 'action' => 'add')); ?> </li>\n";
						$done[] = $details['controller'];
					}
				}
			}
		?>
		</ul>
	</div>

	<div class="<?php echo $pluralVar;?> index span9">
		<table class="table table-striped table-bordered table-condensed" cellpadding="0" cellspacing="0">
		<tr>
		<?php  foreach ($fields as $field):?>
			<th><?php echo "<?php echo \$this->Paginator->sort('{$field}');?>";?></th>
		<?php endforeach;?>
			<th class="actions"><?php echo "<?php echo __('Actions');?>";?></th>
		</tr>
		<?php
		echo "<?php
		foreach (\${$pluralVar} as \${$singularVar}): ?>\n";
		echo "\t<tr>\n";
			foreach ($fields as $field) {
				$isKey = false;
				if (!empty($associations['belongsTo'])) {
					foreach ($associations['belongsTo'] as $alias => $details) {
						if ($field === $details['foreignKey']) {
							$isKey = true;
							echo "\t\t<td>\n\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t</td>\n";
							break;
						}
					}
				}
				if ($isKey !== true) {
					echo "\t\t<td><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>&nbsp;</td>\n";
				}
			}
			echo "\t\t<td class=\"actions btn-group\">\n";
			echo "\t\t\t<?php echo \$this->Html->link(__('View'), array('action' => 'view', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class'=>'btn')); ?>\n";
	 		echo "\t\t\t<?php echo \$this->Html->link(__('Edit'), array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']),array('class'=>'btn')); ?>\n";
	 	 	echo "\t\t\t<?php echo \$this->Form->postLink(__('Delete'), array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class'=>'btn'), __('Are you sure you want to delete # %s?', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>\n";
			echo "\t\t</td>\n";
		echo "\t</tr>\n";
	
		echo "<?php endforeach; ?>\n";
		?>
		</table>
		<div class="alert alert-info">
		<p>
		<?php echo "<?php
		echo \$this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
		));
		?>";?>
		</p>
		</div>

		<div class="pagination">
		<ul>
        		<?php
                		echo "<?php\n";
                		echo "\t\techo \$this->Paginator->prev('< ' . __('previous'), array('tag' => 'li'), null, array('class' => 'previous disabled'));\n";
                		echo "\t\techo \$this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentClass' => 'active'));\n";
                		echo "\t\techo \$this->Paginator->next(__('next') . ' >', array('tag' => 'li'), null, array('class' => 'next disabled'));\n";
                		echo "\t?>\n";
        		?>
		</ul>
        	</div>
	</div>
</div>
