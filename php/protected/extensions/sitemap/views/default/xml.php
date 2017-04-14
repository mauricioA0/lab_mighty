<?php 

$xml = new SimpleXMLElement("<?xml version='1.0'?><urlset xmlns='http://www.sitemaps.org/schemas/sitemap/0.9' ></urlset>");
Header('Content-type:text/xml');

foreach ($urls as $url => $data) :
    
    $url_xml = $xml->addChild('url');
    $url_xml->addChild('loc',htmlspecialchars( str_replace('http', 'https', $url) ));
    
    if (isset($data['lastmod'])) {
        $url_xml->addChild('lastmod',$data['lastmod']);
    }
    
    if (isset($data['changefreq'])) {
        $url_xml->addChild('changefreq',$data['changefreq']);
    }
    
    if (isset($data['priority'])) {
        $url_xml->addChild('priority',$data['priority']);
    }
    
?>

<?php 
endforeach; 
print($xml->asXML());
?>


