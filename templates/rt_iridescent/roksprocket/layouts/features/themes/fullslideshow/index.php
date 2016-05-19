<?php
/**
 * @version   $Id: index.php 24732 2014-12-16 12:48:18Z arifin $
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2014 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */

/**
 * @var $layout     RokSprocket_Layout_Features
 * @var $items      RokSprocket_Item[]
 * @var $parameters RokCommon_Registry
 */

?>
<div class="sprocket-features layout-fullslideshow <?php echo ($parameters->get('features_show_arrows')=='onhover') ? " arrows-onhover" : ""; ?>" data-fullslideshow="<?php echo $parameters->get('module_id'); ?>">
	<ul id="sprocket-features-img-list" class="sprocket-features-img-list">
		<?php
			$index = 0;
			foreach($items as $item){
				$index++;
				echo $layout->getThemeContext()->load('item.php', array('item'=> $item,'parameters'=>$parameters,'index'=>$index,'layout'=>$layout));
			}
		?>
	</ul>
	<?php if ($parameters->get('features_show_arrows')!='hide') : ?>
	<div class="sprocket-features-arrows">
		<span class="arrow next" data-fullslideshow-next></span>
		<span class="arrow prev" data-fullslideshow-previous></span>
	</div>
	<?php endif; ?>
	<div class="sprocket-features-pagination<?php echo !$parameters->get('features_show_pagination') ? '-hidden' : '';?>">
		<ul>
		<?php $i = 0; foreach ($items as $item): ?>
			<?php
				$class = (!$i) ? ' class="active"' : '';
				$i++;
			?>
	    	<li<?php echo $class; ?> data-fullslideshow-pagination="<?php echo $i; ?>"><span><?php echo $i; ?></span></li>
		<?php endforeach; ?>
		</ul>
	</div>
</div>
