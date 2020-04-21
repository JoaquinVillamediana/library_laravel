
@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log-In</title>
    <link rel="stylesheet" href="styles/index.css">
</head>
<body>
    <style>
    
    *{
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}

body{
  background: #fff;
  font-family: Arial, Helvetica, sans-serif;

}
.title{
  width: 500px;
  margin: 20px auto;
  text-align: center;

}

 h1{
   margin: auto;
 }
.contain{
  width: 500px;
  margin: 20px auto;
  background-color: #f2f2f2;
  border-radius: 5px;
  padding: 20px;



}


button{
  display: block;
  width: 200px;
  padding: 10px;
  margin:10px auto;
  border-radius: 5px;
  border: 1px solid #4fb560;
  color: #4fb560;
  background-color: #f2f2f2;
  font-size: 20px;
  cursor: pointer;
  transition:all .3s ease;
}

.contain button:hover{
  background: #4fb560;
  color: #fff;
  transform:scale(1.1,1.1);
}
    </style>
    <div class="title">
        <h1>Bienvenido</h1>
    </div>
   <div class="contain">
<button onclick="location.href='{{ route('login') }}'">Ingresar</button>
</div>
</body>
</html>

@endsection