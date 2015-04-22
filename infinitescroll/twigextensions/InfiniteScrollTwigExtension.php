<?php
namespace Craft;

use Twig_Extension;
use Twig_Filter_Method;

class InfiniteScrollTwigExtension extends \Twig_Extension
{

	public function getName()
	{
		return 'BM Infinite Scroll';
	}

	public function getFilters()
	{
		return array(
			'infinitescroll' => new Twig_Filter_Method( $this, 'InfiniteScrollFilter',
				array(
					'is_safe' => array('html')
				)
			)
		);
	}

	public function InfiniteScrollFilter($paginate, $containerSelector=null, $itemSelector=null, $loadingMessage=null, $loadingImage=null, $finishedMessage=null)
	{
		if (!$containerSelector || !$itemSelector) return null;
		$content = '';
		if ($paginate->getNextUrl())
		{
			$content .= '<div class="pagination"><a href="' . $paginate->getNextUrl() . '">Next Page</a></div>';
		}
		$content .= craft()->templates->includeJsResource('infinitescroll/js/jquery.infinitescroll.min.js');

		$script  = 'var totalNumOfPages = ' . $paginate->totalPages . ';';
		$script .= 'var containerSelector = "' . $containerSelector . '";';
		$script .= 'var itemSelector = "' . $itemSelector . '";';
		$loadingImage = $loadingImage ? $loadingImage : UrlHelper::getResourceUrl('infinitescroll/img/ajax-loader.gif');
		$script .= 'var loadingImage = "' . $loadingImage . '";';
		if ($loadingMessage) $script .= 'var loadingMessage = "' . $loadingMessage . '";';
		if ($finishedMessage) $script .= 'var finishedMessage = "' . $finishedMessage . '";';
		$content .= craft()->templates->includeJs($script);

		$content .= craft()->templates->includeJsResource('infinitescroll/js/infinitescroll.js');
		return $content;
	}

}
