<?

$FORUM_LOCATION = "http://164.177.158.37/caspbb/feed.php";

require 'phpquery/phpquery.php';

function get_doc($url) {
	try {
		$fn = dirname(__FILE__) . "/cache/" . md5($url) . "-" . mktime(0,0,0) . ".tmp";
		if (file_exists($fn)) {
			return phpQuery::newDocument(file_get_contents($fn));
		} else {
			$data = file_get_contents($url);
			file_put_contents($fn, $data);
			return phpQuery::newDocument($data);
		}
	} catch (Exception $e) {
		throw $e;
	};
}

function retrieve_journal() {
	try {
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
	} catch (Exception $e) {
		var_dump($e->getMessage());
		return false;
	}
	
}

function retrieve_bn() {
	try {
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
	} catch (Exception $e) {
		var_dump($e->getMessage());
		return false;
	}
	
}

function retrieve_forum() {
	global $FORUM_LOCATION;
	try {
		$url = $FORUM_LOCATION;
		$contents = file_get_contents($url);
		$xml = new SimpleXMLElement($contents);

		$arr = array();
		if ($xml) {
			foreach($xml->entry as $entry) {
				$desc = strip_tags($entry->content,'<p>');
				$posted = strtotime($entry->updated);
				$posted = date('F j, Y', $posted);

				$arr[] = array(
					'title' => htmlspecialchars($entry->title),
					'href' => $entry->link['href'],
					'posted' => $posted,
					'desc' => $desc
				);
			}
		}
		return $arr;
	} catch (Exception $e) {
		var_dump($e->getMessage());
		return false;
	}
}

?>