@extends('layouts.app')

@section('content')
<div class="groups-container">
    @auth
    <div class='groups-overlay'>
        <p onclick='hideGroupOverlay()'>CLOSE</p>
        
        <div class="commentsHeader">
            <textarea placeholder="Add your group comments here"></textarea>
            <button onclick="postComment(this)" class="ui button" style="margin-left:5px; background-color:#fff;">Submit</button>
        </div>
        
        <div class="comments">
            
        </div>
    </div>
    @endauth
    @forelse($groups as $group)
    <div class="group">
        <div class="group-card">
            <div class="circle">
                <p>{{$group->shortName}}</p>
            </div>

            <div class="group-information" onclick="showGroupOverlay(this)">
                <p class="course-name">{{$group->courseCode}}</p>
                @if($group->isGeneral)
                <p class="instructor-name">Section {{$group->sectionNumber}}</p>
                @else
                <p class="instructor-name">All Sections</p>
                @endif
            </div>
            @guest
                <a class="join-button" href="{{isset($group->url)?$group->url:"login"}}">JOIN</a>
            @else
                <a class="join-button" href="{{$group->url}}">JOIN</a>
            @endguest
        </div>

        <div class="buttons">
            <a class="b" href="https://wa.me/?text=The Group Link for the course {{$group->courseCode}}: {{$group->url}}">Share</a>
            <a class="b" onclick="copyToClipboard('${e.url}')">Copy Link</a>
            @if(Auth::check() && Auth::user()->id == $group->user_id)
            <form method="POST" action="{{route('groups.destroy', $group->id)}}">
                @csrf
                @method('delete')
                <a class="b" onclick="if(confirm('Are you sure?')){this.parentElement.submit()}">Delete</a>
            </form>
            @endif
        </div>
    </div>
    @empty
    <div class="no-groups">
        <i style="font-size:49vw;color: #b7b7b782;display: block;margin: 40px;margin-bottom: 75px;" class="fa fa-rocket"></i>
        <p style="font-size: 150%;color: #00000082;">
            No courses has been added yet.
        </p>
        <a href="{{route('groups.create')}}" style="border: none;padding: 1em;border-radius: 6px;background-color: #d9d9d952;color: #000000b5;margin-top: 10px;display: block;">
            Click to add new Course
        </a>
    </div>
    @endforelse
</div>
@endsection

@section('searchBar')
<div class="searchBarContainer">

    <div class="searchBar">
        <input id="searchByName" type="text" placeholder="Search Cources..">
        <i class="fas fa-search"></i>
    </div>
</div>
@endsection

@section("style")
<style>
    .navbar{
        height: 105px;
    }
</style>
@endsection
@section('script')
<script>
    // All groups functions
    // let groups = [];




    // SearchBar with sticky
    const searchBarContainer = document.querySelector('.searchBarContainer');
    const searchBarOffset = searchBarContainer.offsetTop;
    let addBoolean = false;
    let removeBoolean = false;
    window.onscroll=e=>{
        if(window.pageYOffset >= searchBarOffset){
            if(!addBoolean){
                searchBarContainer.classList.add('sticky');
                addBoolean = true;
                removeBoolean = false;
            }
        }else{
            if(!removeBoolean){
                searchBarContainer.classList.remove('sticky')
                addBoolean = false;
                removeBoolean = true;
            }
        }
    };




    // Search Functionality
    const searchBar = document.getElementById("searchByName");
    const groups = document.querySelectorAll(".group");

    searchBar.addEventListener('keyup', e => {
        let count = 0;
        groups.forEach(group=>{
            if(group.querySelector('.course-name').innerText.startsWith(searchBar.value)){
                group.style.display = "flex";
                count++;
            }else{
                group.style.display = "none";
            }
        });
        console.log(count);
        
        if(count == 0){
            createMessageElementInCaseNoCources("Sorry, no courses with the given name");
        }else{
            let div = document.querySelector(".no-groups")
            
            if(div)div.remove();
        }
    });















    function createMessageElementInCaseNoCources(message){
        const groupsConteainer = document.querySelector(".groups-container");
        const noGroupDiv = document.createElement('div');
        groupsConteainer.appendChild(noGroupDiv);

        noGroupDiv.outerHTML = `
        <div class="no-groups">
            <i style="font-size:49vw;color: #b7b7b782;display: block;margin: 40px;margin-bottom: 75px;" class="fa fa-rocket"></i>
            <p style="font-size: 150%;color: #00000082;">
                ${message}
            </p>
            <a href="{{route('groups.create')}}" style="border: none;padding: 1em;border-radius: 6px;background-color: #d9d9d952;color: #000000b5;margin-top: 10px;display: block;">
                Click to add new Course
            </a>
        </div>`;


    }

    function createCommentsElements(comments){
        const commentsDiv = document.querySelector(".comments");
        comments.forEach(e=>{
            let date = new Date(e.created_at);
            const comment = document.createElement("div");
            commentsDiv.appendChild(comment);
            comment.classList.add("comment");
            comment.innerHTML = `
                <p style="margin: 0;text-align: left;margin-bottom: 10px;font-size: 15px;"><b>${e.name} </b><span style="font-size: 13px;margin-left: 8px;">${date.toLocaleString()}</span></p>
                <p style="text-align: left;margin-bottom: 0;margin-left: 10px;">${e.commentText}</p>
            `; 
        });


    }


    let groupElement = null;
    async function showGroupOverlay(element){

        if("{{Auth::check()}}"!=""){

            groupElement = element.parentElement.parentElement;
            groupElement.style.zIndex = 11111;
            groupElement.style.top = 170-groupElement.offsetTop + "px";
            document.querySelector(".container").style.position = "fixed";
            document.querySelector(".container").style.top = "0px";
            let overlay = document.querySelector(".groups-overlay").classList.add("show");
            groupElement.querySelector(".buttons").classList.add("show");

            await fetchCommand();
        }else{


            location.replace("login")
        }

    }

    function hideGroupOverlay(){
        groupElement.style.zIndex = 0;
        groupElement.style.top = "0px";
        document.querySelector(".container").style.position = "static";
        document.querySelector(".container").style.top = "";
        let overlay = document.querySelector(".groups-overlay").classList.remove("show");
        groupElement.querySelector(".buttons").classList.remove("show");
        document.querySelector(".commentsHeader textarea").value = "";
        if(document.querySelector(".confirmationMessage")){
            document.querySelector(".confirmationMessage").remove()
        }
        document.querySelector(".comments").innerHTML = "";
    }


    // Copy Link Functions
    const copyToClipboard = str => {
        if(str == "undefined"){
            const el1 = document.createElement("div");
            document.body.appendChild(el1);
            el1.outerHTML = `
            <div id="toastNotification" style="position: fixed; bottom: 25px; left: 0px; right: 0px; text-align: center;left: calc(50vw - 115px);width: 210px;background-color: #0b0a0ad6;padding: 10px;color: #fff;border-radius: 5px;border: 1px solid #f7f7f7; font-size: 16px;">
                <p style="text-align:center;">Login first to open the details.</p>
            </div>`;
            
            setTimeout(e=>{
                document.getElementById('toastNotification').remove();
            }, 2000)
        }else{
            const el = document.createElement('textarea');
            el.value = str;
            el.setAttribute('readonly', '');
            el.style.position = 'absolute';
            el.style.left = '-9999px';
            document.body.appendChild(el);
            el.select();
            document.execCommand('copy');
            document.body.removeChild(el);


            const el1 = document.createElement("div");
            document.body.appendChild(el1);
            el1.outerHTML = `
            <div style="position: fixed; bottom: 25px; left: 0px; right: 0px; text-align: center;left: calc(50vw - 115px);width: 210px;background-color: #0b0a0ad6;padding: 10px;color: #fff;border-radius: 5px;border: 1px solid #f7f7f7; font-size: 16px;">
                <p style="text-align:center;">Link copied to clipboard</p>
            </div>`;
            
            setTimeout(e=>{
                el1.remove();
            }, 2000)

        }

    };

    async function postComment(elem){
        let group_id = groupElement.dataset.group;
        let commentText = document.querySelector(".commentsHeader textarea").value;

        let token = document.querySelector('meta[name=csrf-token]').getAttribute('content');
        fetch("/comments", {
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json, text-plain, */*",
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-TOKEN": token
            },
            method: 'post',
            credentials: "same-origin",
            body: JSON.stringify({commentText:commentText, group_id:group_id})

        }).then((data) => {
            if(data.status == 200){
                const el = document.createElement("p")
                el.classList.add("confirmationMessage")
                el.innerText = "Your comment is received";
                el.style.position = "static";
                el.style.marginTop = "25px";
                document.querySelector(".groups-overlay").appendChild(el);
                document.querySelector(".commentsHeader textarea").value = "";
            }else{
                el.innerText = "Some error occured, please try again later.";
            }
        }).catch(function(error) {
            console.log(error);
        });

        await fetchCommand();

    }


    function fetchCommand(){
        let group_id = groupElement.dataset.group;
        let commentText = document.querySelector(".commentsHeader textarea").value;

        let token = document.querySelector('meta[name=csrf-token]').getAttribute('content');
        fetch(`/comments?group_id=${group_id}`, {
            headers: {
                "Content-Type": "application/json",
            },
            method: 'get',

        }).then((data) => {
            let p = data.json().then(comments=>{
                createCommentsElements(comments)
            });
        }).catch(function(error) {
            console.log(error);
        });

        
    }


    function deleteGroup(){
        
        var confirmMessage = confirm("Are you sure?");
        let token = document.querySelector('meta[name=csrf-token]').getAttribute('content');

        if (confirmMessage) {
            let group_id = groupElement.dataset.group;
            fetch('/groups/' + group_id, {
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json, text-plain, */*",
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-TOKEN": token
                },
                method: 'DELETE',
                
            }).then(response => response.text())
            .then(data => {
                
                if(data.includes("Delete process is Done!")){
                    location.replace("")
                }
            })
            .then((response) => {
                console.log(response)
            });
        }
    }
    
</script>
@endsection
