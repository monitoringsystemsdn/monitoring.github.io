

 <html>
    <head>
        <title>Login </title>
           
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <body>  
           
            <img src="<?php echo base_url('images/sdn.png'); ?>" /> 

            <div class="loginbox" >
         
             <h1>Account Login </h1>
            <form method="POST" action="Dashboard/index">
                <p>Username</p>
                <input type="text" name="Email_ID" placeholder="Enter Email">
                <?php echo form_error('Email_ID'); ?> 
                <p>Password</p> 
                <input type="password" name="Password" placeholder="Enter Password">
                <?php echo form_error('Password'); ?> 
                
                <input type="Submit" name="" value="Login">
                <br>
                <a href="#">Forgot your password?</a><br>
                <p>Don't have an account?</p> 
                <a href="<?= base_url('Dashboard/registration') ?>"> <input type="register" name="submit" value="Register" ></a>
                
             </form> 
            </div>
           <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
           <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        </body>
    <style>

.loginbox{
    width: 380px;
    height: 480px ;
    background:linear-gradient(lightblue,pink);
    color:#fff;
    top:50%;
    left:50%;
    position: absolute;
    transform: translate(-50%,-50%);
    box-sizing:border-box;
    padding:70px,40px;
    color:black;
}



h1{
    margin-top: 0px;
    margin-bottom: 10px;
    text-align: center;
    font-size:  50px;
    color:brown;
    font-family: "Oswald", sans;
    font-weight: normal;
  
}

.loginbox p{
    margin:0;
    padding:0;
    font-size:20px;
    color:black;
    font-family: "Oswald", sans;
    font-weight: normal;
  


}
.loginbox input{
    width:100%;
    height:40px;
    margin-bottom: 10px;
    font-size: 16px;
    border: none;
    border-bottom: 1px solid#000;
    outline: none;
     text-align: center;;

}
.loginbox input[type="text"],input[type="password"]
{
    border:none;
    border-bottom: 1px solid#000;
    outline: none;
    height: 40px;
    color:#000;
    font-size: 16px;
    text-align: center;
    
    
}
.loginbox input[type="submit"]
{
    border:none;
    outline:none;
    height: 40px;
    width: 250px;
    background:white;
    font-size: 18px;
    border-radius: 20px;
    margin-left: 60px;
    margin-top: 20px;
    
}
.loginbox input[type="submit"]:hover
{
    cursor:pointer;
    background:tomato ;
    color:#000;
}
.loginbox input[type="register"]
{
    border:none;
    outline:none;
    height: 40px;
    width: 100px;
    background:white;
    font-size: 18px;
    border-radius: 20px;
    text-align: center;
    
    
}
.loginbox input[type="register"]:hover
{
    cursor:pointer;
    background:tomato ;
    color:#000;
}
.loginbox a{
    text-decoration:none;
    font-size: 20px;
    color:black;
    font-family: "Oswald", sans;
    font-weight: normal;
}
.loginbox a:hover
{
    opacity: 0.8;
    color:tomato;
}

body {
  font-family: 'Open Sans', sans-serif;
  line-height: 1.6;
  margin: 0;
  padding: 0;
  background-size: cover;
  background-position: center;
  background: lightblue;
}

img{
    width: 200px;
    height: auto;
    margin-left:130px;
    margin-right: 100px;
    margin-top: 40px;

}


</style>
</head>
</html>