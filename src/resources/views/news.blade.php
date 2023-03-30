<html>
    <head>   
        @vite(['resources/js/app.js'])
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    </head>
    <body>
        <div class="container">
            <h1>Newsline</h1>
            
            <div class="row">
                <div class="col-md-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link @if(!Request::get('by_category')) fw-bold @endif" href="{{ route('home') }}">All </a>
                        </li>
                        @foreach($categories as $category)
                        <li class="nav-item">
                            <a class="nav-link @if(Request::get('by_category') == $category->id) fw-bold @endif" href="{{ route('home', ['by_category' => $category->id]) }}">{{ $category->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-9">
                    @foreach($all_news as $news) 
                    <div class="row">
                        <p>
                            <div class="card-body">
                                <h5 class="card-title">{{ $news->title }}</h5>
                                <a href="#" class="openModal" attr_news_id="{{ $news->id }}">Open more information in modal window</a>
                            </div>
                        </p>
                    </div>
                    @endforeach
                    
                </div>
                
            </div>
            
            <div class="d-flex justify-content-center">
                {{ $all_news->links() }}
            </div>
            
        </div>
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle"></h5>
                    <button type="button" class="close" onclick="$('#exampleModalCenter').modal('hide')" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modalDescription">
                    
                </div>
                <div>
                    <h5>Category: <span id="modalCategory"></span></h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="$('#exampleModalCenter').modal('hide')" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>
        
        <script>
            $(document).on('click', ".openModal", function(e){
                e.preventDefault();
                let news_id = $(this).attr('attr_news_id');
                
                $.ajax({
                    url: '/api/news/'+news_id,
                    method: 'GET',
                    dataType: 'JSON',
                    success: function(data){
                        $("#modalTitle").html(data.title);
                        $("#modalDescription").html(data.description);
                        $("#modalCategory").html(data.category.name);
                        $('#exampleModalCenter').modal('show')
                    }
                });
            });
        </script>

    </body>
</html>

