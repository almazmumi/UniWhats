@extends('layouts.app')

@section('content')

<div class="group">
    <div class="group-card">
        <div class="circle">
            <p>{{$group->department->shortName}}</p>
        </div>
    
        <div class="group-information">
            <p class="course-name">{{$group->courseCode}}</p>
        </div>
            <a class="join-button" href="@isset($group->url){{$group->url}}@else {{route("login")}}@endisset">JOIN</a>
    </div>

</div>


@endsection



@section("script")
<script>




    
</script>
@endsection