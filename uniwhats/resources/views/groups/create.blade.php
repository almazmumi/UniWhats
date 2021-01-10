@extends('layouts.app')

@section('content')
<div class="form-container">

    <form method="POST" action="{{ route('groups.store') }}" class="ui form">
        @csrf
        <div class="fields">
            <div class="ten wide field">
                <label for="department_id">Department</label>
                <div class="ui search labeled selection dropdown departments">
                    <input id="department_id" name="department_id" type="hidden"> 
                    <span class="text"></span>
                    <i class="dropdown icon"></i>
                </div>
                @error('department_id')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
                @enderror
            </div>
            <div class="six wide field">
                <label for="courseCode">Course Code</label>
                <div class="ui search labeled selection dropdown courses">
                    <input id="courseCode" name="courseCode" type="hidden"> 
                    <span class="text">Select Course Code</span>
                    <i class="dropdown icon"></i>
                </div>
                @error('courseCode')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
                @enderror
            </div>
        </div>
        <div class="inline field">
            <div class="ui checkbox" onclick="myFunction()">
                <input id="isGeneral" type="checkbox" tabindex="0" class="hidden" name="isGeneral">
                <label for="isGeneral">is it for specific section?</label>
                @error('isGeneral')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
                @enderror
            </div>
        </div>
        <div class="field sectionInput disabled">
            <label for="sectionNumber">Section Number</label>
            <div class="ui search labeled selection dropdown sectionNumbers">
                <input id="sectionNumber" name="sectionNumber" type="hidden"> 
                <span class="text">Select Course Code</span>
                <i class="dropdown icon"></i>
            </div>
            @error('sectionNumber')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>
            @enderror
        </div>

        <div class="field">
            <label for="url">URL Link</label>
            <input id="url" type="url" name="url" value="{{old('url')}}">
            @error('url')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>
            @enderror
        </div>

        <div class="field" >
            <button type="submit"><i class='fas fa-angle-double-right'></i>    {{ __('Submit') }} </button>
        </div>
    </form>
</div>



@endsection



@section("script")
<script>

    let coursesInJSON = null;
    $('.dropdown.departments').dropdown("change values",
        [
            {value: 0, name:'Select Department'},
            {value: 1, name:'ACFN - Accounting Finance'},
            {value: 2, name:'AE - Aerospace Engineering'},
            {value: 3, name:'ARE - Architectural Engineering'},
            {value: 4, name:'ARC - Architecture'},
            {value: 5, name:'CE - Civil Environmental Engg'},
            {value: 6, name:'CEM - Construction Engg Management'},
            {value: 7, name:'CHE - Chemical Engineering'},
            {value: 8, name:'CHEM - Chemistry'},
            {value: 9, name:'COE - Computer Engineering'},
            {value: 10, name:'CPG'},
            {value: 11, name:'CRP - City Regional Planning'},
            {value: 12, name:'ERTH - Earth Sciences'},
            {value: 13, name:'EE - Electrical Engineering'},
            {value: 14, name:'ELI - English Language Inst. (Prep)'},
            {value: 15, name:'ELD - English Language Department'},
            {value: 16, name:'ISOM - Info. Systems Operations Mgt'},
            {value: 17, name:'GS - Global Social Studies'},
            {value: 18, name:'IAS - Islamic &amp; Arabic Studies'},
            {value: 19, name:'ICS - Information &amp; Computer Science'},
            {value: 20, name:'LS - Life Sciences'},
            {value: 21, name:'MATH - Mathematics &amp; Statistics'},
            {value: 22, name:'MBA - Business Administration'},
            {value: 23, name:'ME - Mechanical Engineering'},
            {value: 24, name:'MGT - Management and Marketing'},
            {value: 25, name:'PE - Physical Education'},
            {value: 26, name:'PETE - Petroleum Engineering'},
            {value: 27, name:'PHYS - Physics'},
            {value: 28, name:'PSE - Prep Science &amp; Engineering'},
            {value: 29, name:'SE - Systems Engineering'},
        ]);
    $('.dropdown.departments').dropdown({
        onChange: function(value, text) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            if(value != 0){
                let form = document.querySelector("form")
                form.classList.add("loading");
                $.ajax({
                    url: "http://uniwhats.herokuapp.com/getCourses/"+text.split(" ")[0],
                    type: "POST",
                    cache: false,
                    contentType: 'application/json; charset=utf-8',
                    processData: false,
                    success: function (response)
                    {
                        form.classList.remove("loading");
                        let values = [{value: -1, name:'Select Course'}];
                        coursesInJSON = response;
                        for(let course in coursesInJSON){
                            
                            values.push({value: course, name:course})
                        }
                        $('.dropdown.courses').dropdown("change values", values);
                        $('.dropdown.sectionNumbers').dropdown("set selected", -1);

                    }
                });
                
            }
        }
    });
    $('.dropdown.courses').dropdown({
        onChange: function(value, text) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            if(value != 0){

                let values = [{value: -1, name:'Select Course'}];

                for(let section in coursesInJSON[text]){
                    values.push({value: coursesInJSON[text][section], name:coursesInJSON[text][section]});
                    console.log(section);
                    console.log(text);

                }

                $('.dropdown.sectionNumbers').dropdown("change values", values);
                $('.dropdown.sectionNumbers').dropdown("set selected", -1);
            }
        }
    });




    if("{{old('department_id')}}" == ""){
        $('.dropdown.departments').dropdown('set selected', "0");
    }else{
        $('.dropdown.departments').dropdown('set selected', "{{old('department_id')}}");
    }

    

    if("{{old('isGeneral')}}" == ""){
        $('.ui.checkbox').checkbox('set unchecked');
        document.getElementsByClassName("sectionInput")[0].classList.add("disabled")

    }else{
        $('.ui.checkbox').checkbox('set checked');
        document.getElementsByClassName("sectionInput")[0].classList.remove("disabled")

    }



    
    function myFunction(){
        if($('.ui.checkbox').checkbox("is checked")){
            document.getElementsByClassName("sectionInput")[0].classList.add("disabled")

        }else{
            document.getElementsByClassName("sectionInput")[0].classList.remove("disabled")
        }
        
    }





    
</script>
@endsection