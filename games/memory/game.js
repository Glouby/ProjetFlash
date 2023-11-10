
var H=0;
var M=0;
var S=0;
var MS=0;

var intervalMiliseconde;
var intervalSeconde;
var intervalMinute;

function neuf()
{
    if(MS==999)
    {
    MS=0;
    }
    MS+=1;
    document.getElementById('MS').innerHTML=MS +'ms'

}

function huit()
{
    if(S==59)
    {
    S=0;
    }
    S+=1;
    document.getElementById('S').innerHTML=S +'s'

}

function sept()
{
    if(M==59)
    {
        m=0;
    }
    M+=1;
    document.getElementById(M).innerHTML=M +'M'
}


function star()

{
    intervalMinute =setInterval(sept,60000);
    
    intervalSeconde=setInterval(huit,1000);

    intervalMiliseconde=setInterval(neuf,1);

}
