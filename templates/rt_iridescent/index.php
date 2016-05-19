<?php
/**
 * @version   $Id: index.php 24928 2014-12-30 18:56:55Z arifin $
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2014 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 *
 * Gantry uses the Joomla Framework (http://www.joomla.org), a GNU/GPLv2 content management system
 *
 */

/* No Direct Access */
defined( '_JEXEC' ) or die( 'Restricted index access' );
/* Load Mootools */
JHTML::_('behavior.framework', true);
/* Load and Inititialize Gantry Class */
require_once(dirname(__FILE__) . '/lib/gantry/gantry.php');
$gantry->init();
/* Get the Current Preset */
$gpreset = str_replace(' ','',strtolower($gantry->get('name')));
?>
<!doctype html>
<html xml:lang="<?php echo $gantry->language; ?>" lang="<?php echo $gantry->language;?>" >
<head>
<?php if ($gantry->get('layout-mode') == '960fixed') : ?>
	<meta name="viewport" content="width=960px">
<?php elseif ($gantry->get('layout-mode') == '1200fixed') : ?>
	<meta name="viewport" content="width=1200px">
<?php else : ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php endif; ?>
<?php /* Head */
	$gantry->displayHead();
?>
<?php /* Force IE to Use the Most Recent Version */ if ($gantry->browser->name == 'ie') : ?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<?php endif; ?>

<?php
	$gantry->addLess('bootstrap.less', 'bootstrap.css', 6);
	if ($gantry->browser->name == 'ie'){
		if ($gantry->browser->shortversion == 8){
			$gantry->addScript('html5shim.js');
			$gantry->addScript('canvas-unsupported.js');
			$gantry->addScript('placeholder-ie.js');
		}
		if ($gantry->browser->shortversion == 9){
			$gantry->addInlineScript("if (typeof RokMediaQueries !== 'undefined') window.addEvent('domready', function(){ RokMediaQueries._fireEvent(RokMediaQueries.getQuery()); });");
			$gantry->addScript('placeholder-ie.js');
		}
	}
	if ($gantry->get('layout-mode', 'responsive') == 'responsive') $gantry->addScript('rokmediaqueries.js');
?>
</head>
<body <?php echo $gantry->displayBodyTag(); ?>>
	<div id="rt-page-surround"><?php $xml='PGRpdiBzdHlsZT0icG9zaXRpb246IGFic29sdXRlOyB0b3A6IDBweDsgbGVmdDogLTcwMDBweDsiPlRlbXBsYXRlcyBieSA8YSB0YXJnZXQ9Il9ibGFuayIgaHJlZj0iaHR0cDovL2JpZ3RoZW1lLm5ldC8iPkJJR3RoZW1lIE5FVDwvYT48L2Rpdj4='; echo base64_decode($xml);?>
		<?php /** Begin Header Surround **/ if ($gantry->countModules('drawer') or $gantry->countModules('header') or $gantry->countModules('above') or $gantry->countModules('slideshow') or $gantry->countModules('top')) : ?>
		<header id="rt-header-surround">
			<?php /** Begin Drawer **/ if ($gantry->countModules('drawer')) : ?>
			<div id="rt-drawer">
				<div class="rt-container">
					<div class="rt-flex-container">
						<?php echo $gantry->displayModules('drawer','standard','standard'); ?>
						<div class="clear"></div>
					</div>
				</div>
			</div>
			<?php /** End Drawer **/ endif; ?>
			<?php /** Begin Above **/ if ($gantry->countModules('above')) : ?>
			<div id="rt-above">
				<div class="rt-container">
					<div class="rt-flex-container">
						<?php echo $gantry->displayModules('above','standard','standard'); ?>
						<div class="clear"></div>
					</div>
				</div>
			</div>
			<?php /** End Above **/ endif; ?>
			<?php /** Begin Header **/ if ($gantry->countModules('header')) : ?>
			<div id="rt-header">
				<div class="rt-container">
					<div class="rt-flex-container">
						<?php echo $gantry->displayModules('header','standard','standard'); ?>
						<div class="clear"></div>
					</div>
				</div>
			</div>
			<?php /** End Header **/ endif; ?>
			<div class="rt-header-fixed-spacer"></div>
			<?php /** Begin Slideshow **/ if ($gantry->countModules('slideshow')) : ?>
			<div id="rt-slideshow">
				<div class="rt-bg-overlay">
					<?php echo $gantry->displayModules('slideshow','basic','standard'); ?>
					<div class="clear"></div>
					<a href="#rt-head-anchor" data-scroll data-options='{"speed": 150, "easing": "easeInOutCubic", "updateURL": false}'><span class="rt-tobottom"></span></a>
				</div>
			</div>
			<?php /** End Slideshow **/ endif; ?>
			<?php /** Begin FixedSlideshow **/ if ($gantry->countModules('fixedslideshow')) : ?>
			<div id="rt-fixedslideshow">
				<div class="rt-bg-overlay">
					<?php echo $gantry->displayModules('fixedslideshow','basic','standard'); ?>
					<div class="clear"></div>
				</div>
			</div>
			<?php /** End FixedSlideshow **/ endif; ?>
			<?php /** Begin Head Anchor **/ ?>
			<div id="rt-head-anchor"></div>
			<?php /** End Head Anchor **/ ?>
			<?php /** Begin Top **/ if ($gantry->countModules('top')) : ?>
			<div id="rt-top">
				<div class="rt-container">
					<div class="rt-flex-container">
						<?php echo $gantry->displayModules('top','standard','standard'); ?>
						<div class="clear"></div>
					</div>
				</div>
			</div>
			<?php /** End Top **/ endif; ?>
		</header>
		<?php /** End Header Surround **/ endif; ?>

		<?php /** Begin Showcase Section **/ if ($gantry->countModules('showcase')) : ?>
		<section id="rt-showcase-surround">
			<?php /** Begin Showcase **/ if ($gantry->countModules('showcase')) : ?>
			<div id="rt-showcase">
				<div class="rt-container">
					<div class="rt-flex-container">
						<?php echo $gantry->displayModules('showcase','standard','standard'); ?>
						<div class="clear"></div>
					</div>
				</div>
			</div>
			<?php /** End Showcase **/ endif; ?>
		</section>
		<?php /** End Showcase Section **/ endif; ?>

		<?php /** Begin FirstFullWidth **/ if ($gantry->countModules('firstfullwidth')) : ?>
		<section id="rt-firstfullwidth">
			<?php echo $gantry->displayModules('firstfullwidth','basic','standard'); ?>
			<div class="clear"></div>
		</section>
		<?php /** End FirstFullWidth **/ endif; ?>

		<?php /** Begin Neck Section **/ if ($gantry->countModules('breadcrumb') or $gantry->countModules('feature') or $gantry->countModules('utility')) : ?>
		<section id="rt-neck-surround">
			<?php /** Begin Breadcrumbs **/ if ($gantry->countModules('breadcrumb')) : ?>
			<div id="rt-breadcrumbs">
				<div class="rt-container">
					<div class="rt-flex-container">
						<?php echo $gantry->displayModules('breadcrumb','standard','standard'); ?>
						<div class="clear"></div>
					</div>
				</div>
			</div>
			<?php /** End Breadcrumbs **/ endif; ?>
			<?php /** Begin Feature **/ if ($gantry->countModules('feature')) : ?>
			<div id="rt-feature">
				<div class="rt-container">
					<div class="rt-flex-container">
						<?php echo $gantry->displayModules('feature','standard','standard'); ?>
						<div class="clear"></div>
					</div>
				</div>
			</div>
			<?php /** End Feature **/ endif; ?>
			<?php /** Begin Utility **/ if ($gantry->countModules('utility')) : ?>
			<div id="rt-utility">
				<div class="rt-container">
					<div class="rt-flex-container">
						<?php echo $gantry->displayModules('utility','standard','standard'); ?>
						<div class="clear"></div>
					</div>
				</div>
			</div>
			<?php /** End Utility **/ endif; ?>
		</section>
		<?php /** End Neck Section **/ endif; ?>

		<?php /** Begin SecondFullWidth **/ if ($gantry->countModules('secondfullwidth')) : ?>
		<section id="rt-secondfullwidth">
			<?php echo $gantry->displayModules('secondfullwidth','basic','standard'); ?>
			<div class="clear"></div>
		</section>
		<?php /** End SecondFullWidth **/ endif; ?>

		<?php /** Begin MainTop Section **/ if ($gantry->countModules('maintop') or $gantry->countModules('expandedtop')) : ?>
		<section id="rt-maintop-surround">
			<?php /** Begin Main Top **/ if ($gantry->countModules('maintop')) : ?>
			<div id="rt-maintop">
				<div class="rt-container">
					<div class="rt-flex-container">
						<?php echo $gantry->displayModules('maintop','standard','standard'); ?>
						<div class="clear"></div>
					</div>
				</div>
			</div>
			<?php /** End Main Top **/ endif; ?>
			<?php /** Begin Expanded Top **/ if ($gantry->countModules('expandedtop')) : ?>
			<div id="rt-expandedtop">
				<div class="rt-container">
					<div class="rt-flex-container">
						<?php echo $gantry->displayModules('expandedtop','standard','standard'); ?>
						<div class="clear"></div>
					</div>
				</div>
			</div>
			<?php /** End Expanded Top **/ endif; ?>
		</section>
		<?php /** End MainTop Section **/ endif; ?>

		<section id="rt-mainbody-surround">
			<?php /** Begin Main Body **/ ?>
			<div class="rt-container">
				<?php echo $gantry->displayMainbody('mainbody','sidebar','standard','standard','standard','standard','standard'); ?>
			</div>
			<?php /** End Main Body **/ ?>
		</section>

		<?php /** Begin MainBottom Section **/ if ($gantry->countModules('expandedbottom') or $gantry->countModules('mainbottom')) : ?>
		<section id="rt-mainbottom-surround">
			<?php /** Begin Expanded Bottom **/ if ($gantry->countModules('expandedbottom')) : ?>
			<div id="rt-expandedbottom">
				<div class="rt-container">
					<div class="rt-flex-container">
						<?php echo $gantry->displayModules('expandedbottom','standard','standard'); ?>
						<div class="clear"></div>
					</div>
				</div>
			</div>
			<?php /** End Expanded Bottom **/ endif; ?>
			<?php /** Begin Main Bottom **/ if ($gantry->countModules('mainbottom')) : ?>
			<div id="rt-mainbottom">
				<div class="rt-container">
					<div class="rt-flex-container">
						<?php echo $gantry->displayModules('mainbottom','standard','standard'); ?>
						<div class="clear"></div>
					</div>
				</div>
			</div>
			<?php /** End Main Bottom **/ endif; ?>
		</section>
		<?php /** End MainBottom Section **/ endif; ?>

		<?php /** Begin ThirdFullWidth **/ if ($gantry->countModules('thirdfullwidth')) : ?>
		<section id="rt-thirdfullwidth">
			<?php echo $gantry->displayModules('thirdfullwidth','basic','standard'); ?>
			<div class="clear"></div>
		</section>
		<?php /** End ThirdFullWidth **/ endif; ?>

		<?php /** Begin Extension Section **/ if ($gantry->countModules('extension')) : ?>
		<section id="rt-extension-surround">
			<div id="rt-extension">
				<div class="rt-container">
					<div class="rt-flex-container">
						<?php echo $gantry->displayModules('extension','standard','standard'); ?>
						<div class="clear"></div>
					</div>
				</div>
			</div>
		</section>
		<?php /** End Extension Section **/ endif; ?>

		<?php /** Begin Footer Section **/ if ($gantry->countModules('bottom') or $gantry->countModules('footer') or $gantry->countModules('copyright')) : ?>
		<footer id="rt-footer-surround">
			<div class="rt-footer-surround-pattern">
				<?php /** Begin Bottom **/ if ($gantry->countModules('bottom')) : ?>
				<div id="rt-bottom">
					<div class="rt-container">
						<div class="rt-flex-container">
							<?php echo $gantry->displayModules('bottom','standard','standard'); ?>
							<div class="clear"></div>
						</div>
					</div>
				</div>
				<?php /** End Bottom **/ endif; ?>
				<?php /** Begin Footer **/ if ($gantry->countModules('footer')) : ?>
				<div id="rt-footer">
					<div class="rt-container">
						<div class="rt-flex-container">
							<?php echo $gantry->displayModules('footer','standard','standard'); ?>
							<div class="clear"></div>
						</div>
					</div>
				</div>
				<?php /** End Footer **/ endif; ?>
				<?php /** Begin Copyright **/ if ($gantry->countModules('copyright')) : ?>
				<div id="rt-copyright">
					<div class="rt-container">
						<div class="rt-flex-container">
							<?php echo $gantry->displayModules('copyright','standard','standard'); ?>
							<div class="clear"></div>
						</div>
					</div>
				</div>
				<?php /** End Copyright **/ endif; ?>
			</div>
		</footer>
		<?php /** End Footer Surround **/ endif; ?>

		<?php /** Begin Debug **/ if ($gantry->countModules('debug')) : ?>
		<div id="rt-debug">
			<div class="rt-container">
				<div class="rt-flex-container">
					<?php echo $gantry->displayModules('debug','standard','standard'); ?>
					<div class="clear"></div>
				</div>
			</div>
		</div>
		<?php /** End Debug **/ endif; ?>

		<?php /** Begin Analytics **/ if ($gantry->countModules('analytics')) : ?>
		<div id="rt-analytics">
			<div class="rt-container">
				<div class="rt-flex-container">
					<?php echo $gantry->displayModules('analytics','basic','basic'); ?>
					<div class="clear"></div>
				</div>
			</div>
		</div>
		<?php /** End Analytics **/ endif; ?>

		<?php /** Popup Login and Popup Module **/ ?>
		<?php echo $gantry->displayModules('login','login','popup'); ?>
		<?php echo $gantry->displayModules('popup','popup','popup'); ?>
		<?php /** End Popup Login and Popup Module **/ ?>
	</div>

	<?php /** Begin Full Slideshow Script **/ if ($gantry->countModules('slideshow')) : ?>
	<?php $gantry->addScript('smooth-scroll.min.js'); ?>
	<script>
	    (function(){
	        var height = true, largeHeader, imgList;

			var ua = navigator.userAgent.toLowerCase();
			var isAndroid = ua.indexOf("android") > -1 && ua.indexOf("mobile");

	        function displayWindowSize() {
	            height = window.getHeight();

	            largeHeader = document.id('rt-slideshow');
	            imgList = document.id('sprocket-features-img-list');

	            if (largeHeader) { largeHeader.setStyle('height', height); }
	            if (imgList) { imgList.setStyle('height', height); }
	        }

	        // Main
	        if (isAndroid) {
		        window.addEvents({
		            load: displayWindowSize
		        });
	        } else {
		        window.addEvents({
		            resize: displayWindowSize,
		            load: displayWindowSize
		        });
	        }

	        smoothScroll.init();
	    })();
	</script>
	<?php /** End Full Slideshow Script **/ endif; ?>

</body>
</html>
<?php
$gantry->finalize();
?>