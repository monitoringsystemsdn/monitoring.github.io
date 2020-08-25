
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Registration </title>



<div class="Header">
  <div class="Header-background"></div>
  <div class="Header-content">
    <div class="Header-hero">
      <h1>Welcome to <br/> SensorDrop Networks</h1>
      <p>Connectivity for Continuity</p>
     <a href="<?= base_url('Users/doctor')?>"> <input type="submit" name="" value="Doctor"></a>
     <a href="<?= base_url('Users/patient') ?>"> <input type="submit" name="" value="Patient"></a>
    </div>
      <img src="<?php echo base_url('images/sdn.png'); ?>" /> 
  </div>
</div>
      

      
</body>

<style>


@import url("https://fonts.googleapis.com/css?family=Varela+Round");
:root {
  --color-1: #21d4fd;
  --color-2: #b721ff;
  --color-3: #08aeea;
  --color-4: #2af598;
}
body {
  font-family: 'Varela Round', sans-serif;
}
.Header {
  position: relative;
  height: 80vh;
  display: block;
}
.Header-background {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(19deg, var(--color-1), var(--color-2));
  -webkit-transform-origin: 0px 0px;
          transform-origin: 0px 0px;
  -webkit-transform: skewY(-10deg);
          transform: skewY(-10deg);
  overflow: hidden;
  z-index: -1;
}
.Header-background::before,
.Header-background::after {
  display: block;
  position: absolute;
  content: '';
  width: 80%;
  height: 33.333333333333336%;
  opacity: 0.3;
  -webkit-filter: blur(15px);
          filter: blur(15px);
}
.Header-background::before {
  background: var(--color-1);
  right: 0;
}
.Header-background::after {
  background: var(--color-2);
  bottom: 0;
}
.Header-content {
  text-align: center;
  padding: 4rem 4rem;
  margin: 0 auto;
}
@media (min-width: 58rem) {
  .Header-content {
    text-align: left;
    padding: 10rem 4rem;
    max-width: 54rem;
    display: -webkit-box;
    display: flex;
    -webkit-box-pack: justify;
            justify-content: space-between;
  }
}
.Header-hero h1,
.Header-hero p {
  color: #fff;
  text-shadow: 0 0.5rem 1rem rgba(50,0,100,0.1);
}
.Header-hero h1 {
  margin: 0;
  font-size: 3rem;
}
.Header-hero p {
  font-size: 1.5rem;
  margin-bottom: 2rem;
}


img{
    width: 450px;
    height: auto;
    margin-left: 100px;
    

}
.Header input[type="submit"]
{
    padding: 1.5rem 2rem;
  border: 0;
  color: var(--color-3);
  font-size: 1.2rem;
  font-weight: bold;
  background: #fff;
  border-radius: 3px;
  -webkit-transition: all 0.2s;
  transition: all 0.2s;
  cursor: pointer;
  box-shadow: 0 1.75rem 2rem -0.4rem rgba(50,0,100,0.15);
  margin-right: 20px;
}
.Header input[type="submit"]:hover
{
    color: var(--color-4);
  box-shadow: 0 1.75rem 3rem 0rem rgba(50,0,100,0.1);
  -webkit-transform: scale(1.05);
          transform: scale(1.05);
    
}


</style>
</head>
</html>
