    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-22822163-1']);
    _gaq.push(['_trackPageview']);

    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

    var reunionsDate = new Date(2011,4,26,12,0,0);

    function GetCount(rDate,elemId){
      now = new Date();
      ms = rDate.getTime() - now.getTime();

      if(ms < 0){
        document.getElementById(elemId).innerHTML="Happy Reunions!";
}else{
        var days=0;
        var hours=0;
        var mins=0;
        var secs=0;
        var out="";

        ms = Math.floor(ms/1000);

        days=Math.floor(ms/86400);
        ms=ms%86400;

        hours=Math.floor(ms/3600);
        ms=ms%3600;

        mins=Math.floor(ms/60);
        ms=ms%60;

        secs=Math.floor(ms);

        if(days != 0){
          out += days + " " + ((days==1)?"day":"days") + ", ";
        }

        if(hours != 0){
          out += hours + " " + ((hours==1)?"hour":"hours") + ", ";
        }

        out += mins + " " + ((mins==1)?"min":"mins") + ", ";

        out += secs + " " + ((secs==1)?"sec":"secs") + ", ";

        out = out.substr(0,out.length-2);

        document.getElementById(elemId).innerHTML=out;

        setTimeout(function(){GetCount(reunionsDate,elemId)}, 1000);
      }
    }

    window.onload=function(){
      GetCount(reunionsDate, 'countbox1');
    };
