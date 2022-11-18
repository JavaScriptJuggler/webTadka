<?php

namespace App\Http\Controllers;

use App\Models\Heros;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    public function goToHeroPage()
    {
        view()->share(['pageTitle' => 'Hero Image']);
        $fileLocation = '';
        foreach (glob(public_path('/heroimage_storage') . '/*') as $file) {
            if (is_file($file)) {
                $fileArray = explode('/', $file);
                $fileLocation = $fileArray[count($fileArray) - 1];
            }
        }
        return view('admin_dashboard.herosection.hero', compact('fileLocation'));
    }

    /* upload hero image */
    public function uploadHeroImage(Request $request)
    {
        foreach (glob(public_path('/heroimage_storage') . '/*') as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }
        /* upload image */
        $image = $request->file('file');
        $input['imagename'] = 'heroImage.png';
        $destinationPath = public_path('/heroimage_storage');
        $image->move($destinationPath, $input['imagename']);
    }

    /* show hero cotent page */
    public function showHeroContentPage()
    {
        view()->share(['pageTitle' => 'Hero Contets']);
        return view('admin_dashboard.herosection.contents');
    }

    /* save hero content */
    public function saveHeroContent(Request $request)
    {
        $contentsArray = $request->dataset;
        foreach ($contentsArray as $key => $value) {
            /* upload image */
            // return $value['file'];
            $image = $value['file'];
            $input['imagename'] = time() . '_heroTypes.png';
            $destinationPath = public_path('/document_bucket');
            $image->move($destinationPath, $input['imagename']);
            $contentsArray[$key]['file'] = '/document_bucket/' . $input['imagename'];
        }
        
        $is_found = Heros::find(1);
        if (!empty($is_found)) {
            $is_found->header_text = $request->header_text;
            $is_found->contents = serialize($contentsArray);
            $success = $is_found->save();
            if ($success)
                return true;
            else
                return false;
        } else {
            $success = Heros::create([
                'header_text' => $request->header_text,
                'contents' => serialize($contentsArray),
            ])->save();
            if ($success)
                return true;
            else
                return false;
        }
    }
}
