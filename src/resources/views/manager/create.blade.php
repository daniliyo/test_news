<html>
    <head>
        @vite(['resources/js/app.js'])
    </head>
    <body>
        <div class="container">
            <h1>Create news</h1>
            <div class="row">
                <a href="{{ route('manager.index') }}" class="button">Home</a>
            </div>
            <div class="row">
                <form method="POST" action="{{ route('manager.store') }}">
                    @csrf
                    <hr>
                    <div class="mb-3">
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" 
                            name="title" id="title" aria-describedby="emailHelp" value="{{ old('title') }}">
                    </div>
                    <hr>
                    <div class="mb-3">
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                            name="description" id="description" rows="3">{{ old('description') }}</textarea>
                    </div>
                    <hr>
                    <div class="mb-3">
                        @error('category')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="category" class="form-label">Category</label>
                        <select class="form-select @error('category') is-invalid @enderror" name="category" id="category">
                            @foreach ($categories as $category)
                                <option 
                                    @if(old('category') == $category->id) selected @endif 
                                    value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </body>
</html>

