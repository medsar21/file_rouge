@extends('layouts.home.master')

@section('content')
    @include('layouts.home.single-recipe')
    @include('layouts.home.comments')
    <script>
        function showReplies(button) {
            var parentDiv = $(button).parent();
            var repliesDiv = parentDiv.find(".replies");
            var showButton = parentDiv.find(".show");
            var hideButton = parentDiv.find(".hide");

            repliesDiv.css('display', 'block'); // Only show replies within the clicked section
            showButton.hide();
            hideButton.show();
        }

        function hideReplies(button) {
            var parentDiv = $(button).parent();
            var repliesDiv = parentDiv.find(".replies");
            var showButton = parentDiv.find(".show");
            var hideButton = parentDiv.find(".hide");

            repliesDiv.css('display', 'none'); // Only hide replies within the clicked section
            showButton.show();
            hideButton.hide();
        }
    </script>
@endsection
