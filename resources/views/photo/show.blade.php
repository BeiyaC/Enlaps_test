<x-layout>
    <div>
        <div>
            <h3>
                Here we can see what we have in database, one column with an id and another one with serialize data
            </h3>
            <br>
            <br>
        </div>

        <table class="table table-striped table-hover">
            <tr>
                <td>
                    ID column:
                </td>
                <td>

                </td>
                <td>
                    Data column:
                </td>
            </tr>
            @foreach($photos as $photo)
                <tr>
                    <td>
                        <li>
                            {{$photo->id}}
                        </li>
                    </td>
                    <td>
                        <form action="{{ route('photos.destroy',['photo' => $photo]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                    <td>
                        <li>
                            {{$photo->data}}
                        </li>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>


</x-layout>
