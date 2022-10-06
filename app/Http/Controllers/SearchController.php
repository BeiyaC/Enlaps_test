<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $photos = Photo::all('id');

        return view('search.index', compact('photos'));
    }

    /**
     * Add inputs to index view.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function addInput(Request $request)
    {
        $photos = Photo::all('id');
        $number = $request->number;

        return view('search.index', compact('photos','number'));
    }

    /**
     * Display the sequence_id inserted in input form.
     *
     * @param  Request
     * @return Application|Factory|View
     */
    public function showSequenceId(Request $request)
    {

        $number = $request->input('number') + 1;

        // Inserting data requested by sequence_id and unserialize it into an array

        for ($i = 1; $i<$number; $i++)
        {
            $data[$i] = Photo::find($request->input('sequence_id'.$i));
            $data[$i] = unserialize($data[$i]->data);
        }

        // Condition to sort data as ascending or descending

        if($request->sort === 'desc'){
            usort($data, fn($a, $b) => $b->shooting_date <=> $a->shooting_date);
        } elseif ($request->sort === 'asc') {
            usort($data, fn($a, $b) => $a->shooting_date <=> $b->shooting_date);
        }

        return view('search.show', compact('data'));
    }

}
