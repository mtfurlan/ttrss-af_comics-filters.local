<?php
class af_default_tag extends Plugin {
	private $host;

	function about() {
		return array(1.0,
			"add the tag 'no-tags' to any article that doesn't have tags",
			"mtfurlan");
	}

	function init($host) {
		$this->host = $host;

		$host->add_hook($host::HOOK_ARTICLE_FILTER, $this);
	}

	function hook_article_filter($article) {
		if(sizeof($article["tags"]) === 0) {
			array_push($article["tags"], "no-tags");
		}
		return $article;
	}


	function api_version() {
		return 2;
	}

}
?>
