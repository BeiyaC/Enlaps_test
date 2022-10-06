<x-layout>
    <div>
        <table>
            <tr>
                <td>
                    <p>
                        Put you sequence ID and get all data of this photo
                    </p>
                    <form action="{{route('search.showSequenceId')}}" method="post">
                        @csrf
                        <input type="text" name="sequence_id1" placeholder="sequence_id1" required>
                        @if(isset($number))
                            @for($i=2; $i<=$number; $i++)
                                <input type="text" name="sequence_id{{$i}}" placeholder="sequence_id{{$i}}" required>
                            @endfor
                        @endif
                        <br>
                        <select id="sort" name="sort">
                            <option value="asc">Ascending</option>
                            <option value="desc">Descending</option>
                        </select>
                        <input type="hidden" name="number" value="@if(isset($number)){{$number}}@endif">
                        <input type="submit" class="btn btn-primary" value="Search">
                    </form>
                </td>
            </tr>
            @if(!isset($number))
                <tr>
                    <td>
                        <p>
                            Wanna search more sequence ID in a row ? You can add inputs.
                        </p>
                        <form action="{{route('search.addInput')}}" method="post">
                            @csrf
                            <select name="number" id="number">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                            </select>
                            <input type="submit" class="btn btn-success" value="Add input">
                        </form>
                    </td>
                </tr>
            @else
                <tr>
                    <td>
                        <p>
                            You can change number of inputs to add
                        </p>
                        <form action="{{route('search.addInput')}}" method="post">
                            @csrf
                            <label for="number">Change inputs</label>
                            <select name="number" id="number">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                            </select>
                            <input type="submit" class="btn btn-success" value="Change">
                        </form>
                    </td>
                </tr>
            @endif
        </table>
        <br>
        <br>
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
