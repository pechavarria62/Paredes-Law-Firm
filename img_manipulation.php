<?php
/**
 * Render an egiftcard image based on an egiftcard id
 * 
 */
// All we need is a c (egiftcard id)
if (isset($_REQUEST['/Volumes/personal/stackCp/Paredes-Law-Firm/assets/img/team']))
	$egid = $_REQUEST['/Volumes/personal/stackCp/Paredes-Law-Firm/assets/img/team'];

// no go if no id
if (empty($egid))
	exit;


$SourcePath = realpath(dirname(__FILE__).'/..');	
require_once $SourcePath . '/extras/egiftcard.inc.php';

// validate before going any further
if (0 == eGiftCard::isValid($egid))
	exit;

require_once $SourcePath . '/extras/branch.inc.php';
require_once $SourcePath . '/tables/merchants.inc.php';
require_once $SourcePath . '/tables/trans_aggr.inc.php';

// get the associated merchant either by passed in hash/id (preview mode) or egiftcard id (live mode)
$taTable = new TransactionAggregateTable();
if (isset($_REQUEST['m']))
	$merch = MerchantTable::Resolve($_REQUEST['m']);
else
	$merch = $taTable->getFieldForKeys(array('card_id' => $egid), 'merchantkey');
	
// get merchant details
if (!empty($merch))
{
	$mTable = new MerchantTable();
	$mRec = $mTable->getforId($merch, ['logo_url', 'name']);
}

// nothing to do if no merch
if (empty($mRec))
	exit;

// Create base image from uploaded file
$png_image = imagecreatefromstring(file_get_contents($SourcePath . '/images/egc800j.png'));

// Get size of image
$img_max_x = imagesx($png_image);
$img_max_y = imagesy($png_image);


// egift amount values, passed in as 'a' (preview mode) or looked up from table (live mode)
if (isset($_REQUEST['a']))
	$ebal = "$". number_format($_REQUEST['a'],2);
else
	$ebal = "$". number_format(eGiftCard::getBalance($egid),2);	
	
// Allocate colours for writing to image
$font_black = imagecolorallocate($png_image, 0, 0, 0);
$font_red = imagecolorallocate($png_image, 153, 51, 51);
$font_gold = imagecolorallocate($png_image, 204, 153, 51);


// Set Path to Font Files
$font_ari = '/usr/share/fonts/arial.ttf';
$font_min_i = '/usr/share/fonts/minion_m_i.ttf';
$font_min_n = '/usr/share/fonts/minion_m.ttf';

// global margin values for border control
$g_img_margin = 24;
$g_f_sz = 40;
$eg_text = "eGift Card";


// get sizing info for merchant name
$font_params = imagettfbbox(44, 0, $font_ari, $mRec['name']);
$font_max_x = $font_params[4];
$font_max_y = $font_params[3];

// size of bow area (manually calculated)
$egcb_bow_max_x = 310;
$egcb_bow_max_y = 340;


// Get merchant logo image
$logo = imagecreatefromstring(file_get_contents(PlBranchPath()."/merchant/".$mRec['logo_url']));

// scale the image to desired size (80x80 here)
$logo_sc = imagescale($logo,80,80);
imagedestroy($logo);

// get logo sizing
$logo_max_x = imagesx($logo_sc);
$logo_max_y = imagesy($logo_sc);

// convert PNG transparent pixels to white
if ('png' == strtolower(substr($mRec['logo_url'], -3)))
	transparentToWhite($logo_sc);	

// Get barcode img and attributes 
$ebar = eGiftCard::getBarcodePngBlob($egid);
$bar_img = imagecreatefromstring($ebar);

$bar_max_x = imagesx($bar_img );
$bar_max_y = imagesy($bar_img );

// center the eGiftCard text
$font_params = imagettfbbox(44, 0, $font_min_i, $eg_text);
$font_max_x = $font_params[4];

// center: get txt x, get img x, get diff, divide by 2, add to 170
$pos = ($img_max_x - $egcb_bow_max_x - $font_max_x - $g_img_margin) / 2 + $egcb_bow_max_x;

// get egift card text attrs
imagettftext($png_image ,44 , 0, $pos , 140 , $font_gold, $font_min_i, $eg_text);


/**
 * render merchant name
 * iterate until we find a suitable text width
 */
$font_params = imagettfbbox(44, 0, $font_min_i, $mRec['name']);
$font_max_x = $font_params[4];
// find a size for merchant name that fits within card boundaries
for ($f_sz = 44; $font_max_x > ($img_max_x - $egcb_bow_max_x - $g_img_margin ) ; $f_sz--)
{
	$font_params = imagettfbbox($f_sz, 0, $font_min_i, $mRec['name']);
	$font_max_x = $font_params[4];
}

// Print merch name
imagettftext($png_image , $f_sz, 0, $img_max_x - $font_max_x - 1.4*$g_img_margin , 240, $font_red, $font_min_i, $mRec['name']);

// place scaled logo bottom left, leave buffer for border	
imagecopy($png_image, $logo_sc, $g_img_margin, $img_max_y - $logo_max_y - $g_img_margin , 0, 0, $logo_max_x, $logo_max_y);		
imagedestroy($logo_sc);

// egiftcard id text params
$font_params = imagettfbbox(26, 0, $font_ari, $egid);
$font_max_y = abs($font_params[5]);
$font_max_x = abs($font_params[4]);

// overlay barcode
imagecopy($png_image, $bar_img, $img_max_x - $bar_max_x - 1.4 * $g_img_margin, $img_max_y - $font_max_y - $bar_max_y - 2 * $g_img_margin, 0, 0, $bar_max_x,$bar_max_y);
imagedestroy($bar_img);

// add egift id
imagettftext($png_image , 26, 0, $img_max_x - $font_max_x - 4 * $g_img_margin, $img_max_y - 1.4 * $g_img_margin, $font_black, $font_ari, $egid);

// get egift balance text sizing details
$font_params = imagettfbbox(54, 0, $font_min_n, $ebal);
$font_max_y = abs($font_params[5]);
$font_max_x = abs($font_params[4]);

// get 'balance' text sizing details
$bal_font_params = imagettfbbox(28, 0, $font_min_n, "balance");
$bal_font_max_y = abs($bal_font_params[5]);
$bal_font_max_x = abs($bal_font_params[4]);

$font_diff = $font_max_x - $bal_font_max_x; 

// add dollar balance
imagettftext($png_image , 54, 0, ($img_max_x - $bar_max_x - 1.4 * $g_img_margin) - $font_max_x - 60, $img_max_y - $font_max_y - $bal_font_max_y - 1.2 * $g_img_margin, $font_red, $font_min_n, $ebal);

// add 'balance' text
imagettftext($png_image , 28, 0, ($img_max_x - $bar_max_x - 1.4 * $g_img_margin) - $font_max_x + $font_diff - 60,  $img_max_y - $font_max_y - $g_img_margin, $font_red, $font_min_n, "balance");


// Send Image to Browser

header('Content-Type: image/png');

ob_start();

imagepng($png_image);

imagedestroy($png_image);


function transparentToWhite(&$img)
{
	$img_x = imagesx($img);
	$img_y = imagesy($img);
	$solidWhite = imagecolorallocatealpha($img, 255, 255, 255, 0);

	for ($x = 0; $x < $img_x; ++$x)
	{
		for ($y = 0; $y < $img_y; ++$y)
		{
			$rgba = imagecolorsforindex($img, imagecolorat($img, $x, $y));
			
			// check alpha
			if ($rgba['alpha'] < 127)
				continue;
				
			imagesetpixel($img, $x, $y, $solidWhite);
		}
	}

	imagecolordeallocate($img, $solidWhite);
}
?>