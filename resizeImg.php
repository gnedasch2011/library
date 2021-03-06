<?php
$root = $_SERVER['DOCUMENT_ROOT'];
const PATH_IMG = 'image/';


/**
 * Возвращает резанный файл
 * @param $filename
 * @param float $percent
 * @param $folder
 * @return string
 */
function getImgResize($filename, $percent = 0.1, $folder)
{
    $path = 'image/';
    $fullPath = $path . $folder . '/' . $filename;
    $fullPathResize = $path . $folder . '/' . 'resize_' . $filename;

    if (file_exists($fullPathResize)) {
        return $fullPathResize;
    }

// получение новых размеров
    list($width, $height) = getimagesize($fullPath);
    $new_width = $width * $percent;
    $new_height = $height * $percent;

// ресэмплирование
    $image_p = imagecreatetruecolor($new_width, $new_height);
    $image = imagecreatefromjpeg($fullPath);

    imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
// вывод
    if (imagejpeg($image_p, $fullPathResize, 100)) {
        return $fullPathResize;
    }
}


/**
 * вывод всех изображений в директории
 * @param $pathWithFiles
 * @param string $folderImg
 * @return array
 */
function allPathImg($pathWithFiles, $folderImg = 'image/')
{
    $dir = $folderImg . $pathWithFiles;
    $arrPathImg = [];

    if ($handle = opendir($dir)) {
        while (false !== ($file = readdir($handle))) {
            if ($file != "." && $file != ".." && strpos($file, 'size') != true) {
                $arrPathImg[] = $file;
            }
        }
    }

    return $arrPathImg;
}

/**
 * Возвращение ссылки
 * @param $img
 * @param $path
 * @return string
 */
function getPathForLink($img, $path)
{
    return PATH_IMG . $path .DIRECTORY_SEPARATOR. $img;
}
?>

<?php
$folder = 'cert2';
foreach (allPathImg($folder) as $img): ?>
    <a href="<?= getPathForLink($img, $folder); ?>">
        <img src="<?= getImgResize($img, .1, $folder); ?>" alt="">
    </a>
<?php endforeach; ?>

