@foreach($items as $item)
    <li id="li-comment-{{$item->id}}" class="comment">
        <div id="comment-{{$item->id}}" class="comment-container">

            {{'Name: ' . $item->name }}<br>
            {{'Position: ' . $item->position }}<br>
            {{'Salary: ' . $item->salary .'$' }}<br>
            {{'employment_date: ' . $item->employment_date }}<br>

        @if(isset($users[$item->id]))
            <ul class="children">
                @include(env('THEME').'.users', ['items' => $users[$item->id]])
            </ul>
        @endif
    </li>
@endforeach