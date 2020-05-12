<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOpengraphLink;
use Illuminate\Http\Request;
use OpenGraph;
use App\Link;
use Session;

class OpengraphController extends Controller
{
    public function index()
    {
        $links = Link::all();
        return view('welcome',['links'=>$links]);
    }

    function getUrl(StoreOpengraphLink $r){
        // dd(Session::getId());
        $data =  OpenGraph::fetch($r->url);
        $data['site_name'] = $r->title;
        $data['image'] = $r->image;
        $data['description'] = $r->description;
        $link = Link::create(
            [
                'url' => $r->url,
                'title' => $data['site_name'],
                'image' =>  $data['image'],
                'description' => $data['description'],
                'opengraph_url' => substr($r->url, 0, 15).'/'.rand(),
                'session_id' => Session::getId(),
                ]);

       return redirect()->route('/');
    }
}
