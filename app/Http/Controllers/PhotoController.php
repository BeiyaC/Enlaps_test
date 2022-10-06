<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $photos = Photo::all('id');

        return view('photo.index', compact('photos'));
    }

    /**
     * Generate a new JSON with random sequence_id.
     *
     * @return Application|Factory|View
     * @throws Exception
     */

    public function generateJson()
    {
        $photos = Photo::all('id');

        // Generate randomDate for my json array

        $timestamp = mt_rand(1, time());
        $randomDate = date("Y-m-d H:i:s", $timestamp);


        $json = [
            "s3_key" => "677c082c-3a1a-44d9-874a- 20169546c653/123456789/my_photo_2.jpg",
            "sequence_id" => random_int(1,123456788),
            "resolution" => "4096x1862",
            "file_size" => 456874,
            "shooting_date" => $randomDate.".592579",
            "metadata" => [
                "GPSLatitude" => 0.34,
                "GPSLongitude" => 0.45,
                "GPSAltitude" => 0.78,
                "Camera Model Name" => "TIKEE",
                "Make" => "ENLAPS"
                ]
        ];

        return view('photo.index', compact('photos', 'json'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        $data = $request->input('data');

        $data = json_decode($data);

        $photo = new Photo;
        $photo->id = $data->sequence_id;
        $photo->shooting_date = $data->shooting_date;

        $data = serialize($data);
        $photo->data = $data;

        $photo->save();

        return redirect(route('photos.index', compact('data')));
    }

    /**
     * Display a specified resource.
     *
     * @return Application|Factory|View
     */

    public function showData()
    {
        $photos = Photo::all();

        return view('photo.show', compact('photos'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Photo $photo
     * @return Application|Redirector|RedirectResponse
     */
    public function destroy(Photo $photo)
    {
        $photo->delete();

        return redirect('photos');
    }

}
