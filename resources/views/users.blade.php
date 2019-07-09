<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bla Bla Bla company</title>
    <
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
</head>

@foreach($items as $item)


    <br>
<ul>
    <li class="tree-view closed">{{'Name: ' . $item->name }}</li>
    <li>{{'Position: ' . $item->position }}</li>
    <li>{{'Salary: ' . $item->salary .'$' }}</li>
    <li>{{'employment_date: ' . $item->employment_date }}</li>
</ul>
        @if(isset($users[$item->id]))
            <ul class="children">
                @include(env('THEME').'.users', ['items' => $users[$item->id]])
            </ul>
        @endif
    </li>

@endforeach
