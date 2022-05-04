@extends('layouts.app')

@section('content')
<style>
    *{
    margin:0;
    padding:0;
    box-sizing: border-box;
}
html,body, .global{
    widtH:100%;
    height:100%;
    display:flex;
    flex-flow: column nowrap;
}
.nav{
    width:100%;
    height:80px;
    background:rgb(71, 131, 172);
    position:fixed;
}
.body{
    width:100%;
    height:60%;
    display:flex;
    flex-flow: column nowrap;
    justify-content: center;
    align-items: center;
}
.calendar{
    width:800px;
    height:500px;
    display:inline-flex;
    flex-flow: row wrap;
    margin-top:50px;
}
.calendar > div {
    width:100px;
    height:100px;
    background:rgb(243, 205, 211);
    border:1px solid black;
}
.calendar > div:hover {
    cursor:pointer;
    background:rgb(253, 247, 247);
}
.task{
    background:rgba(145, 255, 141, 0.452) !important;
}
#bottom-menu{
    width:100vw;
    height:200px;
    background-color:red;
}
    </style>


    <div class="global">

        <div class="body">
            <div class="calendar">


            </div>

        </div>


        </div>
    </div>

<<<<<<< HEAD
<input id="uid" type="hidden" value="{{ Auth::user()->id }}">

<script>
    let uid = document.getElementById("uid").value;
    console.log(uid.value);
    const getTasks = async () => {
        const response = await fetch("http://localhost:8000/api/tasks/",{
            method: 'POST',
            headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
        "X-CSRF-Token": document.querySelector('input[name=_token]').value
        },
        body: uid
        });
=======
<script>
    const getTasks = async () => {
        const response = await fetch("http://localhost:8000/api/tasks%22);
>>>>>>> 2f13ca3bdda38ae4aecca13bcbe53fddf27d8541
        const data = await response.json();
        console.log(data);
        setTasks(data.data);
    }
    getTasks();
    const setTasks = (array) => {
        const calendar = document.getElementsByClassName('calendar')[0];
        for(let i=1;i<=31;i++){
            const div = document.createElement('div');
            array.map((day) => {
                let date = new Date(day.datetask);
                if(i == date.getDate()){
                    div.className = "task";
                }
            });
            div.textContent = i;
            calendar.appendChild(div);
        }
    }


</script>
<<<<<<< HEAD
@endsection
=======
@endsection
>>>>>>> 2f13ca3bdda38ae4aecca13bcbe53fddf27d8541
