<?php
namespace Craft;

use Twig_Extension;
use Twig_Filter_Method;

class InfiniteScrollTwigExtension extends \Twig_Extension
{

	public function getName()
	{
		return 'Infinite Scroll';
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
	public function InfiniteScrollFilter(entriesOnPage)
	{
		$content = 'test';

		craft()->templates->includeJsResource('infinitescroll/js/jquery.infinitescroll.min.js');
		craft()->templates->includeJs('
			$("#left-main-content").infinitescroll({
				loading: {
				    finished: undefined,
				    finishedMsg: "There are no more items to load",
				                img: "/img/ajax-loader.gif",
				    msg: null,
				    msgText: "Loading more posts...",
				    selector: null,
				    speed: "fast",
				    start: undefined
				},
				navSelector  : "div.pagination",
				nextSelector : "div.pagination a:first",
				itemSelector : "#left-main-content>article.news-row",
				maxPage      : {{paginate.totalPages}},
			});
		');

		return $content;
	}

}
