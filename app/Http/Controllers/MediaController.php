<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Gallery;
use App\Models\Photo;
use App\Models\Video;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Image;


class MediaController extends BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($galleryID)
    {
        $gallery = Gallery::findOrFail($galleryID);
        if ($gallery->type == 'videos') {
            $media = new Video();
        } else {
            $media = new Photo();

        }
        $media->gallery_id = $gallery->id;
        return view('cms.media.index', compact('media', 'gallery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $biography = new Biography();
        $biography = Biography::all()->first();
        $biography = ($biography) ? $biography : new Biography;
        return view('cms.biographies.create', compact('biography'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return string
     */
    public function store(Request $request)
    {
        $rules = [];
        if ($request->type == 'videos') {
            $model = "App\Models\Video";
            $rules = Video::$rules;

        } else {
            $model = 'App\Models\Photo';
            $rules = Photo::$rules;

        }


        $request->validate($rules);

        $gallery = Gallery::findOrFail($request->gallery_id);

        $data = $request->only('title', 'content', 'gallery_id', 'status', 'url');

        if ($request->type == 'photos') {

            $mediaurl = $request->file('mediaurl');

            $filename = time() . '-' . $mediaurl->getClientOriginalName();

//            dd($filename);

            $fileUploaded = $mediaurl->move(public_path() . '/uploads/gallery/' , $filename);

//            if ($fileUploaded)
//            {
//                return "true";
//            }
//            else{
//                return "false";
//            }

            $img = Image::make(public_path() . '/uploads/gallery/' . $filename);
            $img->backup();
            if ($gallery->featured) {
                //for slider
                $img->fit(1125, 400, function ($constraint) {
                    // $constraint->aspectRatio();
                    $constraint->upsize();

                });
//                $img->resize(1125, 400);

                $img->save(public_path() . '/uploads/gallery/' . 'large_' . $filename);
                $img->reset();

            }

            $img->fit(150, 90, function ($constraint) {
                // $constraint->aspectRatio();
                $constraint->upsize();

            });
            $img->save(public_path() . '/uploads/gallery/' . 'thumb_' . $filename);


            $data['path'] = '/uploads/gallery/';
            $data['filename'] = $filename;

        }
        $media = $model::create($data);

        if (request('title_en')) {
            app()->setLocale('en');
            $media->title = request('title_en');
            $media->save();
        }

        if (request('content_en')) {
            app()->setLocale('en');
            $media->content = request('content_en');
            $media->save();
        }

        $media->slug = null;

        $slug = SlugService::createSlug(\App::make($model), 'slug', request('title'));
        $media->slug = $slug;
        app()->setLocale('en');

        $media->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($slug)
    {

        $biographies = Biography::findBySlug($slug);
        return view('cms.biographies.show', compact('biographies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $media = Photo::findOrFail($id);

        return view('cms.media.edit', compact('media'));
    }

    public function update($id, Request $request)
    {
        $rules = [
            'title' => 'required',
            'content' => 'required',
        ];

        $request->validate($rules);
        $data = $request->only('title', 'content', 'status', 'gallery_id');

        $media = Photo::findOrFail($id);

        $media->update($data);

        if (request('title_en')) {
            app()->setLocale('en');
            $media->title = request('title_en');
            $media->save();
        }

        if (request('content_en')) {
            app()->setLocale('en');
            $media->content = request('content_en');
            $media->save();
        }


        return redirect()->route('cms.media.index', $media->gallery->id);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $media = Video::find($id);

        if (file_exists(public_path() . $media->path . $media->filename) && is_file(public_path() . $media->path . $media->filename)) {
            unlink(public_path() . $media->path . $media->filename);
        }
        if (file_exists(public_path() . $media->path . 'large_' . $media->filename) && is_file(public_path() . $media->path . 'large_' . $media->filename)) {
            unlink(public_path() . $media->path . 'large_' . $media->filename);
        }

        if (file_exists(public_path() . $media->path . 'thumb_' . $media->filename) && is_file(public_path() . $media->path . 'thumb_' . $media->filename)) {
            unlink(public_path() . $media->path . 'thumb_' . $media->filename);
        }
        $media->delete();
        return redirect()->back();
    }

}