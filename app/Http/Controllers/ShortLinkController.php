<?php

namespace App\Http\Controllers;

use App\ShortLink;
use Illuminate\Http\Request;

class ShortLinkController extends Controller
{
    protected function shortenLink($code) {
        $find = ShortLink::where('code', $code)->first();

        if ($find)
        {
            $og = ShortLink::getMeta('website', $find->title, $find->description, asset('og/' . $find->code), asset('images/' . $find->image));
            return view('og')->with(['og' => $og, 'link' => $find->link]);
        }
        else
            return redirect('/');

    }

    protected function store(Request $request) {

        $this->validate($request, [
            'link' => 'required|url|max:255',
            'title' => 'required',
            'description' => 'required'
        ]);

        $data = $request->all();
        $data['code'] = substr(sha1(time()), 0, 6);

        $sl = new ShortLink;
        $sl->timestamps = false;
        $sl->fill($data);

        // save data
        $sl->save();

        if ($sl->save())
        {
            session()->push('sl', [
                'link' => asset('og/' . $data['code']),
                'title' => $data['title']
            ]);
        }

        return redirect('/');
    }

    public function isAjax()
    {
        return isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
    }

    protected function upload(Request $request)
    {
        if (self::isAjax())
        {
            $data = $request->all();
            if ( isset( $data ) )
            {
                if (isset($_FILES['image']))
                {
                    $wmax = 990;
                    $hmax = 500;

                    $directory = 'images/';

                    $image = new ShortLink();
                    header('content-type: application/json; charset=utf-8');
                    header("access-control-allow-origin: *");
                    $image->uploading('image', $wmax, $hmax, $directory);
                }
            }
        }
    }
}
