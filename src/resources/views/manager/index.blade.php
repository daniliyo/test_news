<html>
    <head>
        @vite(['resources/js/app.js'])
    </head>
    <body>
        <div class="container">
            <h1>Manager</h1>
            <div class="row">
                <a href="{{ route('manager.create') }}" class="button">Add news</a>
            </div>
            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($all_news as $news)
                            <tr>
                                <th scope="row">{{ $news->id }}</th>
                                <td>{{ $news->title }}</td>
                                <td>
                                    <a href="{{ route('manager.show', ['manager' => $news->id]) }}" class="btn">Show</a>
                                    <a href="{{ route('manager.edit', ['manager' => $news->id]) }}" class="btn">Edit</a>
                                    <form method="POST" action="{{ route('manager.destroy', ['manager' => $news->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn">Remove</button>
                                    </form>
                                </td>
                            </tr>    
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>

