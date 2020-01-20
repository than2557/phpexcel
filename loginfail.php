<html>
    <head>
        <title></title>
        <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="img/png" href="iconpea.png"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
 <style>
   body {
  display: grid;
  grid-template-rows: 1fr auto;
  grid-template-areas: "main" "footer";
  overflow-x: hidden;
  background: #FCD8FD;
  min-height: 100vh;
  font-family: 'Open Sans', sans-serif;
}
body .footer {
  z-index: 1;
  --footer-background:#F4615F; /*พื้นหลัง footer*/
  display: grid;
  position: relative;
  grid-area: footer;
  min-height: 12rem;
}
body .footer .bubbles {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 1rem;
  background: var(--footer-background);
  -webkit-filter: url("#blob");
          filter: url("#blob");
}
body .footer .bubbles .bubble {
  position: absolute;
  left: var(--position, 50%);
  background: var(--footer-background);
  border-radius: 100%;
  -webkit-animation: bubble-size var(--time, 4s) ease-in infinite var(--delay, 0s), bubble-move var(--time, 4s) ease-in infinite var(--delay, 0s);
          animation: bubble-size var(--time, 4s) ease-in infinite var(--delay, 0s), bubble-move var(--time, 4s) ease-in infinite var(--delay, 0s);
  -webkit-transform: translate(-50%, 100%);
          transform: translate(-50%, 100%);
}
body .footer .content {
  z-index: 2;
  display: grid;
  grid-template-columns: 1fr auto;
  grid-gap: 4rem;
  padding: 2rem;
  background: var(--footer-background);
}
body .footer .content a, body .footer .content p {
  color: #F5F7FA;
  text-decoration: none;
}
body .footer .content b {
  color: white;
}
body .footer .content p {
  margin: 0;
  font-size: .75rem;
}
body .footer .content > div {
  display: flex;
  flex-direction: column;
  justify-content: center;
}
body .footer .content > div > div {
  margin: 0.25rem 0;
}
body .footer .content > div > div > * {
  margin-right: .5rem;
}
body .footer .content > div .image {
  align-self: center;
  width: 4rem;
  height: 4rem;
  margin: 0.25rem 0;
  background-size: cover;
  background-position: center;
}

@-webkit-keyframes bubble-size {
  0%, 75% {
    width: var(--size, 4rem);
    height: var(--size, 4rem);
  }
  100% {
    width: 0rem;
    height: 0rem;
  }
}

@keyframes bubble-size {
  0%, 75% {
    width: var(--size, 4rem);
    height: var(--size, 4rem);
  }
  100% {
    width: 0rem;
    height: 0rem;
  }
}
@-webkit-keyframes bubble-move {
  0% {
    bottom: -4rem;
  }
  100% {
    bottom: var(--distance, 10rem);
  }
}
@keyframes bubble-move {
  0% {
    bottom: -4rem;
  }
  100% {
    bottom: var(--distance, 10rem);
  }
}

@import url("https://fonts.googleapis.com/css?family=Lato:400,700");


#container {
  position: relative;
  margin: auto;
  overflow: hidden;
  width: 700px;
  height: 250px;
}

h1 {
  font-size: 0.9em;
  font-weight: 100;
  letter-spacing: 3px;
  padding-top: 5px;
  color: #FCFCFC;
  padding-bottom: 5px;
  text-transform: uppercase;
}

.green {
  color: #4ec07d;
}

.red {
  color: #e96075;
}

.alert {
  font-weight: 700;
  letter-spacing: 5px;
}

p {
  margin-top: -5px;
  font-size: 0.5em;
  font-weight: 100;
  color: #5e5e5e;
  letter-spacing: 1px;
}

button, .dot {
  cursor: pointer;
}

#success-box {
  position: absolute;
  width: 35%;
  height: 100%;
  left: 12%;
  background: linear-gradient(to bottom right, #B0DB7D 40%, #99DBB4 100%);
  border-radius: 20px;
  box-shadow: 5px 5px 20px #cbcdd3;
  perspective: 40px;
}

#error-box {
  position: absolute;
  width: 35%;
  height: 100%;
  right: 12%;
  background: linear-gradient(to bottom left, #EF8D9C 40%, #FFC39E 100%);
  border-radius: 20px;
  box-shadow: 5px 5px 20px #cbcdd3;
}

.dot {
  width: 8px;
  height: 8px;
  background: #FCFCFC;
  border-radius: 50%;
  position: absolute;
  top: 4%;
  right: 6%;
}
.dot:hover {
  background: #c9c9c9;
}

.two {
  right: 12%;
  opacity: .5;
}

.face {
  position: absolute;
  width: 22%;
  height: 22%;
  background: #FCFCFC;
  border-radius: 50%;
  border: 1px solid #777777;
  top: 21%;
  left: 37.5%;
  z-index: 2;
  animation: bounce 1s ease-in infinite;
}

.face2 {
  position: absolute;
  width: 22%;
  height: 22%;
  background: #FCFCFC;
  border-radius: 50%;
  border: 1px solid #777777;
  top: 21%;
  left: 37.5%;
  z-index: 2;
  animation: roll 3s ease-in-out infinite;
}

.eye {
  position: absolute;
  width: 5px;
  height: 5px;
  background: #777777;
  border-radius: 50%;
  top: 40%;
  left: 20%;
}

.right {
  left: 68%;
}

.mouth {
  position: absolute;
  top: 43%;
  left: 41%;
  width: 7px;
  height: 7px;
  border-radius: 50%;
}

.happy {
  border: 2px solid;
  border-color: transparent #777777 #777777 transparent;
  transform: rotate(45deg);
}

.sad {
  top: 49%;
  border: 2px solid;
  border-color: #777777 transparent transparent #777777;
  transform: rotate(45deg);
}

.shadow {
  position: absolute;
  width: 21%;
  height: 3%;
  opacity: .5;
  background: #777777;
  left: 40%;
  top: 43%;
  border-radius: 50%;
  z-index: 1;
}

.scale {
  animation: scale 1s ease-in infinite;
}

.move {
  animation: move 3s ease-in-out infinite;
}

.message {
  position: absolute;
  width: 100%;
  text-align: center;
  height: 40%;
  top: 47%;
}

.button-box {
  position: absolute;
  background: #FCFCFC;
  width: 50%;
  height: 15%;
  border-radius: 20px;
  top: 73%;
  left: 25%;
  outline: 0;
  border: none;
  box-shadow: 2px 2px 10px rgba(119, 119, 119, 0.5);
  transition: all .5s ease-in-out;
}
.button-box:hover {
  background: #efefef;
  transform: scale(1.05);
  transition: all .3s ease-in-out;
}

@keyframes bounce {
  50% {
    transform: translateY(-10px);
  }
}
@keyframes scale {
  50% {
    transform: scale(0.9);
  }
}
@keyframes roll {
  0% {
    transform: rotate(0deg);
    left: 25%;
  }
  50% {
    left: 60%;
    transform: rotate(168deg);
  }
  100% {
    transform: rotate(0deg);
    left: 25%;
  }
}
@keyframes move {
  0% {
    left: 25%;
  }
  50% {
    left: 60%;
  }
  100% {
    left: 25%;
  }
}


 </style>
        <script>
JSalert();
function JSalert(){
    Swal.fire({

  icon: 'error',
  title: 'Oops...',
  text: 'Something went wrong!',
  footer: '<a href>Why do I have this issue?</a>'
})

}
  </script>
    </head>
    <body>
    <div id="container" style="margin-left:200px;">

  <center><div id="error-box"S >
    <div class="dot"></div>
    <div class="dot two"></div>
    <div class="face2">
      <div class="eye"></div>
      <div class="eye right"></div>
      <div class="mouth sad"></div>
    </div>
    <div class="shadow move"></div>
    <div class="message"><h1 class="alert">ERROR!</h1></div>
    <a class="button-box" href="loginform.php">กลับหน้าเข้าสู่ระบบ</a>
  </div></center>
</div>


    <div class="main"></div>
<div class="footer">
  <div class="bubbles">
    <div class="bubble" style="--size:3.219261164270148rem; --distance:8.139249844197762rem; --position:33.10567925484924%; --time:2.6232405886512s; --delay:-2.6847353838999335s;"></div>
    <div class="bubble" style="--size:3.829824242160723rem; --distance:7.865464495439676rem; --position:78.67293685315306%; --time:3.058276474428787s; --delay:-3.4951086231685866s;"></div>
    <div class="bubble" style="--size:3.1242925891657745rem; --distance:8.477773830069253rem; --position:70.24189207000484%; --time:3.4412251942979704s; --delay:-2.245423575477869s;"></div>
    <div class="bubble" style="--size:2.0724103980666957rem; --distance:6.337626547832832rem; --position:66.15808337167718%; --time:3.5545640572284523s; --delay:-3.806853723727621s;"></div>
    <div class="bubble" style="--size:4.878543664316701rem; --distance:7.39509935019408rem; --position:65.72222344702611%; --time:3.713544502525446s; --delay:-3.5638691008830476s;"></div>
    <div class="bubble" style="--size:5.809706161251198rem; --distance:9.705826159451309rem; --position:17.721040793825097%; --time:2.734068884412243s; --delay:-2.1413916731254155s;"></div>
    <div class="bubble" style="--size:4.251983777033135rem; --distance:8.512975158605173rem; --position:29.329815899814932%; --time:2.7740152322951093s; --delay:-2.9661573372823025s;"></div>
    <div class="bubble" style="--size:3.979708503023823rem; --distance:9.725930735521004rem; --position:16.43284388950702%; --time:2.64061404722274s; --delay:-2.0211906729246505s;"></div>
    <div class="bubble" style="--size:5.922188137289268rem; --distance:7.756292086449173rem; --position:50.21741353636186%; --time:3.668641855614903s; --delay:-3.9165165089937752s;"></div>
    <div class="bubble" style="--size:5.864417232290287rem; --distance:7.507284809543075rem; --position:75.19430688234516%; --time:2.588581096504438s; --delay:-2.9350559465814636s;"></div>
    <div class="bubble" style="--size:2.934857820302774rem; --distance:7.408453193227219rem; --position:25.853762734213063%; --time:3.206134039099781s; --delay:-3.087396150510184s;"></div>
    <div class="bubble" style="--size:4.467581352830406rem; --distance:9.789820607693656rem; --position:0.8571072522404126%; --time:2.219240432831645s; --delay:-2.96799890422175s;"></div>
    <div class="bubble" style="--size:5.661632789285362rem; --distance:8.422857067813085rem; --position:86.40167155402814%; --time:3.754160919707608s; --delay:-3.4006855723194676s;"></div>
    <div class="bubble" style="--size:3.237289687783268rem; --distance:9.308582542411596rem; --position:48.86062312608956%; --time:3.0109906521714827s; --delay:-2.4417192211712684s;"></div>
    <div class="bubble" style="--size:3.0951134797520083rem; --distance:7.204530657184179rem; --position:34.837475947249274%; --time:3.4424976205008315s; --delay:-2.850561601531429s;"></div>
    <div class="bubble" style="--size:3.9543277362625426rem; --distance:6.930252461397308rem; --position:42.04536341048818%; --time:2.4111650228600148s; --delay:-2.438913953533981s;"></div>
    <div class="bubble" style="--size:5.361643164966635rem; --distance:6.8531453238074755rem; --position:3.3294859936398744%; --time:2.7333976034600957s; --delay:-2.790334256988487s;"></div>
    <div class="bubble" style="--size:2.941114401694364rem; --distance:9.59279558107059rem; --position:51.36748282310873%; --time:3.8586501292333253s; --delay:-2.9550192484160918s;"></div>
    <div class="bubble" style="--size:3.0716267691052748rem; --distance:6.227958082590271rem; --position:49.31244203199816%; --time:2.082766382679801s; --delay:-2.6893983406494444s;"></div>
    <div class="bubble" style="--size:2.3821710772904696rem; --distance:8.923719418325945rem; --position:78.04548763641544%; --time:2.1936433099925483s; --delay:-2.7682168010442836s;"></div>
    <div class="bubble" style="--size:4.6226135257905465rem; --distance:7.564649636525779rem; --position:10.714426907175056%; --time:2.6234274914141618s; --delay:-2.439744425363885s;"></div>
    <div class="bubble" style="--size:3.355145971235137rem; --distance:8.366669882169061rem; --position:44.733360512627065%; --time:3.5034890423142597s; --delay:-2.5569505691933188s;"></div>
    <div class="bubble" style="--size:4.109212885376218rem; --distance:9.340189630566407rem; --position:35.414293160964604%; --time:2.724218290160991s; --delay:-2.1120419027375075s;"></div>
    <div class="bubble" style="--size:4.0227418788424645rem; --distance:9.233455963616144rem; --position:54.190189502206174%; --time:3.650032724783566s; --delay:-3.2664007666886223s;"></div>
    <div class="bubble" style="--size:5.950112498630783rem; --distance:9.888470359787977rem; --position:93.78173287211322%; --time:2.751468309203162s; --delay:-3.831106975109002s;"></div>
    <div class="bubble" style="--size:5.272820333268248rem; --distance:6.883903651112146rem; --position:77.0871211314095%; --time:2.3421367767747028s; --delay:-3.379583300816339s;"></div>
    <div class="bubble" style="--size:4.7678775033613rem; --distance:6.624868311883769rem; --position:103.6545534030402%; --time:3.128071514169466s; --delay:-3.3348496112410584s;"></div>
    <div class="bubble" style="--size:4.363123204506541rem; --distance:8.81621970794097rem; --position:64.9254722946198%; --time:2.5477541460640603s; --delay:-2.899834225481698s;"></div>
    <div class="bubble" style="--size:3.917114104076676rem; --distance:6.619253582134092rem; --position:56.630137822966894%; --time:3.4719737827713084s; --delay:-3.1647097083646085s;"></div>
    <div class="bubble" style="--size:2.046824073586426rem; --distance:8.295730075741051rem; --position:82.00355944104741%; --time:3.236775665228785s; --delay:-2.9638214395784153s;"></div>
    <div class="bubble" style="--size:2.0514039655921863rem; --distance:7.71083598097657rem; --position:44.68913379289763%; --time:3.829406943757694s; --delay:-3.596615840808371s;"></div>
    <div class="bubble" style="--size:5.311409266620545rem; --distance:7.188972599204035rem; --position:58.101606563972744%; --time:2.8964662523279765s; --delay:-2.6872366796172464s;"></div>
    <div class="bubble" style="--size:2.696719790064021rem; --distance:9.691065744311274rem; --position:65.27947633810321%; --time:3.2787327666911623s; --delay:-2.143376072553172s;"></div>
    <div class="bubble" style="--size:2.597362653224586rem; --distance:8.149708522225193rem; --position:2.3136886130550938%; --time:2.5840032749421917s; --delay:-3.056178379281388s;"></div>
    <div class="bubble" style="--size:2.1182648092126266rem; --distance:9.681142170233379rem; --position:-0.8656192709322923%; --time:2.7720672511317748s; --delay:-2.674972485011934s;"></div>
    <div class="bubble" style="--size:5.505068753763384rem; --distance:7.75630348866732rem; --position:27.59527966310109%; --time:3.029912180783871s; --delay:-3.036802702111006s;"></div>
    <div class="bubble" style="--size:4.7520386193483946rem; --distance:8.913514407150256rem; --position:38.845948029052515%; --time:2.0270558230792717s; --delay:-2.0604077711084585s;"></div>
    <div class="bubble" style="--size:3.642332254730719rem; --distance:6.995704236199215rem; --position:54.56112572903391%; --time:3.7844663589661085s; --delay:-3.523151022406782s;"></div>
    <div class="bubble" style="--size:3.5650532310689833rem; --distance:6.560720689161555rem; --position:47.12391753589252%; --time:3.6410368666428927s; --delay:-3.99941794028292s;"></div>
    <div class="bubble" style="--size:2.7142283267613427rem; --distance:8.786766213012454rem; --position:30.57327568269349%; --time:3.6430597759557077s; --delay:-3.9935861797224663s;"></div>
    <div class="bubble" style="--size:5.167385284661247rem; --distance:6.628192957331014rem; --position:77.96212098161436%; --time:3.411846856375169s; --delay:-2.4783356913117482s;"></div>
    <div class="bubble" style="--size:4.656681703404404rem; --distance:6.044106313613914rem; --position:80.38726034816574%; --time:2.101564238473253s; --delay:-2.2195000896733887s;"></div>
    <div class="bubble" style="--size:4.6364927711698rem; --distance:9.846849520316212rem; --position:42.03187093060565%; --time:3.0561092089826243s; --delay:-2.7134544238594343s;"></div>
    <div class="bubble" style="--size:5.996074289775475rem; --distance:9.806130747755379rem; --position:85.60069012209686%; --time:3.5558954356420687s; --delay:-3.2670371065125763s;"></div>
    <div class="bubble" style="--size:5.550497514625731rem; --distance:6.650473962091123rem; --position:83.9834251839202%; --time:3.846594390297488s; --delay:-3.7719240611886367s;"></div>
    <div class="bubble" style="--size:3.9192349905985626rem; --distance:7.692038614856541rem; --position:39.636444072940286%; --time:2.817965368590782s; --delay:-3.6209643067396087s;"></div>
    <div class="bubble" style="--size:3.6645265078952747rem; --distance:9.087185241248934rem; --position:87.01276952733468%; --time:2.962194099992324s; --delay:-3.7130136001644383s;"></div>
    <div class="bubble" style="--size:2.1624029131010074rem; --distance:7.186632088852109rem; --position:14.543256941131915%; --time:3.953754702713386s; --delay:-2.2138470853029295s;"></div>
    <div class="bubble" style="--size:3.402550957553772rem; --distance:6.563136063593647rem; --position:43.250932053623615%; --time:3.3458060312129696s; --delay:-2.12318016463914s;"></div>
    <div class="bubble" style="--size:2.3155420649222913rem; --distance:8.385576086747779rem; --position:16.20114262113728%; --time:3.0972463947531335s; --delay:-3.8901613599904312s;"></div>
    <div class="bubble" style="--size:2.3787715272073084rem; --distance:8.559296424195193rem; --position:52.10128372670161%; --time:3.0602873219556015s; --delay:-2.0303666600840837s;"></div>
    <div class="bubble" style="--size:5.961231952692804rem; --distance:7.775037069278161rem; --position:75.21885181664227%; --time:3.0230227333561643s; --delay:-3.0811732350512857s;"></div>
    <div class="bubble" style="--size:5.587124881115793rem; --distance:9.99195272607848rem; --position:76.76591145389065%; --time:3.2172198554177727s; --delay:-3.715688224088995s;"></div>
    <div class="bubble" style="--size:3.8639038993281245rem; --distance:6.969516935897629rem; --position:68.55423131110513%; --time:2.303229503639695s; --delay:-3.111143842084448s;"></div>
    <div class="bubble" style="--size:4.1386961294093005rem; --distance:8.875403045469026rem; --position:28.894812729689647%; --time:2.702979507173294s; --delay:-2.1899862725809323s;"></div>
    <div class="bubble" style="--size:3.8112870251197384rem; --distance:9.430822133039158rem; --position:52.351585935419806%; --time:2.433674197814776s; --delay:-2.4519656949024955s;"></div>
    <div class="bubble" style="--size:3.8033404000033837rem; --distance:8.73234337983669rem; --position:17.535283986764995%; --time:3.5421354152998643s; --delay:-2.0628443001408012s;"></div>
    <div class="bubble" style="--size:2.3587852703072896rem; --distance:8.157658827567483rem; --position:0.13894775075813115%; --time:3.874908848245626s; --delay:-3.2890620857599724s;"></div>
    <div class="bubble" style="--size:5.611342468660139rem; --distance:9.387496548865542rem; --position:89.11126500491079%; --time:2.8450871403342592s; --delay:-3.60203403264115s;"></div>
    <div class="bubble" style="--size:2.3028177758039012rem; --distance:9.55119247391773rem; --position:79.70405438712925%; --time:2.243196545777336s; --delay:-3.228573729590817s;"></div>
    <div class="bubble" style="--size:3.001701940865302rem; --distance:8.14780096166849rem; --position:81.908538998031%; --time:2.688538215171722s; --delay:-2.990549817227122s;"></div>
    <div class="bubble" style="--size:5.482230802789247rem; --distance:7.652729485078487rem; --position:14.669921158990132%; --time:3.5615704253154292s; --delay:-2.0205748450329892s;"></div>
    <div class="bubble" style="--size:5.516958398791418rem; --distance:7.9300206292523265rem; --position:31.567750230976245%; --time:2.0438523780340865s; --delay:-3.1957345374655306s;"></div>
    <div class="bubble" style="--size:4.269977573369886rem; --distance:7.229094886942795rem; --position:26.511948364457734%; --time:2.157108267809552s; --delay:-2.423842391276754s;"></div>
    <div class="bubble" style="--size:4.555438459290753rem; --distance:9.977368571045417rem; --position:39.88279971923476%; --time:2.9306087570191743s; --delay:-2.9419838543226637s;"></div>
    <div class="bubble" style="--size:2.7589753570634414rem; --distance:9.240965269065438rem; --position:62.795385258850146%; --time:2.0775658562759443s; --delay:-2.767960066612867s;"></div>
    <div class="bubble" style="--size:2.6825853394876242rem; --distance:6.648946474420467rem; --position:7.184883952701998%; --time:3.493770767317133s; --delay:-2.5937978798046575s;"></div>
    <div class="bubble" style="--size:5.6852868180233775rem; --distance:8.85117255605294rem; --position:100.71425012319878%; --time:2.7426135201382214s; --delay:-2.3099504126314843s;"></div>
    <div class="bubble" style="--size:3.019650214238535rem; --distance:9.633010713025158rem; --position:18.346914734225553%; --time:3.4366900640005817s; --delay:-3.04116153236213s;"></div>
    <div class="bubble" style="--size:4.196007845200481rem; --distance:6.043208110269115rem; --position:34.23194684497926%; --time:3.085026067207377s; --delay:-3.9022803915299273s;"></div>
    <div class="bubble" style="--size:3.518808917857746rem; --distance:7.868612745478727rem; --position:0.5440279594749224%; --time:3.0632665662167144s; --delay:-3.1419601695813926s;"></div>
    <div class="bubble" style="--size:5.823638522320702rem; --distance:6.132227708351964rem; --position:65.1476568847284%; --time:3.4540441325870854s; --delay:-3.24186266472665s;"></div>
    <div class="bubble" style="--size:2.4689048732427636rem; --distance:9.655597977515463rem; --position:51.89132339389134%; --time:3.6302050970848887s; --delay:-2.968188327066159s;"></div>
    <div class="bubble" style="--size:3.7805229301736976rem; --distance:9.679566849397721rem; --position:66.08591020780044%; --time:3.5932336651246883s; --delay:-3.6741643409831126s;"></div>
    <div class="bubble" style="--size:3.6338512340442115rem; --distance:7.224141709360932rem; --position:54.422509268171105%; --time:3.5515350216350066s; --delay:-3.7948611625970714s;"></div>
    <div class="bubble" style="--size:5.257691662189432rem; --distance:8.354412249968698rem; --position:91.7811015954414%; --time:2.2672688133271564s; --delay:-3.242972104979895s;"></div>
    <div class="bubble" style="--size:5.234822240661258rem; --distance:8.660405712980427rem; --position:89.60472794197011%; --time:2.890707318918204s; --delay:-3.4067814637976213s;"></div>
    <div class="bubble" style="--size:4.884662582743427rem; --distance:7.533801482726646rem; --position:55.79135142246771%; --time:3.373642098010264s; --delay:-2.065821560179021s;"></div>
    <div class="bubble" style="--size:2.507201279278589rem; --distance:8.815835542561059rem; --position:66.4116935132628%; --time:2.216439294952049s; --delay:-3.109659473912109s;"></div>
    <div class="bubble" style="--size:2.7945469650506443rem; --distance:9.344616960520115rem; --position:-3.3595168683579435%; --time:3.3135918581733583s; --delay:-3.3268117961862402s;"></div>
    <div class="bubble" style="--size:3.1428476667485885rem; --distance:8.432823177002039rem; --position:72.35890043647778%; --time:2.619225821507781s; --delay:-2.6960564276484953s;"></div>
    <div class="bubble" style="--size:3.172862888436308rem; --distance:8.874023801345704rem; --position:90.39868198306698%; --time:3.6203626656761014s; --delay:-2.9151948665896064s;"></div>
    <div class="bubble" style="--size:2.4878485088129505rem; --distance:7.137222105090415rem; --position:25.70629612971333%; --time:2.9187301377063797s; --delay:-3.9372458828343295s;"></div>
    <div class="bubble" style="--size:2.3661905870954065rem; --distance:7.349900350915943rem; --position:29.04750156520064%; --time:3.292098448544924s; --delay:-2.0561106414235435s;"></div>
    <div class="bubble" style="--size:2.5464092640563694rem; --distance:8.81942305339752rem; --position:72.90811356370502%; --time:3.505923691523627s; --delay:-3.8584159902552657s;"></div>
    <div class="bubble" style="--size:2.429421395625474rem; --distance:9.394159575451761rem; --position:36.89380494438352%; --time:3.655279741421575s; --delay:-2.7293348168633957s;"></div>
    <div class="bubble" style="--size:4.346420302387622rem; --distance:7.265463318280942rem; --position:78.9356282249715%; --time:3.048172732779674s; --delay:-2.611546415552697s;"></div>
    <div class="bubble" style="--size:2.557802494417201rem; --distance:8.329106686878408rem; --position:45.01564892296547%; --time:2.3983460852556813s; --delay:-2.6070172324560135s;"></div>
    <div class="bubble" style="--size:4.344217543626297rem; --distance:8.364878395071374rem; --position:19.034886933383422%; --time:3.0955527130895932s; --delay:-3.953234623443029s;"></div>
    <div class="bubble" style="--size:2.169666942510182rem; --distance:9.027682381798467rem; --position:27.59933809739148%; --time:2.553790389674148s; --delay:-3.6282062111440934s;"></div>
    <div class="bubble" style="--size:5.484345638925447rem; --distance:8.855481786295996rem; --position:14.124210595052553%; --time:2.7108257208383755s; --delay:-2.292991391906126s;"></div>
    <div class="bubble" style="--size:2.0505410319644435rem; --distance:8.224980090978498rem; --position:-1.0766557882825856%; --time:3.8679681963707626s; --delay:-3.3940127443330894s;"></div>
    <div class="bubble" style="--size:5.127232534844417rem; --distance:7.810332583294494rem; --position:30.3150937121789%; --time:2.298852973411366s; --delay:-2.6585568207278834s;"></div>
    <div class="bubble" style="--size:4.696238779904007rem; --distance:7.224121070059602rem; --position:95.87953638309386%; --time:3.5329372056441852s; --delay:-2.730525615222185s;"></div>
    <div class="bubble" style="--size:4.213878656096303rem; --distance:7.700649151831148rem; --position:97.35053285668737%; --time:3.427207895083235s; --delay:-3.563743117085056s;"></div>
    <div class="bubble" style="--size:5.771840048738611rem; --distance:8.304764976163137rem; --position:73.37840860393136%; --time:2.601078607462835s; --delay:-3.572601130808425s;"></div>
    <div class="bubble" style="--size:3.856740953717371rem; --distance:6.4690912661838835rem; --position:99.12715259006606%; --time:3.32989687609963s; --delay:-3.9754057303220534s;"></div>
    <div class="bubble" style="--size:2.6272135715098965rem; --distance:7.56111083860649rem; --position:-4.981593153113932%; --time:3.343435042450808s; --delay:-3.0935368253281648s;"></div>
    <div class="bubble" style="--size:2.1457404620389227rem; --distance:8.298291704109658rem; --position:102.79952559208003%; --time:2.087535286588795s; --delay:-3.352340093172993s;"></div>
    <div class="bubble" style="--size:2.211615283790535rem; --distance:7.75782057349355rem; --position:51.39073902522132%; --time:3.771763276299463s; --delay:-2.331589473666581s;"></div>
    <div class="bubble" style="--size:4.558418576638576rem; --distance:8.291441016085098rem; --position:34.68431096900016%; --time:3.2335879131121956s; --delay:-3.0156137345365055s;"></div>
    <div class="bubble" style="--size:4.938930272052871rem; --distance:6.218276304856862rem; --position:27.185794313292327%; --time:2.671218182997691s; --delay:-2.9580038867801925s;"></div>
    <div class="bubble" style="--size:3.3311709334540263rem; --distance:6.623309986865715rem; --position:44.161723391391014%; --time:3.918611571189055s; --delay:-2.246934289229667s;"></div>
    <div class="bubble" style="--size:4.0704524047299895rem; --distance:6.491149543464904rem; --position:51.01982451362814%; --time:3.754050613652388s; --delay:-3.0205960467622592s;"></div>
    <div class="bubble" style="--size:4.4333782078371975rem; --distance:9.418709627583663rem; --position:8.077287501764266%; --time:2.8151245348754625s; --delay:-2.521207323380785s;"></div>
    <div class="bubble" style="--size:3.4118793064044253rem; --distance:6.937328419878075rem; --position:60.90528460911828%; --time:3.2691410096524036s; --delay:-2.713408074344865s;"></div>
    <div class="bubble" style="--size:2.469077276841829rem; --distance:6.524309807847357rem; --position:45.78021034607099%; --time:2.069859108714883s; --delay:-3.0967111559294382s;"></div>
    <div class="bubble" style="--size:2.607565117627331rem; --distance:7.844832822129471rem; --position:10.5199590352053%; --time:2.1417837950725778s; --delay:-2.1960956311312327s;"></div>
    <div class="bubble" style="--size:3.118755691298352rem; --distance:6.229433950010773rem; --position:41.920944216285804%; --time:2.5296478331783048s; --delay:-3.4117151773093237s;"></div>
    <div class="bubble" style="--size:2.130185826598108rem; --distance:6.5368376122734375rem; --position:42.024350009010476%; --time:2.5948243078466198s; --delay:-2.4589134159189068s;"></div>
    <div class="bubble" style="--size:4.52873410006798rem; --distance:7.646663687168005rem; --position:9.616644711641351%; --time:3.837083865134289s; --delay:-3.250636876981181s;"></div>
    <div class="bubble" style="--size:4.830057142695901rem; --distance:8.241771465131865rem; --position:22.76363214664223%; --time:3.359737151235468s; --delay:-3.11349543288078s;"></div>
    <div class="bubble" style="--size:2.1051154595501913rem; --distance:6.80773364131124rem; --position:77.33354375159637%; --time:2.49671990709574s; --delay:-3.3399357392876405s;"></div>
    <div class="bubble" style="--size:3.438021628582062rem; --distance:9.150550407123978rem; --position:92.06914981977178%; --time:2.8204849146659168s; --delay:-2.4840706075945715s;"></div>
    <div class="bubble" style="--size:3.827743237976952rem; --distance:7.5811410949374896rem; --position:70.46154325393952%; --time:2.6201946729168824s; --delay:-2.3109854627484467s;"></div>
    <div class="bubble" style="--size:3.127559395673889rem; --distance:9.72298136668601rem; --position:63.76789962909642%; --time:2.0265129685103016s; --delay:-3.918970205180716s;"></div>
    <div class="bubble" style="--size:3.84958911205017rem; --distance:8.040534500776666rem; --position:68.4813404902713%; --time:2.5398991397049393s; --delay:-2.1248716593458004s;"></div>
    <div class="bubble" style="--size:2.348315173032354rem; --distance:7.903349661024557rem; --position:22.189958691095484%; --time:2.5416282377088955s; --delay:-2.4542959219350724s;"></div>
    <div class="bubble" style="--size:4.473550477740018rem; --distance:9.299752022267153rem; --position:82.4351074174734%; --time:2.540154288819876s; --delay:-2.60003750753754s;"></div>
    <div class="bubble" style="--size:5.368010856971777rem; --distance:6.995914309244443rem; --position:67.88250669039579%; --time:3.3709443340051974s; --delay:-2.253205098479003s;"></div>
    <div class="bubble" style="--size:3.2733525568163255rem; --distance:9.990409999252366rem; --position:86.33126404851795%; --time:3.3464901345442355s; --delay:-2.4167867020225047s;"></div>
    <div class="bubble" style="--size:4.4323438946343945rem; --distance:6.794245698162604rem; --position:31.15480088237399%; --time:2.3452818190448474s; --delay:-3.9193377744710527s;"></div>
    <div class="bubble" style="--size:4.331360480546469rem; --distance:7.526225215667917rem; --position:87.66766711857%; --time:3.0401108433318873s; --delay:-2.1146940219895813s;"></div>
    <div class="bubble" style="--size:4.783245009326191rem; --distance:8.168150376704608rem; --position:89.82943973927571%; --time:2.0315669842321062s; --delay:-2.080836299171911s;"></div>
    <div class="bubble" style="--size:5.144780748929035rem; --distance:8.883628843353035rem; --position:75.48064276739703%; --time:3.1723056853527036s; --delay:-2.9016140323487214s;"></div>
    <div class="bubble" style="--size:5.642531900921485rem; --distance:8.54328951046103rem; --position:85.53730021580208%; --time:2.1627268260097274s; --delay:-2.9381694263403086s;"></div>
    <div class="bubble" style="--size:4.303946072184742rem; --distance:6.841328665365674rem; --position:-1.3242704871153554%; --time:2.892973983568614s; --delay:-3.6159309364102867s;"></div>
    <div class="bubble" style="--size:4.125494051241244rem; --distance:6.454820935322289rem; --position:2.6019137705475126%; --time:2.2914764678967714s; --delay:-2.6725967504845185s;"></div>
  </div>
  <div class="content">
    <div>
      <div style="margin-left:530px;"><b>กรุณาตรวจสอบข้อมูล username password ของท่าน</b></div>
      
    </div>
 
  </div>
</div>
<svg style="position:fixed; top:100vh;">
  <defs>
    <filter id="blob">
      <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur"></feGaussianBlur>
      <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="blob"></feColorMatrix>
      <feComposite in="SourceGraphic" in2="blob" operator="atop"></feComposite>
    </filter>
  </defs>
</svg>
    </body>

</html>