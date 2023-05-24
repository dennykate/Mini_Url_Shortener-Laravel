<?php

namespace App\Http\Controllers;

use App\Models\UrlShortener;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UrlShortenerController extends Controller
{
    public function index()
    {
        $urls = UrlShortener::orderBy("id","DESC")->paginate(10);
        
        return view("url-shortener/index",["urls"=> $urls]);
    }

    public function store(Request $request)
    {
        $validated = Validator::make($request->all(),[
            "fullUrl" => "required|url",
        ]);

        if($validated->fails()){
            return redirect()->back()->withErrors($validated->messages());
        }

        $shortUrl = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyz"), 0, 10);
        $url = UrlShortener::create([
            "fullUrl" => $request->fullUrl,
            "shortUrl" => $shortUrl
        ]);

        return redirect()->route("urlShortener.index");
    }

    public function show(string $id)
    {
        $url = UrlShortener::where("shortUrl",$id)->first();
        $url->clicks++;
        $url->update();

        return redirect($url->fullUrl);
    }

    public function destroy(Request $request)
    {
        $url =  UrlShortener::where("shortUrl",$request->shortUrl)->first();
        $url->delete();

        return redirect()->back();
    }
}
