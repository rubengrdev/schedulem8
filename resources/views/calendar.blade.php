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

<script>
    const calendar = document.getElementsByClassName('calendar')[0];
    const task = [1,4,7,25,30];
    for(let i=1;i<=31;i++){
        const div = document.createElement('div');
        task.map((day) => {
            if(i === day){
                div.className = "task";
            }
        });
        div.textContent = i;
        calendar.appendChild(div);
    }

</script>
@endsection
