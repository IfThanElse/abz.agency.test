



 <ol class="commentlist group">
@foreach($users as $k => $data)
    <!--Выводим только родительские комментарии parent_id = 0-->

    @if($k)

    @break

    @endif

    @include('users', ['items' => $data])

    @endforeach

    </ol>
