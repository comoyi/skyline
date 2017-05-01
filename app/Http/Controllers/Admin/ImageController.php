<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Controller;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::select([
            'id',
            'original_name',
            'name',
            'path',
            'description',
            'created_at',
        ])->orderBy('id', 'desc')->paginate(10);

        return view('admin.image.index', [
            'images' => $images,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.image.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('file');
        if (is_null($file)) {
            return redirect()->back();
        }
        $path = Storage::disk('image')->put('', $file);
        $image = new Image();
        $image->original_name = $file->getClientOriginalName();
        $image->name = $request->input('name', '') ?: '';
        $image->path = $path;
        $image->description = $request->input('description', '') ?: '';
        $image->save();
        return redirect()->route('images');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $image = Image::select([
            'id',
            'original_name',
            'name',
            'path',
            'description',
            'created_at',
            'updated_at',
        ])->find($id);
        return view('admin.image.show', [
            'image' => $image,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $image = Image::select([
            'id',
            'name',
            'path',
            'description',
        ])->find($id);
        return view('admin.image.edit', [
            'image' => $image,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $image = Image::find($id);

        $file = $request->file('file');
        if (!empty($file)) {
            // 判断原先是否有图片
            if (!empty($image->path)) {
                // 判断图片是否存在
                if (Storage::disk('image')->exists($image->path)) {
                    // 删除原先的图片
                    if (!Storage::disk('image')->delete($image->path)) {
                        return redirect()->back();
                    }
                }
            }

            // 保存新图片
            if (empty($file)) {
                return redirect()->back();
            }
            $path = Storage::disk('image')->put('', $file);
            if (empty($path)) {
                return redirect()->back();
            }

            $image->path = $path;
        }

        $image->name = $request->input('name') ?: '';
        $image->description = $request->input('description') ?: '';
        $image->save();
        return redirect()->route('images');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Image::select([
            'id',
            'path',
        ])->find($id);
        if (is_null($image) || empty($image->path)) {
            return redirect()->back();
        }
        if (!Storage::disk('image')->delete($image->path)) {
            return redirect()->back();
        }

        Image::where('id', $id)->limit(1)->delete();
        return redirect()->route('images');
    }
}
