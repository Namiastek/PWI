function validateForm() {
    with (document.saveform) {
        var saveit = true;
        if (username.value.length < 4)
        {
            alert("Login za krótki, min 4 znaki.");
            username.focus();
            username.select();
            saveit = false;
        }
        if ((password.value.length < 4) && saveit)
        {
            alert("Hasło za  krótkie, min 4 znakii.");
            password.focus();
            password.select();
            saveit = false;
        }
        if ((fswords(username.value)) && saveit)
        {
            alert("Login zawiera zabronione  slowa!");
            username.focus();
            username.select();
            saveit = false;
        }
        if ((fswords(password.value)) && saveit)
        {
            alert("Hasło zawiera zabronione slowa!!");
            password.focus();
            password.select();
            saveit = false;
        }
        else if (saveit)
            submit();
    }
}
swords = ["zło", "admin", "PSL", "polityk", "kurde"];
function fswords(theword)
{
    thereturn = false;
    theword = theword.toLowerCase();
    for (i = 0; i < swords.length; i++)
    {
        testit = theword.indexOf(swords[i], 0);
        //alert(swords[i]+ " testit ="+testit)
        if (testit > -1)
            thereturn = true;
    }
    return thereturn;
}

//--------generator  randomowych llorem ipsemow na stronie
var bodyText = ["Lorem ipsum dolor sit amet, consectetur adipiscing elit. ",
    "Ut facilisis sagittis lacus non consequat. ",
    "The past has no power over the present moment.",
    "Vivamus tellus felis.",
    "<p>Ut suscipit volutpat interdum. Vestibulum posuere mauris sit amet enim vehicula, nec gravida justo varius.</p>",
    "Peace comes from within. Do not seek it without.",
    "<h3>Nagłówek</h3><p>Morbi elementum massa a egestas dignissim. In nec enim non nisl malesuada porttitor.. Morbi elementum massa a egestas dignissim. In nec enim non nisl malesuada porttitor."
];
function generateText(sentenceCount) {
    for (var i = 0; i < sentenceCount; i++)
        document.write(bodyText[Math.floor(Math.random() * 7)] + " ");
}
//---------------------------------------------------------
//------------------------------------baner
var sent = "Demonstacyjny banner wykonany w javascript poruszający sie od lewej do  prawej.Wykorzystano w tym celu(poruszanie sie) substring."
var slen = sent.length
var siz = 22
var a = -3, b = 0
var subsent = "x"

//tworzenie wyciinka tekstu
function makeSub(a, b) {
    subsent = sent.substring(a, b);
    return subsent;
}

//funkcja inkrementująca wartosci  substringa
//przy kazdym wywołaniu następnego makeSub do wygenerowaniia kolejnej wklejki

function newMake() {
    a = a + 3;
    b = a + siz
    makeSub(a, b);
    return subsent
}

//funkcja pętla zmiieniająca stringi  w boksie
//uzywa timeoutu do efektu poruszaniia się
function doIt() {
    for (var i = 1; i <= slen; i++) {
        setTimeout("document.z.textdisplay.value = newMake()", i * 300);
        setTimeout("window.status = newMake()", i * 300);
    }
}
//---------------------------------------------------------

//----------kolorowanie tła
setTimeout("document.bgColor='lightpink'", 1500);
setTimeout("document.bgColor = 'pink'", 2000);
setTimeout("document.bgColor =  'deeppink'", 2500);
setTimeout("document.bgColor = 'red'", 3000);
setTimeout("document.bgColor = 'darkred'", 1000);
setTimeout("document.bgColor = 'tomato'", 3500);
setTimeout("document.bgColor='white'", 4000);
//---------------------------------------------------------

//autodata na stronie
var dateform
speed = 1000
tid = 0;
function dodate()
{
    var d = new Date();
    f.date.value = d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();
    tid = window.setTimeout("dodate()", speed);
}
function start(x) {
    f = x
    tid = window.setTimeout("dodate()", speed);
}
function cleartid() {
    window.clearTimeout(tid);
}
//---------------------------------------------------------

//inner Htmll dnia
var days = ["Niedziela", "Poniedzialek", "Wttor", "Sroda", "Czwwartek", "PT", "Sob"];
function innerDate(btn) {
    var d = new Date();
    var day = days[d.getDay()];
    var x = document.getElementById("time");
    x.innerHTML = day;
    btn.style.display = 'none';
}
//---------------------------------------------------------


//-------------------sDHTML
function highlightButton(s) {
    if ("INPUT" == event.srcElement.tagName)
        event.srcElement.className = s;
}
//---------------------------

//------------------ajax
function loadDoc() {
    var xmlhttp;

    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == XMLHttpRequest.DONE) {
            if (xmlhttp.status == 200) {
                document.getElementById("ajax").innerHTML = xmlhttp.responseText;
            }
            else {
                alert('something else other than 200 was returned');
            }
        }
    };

    xmlhttp.open("GET", "ajax_info.txt", true);
    xmlhttp.send();
}
//---------------------------------