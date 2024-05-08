<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hi Everyone ! This is Anakin Skywalker </h1> 
    <h3>This is Home Page</h3>
    <p>My age is {{2+19}}</p>
    <p>My cat name is {{$catName}}</p>
    <ul>
        @foreach($hobbies as $hobby)
                <li>
                    {{$hobby}}
                </li>
            @endforeach
    </ul>
    <a href="/about"> <button>Go to About Page</button></a>
</body>
</html>