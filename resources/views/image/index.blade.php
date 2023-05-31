<h1>All Images</h1>

@foreach ($images as $image)
<div class="">
    <a href="{{ $image->permalink() }}">
        <img src="{{ $image->fileUrl() }}" alt="{{ $image->title }}" width="300" height="100">
    </a>
</div><br/>

@endforeach
