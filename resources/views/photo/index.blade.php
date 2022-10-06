<x-layout>
    <div>
        <div>
            <h3>
                Here you can add new photos by inserting a JSON message, then it will be added in database as serialize data.
                <br>
                <br>
            </h3>
        </div>
        <div>
            <form action="{{route('photos.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="data">Insert your JSON message</label>
                    <input type="text" name="data" placeholder="text" class="form-control">
                </div>
                <input type="submit" class="btn btn-success" value="Add">
            </form>
        </div>
    <table>
        <tr>
            <br>
            <td>
                <div>
                    <form action="{{ route('photos.showData')}}">
                        @csrf
                        <label for="data">Show all data</label>
                        <br>
                        <input type="submit" class="btn btn-danger" value="Show">
                    </form>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div>
                    <form action="{{ route('photos.generateJson')}}">
                        @csrf
                        <label for="data">Generate JSON</label>
                        <br>
                        <input type="submit" class="btn btn-dark" value="Generate">
                    </form>
                </div>
            </td>
        </tr>
    </table>
    @if(isset($json))
            <br>
            <br>
        <div class="bg-black text-white">
            {{json_encode($json)}}
        </div>
    @endif
    <table>
        <tr>
            <td>
                <br>
                <br>
                There are actually those sequence_id :
                <br>
                <br>
            </td>
        </tr>
    </table>
    <table class="table table-striped">
    @foreach($photos as $photo)
            <tr>
                <td>
                    {{$photo->id}}
                </td>
            </tr>

    @endforeach
    </table>
    </div>
</x-layout>
