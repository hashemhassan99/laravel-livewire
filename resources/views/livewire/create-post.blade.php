<div>
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex">
                    <b>Create New Post</b>
                    <a wire:click="return_to_posts" class="btn btn-primary btn-sm ml-auto">Posts</a>
                </div>
                <div class="table-responsive">
                    <div class="card-body">


                        <form wire:submit.prevent="save" enctype="multipart/form-data">
                            <div class="form-group">
                                <lable for="title">Title</lable>
                                <input type="text" name="title" wire:model="title" class="form-control">
                                @error('title')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <lable for="category">Category</lable>
                                <select name="category" wire:model="category" class="form-control">
                                    <option></option>
                                    @foreach($categories as $category)
                                        <option
                                            value="{{$category->id}}" {{old('category') == $category->id ? 'selected ':''}}>{{$category->name}}</option>
                                    @endforeach

                                </select>
                                @error('category')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <lable for="body">Body</lable>
                                <textarea name="body" class="form-control" wire:model="body" rows="5"></textarea>
                                @error('body')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <lable for="image">Image</lable>
                                <input type="file" name="image" class="custom-file" wire:model="image">
                                @error('image')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="text-center">
                                <input type="submit" name="save" value="Add Post" class="btn btn-primary">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
