@inject('categories', "App\Category")
@section('title')
    New Posts
@endsection
.<!-- Button trigger modal -->
    <a class="btn btn-outline-primary" data-toggle="modal" data-target="#modelId" style="width: 100px;" href="">
              <span class="float-md-left">
                  <i class="fa fa-plus"></i>
              </span>New
    </a>
    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            {!! Form::open(['method' => 'POST', 'action' => 'PostController@store']) !!}
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="form-group">
                            {{Form::label('title', 'Title' )}}
                            {{Form::text('title', '', ['class' => 'form-control'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('content', 'Content' )}}
                            {{Form::text('content', '', ['class' => 'form-control'])}}
                        </div>
                        <div class="form-group">
{{--                            {{Form::label('image', 'Image' )}}--}}
                            {{Form::file('cover_image', ['class' => 'form-control'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('', 'Category' )}}
                            {{Form::select('category_id', $categories->pluck('name', 'id'))}}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    {{Form::submit('Add', ['class' => 'btn btn-primary'])}}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

    <script>
        $('#exampleModal').on('show.bs.modal', event => {
            var button = $(event.relatedTarget);
            var modal = $(this);
            // Use above variables to manipulate the DOM

        });
    </script>

