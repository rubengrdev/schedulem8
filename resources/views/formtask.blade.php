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
form{
    width:300px;
    height:400px;
    border:2px solid black;
    border-radius:5px;
    display:flex;
    flex-flow: column nowrap;
    justify-content: center;
    align-items: center;
}
input{
    width:200px;
    height:40px;
    margin-bottom:10px;
    border-radius:5px;
    border:2px solid grey;
    padding-left:5px;
}
select{
    width:100px;
}

    </style>


    <div class="global">

        <div class="body">
            <br>
            <form>
                @csrf
                <input id="title" type="text" placeholder="titulo"/>
                <input id="desc" type="text" placeholder="descripcion"/>
                <input id="cat" type="text" placeholder="categoria"/>
                <select id="date">
                </select>
            </form>
            <br>
            <button id="button" class="btn btn-primary" type="button">Enviar</button>
        </div>
    </div>
    <input id="uid" type="hidden" value="{{ Auth::user()->id }}">
<script>
    const select = document.getElementById("date");
    const button = document.getElementById("button");
    const title = document.getElementById("title");
    const desc = document.getElementById("desc");
    const cat = document.getElementById("cat");
    const iduser = document.getElementById("uid");
    for(let i = 1; i<=31; i++){
        if(i < 10){
            select.innerHTML += `<option value="2022-05-0${i}">2022-05-0${i}</option>`;
        }else{
            select.innerHTML += `<option value="2022-05-${i}">2022-05-${i}</option>`;

        }
    }
    button.addEventListener("click", () => sendForm());
    const sendForm = async () => {
        const response = await fetch("http://localhost:8000/api/tasks/store",{
            method:"POST",
            body:JSON.stringify({
                title:title.value,
                desc:desc.value,
                category:cat.value,
                datetask:select.value,
                user_id:iduser.value
            }),
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'Access-Control-Allow-Origin':"*",
                "X-CSRF-Token": document.querySelector('input[name=_token]').value
            }
        });
        console.log(response);
        title.value = "";
        desc.value = "";
        cat.value = "";
        select.value = "";
    }
</script>
@endsection
