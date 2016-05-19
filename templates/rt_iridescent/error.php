<?php
/**
* @version   $Id: error.php 24734 2014-12-16 13:11:56Z arifin $
* @author    RocketTheme http://www.rockettheme.com
* @copyright Copyright (C) 2007 - 2014 RocketTheme, LLC
* @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
*
* Gantry uses the Joomla Framework (http://www.joomla.org), a GNU/GPLv2 content management system
*
*/
defined( '_JEXEC' ) or die( 'Restricted access' );

// Load and Inititialize Gantry Class
global $gantry;
require_once(dirname(__FILE__) . '/lib/gantry/gantry.php');
$gantry->init();

// Load Mootools
JHTML::_('behavior.framework', true);

$doc = JFactory::getDocument();
$app = JFactory::getApplication();

// Less Variables
$lessVariables = array(
    'accent-color1'                 => $gantry->get('accent-color1',                '#0085F6'),
    'accent-color2'                 => $gantry->get('accent-color2',                '#F66E7E'),

    'pagesurround-background'       => $gantry->get('pagesurround-background',      '#E8E8E8'),

    'mainbody-overlay'              => $gantry->get('mainbody-overlay',             'light'),

    'header-textcolor'              => $gantry->get('header-textcolor',             '#FFFFFF'),
    'header-background'             => $gantry->get('header-background',            '#DF172E'),
    'header-type'                   => $gantry->get('header-type',                  'normal'),

    'slideshow-textcolor'           => $gantry->get('slideshow-textcolor',          '#FFFFFF'),
    'slideshow-overlaybackground'   => $gantry->get('slideshow-overlaybackground',  '#000000'),
    'slideshow-overlayopacity'      => $gantry->get('slideshow-overlayopacity',     '0.5'),

    'top-textcolor'                 => $gantry->get('top-textcolor',                '#666666'),
    'top-background'                => $gantry->get('top-background',               '#FFFFFF'),

    'showcase-textcolor'            => $gantry->get('showcase-textcolor',           '#7E7E7E'),
    'showcase-background'           => $gantry->get('showcase-background',          '#000000'),

    'breadcrumb-textcolor'          => $gantry->get('breadcrumb-textcolor',         '#666666'),
    'breadcrumb-background'         => $gantry->get('breadcrumb-background',        '#FFFFFF'),

    'feature-textcolor'             => $gantry->get('feature-textcolor',            '#FFFFFF'),
    'feature-background'            => $gantry->get('feature-background',           '#DF172E'),

    'utility-textcolor'             => $gantry->get('utility-textcolor',            '#FFFFFF'),
    'utility-background'            => $gantry->get('utility-background',           '#222222'),

    'extension-textcolor'           => $gantry->get('extension-textcolor',          '#FFFFFF'),
    'extension-background'          => $gantry->get('extension-background',         '#DF172E'),

    'bottom-textcolor'              => $gantry->get('bottom-textcolor',             '#7E7E7E'),
    'bottom-background'             => $gantry->get('bottom-background',            '#000000'),

    'footer-textcolor'              => $gantry->get('footer-textcolor',             '#7E7E7E'),
    'footer-background'             => $gantry->get('footer-background',            '#000000'),

    'copyright-textcolor'           => $gantry->get('copyright-textcolor',          '#7E7E7E'),
    'copyright-background'          => $gantry->get('copyright-background',         '#000000')
);

$gantry->addStyle('grid-responsive.css', 5);
$gantry->addLess('bootstrap.less', 'bootstrap.css', 6);
$gantry->addLess('error.less', 'error.css', 4, $lessVariables);

// Scripts
if ($gantry->browser->name == 'ie'){
	if ($gantry->browser->shortversion == 8){
		$gantry->addScript('html5shim.js');
		$gantry->addScript('placeholder-ie.js');
	}
	if ($gantry->browser->shortversion == 9){
		$gantry->addInlineScript("if (typeof RokMediaQueries !== 'undefined') window.addEvent('domready', function(){ RokMediaQueries._fireEvent(RokMediaQueries.getQuery()); });");
		$gantry->addScript('placeholder-ie.js');
	}
}
if ($gantry->get('layout-mode', 'responsive') == 'responsive') $gantry->addScript('rokmediaqueries.js');

ob_start();
?>
<body id="rt-error" <?php echo $gantry->displayBodyTag(); ?>>
	<div id="rt-page-surround">
		<header id="rt-header-surround">
			<div id="rt-header">
				<div class="rt-container">
					<div class="rt-flex-container">
						<?php echo $gantry->displayModules('header','standard','standard'); ?>
						<div class="clear"></div>
					</div>
				</div>
			</div>
		</header>

		<section id="rt-showcase-surround">
			<div id="rt-showcase">
				<div class="rt-container">
					<div class="rt-flex-container">
						<div class="rt-error-body">
							<div class="rt-error-header">
								<div class="rt-error-code"><?php echo $this->error->getCode(); ?></div>
								<div class="rt-error-code-desc"><?php echo $this->error->getMessage(); ?></div>
							</div>
							<div class="rt-error-content">
								<div class="rt-error-title"><?php echo JText::_("RT_ERROR_TITLE"); ?></div>
								<div class="rt-error-message"><?php echo JText::_("RT_ERROR_MESSAGE"); ?></div>
								<div class="rt-error-button"><a href="<?php echo $gantry->baseUrl; ?>" class="readon"><span><?php echo JText::_("RT_ERROR_HOME"); ?></span></a></div>
							</div>
							<div class="clear"></div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<footer id="rt-footer-surround">
				<div id="rt-copyright">
					<div class="rt-container">
						<div class="rt-flex-container">
							<?php echo $gantry->displayModules('copyright','standard','standard'); ?>
							<div class="clear"></div>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>
</body>
</html>
<?php

$body = ob_get_clean();
$gantry->finalize();

require_once(JPATH_LIBRARIES.'/joomla/document/html/renderer/head.php');
$header_renderer = new JDocumentRendererHead($doc);
$header_contents = $header_renderer->render(null);
ob_start();
?>
<!doctype html>
<html xml:lang="<?php echo $gantry->language; ?>" lang="<?php echo $gantry->language;?>" >
<head>
	<?php echo $header_contents; ?>
	<?php if ($gantry->get('layout-mode') == '960fixed') : ?>
	<meta name="viewport" content="width=960px">
	<?php elseif ($gantry->get('layout-mode') == '1200fixed') : ?>
	<meta name="viewport" content="width=1200px">
	<?php else : ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php endif; ?>
</head>
<?php
$header = ob_get_clean();
echo $header.$body;