<html>
    <head>
        @vite(['resources/js/app.js'])
    </head>
    <body>
        <div class="container">
            <h1>{{ $news->title }}</h1>
            
            <b>Category: {{ $news->category->name }}</b>
            <p>
                {{ $news->description }}
            </p>

            <div>
                <span><a href="{{ route('manager.index') }}" class="btn btn-primary">Home</a></span>
                <span><a href="{{ route('manager.edit', ['manager' => $news->id]) }}" class="btn btn-primary">Edit</a></span>
                <form method="POST" action="{{ route('manager.destroy', ['manager' => $news->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn">Remove</button>
                </form>
            </div>            
        </div>
    </body>
</html>

