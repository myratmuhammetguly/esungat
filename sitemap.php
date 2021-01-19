<?php header('Content-type: application/xml; charset=utf-8') ?>
<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>
<urlset
    xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
    xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
        http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">

<?php 
$servername = "localhost";
$username="root";
$password="virgoreklama";
$dbname="esungatdb";

$site = $_SERVER['HTTP_HOST'];
$date=date("Y-m-d");

function seo($url){
    $url = trim($url);
    $url = strtolower($url);
    $find = array('<b>', '</b>');
    $url = str_replace ($find, '', $url);
    $url = preg_replace('/<(\/{0,1})img(.*?)(\/{0,1})\>/', 'image', $url);
    $find = array(' ', '&quot;', '&amp;', '&', '\r\n', '\n', '/', '\\', '+', '<', '>');
    $url = str_replace ($find, '-', $url);
    $find = array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ë', 'Ê');
    $url = str_replace ($find, 'e', $url);
    $find = array('í', 'ı', 'ì', 'î', 'ï', 'I', 'İ', 'Í', 'Ì', 'Î', 'Ï');
    $url = str_replace ($find, 'i', $url);
    $find = array('ó', 'ö', 'Ö', 'ò', 'ô', 'Ó', 'Ò', 'Ô');
    $url = str_replace ($find, 'o', $url);
    $find = array('á', 'ä', 'â', 'à', 'â', 'Ä', 'Â', 'Á', 'À', 'Â');
    $url = str_replace ($find, 'a', $url);
    $find = array('ú', 'ü', 'Ü', 'ù', 'û', 'Ú', 'Ù', 'Û');
    $url = str_replace ($find, 'u', $url);
    $find = array('ç', 'Ç');
    $url = str_replace ($find, 'c', $url);
    $find = array('ş', 'Ş');
    $url = str_replace ($find, 's', $url);
    $find = array('ý', 'Ý');
    $url = str_replace ($find, 'y', $url);
    $find = array('ž', 'Ž');
    $url = str_replace ($find, 'j', $url);
    $find = array('ň', 'Ň');
    $url = str_replace ($find, 'n', $url);
    $find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');
    $repl = array('', '-', '');
    $url = preg_replace ($find, $repl, $url);
    $url = str_replace ('--', '-', $url);
    return $url;
    }

   //servere baglan
   $conn = new mysqli($servername, $username, $password, $dbname);
   mysqli_set_charset($conn, 'utf8');

?>
<url>
    <loc>http://<?php echo $site; ?>/contacts</loc>
    <lastmod><?php echo $date; ?></lastmod>
    <changefreq>weekly</changefreq>
    <priority>1.00</priority>
</url>

<url>
    <loc>http://<?php echo $site; ?>/about</loc>
    <lastmod><?php echo $date; ?></lastmod>
    <changefreq>weekly</changefreq>
    <priority>1.00</priority>
</url>
<url>
    <loc>http://<?php echo $site; ?>/egadymy</loc>
    <lastmod><?php echo $date; ?></lastmod>
    <changefreq>weekly</changefreq>
    <priority>1.00</priority>
</url>
<url>
    <loc>http://<?php echo $site; ?>/esungat</loc>
    <lastmod><?php echo $date; ?></lastmod>
    <changefreq>weekly</changefreq>
    <priority>1.00</priority>
</url>
<url>
    <loc>http://<?php echo $site; ?>/egozellik</loc>
    <lastmod><?php echo $date; ?></lastmod>
    <changefreq>weekly</changefreq>
    <priority>1.00</priority>
</url>
<?php 
$sql="SELECT * FROM products";
$result=$conn->query($sql);

while ($productRow=$result->fetch_assoc())  { ?>
    <url>
        <loc>http://<?php echo $site; ?>/product_details/<?php echo seo($productRow['product_title']); ?>/<?php echo $productRow['product_id']; ?></loc>
        <lastmod><?php echo $date; ?></lastmod>
        <changefreq>weekly</changefreq>
        <priority>1.00</priority>
    </url>
<?php } ?>

<?php 
$conn->close();
?>
</urlset>