@extends('layouts.app')

@section('content')

<div class="body-theme">
    <div class="container">
        <h1>MEDIA LIBRARY</h1>

        <SECTION>
        <DIV id="dropzone">
            <FORM class="dropzone needsclick" id="demo-upload" action="/upload">
            <DIV class="dz-message needsclick">    
                Drop files here or click to upload.<BR>
                <SPAN class="note needsclick">(This is just a demo dropzone. Selected 
                files are <STRONG>not</STRONG> actually uploaded.)</SPAN>
            </DIV>
            </FORM>
        </DIV>
        </SECTION>
    </div>
</div>


@endsection
