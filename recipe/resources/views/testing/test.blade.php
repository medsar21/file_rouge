@extends('layouts.home.master')

@section('content')
    <select class="js-example-basic-single" name="state">
        <option value="AL">Alabama</option>
        <option value="WY">Wyoming</option>
    </select>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
@endsection
