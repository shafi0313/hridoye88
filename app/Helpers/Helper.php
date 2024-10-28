<?php

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

if (!function_exists('devAdminEmail')) {
    function devAdminEmail()
    {
        return 'dev.admin@shafi95.com';
    }
}

if(!function_exists('bdDate')){
    function bdDate($date){
        return Carbon::parse($date)->format('d/m/Y');
    }
}

if(!function_exists('ageWithDays')){
    function ageWithDays($d_o_b){
        return Carbon::parse($d_o_b)->diff(Carbon::now())->format('%y years, %m months and %d days');
    }
}
if(!function_exists('ageWithMonths')){
    function ageWithMonths($d_o_b){
        return Carbon::parse($d_o_b)->diff(Carbon::now())->format('%y years, %m months');
    }
}

if(!function_exists('permissionText')){
    function permissionText($permission){
        switch($permission){
            case 0;
                $permission = 'No Login Permission';
                break;
            case 1;
                $permission = 'Admin';
                break;
            case 2;
                $permission = 'Creator';
                break;
            case 3;
                $permission = 'Editor';
                break;
            case 4;
                $permission = 'Viewer';
                break;
        }
        return $permission;
    }
}

/************************** Image **************************/

if (! function_exists('imgWebpStore')) {
    function imgWebpStore($image, string $path, ?array $size = null)
    {
        $image = Image::make($image);
        if ($size[0] && $size[1]) {
            $image->fit($size[0], $size[1]);
        }

        if ($size[0] && $size[1] == null) {
            $image->resize($size[0], null, function ($constraint) {
                $constraint->aspectRatio();
            });
        }

        $dir = public_path('/uploads/images/'.$path);
        if (! is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
        $imageName = $path.'-'.uniqueId(10).'.webp';
        $image->encode('webp', 80)->save($dir.'/'.$imageName);

        return $imageName;
    }
}

if (! function_exists('imgProcessAndStore')) {
    function imgProcessAndStore($image, string $path, ?array $size = null, $oldImage = null)
    {
        $dir = public_path('/uploads/images/'.$path);
        if (! is_dir($dir)) {
            mkdir($dir, 0777, true);
        }

        $extension = strtolower($image->getClientOriginalExtension());

        if ($oldImage != null) {
            $checkPath = $dir.'/'.$oldImage;
            if ($oldImage && file_exists($checkPath)) {
                unlink($checkPath);
            }
        }

        if ($extension == 'svg') {
            $imageName = $path.'-'.uniqueId(10).'.svg';
            $image->move($dir, $imageName);
        } else {
            $image = Image::make($image);
            if (! is_null($size) && count($size) == 2) {
                $image->fit($size[0], $size[1]);
            }

            if ($size[0] && $size[1] == null) {
                $image->resize($size[0], null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }
            $uniqueId = uniqueId(10);

            if ($extension == 'png') {
                $imageName = $path.'-'.$uniqueId.'.png';
                $image->encode('png', 80)->save($dir.'/'.$imageName);
            } else {
                $imageName = $path.'-'.$uniqueId.'.webp';
                $image->encode('webp', 80)->save($dir.'/'.$imageName);
            }
        }

        return $imageName;
    }
}

if (! function_exists('imgWebpUpdate')) {
    function imgWebpUpdate($image, string $path, ?array $size, $oldImage)
    {
        $image = Image::make($image);
        if ($size[0] && $size[1]) {
            $image->fit($size[0], $size[1]);
        }

        if ($size[0] && $size[1] == null) {
            $image->resize($size[0], null, function ($constraint) {
                $constraint->aspectRatio();
            });
        }

        $dir = public_path('/uploads/images/'.$path);
        if (! is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
        $imageName = $path.'-'.uniqueId(10).'.webp';
        $image->encode('webp', 80)->save($dir.'/'.$imageName);

        $checkPath = $dir.'/'.$oldImage;
        if ($oldImage && file_exists($checkPath)) {
            unlink($checkPath);
        }

        return $imageName;
    }
}
if (! function_exists('imgUnlink')) {
    function imgUnlink($folder, $image)
    {
        $path = public_path('uploads/images/'.$folder.'/'.$image);
        if ($image && file_exists($path)) {
            return unlink($path);
        }
    }
}

if (! function_exists('imageStore')) {
    function imageStore(Request $request, $request_name, string $name, string $path)
    {
        if ($request->hasFile($request_name)) {
            $pathCreate = public_path().'/uploads/images/'.$path.'/';
            ! file_exists($pathCreate) ?? File::makeDirectory($pathCreate, 0777, true, true);

            $image = $request->file($request_name);
            $imageName = $name.uniqueId(10).'.'.$image->getClientOriginalExtension();
            if ($image->isValid()) {
                $request->$request_name->move(public_path().'/uploads/images/'.$path.'/', $imageName);

                return $imageName;
            }
        }
    }
}

if (! function_exists('imageUpdate')) {
    function imageUpdate(Request $request, $request_name, string $name, string $path, $old_image)
    {
        if ($request->hasFile($request_name)) {
            $deletePath = public_path("uploads/images/{$path}/{$old_image}");

            if (! empty($old_image) && file_exists($deletePath)) {
                unlink($deletePath);
            }

            $createPath = public_path($path);
            if (! file_exists($createPath)) {
                File::makeDirectory($createPath, 0777, true, true);
            }

            $image = $request->file($request_name);
            $imageName = "{$name}_".uniqueId(10).'.'.$image->getClientOriginalExtension();

            if ($image->isValid()) {
                $image->move(public_path("uploads/images/{$path}/"), $imageName);

                return $imageName;
            }
        } else {
            return $old_image;
        }
    }
}

if (! function_exists('imagePath')) {
    function imagePath($folder, $image)
    {
        $path = 'uploads/images/'.$folder.'/'.$image;
        if (@getimagesize($path)) {
            return asset($path);
        } else {
            return asset('uploads/images/no-img.jpg');
        }
    }
}

if (! function_exists('gender')) {
    function gender(int $user)
    {
        return match ($user) {
            1 => 'Male',
            2 => 'Female',
            3 => 'Other',
            default => 'Unknown'
        };
    }
}

if (! function_exists('profileImg')) {
    function profileImg()
    {
        if (file_exists(asset('uploads/images/user/'.user()->image))) {
            return asset('uploads/images/user/'.user()->image);
        } else {
            return asset('uploads/images/user/avatar.png');
            // if(user()->gender && user()->gender == 'Female'){
            //     return asset('uploads/images/user/female-blank.jpg');
            // }else{
            //     return asset('uploads/images/user/avatar.png');
            // }

        }
    }
}
/************************** !Image **************************/

if (!function_exists('activeSubNav')) {
    function activeSubNav($route)
    {
        if (is_array($route)) {
            $rt = '';
            foreach ($route as $rut) {
                $rt .= request()->routeIs($rut) || '';
            }
            return $rt ? ' activeSub ' : '';
        }
        return request()->routeIs($route) ? ' activeSub ' : '';
    }
}

if (!function_exists('activeNav')) {
    function activeNav($route)
    {
        if (is_array($route)) {
            $rt = '';
            foreach ($route as $rut) {
                $rt .= request()->routeIs($rut) || '';
            }
            return $rt ? ' active ' : '';
        }
        return request()->routeIs($route) ? ' active ' : '';
    }
}

if (!function_exists('openNav')) {
    function openNav(array $routes)
    {
        $rt = '';
        foreach ($routes as $route) {
            $rt .= request()->routeIs($route) || '';
        }
        return $rt ? ' show ' : '';
    }
}

if (!function_exists('uniqueId')) {
    function uniqueId($lenght = 8)
    {
        if (function_exists("random_bytes")) {
            $bytes = random_bytes(ceil($lenght / 2));
        } elseif (function_exists("openssl_random_pseudo_bytes")) {
            $bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
        } else {
            throw new \Exception("no cryptographically secure random function available");
        }
        return substr(bin2hex($bytes), 0, $lenght);
    }
}
if (!function_exists('user')) {
    function user()
    {
        return auth()->user();
    }
}

// if (!function_exists('imageStore')) {
//     function imageStore(Request $request, string $name, string $path)
//     {
//         if($request->hasFile('image')){
//             $pathCreate = public_path().$path;
//             !file_exists($pathCreate) ?? File::makeDirectory($pathCreate, 0777, true, true);

//             $image = $request->file('image');
//             $image_name = $name . uniqueId(20).'.'.$image->getClientOriginalExtension();
//             if ($image->isValid()) {
//                 $request->image->move($path,$image_name);
//                 return $image_name;
//             }
//         }
//     }
// }


// if (!function_exists('imageUpdate')) {
//     function imageUpdate(Request $request, string $name, string $path, $image)
//     {
//         if($request->hasFile('image')){
//             $deletePath =  public_path($path.$image);
//             file_exists($deletePath) ? unlink($deletePath) : false;

//             // $deletePath = public_path().$path.$model->first()->image;
//             // $path =  public_path('uploads/images/users/'.$files->image);
//             // file_exists($deletePath) ? unlink($deletePath) : false;

//             $createPath = public_path().$path;
//             !file_exists($createPath) ?? File::makeDirectory($createPath, 0777, true, true);

//             $image = $request->file('image');
//             $image_name = $name . uniqueId(20).'.'.$image->getClientOriginalExtension();
//             if ($image->isValid()) {
//                 $request->image->move($path,$image_name);
//                 return $image_name;
//             }
//         }
//     }
// }
if (!function_exists('getImg')) {
    function getImg($name, $img)
    {
        return asset('uploads/images/'.$name.'/'.$img);
    }
}

if (! function_exists('slug')) {
    function slug($text)
    {
        $array = [':', ',', '.', '!', '|', '।', 'ঃ', '{', '}', '[', ']', '(', ')', '৳', '%', '$', '#', '@', '*', '+', ';'];
        $slug = strtolower(str_replace($array, '', trim($text)));

        return str_replace(' ', '-', $slug);

        return strtolower(preg_replace('/\s+/u', '-', trim($text)));
    }
}

