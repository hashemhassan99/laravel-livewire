<div>
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex">
                    <b>Show Post</b>
                    <a wire:click="return_to_posts"class="btn btn-primary btn-sm ml-auto">Posts</a>
                </div>
                <div class="table-responsive">
                    <div class="card-body">
                        <div class="raw">
                            @if($this->image != '')
                                <div class="col-12 text-center">
                                    <img src="{{asset('assets/images/' . $this->image)}}"class="img-fluid" style="max-width: 100%" alt="{{$this->title}}">
                                </div>
                                @endif
                            <div class="col-12 justify-content-center pt-5">
                                <h3>{{$this->title}}</h3>
                                <small>{{$this->category}} || By: {{$this->user}}</small>
                                <p>
                                    {!! $this->body !!}
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
