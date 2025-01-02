@extends('layouts.app')

@section('content')

@php
$files = File::files(base_path('resources/views/components/test'));
@endphp

@foreach ($files as $file)
<div class="mx-auto">
    {{$file->getFilename()}}
    @php
    $filename = explode(".blade.php",$file->getFilename())[0];
    @endphp
    @include("components.test.$filename")
    <br>
</div>
@endforeach

@endsection