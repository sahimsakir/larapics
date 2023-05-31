<h1>All Images</h1>
<div class="">
    <a href="{{ route('image.create') }}">Upload Image</a>
</div><br/>

@if ($message = session('message'))
<div class="">{{ $message }}</div><br/>
@endif
@foreach ($images as $image)
<div class="">
    <a href="{{ $image->permalink() }}">
        <img src="{{ $image->fileUrl() }}" alt="{{ $image->title }}" width="300" height="200">
    </a>
</div><br/>

@endforeach
