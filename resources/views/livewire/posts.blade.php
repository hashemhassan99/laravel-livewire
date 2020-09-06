<div>
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex">
                    <b>Posts</b>
                    <a href="{{route('posts.create')}}" class="btn btn-primary btn-sm ml-auto">Create Post</a>
                </div>
                <div class="table-responsive">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Owner</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>
                                        @if($post->image != '')
                                        <img src="{{asset('assets/images/'.$post->image)}}" width="100" alt="{{$post->title}}">
                                        @endif
                                    </td>
                                    <td>
                                        <a href="#">{{$post->title}}</a>
                                    </td>
                                    <td>{{$post->user->name}}</td>
                                    <td>{{$post->category->name}}</td>
                                    <td>
                                        <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="javascript:void(0)" class="btn btn-danger btn-sm"
                                           onclick="confirm('Are you sure?');   return false; ">Delete</a>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="float-right">
                        {!! $posts->links() !!}
                    </div>
                </div>

            </div>

        </div>
    </div>

</div>
