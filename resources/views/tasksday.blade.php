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
.task{
    width:300px;
    height:300px;
    border:2px solid black;
    border-radius: 5px;
}

    </style>


    <div class="global">

        <div class="body">
            <div class="task">

            </div>
        </div>
    </div>

<script>
    
</script>
@endsection
