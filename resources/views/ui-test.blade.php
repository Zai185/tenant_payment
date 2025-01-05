@extends('layouts.app')

@section('content')

<x-mijn.command>
    <x-mijn.command.search />
    <x-mijn.command.list></x-mijn.command.list>
</x-mijn.command>

@endsection