<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />


    </head>
    <body class="antialiased">
    <div><a href="/">Home</a> 
        <hr/>
        <div class="container">
            @yield('content')
        </div>
         
        <h1> assingment</h1>

        <label for="color">Tree Option:</label>
<select name="color" id="color">
	<option value="">--- Choose a color ---</option>
	<option value="red"> A </option>
    


	<option value="green"> B </option>
	<option value="blue"> C </option>
</select>

    </body>
</html>
