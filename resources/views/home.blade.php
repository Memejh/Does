@extends('layouts.navbar')

@section('content')
<div class="main-content">
    <form action="/upload" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        Product name:
        <br />
        <input type="text" name="name" />
        <br /><br />
        Product photos (can attach more than one):
        <br />
        <input type="file" name="file" />
        <br /><br />
        <input type="submit" value="Upload" />
    </form>
    @endsection
