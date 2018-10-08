



 <ol class="commentlist group">
@foreach($users as $k => $comments)
    <!--Выводим только родительские комментарии parent_id = 0-->

    @if($k)

    @break

    @endif

    @include('users', ['items' => $comments])

    @endforeach

    </ol>
