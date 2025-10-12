<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

trait SummerNoteTrait
{
    public function summerNoteStore($content, $path)
    {
        $dir = public_path('uploads/images/'.$path);
        if (! file_exists($dir)) {
            File::makeDirectory($dir, 0777, true, true);
        }

        if ($content) {
            $dom = new \DomDocument;
            $dom->loadHtml(
                mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'),
                LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD
            );

            $imageFile = $dom->getElementsByTagName('img');
            $manager = new ImageManager(new Driver);
            foreach ($imageFile as $item => $image) {
                $src = $image->getAttribute('src');

                if (preg_match('/^data:image\/(\w+);base64,/', $src, $type)) {
                    $imageType = strtolower($type[1]);
                    $imageData = preg_replace('/^data:image\/\w+;base64,/', '', $src);
                    $imageData = base64_decode($imageData);

                    $uniqueId = uniqueId(10);
                    $imageName = $uniqueId.$item.'.webp';
                    $webpPath = '/uploads/images/'.$path.'/'.$imageName;

                    if (file_put_contents(public_path($webpPath), $imageData)) {
                        $webpImage = $manager->read(public_path($webpPath));
                        $webpImage = $webpImage->encodeByExtension('webp', quality: 80);
                        $webpImage->save(public_path($webpPath));

                        $image->removeAttribute('src');
                        $image->setAttribute('src', $webpPath);
                    }
                }
            }
            return $dom->saveHTML();
        }
    }

    public function summerNoteAllImageDestroy($content)
    {
        if ($content) {
            $pattern = '/<img[^>]+>/i';
            preg_match_all($pattern, $content, $matches);
            $imageTags = $matches[0];
            $srcAttributes = [];
            foreach ($imageTags as $key => $imageTag) {
                if (preg_match('/src=["\']([^"\']+)["\']/', $imageTag, $srcMatch)) {
                    $srcAttributes[$key] = $srcMatch[1];
                    $path = public_path($srcAttributes[$key]);
                    if (file_exists($path)) {
                        unlink($path);
                    }
                }
            }
        }
    }
}
