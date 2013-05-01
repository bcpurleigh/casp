<?

require 'phpquery/phpquery.php';

function get_doc($url) {
	try {
		$fn = dirname(__FILE__) . "/cache/" . md5($url) . "-" . mktime(0,0,0) . ".tmp";
		var_dump($fn);
		if (file_exists($fn)) {
			return file_get_contents($fn);
		} else {
			var_dump("here");
			$data = file_get_contents($url);
			file_put_contents($fn, $data);
			return phpQuery::newDocument($data);
		}
	} catch (Exception $e) {
		return false;
	};
}

function retrieve_journal() {
	$domain = "http://www.uow.edu.au";
	$url = "{$domain}/arts/research/recasp/articles/index.html";
	$doc = get_doc($url);
	$arr = array();
	if ($doc) {
		foreach(pq('#main-content .box p') as $article) {
			$a = pq($article)->children('a');
			$title = $a->text();
			$href = $domain . $a->attr('href');
			$desc = pq($article)->text();
			$desc = trim(str_replace($title, '', $desc));
			$arr[] = array(
				'title' => $a->text(),
				'href' => $href,
				'desc' => $desc
			);
		}
	}
	return $arr;
}

function retrieve_bn() {
	$url = "http://bnarchives.yorku.ca/perl/latest";
	$doc = get_doc($url);
	$arr = array();
	if ($doc) {
		foreach(pq('.main_content p') as $article) {
			$a = pq($article)->children('a');
			$title = $a->text();
			$href = $a->attr('href');

			$arr[] = array(
				'title' => $a->text(),
				'href' => $href
			);
		}
	}
	return $arr;
}

?>