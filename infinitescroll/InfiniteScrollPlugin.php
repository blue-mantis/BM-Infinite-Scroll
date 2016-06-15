<?php
namespace Craft;

class InfiniteScrollPlugin extends BasePlugin
{

	function getName()
	{
		return Craft::t('BM Infinite Scroll');
	}

	function getVersion()
	{
		return '1.1.0';
	}

	function getDeveloper()
	{
		return 'Blue Mantis';
	}

	function getDeveloperUrl()
	{
		return 'http://bluemantis.com';
	}

	/**
	 * @return string
	 */
	public function getDocumentationUrl()
	{
		return 'https://github.com/blue-mantis/BM-Infinite-Scroll';
	}

	/**
	 * Registers the Twig extension.
	 *
	 * @return InfiniteScrollTwigExtension
	 */
	public function addTwigExtension()
	{
		Craft::import('plugins.infinitescroll.twigextensions.InfiniteScrollTwigExtension');
		return new InfiniteScrollTwigExtension();
	}

}
