<x-layout>
    <div>
        <table class="table table-dark table-hover">
            @foreach($data as $photo)
            <tr>
                <td>
                    {{json_encode($photo, JSON_PRETTY_PRINT)}}
                    <br>
                    <br>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</x-layout>
