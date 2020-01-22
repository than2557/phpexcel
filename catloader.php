<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="/phpexcel/lib/Bootstrap_4/bootstrap.min.css">
<script src="/phpexcel/lib/Jquery/jquery.js"></script>
<script src="/phpexcel/lib/Bootstrap_4/bootstrap.min.js"></script>
<style>
.cat {
  position: relative;
  width: 100%;
  max-width: 20em;
  overflow: hidden;
  background-color: #e6dcdc;
}
.cat::before {
  content: '';
  display: block;
  padding-bottom: 100%;
}
.cat:hover > * {
  -webkit-animation-play-state: paused;
          animation-play-state: paused;
}
.cat:active > * {
  -webkit-animation-play-state: running;
          animation-play-state: running;
}

.cat__head, .cat__tail, .cat__body {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  -webkit-animation: rotating 2.79s cubic-bezier(0.65, 0.54, 0.12, 0.93) infinite;
          animation: rotating 2.79s cubic-bezier(0.65, 0.54, 0.12, 0.93) infinite;
}
.cat__head::before, .cat__tail::before, .cat__body::before {
  content: '';
  position: absolute;
  width: 50%;
  height: 50%;
  background-size: 200%;
  background-repeat: no-repeat;
  background-image: url("https://images.weserv.nl/?url=i.imgur.com/M1raXX3.png&il");
}

.cat__head::before {
  top: 0;
  right: 0;
  background-position: 100% 0%;
  -webkit-transform-origin: 0% 100%;
          transform-origin: 0% 100%;
  -webkit-transform: rotate(90deg);
          transform: rotate(90deg);
}

.cat__tail {
  -webkit-animation-delay: .2s;
          animation-delay: .2s;
}
.cat__tail::before {
  left: 0;
  bottom: 0;
  background-position: 0% 100%;
  -webkit-transform-origin: 100% 0%;
          transform-origin: 100% 0%;
  -webkit-transform: rotate(-30deg);
          transform: rotate(-30deg);
}

.cat__body {
  -webkit-animation-delay: .1s;
          animation-delay: .1s;
}
.cat__body:nth-of-type(2) {
  -webkit-animation-delay: .2s;
          animation-delay: .2s;
}
.cat__body::before {
  right: 0;
  bottom: 0;
  background-position: 100% 100%;
  -webkit-transform-origin: 0% 0%;
          transform-origin: 0% 0%;
}

@-webkit-keyframes rotating {
  from {
    -webkit-transform: rotate(720deg);
            transform: rotate(720deg);
  }
  to {
    -webkit-transform: none;
            transform: none;
  }
}

@keyframes rotating {
  from {
    -webkit-transform: rotate(720deg);
            transform: rotate(720deg);
  }
  to {
    -webkit-transform: none;
            transform: none;
  }
}
.box {
  display: -webkit-box;
  display: flex;
  -webkit-box-flex: 1;
          flex: 1;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
          flex-direction: column;
  -webkit-box-pack: start;
          justify-content: flex-start;
  -webkit-box-pack: center;
          justify-content: center;
  -webkit-box-align: center;
          align-items: center;
  background-color: #e6dcdc;
}

*,
*::before,
*::after {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

html {
  height: 100%;
}

body {
  display: -webkit-box;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
          flex-direction: column;
  min-height: 100%;
  margin: 0;
  line-height: 1.4;
}

.intro {
  width: 90%;
  max-width: 36rem;
  padding-bottom: 1rem;
  margin: 0 auto 1em;
  padding-top: .5em;
  font-size: calc(1rem + 2vmin);
  text-transform: capitalize;
  border-bottom: 1px dashed rgba(0, 0, 0, 0.3);
  text-align: center;
}
.intro small {
  display: block;
  opacity: .5;
  font-style: italic;
  text-transform: none;
}

.info {
  margin: 0;
  padding: 1em;
  font-size: .9em;
  font-style: italic;
  font-family: serif;
  text-align: right;
  opacity: .5;
}
.info a {
  color: inherit;
}


</style>
</head>
<body>
<div class="box">
  <div class="cat">
    <div class="cat__body"></div>
    <div class="cat__body"></div>
    <div class="cat__tail"></div>
    <div class="cat__head"></div>
  </div>
</div>
<blockquote class="info">inspired from <a href="https://dribbble.com/domaso">domaso</a>'s dribbble: <a href="https://dribbble.com/shots/3197970-Loading-cat">Loading cat</a><br/>fork from <a href="https://www.facebook.com/tenyoku8478">林天翼</a>'s <a href="https://www.csie.ntu.edu.tw/~b02902062/load_cat/">load cat</a>
  via: <a href="https://www.facebook.com/groups/f2e.tw/permalink/1180443255326371/?comment_id=1180487985321898">FB comment</a>
</blockquote>
</body>
</html>