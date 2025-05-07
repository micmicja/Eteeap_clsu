@extends('layouts.admin')

@section('content')
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
<style type="text/css">
.ck-editor__editable_inline {
    height: 450px;
}
</style>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
     
        <div class="col-md-7">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>Post New Announcement</h5>
                </div>
                <div class="ibox-content">
                  
                    <form method="POST" action="{{ route('admin.announcement.store') }}" enctype="multipart/form-data">
                        @csrf
                       
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                   
                        <div class="form-group">
                            <label for="description">Content:</label>
                            <textarea name="description" id="editor"></textarea>
                        </div>
                      
                        <button type="submit" class="btn btn-primary">Post Announcement</button>
                    </form>
                </div>
            </div>
        </div>
    
       
        <div class="col-md-5">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>Existing Announcements</h5>
                </div>
                <div class="ibox-content" style="max-height: 600px; overflow-y: auto;">
                    @if($posts->count() > 0)
                        @foreach($posts as $post)
                            <div class="alert alert-info d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>{{ $post->title }}</strong><br>
                                    <small>{!! Str::limit(strip_tags($post->description), 50) !!}</small>
                                </div>
                                <form action="{{ route('admin.announcement.destroy', $post->id) }}" method="POST" style="margin-left: 10px;" onsubmit="return confirm('Delete this post?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-xs">X</button>
                                </form>
                            </div>
                        @endforeach
                    @else
                        <p>No announcements yet.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'), {
            ckfinder: {
                uploadUrl: "{{ route('ckeditor.upload') }}?_token={{ csrf_token() }}"
            }
        })
        .catch(error => {
            console.error(error);
        });
</script>
@endsection
