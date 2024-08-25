@extends('layouts.app')

@section('title', 'Category Details')

@section('content')
<h1>Category: {{ $category->name }}</h1>
<p>{{ $category->description }}</p>
<a href="{{ route('categories.index') }}" class="btn btn-secondary">Back to Categories</a>
@endsection
