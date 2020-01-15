<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Bootstrap Theme Simply Me</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
/* Variables */
/* Reset */
*, *::after, *::before {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  transform-style: preserve-3d;
}

/* Generic */
body {
  width: 100%;
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: #1a1919;
  overflow: hidden;
  font-family: sans-serif;
  font-weight: bolder;
  color: rgba(255, 255, 251, 0.7);
  text-transform: uppercase;
  letter-spacing: 2px;
}

.main {
  width: 800px;
  height: 600px;
  position: relative;
  cursor: pointer;
  margin-top: 200px;
}

.flex {
  display: flex;
  justify-content: center;
  align-items: center;
}

.face {
  position: absolute;
}

/*Base*/
/*=================================*/
/*=================================*/
.screen {
  width: 303.0303030303px;
  height: 240px;
  transform: translateZ(100px) translateY(-200px) translateZ(50px) rotateX(270deg);
  background-color: #A9DFFD;
  border-radius: 10px;
  box-shadow: 0 0 5px rgba(169, 223, 253, 0.8), 0 0 10px rgba(169, 223, 253, 0.7), 0 0 15px rgba(169, 223, 253, 0.6), 0 0 20px rgba(169, 223, 253, 0.5), 0 0 40px rgba(169, 223, 253, 0.4), 0 0 60px rgba(169, 223, 253, 0.3);
  animation: screen 1s ease-in alternate infinite;
}

.keyboard {
  width: 500px;
  height: 160px;
  transform: perspective(10000px) rotateX(50deg) rotateZ(-25deg);
}
.keyboard__front {
  width: 500px;
  height: 25px;
  transform: rotateX(-90deg) translateZ(80px);
  background-color: #9C9C9C;
}
.keyboard__back {
  width: 500px;
  height: 25px;
  transform: rotateX(90deg) translateZ(80px);
  background-color: #FFFFFB;
}
.keyboard__top {
  display: flex;
  flex-direction: column;
  justify-content: space-around;
  width: 500px;
  height: 160px;
  transform: rotateY(0deg) translateZ(12.5px);
  background-image: linear-gradient(to bottom, #dbf2fe, #343232);
}
.keyboard__bottom {
  width: 500px;
  height: 160px;
  transform: rotateY(180deg) translateZ(12.5px);
  background-color: #EAE7E5;
  box-shadow: -20px 40px 0 #0d0c0c, 0px 40px 0 #0d0c0c, 5px 0px 0 #0d0c0c, 5px 40px 0 #0d0c0c;
}
.keyboard__right {
  width: 25px;
  height: 160px;
  transform: rotateY(90deg) translateZ(250px);
  background-color: #FFFFFB;
}
.keyboard__left {
  width: 25px;
  height: 160px;
  transform: rotateY(90deg) translateZ(-250px);
  background-color: #EAE7E5;
}

/*=================================*/
/*=================================*/
.keys {
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
  width: 100%;
  transform: translateZ(7.5px);
  padding: 0 2px;
}

.key {
  width: 30px;
  height: 27px;
  transition: .05s ease;
}
.key--w2 {
  width: 60px;
}
.key--w3 {
  width: 90px;
}
.key--w6 {
  width: 195px;
}
.key__front {
  width: 30px;
  height: 15px;
  transform: rotateX(-90deg) translateZ(13.5px);
  background-color: #838383;
}
.key__front--w2 {
  width: 60px;
}
.key__front--w3 {
  width: 90px;
}
.key__front--w6 {
  width: 195px;
}
.key__back {
  width: 30px;
  height: 15px;
  transform: rotateX(90deg) translateZ(13.5px);
  background-color: #FFFFFB;
}
.key__back--w2 {
  width: 60px;
}
.key__back--w3 {
  width: 90px;
}
.key__back--w6 {
  width: 195px;
}
.key__top {
  width: 30px;
  height: 27px;
  transform: rotateY(0deg) translateZ(7.5px);
  background-color: #FFFFFB;
  background-image: linear-gradient(to bottom, #f4fbff, #FFFFFB);
}
.key__top--w2 {
  width: 60px;
}
.key__top--w3 {
  width: 90px;
}
.key__top--w6 {
  width: 195px;
}
.key__bottom {
  width: 30px;
  height: 27px;
  transform: rotateY(180deg) translateZ(7.5px);
  background-color: #838383;
}
.key__bottom--w2 {
  width: 60px;
}
.key__bottom--w3 {
  width: 90px;
}
.key__bottom--w6 {
  width: 195px;
}
.key__right {
  width: 15px;
  height: 27px;
  transform: rotateY(90deg) translateZ(15px);
  background-color: #838383;
}
.key__right--w2 {
  transform: rotateY(90deg) translateZ(30px);
}
.key__right--w3 {
  transform: rotateY(90deg) translateZ(45px);
}
.key__right--w6 {
  transform: rotateY(90deg) translateZ(97.5px);
}
.key__left {
  width: 15px;
  height: 27px;
  transform: rotateY(90deg) translateZ(-15px);
  background-image: linear-gradient(to bottom, #c5c5c5, #b8b8b8);
}
.key__left--w2 {
  transform: rotateY(90deg) translateZ(-30px);
}
.key__left--w3 {
  transform: rotateY(90deg) translateZ(-45px);
}
.key__left--w6 {
  transform: rotateY(90deg) translateZ(-97.5px);
}

/*=================================*/
/*=================================*/
.face--key-b1 {
  background: #A9DFFD;
}

.face--key-b2 {
  background-image: linear-gradient(to bottom, #a7dcfa, #8FD2F8);
}

.face--key-b3 {
  background-color: #426585;
}

.face--key-o1 {
  background: #FFA28E;
}

.face--key-o2 {
  background-image: linear-gradient(to bottom, #bc7377, #B46266);
}

.face--key-o3 {
  background-color: #8E3E43;
}

.key--down {
  display: flex;
  justify-content: center;
  align-items: center;
  transform: translateZ(-5px);
  transition: .05s ease;
}
.key--down > .key__top {
  background: #ffccc1;
}

/*=================================*/
/*=================================*/
@keyframes screen {
  0%, 90%, 96% {
    background-color: #A9DFFD;
  }
  93%, 100% {
    background-color: rgba(143, 210, 248, 0.8);
  }
}

  </style>
  <script>

/*
Designed by: Miguel E.
Original image: https://dribbble.com/shots/6276517-Hello
*/

const m = document.querySelector("#m");
const k = document.querySelector("#k");
const s = document.querySelector("#s");

const kd = document.querySelectorAll(".key")
let con = 0;

let base = (e) => {
    let  x = e.pageX / window.innerWidth - 0.5;
    let  y = e.pageY / window.innerHeight - 0.5;
    k.style.transform = `
        perspective(10000px)
        rotateX(${ y * 10  + 60}deg)
        rotateZ(-${ x * 40  + 35}deg)
    `;
}

let addKey = (e) => {
    let kc = event.keyCode;

    if ( (kc >= 65 && kc <= 90) || kc == 32) {
        if (kc == 81) { kd[15].classList.add("key--down"); }
        else if (kc == 87) { kd[16].classList.add("key--down"); }
        else if (kc == 69) { kd[17].classList.add("key--down"); }
        else if (kc == 82) { kd[18].classList.add("key--down"); }
        else if (kc == 84) { kd[19].classList.add("key--down"); }
        else if (kc == 89) { kd[20].classList.add("key--down"); }
        else if (kc == 85) { kd[21].classList.add("key--down"); }
        else if (kc == 73) { kd[22].classList.add("key--down"); }
        else if (kc == 79) { kd[23].classList.add("key--down"); }
        else if (kc == 80) { kd[24].classList.add("key--down"); }
        else if (kc == 65) { kd[29].classList.add("key--down"); }
        else if (kc == 83) { kd[30].classList.add("key--down"); }
        else if (kc == 68) { kd[31].classList.add("key--down"); }
        else if (kc == 70) { kd[32].classList.add("key--down"); }
        else if (kc == 71) { kd[33].classList.add("key--down"); }
        else if (kc == 72) { kd[34].classList.add("key--down"); }
        else if (kc == 74) { kd[35].classList.add("key--down"); }
        else if (kc == 75) { kd[36].classList.add("key--down"); }
        else if (kc == 76) { kd[37].classList.add("key--down"); }
        else if (kc == 192) { kd[38].classList.add("key--down"); }
        else if (kc == 90) { kd[41].classList.add("key--down"); }
        else if (kc == 88) { kd[42].classList.add("key--down"); }
        else if (kc == 67) { kd[43].classList.add("key--down"); }
        else if (kc == 86) { kd[44].classList.add("key--down"); }
        else if (kc == 66) { kd[45].classList.add("key--down"); }
        else if (kc == 78) { kd[46].classList.add("key--down"); }
        else if (kc == 77) { kd[47].classList.add("key--down"); }
        else if (kc == 13) { kd[39].classList.add("key--down"); }
        else if (kc == 32) {
            kd[56].classList.add("key--down");
            s.innerHTML += "&nbsp;";
        }
        s.innerHTML += String.fromCharCode(kc);
        con++;
        if (con > 10) { s.innerHTML = ""; con = 0; }
    }
    if (kc == 8) {
        s.innerHTML = "";
        kd[27].classList.add("key--down");
			  con = 0;
    }

}
let removeKey = (e) => {
    let kc = event.keyCode;
    if (kc == 81) { kd[15].classList.remove("key--down"); }
    else if (kc == 87) { kd[16].classList.remove("key--down"); }
    else if (kc == 69) { kd[17].classList.remove("key--down"); }
    else if (kc == 82) { kd[18].classList.remove("key--down"); }
    else if (kc == 84) { kd[19].classList.remove("key--down"); }
    else if (kc == 89) { kd[20].classList.remove("key--down"); }
    else if (kc == 85) { kd[21].classList.remove("key--down"); }
    else if (kc == 73) { kd[22].classList.remove("key--down"); }
    else if (kc == 79) { kd[23].classList.remove("key--down"); }
    else if (kc == 80) { kd[24].classList.remove("key--down"); }
    else if (kc == 65) { kd[29].classList.remove("key--down"); }
    else if (kc == 83) { kd[30].classList.remove("key--down"); }
    else if (kc == 68) { kd[31].classList.remove("key--down"); }
    else if (kc == 70) { kd[32].classList.remove("key--down"); }
    else if (kc == 71) { kd[33].classList.remove("key--down"); }
    else if (kc == 72) { kd[34].classList.remove("key--down"); }
    else if (kc == 74) { kd[35].classList.remove("key--down"); }
    else if (kc == 75) { kd[36].classList.remove("key--down"); }
    else if (kc == 76) { kd[37].classList.remove("key--down"); }
    else if (kc == 192) { kd[38].classList.remove("key--down"); }
    else if (kc == 90) { kd[41].classList.remove("key--down"); }
    else if (kc == 88) { kd[42].classList.remove("key--down"); }
    else if (kc == 67) { kd[43].classList.remove("key--down"); }
    else if (kc == 86) { kd[44].classList.remove("key--down"); }
    else if (kc == 66) { kd[45].classList.remove("key--down"); }
    else if (kc == 78) { kd[46].classList.remove("key--down"); }
    else if (kc == 77) { kd[47].classList.remove("key--down"); }
    else if (kc == 32) { kd[56].classList.remove("key--down"); }
    else if (kc == 13) { kd[39].classList.remove("key--down"); }
    else if (kc == 8) { kd[27].classList.remove("key--down"); }
}

m.addEventListener("mousemove", base);
window.addEventListener("keydown", addKey);
window.addEventListener("keyup", removeKey);



</script> 
</head>
<body>


<div class="main flex" id="m">
  <div class="keyboard flex" id="k">
    <div class="screen flex" id="s"></div>
    <div class="keyboard__front face"></div>
    <div class="keyboard__back face"></div>
    <div class="keyboard__right face"></div>
    <div class="keyboard__left face"></div>
    <div class="keyboard__top face">
      <div class="keys">
        <div class="key flex">
          <div class="key__front face face--key-b3"></div>
          <div class="key__back face face--key-b1"></div>
          <div class="key__right face face--key-b1"></div>
          <div class="key__left face face--key-b2"></div>
          <div class="key__top face face--key-b1"></div>
          <div class="key__bottom face face--key-b2"></div>
        </div>
        <div class="key flex">
          <div class="key__front face"></div>
          <div class="key__back face"></div>
          <div class="key__right face"></div>
          <div class="key__left face"></div>
          <div class="key__top face"></div>
          <div class="key__bottom face"></div>
        </div>
        <div class="key flex">
          <div class="key__front face"></div>
          <div class="key__back face"></div>
          <div class="key__right face"></div>
          <div class="key__left face"></div>
          <div class="key__top face"></div>
          <div class="key__bottom face"></div>
        </div>
        <div class="key flex">
          <div class="key__front face"></div>
          <div class="key__back face"></div>
          <div class="key__right face"></div>
          <div class="key__left face"></div>
          <div class="key__top face"></div>
          <div class="key__bottom face"></div>
        </div>
        <div class="key flex">
          <div class="key__front face"></div>
          <div class="key__back face"></div>
          <div class="key__right face"></div>
          <div class="key__left face"></div>
          <div class="key__top face"></div>
          <div class="key__bottom face"></div>
        </div>
        <div class="key flex">
          <div class="key__front face"></div>
          <div class="key__back face"></div>
          <div class="key__right face"></div>
          <div class="key__left face"></div>
          <div class="key__top face"></div>
          <div class="key__bottom face"></div>
        </div>
        <div class="key flex">
          <div class="key__front face"></div>
          <div class="key__back face"></div>
          <div class="key__right face"></div>
          <div class="key__left face"></div>
          <div class="key__top face"></div>
          <div class="key__bottom face"></div>
        </div>
        <div class="key flex">
          <div class="key__front face"></div>
          <div class="key__back face"></div>
          <div class="key__right face"></div>
          <div class="key__left face"></div>
          <div class="key__top face"></div>
          <div class="key__bottom face"></div>
        </div>
        <div class="key flex">
          <div class="key__front face"></div>
          <div class="key__back face"></div>
          <div class="key__right face"></div>
          <div class="key__left face"></div>
          <div class="key__top face"></div>
          <div class="key__bottom face"></div>
        </div>
        <div class="key flex">
          <div class="key__front face"></div>
          <div class="key__back face"></div>
          <div class="key__right face"></div>
          <div class="key__left face"></div>
          <div class="key__top face"></div>
          <div class="key__bottom face"></div>
        </div>
        <div class="key flex">
          <div class="key__front face"></div>
          <div class="key__back face"></div>
          <div class="key__right face"></div>
          <div class="key__left face"></div>
          <div class="key__top face"></div>
          <div class="key__bottom face"></div>
        </div>
        <div class="key flex">
          <div class="key__front face"></div>
          <div class="key__back face"></div>
          <div class="key__right face"></div>
          <div class="key__left face"></div>
          <div class="key__top face"></div>
          <div class="key__bottom face"></div>
        </div>
        <div class="key flex">
          <div class="key__front face"></div>
          <div class="key__back face"></div>
          <div class="key__right face"></div>
          <div class="key__left face"></div>
          <div class="key__top face"></div>
          <div class="key__bottom face"></div>
        </div>
        <div class="key key--w2 flex">
          <div class="key__front key__front--w2 face face--key-b3"></div>
          <div class="key__back key__back--w2 face face--key-b1"></div>
          <div class="key__right key__right--w2 face face--key-b1"></div>
          <div class="key__left key__left--w2 face face--key-b2"></div>
          <div class="key__top key__top--w2 face face--key-b1"></div>
          <div class="key__bottom key__bottom--w2 face face--key-b2"></div>
        </div>
      </div>
      <div class="keys">
        <div class="key key--w2 flex">
          <div class="key__front key__front--w2 face face--key-b3"></div>
          <div class="key__back key__back--w2 face face--key-b1"></div>
          <div class="key__right key__right--w2 face face--key-b1"></div>
          <div class="key__left key__left--w2 face face--key-b2"></div>
          <div class="key__top key__top--w2 face face--key-b1"></div>
          <div class="key__bottom key__bottom--w2 face face--key-b2"></div>
        </div>
        <div class="key flex">
          <div class="key__front face"></div>
          <div class="key__back face"></div>
          <div class="key__right face"></div>
          <div class="key__left face"></div>
          <div class="key__top face"></div>
          <div class="key__bottom face"></div>
        </div>
        <div class="key flex">
          <div class="key__front face"></div>
          <div class="key__back face"></div>
          <div class="key__right face"></div>
          <div class="key__left face"></div>
          <div class="key__top face"></div>
          <div class="key__bottom face"></div>
        </div>
        <div class="key flex">
          <div class="key__front face"></div>
          <div class="key__back face"></div>
          <div class="key__right face"></div>
          <div class="key__left face"></div>
          <div class="key__top face"></div>
          <div class="key__bottom face"></div>
        </div>
        <div class="key flex">
          <div class="key__front face"></div>
          <div class="key__back face"></div>
          <div class="key__right face"></div>
          <div class="key__left face"></div>
          <div class="key__top face"></div>
          <div class="key__bottom face"></div>
        </div>
        <div class="key flex">
          <div class="key__front face"></div>
          <div class="key__back face"></div>
          <div class="key__right face"></div>
          <div class="key__left face"></div>
          <div class="key__top face"></div>
          <div class="key__bottom face"></div>
        </div>
        <div class="key flex">
          <div class="key__front face"></div>
          <div class="key__back face"></div>
          <div class="key__right face"></div>
          <div class="key__left face"></div>
          <div class="key__top face"></div>
          <div class="key__bottom face"></div>
        </div>
        <div class="key flex">
          <div class="key__front face"></div>
          <div class="key__back face"></div>
          <div class="key__right face"></div>
          <div class="key__left face"></div>
          <div class="key__top face"></div>
          <div class="key__bottom face"></div>
        </div>
        <div class="key flex">
          <div class="key__front face"></div>
          <div class="key__back face"></div>
          <div class="key__right face"></div>
          <div class="key__left face"></div>
          <div class="key__top face"></div>
          <div class="key__bottom face"></div>
        </div>
        <div class="key flex">
          <div class="key__front face"></div>
          <div class="key__back face"></div>
          <div class="key__right face"></div>
          <div class="key__left face"></div>
          <div class="key__top face"></div>
          <div class="key__bottom face"></div>
        </div>
        <div class="key flex">
          <div class="key__front face"></div>
          <div class="key__back face"></div>
          <div class="key__right face"></div>
          <div class="key__left face"></div>
          <div class="key__top face"></div>
          <div class="key__bottom face"></div>
        </div>
        <div class="key flex">
          <div class="key__front face"></div>
          <div class="key__back face"></div>
          <div class="key__right face"></div>
          <div class="key__left face"></div>
          <div class="key__top face"></div>
          <div class="key__bottom face"></div>
        </div>
        <div class="key flex">
          <div class="key__front face"></div>
          <div class="key__back face"></div>
          <div class="key__right face"></div>
          <div class="key__left face"></div>
          <div class="key__top face"></div>
          <div class="key__bottom face"></div>
        </div>
        <div class="key flex">
          <div class="key__front face face--key-b3"></div>
          <div class="key__back face face--key-b1"></div>
          <div class="key__right face face--key-b1"></div>
          <div class="key__left face face--key-b2"></div>
          <div class="key__top face face--key-b1"></div>
          <div class="key__bottom face face--key-b2"></div>
        </div>
      </div>
      <div class="keys">
        <div class="key key--w3 flex">
          <div class="key__front key__front--w3 face face--key-b3"></div>
          <div class="key__back key__back--w3 face face--key-b1"></div>
          <div class="key__right key__right--w3 face face--key-b1"></div>
          <div class="key__left key__left--w3 face face--key-b2"></div>
          <div class="key__top key__top--w3 face face--key-b1"></div>
          <div class="key__bottom key__bottom--w3 face face--key-b2"></div>
        </div>
        <div class="key flex">
          <div class="key__front face"></div>
          <div class="key__back face"></div>
          <div class="key__right face"></div>
          <div class="key__left face"></div>
          <div class="key__top face"></div>
          <div class="key__bottom face"></div>
        </div>
        <div class="key flex">
          <div class="key__front face"></div>
          <div class="key__back face"></div>
          <div class="key__right face"></div>
          <div class="key__left face"></div>
          <div class="key__top face"></div>
          <div class="key__bottom face"></div>
        </div>
        <div class="key flex">
          <div class="key__front face"></div>
          <div class="key__back face"></div>
          <div class="key__right face"></div>
          <div class="key__left face"></div>
          <div class="key__top face"></div>
          <div class="key__bottom face"></div>
        </div>
        <div class="key flex">
          <div class="key__front face"></div>
          <div class="key__back face"></div>
          <div class="key__right face"></div>
          <div class="key__left face"></div>
          <div class="key__top face"></div>
          <div class="key__bottom face"></div>
        </div>
        <div class="key flex">
          <div class="key__front face"></div>
          <div class="key__back face"></div>
          <div class="key__right face"></div>
          <div class="key__left face"></div>
          <div class="key__top face"></div>
          <div class="key__bottom face"></div>
        </div>
        <div class="key flex">
          <div class="key__front face"></div>
          <div class="key__back face"></div>
          <div class="key__right face"></div>
          <div class="key__left face"></div>
          <div class="key__top face"></div>
          <div class="key__bottom face"></div>
        </div>
        <div class="key flex">
          <div class="key__front face"></div>
          <div class="key__back face"></div>
          <div class="key__right face"></div>
          <div class="key__left face"></div>
          <div class="key__top face"></div>
          <div class="key__bottom face"></div>
        </div>
        <div class="key flex">
          <div class="key__front face"></div>
          <div class="key__back face"></div>
          <div class="key__right face"></div>
          <div class="key__left face"></div>
          <div class="key__top face"></div>
          <div class="key__bottom face"></div>
        </div>
        <div class="key flex">
          <div class="key__front face"></div>
          <div class="key__back face"></div>
          <div class="key__right face"></div>
          <div class="key__left face"></div>
          <div class="key__top face"></div>
          <div class="key__bottom face"></div>
        </div>
        <div class="key flex">
          <div class="key__front face"></div>
          <div class="key__back face"></div>
          <div class="key__right face"></div>
          <div class="key__left face"></div>
          <div class="key__top face"></div>
          <div class="key__bottom face"></div>
        </div>
        <div class="key key--w2 flex">
          <div class="key__front key__front--w2 face face--key-o3"></div>
          <div class="key__back key__back--w2 face face--key-o1"></div>
          <div class="key__right key__right--w2 face face--key-o1"></div>
          <div class="key__left key__left--w2 face face--key-o2"></div>
          <div class="key__top key__top--w2 face face--key-o1"></div>
          <div class="key__bottom key__bottom--w2 face face--key-o2"></div>
        </div>
      </div>
      <div class="keys">
        <div class="key key--w2 flex">
          <div class="key__front key__front--w2 face face--key-b3"></div>
          <div class="key__back key__back--w2 face face--key-b1"></div>
          <div class="key__right key__right--w2 face face--key-b1"></div>
          <div class="key__left key__left--w2 face face--key-b2"></div>
          <div class="key__top key__top--w2 face face--key-b1"></div>
          <div class="key__bottom key__bottom--w2 face face--key-b2"></div>
        </div>
        <div class="key flex">
          <div class="key__front face"></div>
          <div class="key__back face"></div>
          <div class="key__right face"></div>
          <div class="key__left face"></div>
          <div class="key__top face"></div>
          <div class="key__bottom face"></div>
        </div>
        <div class="key flex">
          <div class="key__front face"></div>
          <div class="key__back face"></div>
          <div class="key__right face"></div>
          <div class="key__left face"></div>
          <div class="key__top face"></div>
          <div class="key__bottom face"></div>
        </div>
        <div class="key flex">
          <div class="key__front face"></div>
          <div class="key__back face"></div>
          <div class="key__right face"></div>
          <div class="key__left face"></div>
          <div class="key__top face"></div>
          <div class="key__bottom face"></div>
        </div>
        <div class="key flex">
          <div class="key__front face"></div>
          <div class="key__back face"></div>
          <div class="key__right face"></div>
          <div class="key__left face"></div>
          <div class="key__top face"></div>
          <div class="key__bottom face"></div>
        </div>
        <div class="key flex">
          <div class="key__front face"></div>
          <div class="key__back face"></div>
          <div class="key__right face"></div>
          <div class="key__left face"></div>
          <div class="key__top face"></div>
          <div class="key__bottom face"></div>
        </div>
        <div class="key flex">
          <div class="key__front face"></div>
          <div class="key__back face"></div>
          <div class="key__right face"></div>
          <div class="key__left face"></div>
          <div class="key__top face"></div>
          <div class="key__bottom face"></div>
        </div>
        <div class="key flex">
          <div class="key__front face"></div>
          <div class="key__back face"></div>
          <div class="key__right face"></div>
          <div class="key__left face"></div>
          <div class="key__top face"></div>
          <div class="key__bottom face"></div>
        </div>
        <div class="key flex">
          <div class="key__front face"></div>
          <div class="key__back face"></div>
          <div class="key__right face"></div>
          <div class="key__left face"></div>
          <div class="key__top face"></div>
          <div class="key__bottom face"></div>
        </div>
        <div class="key flex">
          <div class="key__front face"></div>
          <div class="key__back face"></div>
          <div class="key__right face"></div>
          <div class="key__left face"></div>
          <div class="key__top face"></div>
          <div class="key__bottom face"></div>
        </div>
        <div class="key flex">
          <div class="key__front face"></div>
          <div class="key__back face"></div>
          <div class="key__right face"></div>
          <div class="key__left face"></div>
          <div class="key__top face"></div>
          <div class="key__bottom face"></div>
        </div>
        <div class="key key--w3 flex">
          <div class="key__front key__front--w3 face face--key-b3"></div>
          <div class="key__back key__back--w3 face face--key-b1"></div>
          <div class="key__right key__right--w3 face face--key-b1"></div>
          <div class="key__left key__left--w3 face face--key-b2"></div>
          <div class="key__top key__top--w3 face face--key-b1"></div>
          <div class="key__bottom key__bottom--w3 face face--key-b2"></div>
        </div>
      </div>
      <div class="keys">
        <div class="key flex">
          <div class="key__front face face--key-b3"></div>
          <div class="key__back face face--key-b1"></div>
          <div class="key__right face face--key-b1"></div>
          <div class="key__left face face--key-b2"></div>
          <div class="key__top face face--key-b1"></div>
          <div class="key__bottom face face--key-b2"></div>
        </div>
        <div class="key flex">
          <div class="key__front face face--key-o3"></div>
          <div class="key__back face face--key-o1"></div>
          <div class="key__right face face--key-o1"></div>
          <div class="key__left face face--key-o2"></div>
          <div class="key__top face face--key-o1"></div>
          <div class="key__bottom face face--key-o2"></div>
        </div>
        <div class="key flex">
          <div class="key__front face face--key-b3"></div>
          <div class="key__back face face--key-b1"></div>
          <div class="key__right face face--key-b1"></div>
          <div class="key__left face face--key-b2"></div>
          <div class="key__top face face--key-b1"></div>
          <div class="key__bottom face face--key-b2"></div>
        </div>
        <div class="key flex">
          <div class="key__front face face--key-b3"></div>
          <div class="key__back face face--key-b1"></div>
          <div class="key__right face face--key-b1"></div>
          <div class="key__left face face--key-b2"></div>
          <div class="key__top face face--key-b1"></div>
          <div class="key__bottom face face--key-b2"></div>
        </div>
        <div class="key key--w6 flex">
          <div class="key__front key__front--w6 face"></div>
          <div class="key__back key__back--w6 face"></div>
          <div class="key__right key__right--w6 face"></div>
          <div class="key__left key__left--w6 face"></div>
          <div class="key__top key__top--w6 face"></div>
          <div class="key__bottom key__bottom--w6 face">       </div>
        </div>
        <div class="key flex">
          <div class="key__front face face--key-b3"></div>
          <div class="key__back face face--key-b1"></div>
          <div class="key__right face face--key-b1"></div>
          <div class="key__left face face--key-b2"></div>
          <div class="key__top face face--key-b1"></div>
          <div class="key__bottom face face--key-b2"></div>
        </div>
        <div class="key flex">
          <div class="key__front face face--key-b3"></div>
          <div class="key__back face face--key-b1"></div>
          <div class="key__right face face--key-b1"></div>
          <div class="key__left face face--key-b2"></div>
          <div class="key__top face face--key-b1"></div>
          <div class="key__bottom face face--key-b2"></div>
        </div>
        <div class="key flex">
          <div class="key__front face face--key-b3"></div>
          <div class="key__back face face--key-b1"></div>
          <div class="key__right face face--key-b1"></div>
          <div class="key__left face face--key-b2"></div>
          <div class="key__top face face--key-b1"></div>
          <div class="key__bottom face face--key-b2"></div>
        </div>
        <div class="key flex">
          <div class="key__front face face--key-b3"></div>
          <div class="key__back face face--key-b1"></div>
          <div class="key__right face face--key-b1"></div>
          <div class="key__left face face--key-b2"></div>
          <div class="key__top face face--key-b1"></div>
          <div class="key__bottom face face--key-b2"></div>
        </div>
        <div class="key flex">
          <div class="key__front face face--key-b3"></div>
          <div class="key__back face face--key-b1"></div>
          <div class="key__right face face--key-b1"></div>
          <div class="key__left face face--key-b2"></div>
          <div class="key__top face face--key-b1"></div>
          <div class="key__bottom face face--key-b2"></div>
        </div>
      </div>
    </div>
    <div class="keyboard__bottom face"></div>
  </div>
</div>


<script src="https://threejs.org/build/three.min.js"></script>
<script src="https://threejs.org/examples/js/libs/stats.min.js"></script>
<script src="https://threejs.org/examples/js/controls/PointerLockControls.js"></script>



</body>
</html>
