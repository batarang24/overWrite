var home=document.getElementById('home');
var notes=document.getElementById('notes');
var logout=document.getElementById('logout');
var logout2=document.getElementById('logout2');
var hp=document.getElementById('homepage');
var np=document.getElementById('notespage');
var sp=document.getElementById('shoppage');
var phome=document.getElementById('phome');
var pnotes=document.getElementById('pnotes');
var pshop=document.getElementById('pshop');
var shop=document.getElementById('shop');
var plogout=document.getElementById('plogout');
var mopen=document.getElementById('mopen');
var opens=document.getElementById('open');
var write=document.getElementById('write');
var display=document.getElementById('display');
var swrite=document.getElementById('swrite');
var sdisplay=document.getElementById('sdisplay');
var mcomment=document.getElementById('mcomment');
var lcomment=document.getElementById('lcomment');
var save2=document.getElementById('save2');
var scancel=document.getElementById('scancel');
mopen.addEventListener('click',textarea);
opens.addEventListener('click',textarea);
var mshoppen=document.getElementById('mshoppen');
var shoppen=document.getElementById('shoppen');
shoppen.addEventListener('click',textarea2);
var mssgs='';
        
mshoppen.addEventListener('click',textarea2);
var ok=document.getElementById('ok');
var dinput=document.getElementById('dinput');
ok.addEventListener('click',function (e) {
    var data
    var input=dinput.value;
    console.log(input);
    var datas={};
    datas.type="desire";
    datas.desires=input;   
    var datass=JSON.stringify(datas);
    sends(datass);
    ok.classList.add('modal-close');
    dinput.value="";
});
console.log('hecker');
function textarea2(e) {

    var cont=(mssgs==0)?1:mssgs.length+1;
    
    console.log(cont);
   
    sdisplay.style.flex="0";
    swrite.style.flex="1";
    var date={};
    var datas={};
    datas.title="shoplist"+cont;
    datas.type="shopsave";
    var datass=JSON.stringify(datas);
    sends(datass); 
   
    var readmaster=setInterval(() => {
        date.title="shoplist"+cont;
        console.log(date.title);
        date.type="shopget";
        dates=JSON.stringify(date);
        console.log('sffsljfslfjs');
        sends(dates);
    }, 500);
    
   
    
    swrite.innerHTML=' <div style="height:10vh;background-color: #424242; display: flex;justify-content: space-between" >'+
    '<a >'+
    '<i class="material-icons black-text"style="font-size:3.5rem;position:relative;top:10%;" id="arrrow" >arrow_back</i>'+
    '</a>'+
     '<input type="text"  disabled value="shoplist'+cont+'" style="position:relative;top:15%; min-width: 100px;max-width:250px;color: black;text-align:center;font-size: 2.5rem;" id="collab"/>'+    
        
     '</div>'+
     '<div style=" width: 100%; height: 70vh;color:white;overflow-x:auto" >'+
     '<table style="border-collapse:collapse;border-spacing:0;width:100%;" id="ttable">'+
        
            
       
       
        '</table>'+
     '</div>'+
    '<div>'+
    '<a href="#listpop" class="modal-trigger white-text"><i class="material-icons medium hide-on-large-only right" style="position:relative;top:80%;left:-8%;" id="mlists">add_circle</i></a>'+
    '<a href="#listpop" class="modal-trigger white-text"><i class="material-icons hide-on-med-and-down right" style="font-size:5.5rem;position:relative;left:-5%;" id="lists">add_circle</i></a>'+
    '</div>';
    var arrrow=document.getElementById('arrrow');
    arrrow.addEventListener('click',function (e) {
        sdisplay.style.flex="1";
        swrite.style.flex="0";
        clearInterval(readmaster);
    });
     var save3=document.getElementById('save3');
     var commodity=document.getElementById('Commodity');
     var price=document.getElementById('Price');
     var quantity=document.getElementById('Quantity');
     var differ=document.getElementById('differ');
     var differ2=document.getElementById('differ2');
     save3.addEventListener('click',function (e) {
        /* if (save3.hasAttribute('class','modal-close')) {
             this.classList.remove('modal-close');
         }*/
        console.log(cont) ;
        console.log(commodity.value.length);
        if (commodity.value.length==0 || price.value.length==0 || quantity.value.length==0) {
            differ.innerText="rules violated";
            differ.style.color="white"; 
            differ2.innerText="rules violated";
            differ2.style.color="white"; 
            setTimeout(() => {

                differ.innerText=" ";
                differ2.innerText=" ";
            }, 1500);
        }
        else if (commodity.value.length>15) {
            differ.innerText="rules violated";
            differ.style.color="white"; 
            differ2.innerText="rules violated";
            differ2.style.color="white"; 
            setTimeout(() => {

                differ.innerText=" ";
                differ2.innerText=" ";
            }, 1500);
        }
        else if(quantity.value.length>5 || price.value.length>5)
        {
            differ.innerText="rules violated";
            differ.style.color="white"; 
            differ2.innerText="rules violated";
            differ2.style.color="white"; 
            setTimeout(() => {

                differ.innerText=" ";
                differ2.innerText=" ";
            }, 1500);
        }
        else
        {
            var datas={};
            datas.commodity=commodity.value;
            datas.quantity=quantity.value;
            datas.price=price.value;
            datas.type="tabsave";
            datas.title="shoplist"+cont;
            console.log(datas.commodity);
            console.log(datas.quantity);
            console.log(datas.price);
            var datass=JSON.stringify(datas);
            sends(datass);
            commodity.value="";
            quantity.value="";        
            price.value="";        
            save3.classList.add('modal-close');
        }

     });

 
   
 

}
function textarea(e) {
    console.log('hello');
    display.style.flex="0";
    write.style.flex="1";
    write.innerHTML=
 

    ' <div style="height:10vh;background-color: #424242; display: flex;justify-content: space-between" id="header">'+
    '<a href="#savepop" class="modal-trigger">'+
    '<i class="material-icons black-text"style="font-size:3.5rem;position:relative;top:10%;" id="arrow">arrow_back</i>'+
    '</a>'+
     '<input type="text" id="title" placeholder="Title" style="position:relative;top:15%; min-width: 100px;max-width:250px;color: black;text-align:center;font-size: 2.5rem;" />'+    
        
     '<i class="material-icons black-text" style="font-size:3rem;position:relative;top:16%; "id="savebtn">save</i>'+
     '</div>'+
     

    '<textarea rows="10" cols="100" style="resize:none;border:none; width: 100%; height: 70vh;font-size: 1.5rem;color:white;outline: none;position:relative;"id="main"></textarea>'+
    '<i class="material-icons" style="position:relative;left:50%;font-size:3rem;cursor:pointer;" id="mic">mic</i>';
 
    var mic=document.getElementById('mic');
    var main=document.getElementById('main');       
    var SpeechRecognition=window.SpeechRecognition||window.webkitSpeechRecognition;

    var recognition =new SpeechRecognition();  

    recognition.onstart=function(){
    
        console.log('recognition started');
    };
    recognition.onend=function(event) {
        console.log('end');
    }
    recognition.onerror=function () {
        console.log("error");
    }
    recognition.onresult=function(event)
    {
        
        console.log("i am result bro");
        var transcript1 = event.results[0][0].transcript;
        console.log(transcript1);
        main.value +=' ' +transcript1;
        

        
    }
    mic.addEventListener('click',function (e) {
        recognition.start();
    });
 
    var arrow=document.getElementById('arrow');
    scancel.addEventListener('click',function () {
        display.style.flex="1";
        write.style.flex="0";
    });
 
    
    var main=document.getElementById('main');
    var savebtn=document.getElementById('savebtn');
    var title=document.getElementById('title');
    savebtn.addEventListener('click',clean);
    save2.addEventListener('click',clean);
    function clean(e) {
        tvalue=title.value.trim();
        tvalue=tvalue.replace(/\s/g,'_');
        console.log(tvalue);
        mvalue=main.value.trim();
        //console.log(mvalue);
       var datas={};
       datas.type="content";
       datas.title=tvalue;
       datas.notes=mvalue;
       var datass=JSON.stringify(datas);
       sends(datass);
       save2.classList.add('modal-close');
    }
}


logout2.addEventListener('click',function (e) {
   
        //alert('hello');
        var datas={};
        datas.type="logout";
        var datass=JSON.stringify(datas);
        sends(datass);
        //alert(datass);
    
});

console.log('helo');
home.addEventListener('click',function (e) {
    home.style.opacity="1"; 
    notes.style.opacity="0.5";
    logout.style.opacity="0.5"; 
    shop.style.opacity="0.5";  
    np.style.flex="0"
    hp.style.flex="1";
    sp.style.flex="0";
});
notes.addEventListener('click',function (e) {
    home.style.opacity="0.5"; 
    notes.style.opacity="1";
    logout.style.opacity="0.5";
    shop.style.opacity="0.5";  
    np.style.flex="1";
    hp.style.flex="0";
    sp.style.flex="0";
});
phome.addEventListener('click',function (e) {
    phome.style.opacity="1"; 
    pnotes.style.opacity="0.5";
    plogout.style.opacity="0.5"; 
    pshop.style.opacity="0.5";    
    np.style.flex="0"
    hp.style.flex="1";
    sp.style.flex="0";
});
pnotes.addEventListener('click',function (e) {
    phome.style.opacity="0.5"; 
    pnotes.style.opacity="1";
    plogout.style.opacity="0.5";
    pshop.style.opacity="0.5";  
    np.style.flex="1";
    hp.style.flex="0";
    sp.style.flex="0";
});
pshop.addEventListener('click',function (e) {
    phome.style.opacity="0.5"; 
    pnotes.style.opacity="0.5";
    plogout.style.opacity="0.5";
    pshop.style.opacity="1"; 
    np.style.flex="0";
    hp.style.flex="0";
    sp.style.flex="1"; 
    
});
shop.addEventListener('click',function (e) {
    home.style.opacity="0.5"; 
    notes.style.opacity="0.5";
    logout.style.opacity="0.5";
    shop.style.opacity="1"; 
    np.style.flex="0";
    hp.style.flex="0";
    sp.style.flex="1"; 
    
});

function userinfo(){
    var datas={};
    datas.type="info";
    var datass=JSON.stringify(datas);
    sends(datass);
}
function desireinfo() {
    var datas={};
    datas.type="desinfo";
    var datass=JSON.stringify(datas);
    sends(datass);
}
function readinfo() {
    var datas={};
    datas.type="read";
    var datass=JSON.stringify(datas);
    sends(datass);
}

var save3=document.getElementById('save3');
var commodity=document.getElementById('Commodity');
var price=document.getElementById('Price');
var quantity=document.getElementById('Quantity');
var differ=document.getElementById('differ');
var differ2=document.getElementById('differ2');                   
    //console.log()
    save3.addEventListener('click',function (e) {
    console.log(collab.value);
    console.log(commodity.value.length);
    if (commodity.value.length==0 || price.value.length==0 || quantity.value.length==0) {
        differ.innerText="rules violated";
        differ.style.color="white"; 
        differ2.innerText="rules violated";
        differ2.style.color="white"; 
        setTimeout(() => {

            differ.innerText=" ";
            differ2.innerText=" ";
        }, 1500);
    }
    else if (commodity.value.length>15) {
        differ.innerText="rules violated";
        differ.style.color="white"; 
        differ2.innerText="rules violated";
        differ2.style.color="white"; 
        setTimeout(() => {

            differ.innerText=" ";
            differ2.innerText=" ";
        }, 1500);
    }
    else if(quantity.value.length>5 || price.value.length>5)
    {
        differ.innerText="rules violated";
        differ.style.color="white"; 
        differ2.innerText="rules violated";
        differ2.style.color="white"; 
        setTimeout(() => {

            differ.innerText=" ";
            differ2.innerText=" ";
        }, 1500);
    }
    else
    {
        var dat={};
        dat.commodity=commodity.value;
        dat.quantity=quantity.value;
        dat.price=price.value;
        dat.type="tabsave";
        dat.title=collab.value;
        console.log(dat.title);
        console.log(dat.commodity);
        console.log(dat.quantity);
        console.log(dat.price);
        var datss=JSON.stringify(dat);
        sends(datss);
        commodity.value="";
        quantity.value="";
        price.value="";
        save3.classList.add('modal-close');
    }
    
        
});
setInterval(() => {
    userinfo();
    desireinfo();
    readinfo();
   
}, 500);



function sends(datass) {
    var xhr= new XMLHttpRequest();
    //console.log(xhr);
    //console.log('heck');
    xhr.open('POST','api.php',true);    
    xhr.onload=function () {
        if(xhr.readyState==4 || xhr.status==200){
            receive(xhr.responseText);
        }
    }
    xhr.send(datass);
}

function receive(values){
    //alert(values);
    var barvalues=JSON.parse(values);
    
    var collector='';
    
    if (barvalues.type=="get") {
        console.log('skhfks');
       if (barvalues.message=="empty") {
        console.log(barvalues.message);
       }
       else
        {
            var collector='';
            var table=document.getElementById('ttable')
            for (const bar of barvalues.message) {
                 collector += 
                 '<tr style="color:black;font-size:1.2rem;">'+
                '<td>'+bar['commodity']+'</td>'+
                '<td>'+bar['quantity']+'</td>'+
                '<td>'+bar['price']+'</td>'+
            
                '</tr>';
            }
            table.innerHTML='<tr style="color:black;font-size:1.7rem;" >'+
            '<th>Commodity</th>'+
            '<th>Quantity</th>'+
            '<th>Price</th>'+
            '</tr>'+
            collector;

            
        
            
        }
    }
    if (barvalues.type=="secondget") {
        
       if (barvalues.message=="empty") {
        console.log(barvalues.message);
       }
       else
        {
            var collector='';
            var table=document.getElementById('tttable')
            for (const bar of barvalues.message) {
                 collector += '<tr style="color:black;font-size:1.2rem;">'+
                '<td>'+bar['commodity']+'</td>'+
                '<td>'+bar['quantity']+'</td>'+
                '<td>'+bar['price']+'</td>'+
            
                '</tr>';
            }
            table.innerHTML='<tr style="color:black;font-size:1.7rem;" >'+
            '<th>Commodity</th>'+
            '<th>Quantity</th>'+
            '<th>Price</th>'+
            '</tr>'+
            collector;
        }
    }

    if (barvalues.type=="read" ) {
        
       // console.log(barvalues.message);
        mssgs=barvalues.message;
        //console.log(mssgs);
        if (mssgs==0) {
           
        }
        else
        {
            for (const mssg of mssgs) {
                //console.log(mssg);
                var sarea=document.getElementById('sarea');
                collector+='<div style="width:150px;height:170px;margin:10px;text-align:center;display:inline-block;"class="listss hide-on-small-only">'+
                '<i class="material-icons black-text " style="font-size:8rem;">note</i>'+
                '<br>'+mssg['title']+
                '</div>'+
                '<div style="width:100px;height:120px;text-align:center;margin:10px;display:inline-block;"  class="listss hide-on-med-and-up">'+
                '<i class="material-icons black-text " style="font-size:6rem;">note</i>'+
                '<br>'+mssg['title']+
                '</div>';                   
                                    
            }
            sarea.innerHTML=collector;
            var listss=document.getElementsByClassName('listss');
            for (const list of listss) {
                list.addEventListener('click',textarea3);
                function textarea3(e) {

                  
                    var titlecard=list.textContent.substring(4);
                    console.log(titlecard);
                    var flag=titlecard;
                    var datas={};
                    var mama=setInterval(() => {
                        datas.type="secondread";
                        datas.title=titlecard;
                        console.log(datas.title);
                        var datass=JSON.stringify(datas);
                        sends(datass);
                    }, 500);
                   
                    sdisplay.style.flex="0";
                    swrite.style.flex="1";
                    
                    
                    swrite.innerHTML=' <div style="height:10vh;background-color: #424242; display: flex;justify-content: space-between" >'+
                    '<a >'+
                    '<i class="material-icons black-text"style="font-size:3.5rem;position:relative;top:10%;" id="arrrrow" >arrow_back</i>'+
                    '</a>'+
                     '<input type="text"  disabled value="'+titlecard+'" style="position:relative;top:15%; min-width: 100px;max-width:250px;color: black;text-align:center;font-size: 2.5rem;"id="collab" />'+    
                        
                   
                     '</div>'+
                     '<div style=" width: 100%; height: 70vh;color:white;overflow-x:auto">'+
                     '<table style="border-collapse:collapse;border-spacing:0;width:100%;"id="tttable"  >'+
                    
                
                    '</table>'+
                     '</div>'+
                    '<div>'+
                    '<a href="#listpop" class="modal-trigger white-text"><i class="material-icons medium hide-on-large-only right" style="position:relative;top:80%;left:-8%;" id="mlistss">add_circle</i></a>'+
                    '<a href="#listpop" class="modal-trigger white-text"><i class="material-icons hide-on-med-and-down right" style="font-size:5.5rem;position:relative;left:-5%;" id="listss">add_circle</i></a>'+
                    '</div>';
                    
                    var collab=document.getElementById('collab');
                    console.log(collab);
                     
                     var arrrow=document.getElementById('arrrrow');
                     arrrow.addEventListener('click',function (e) {
                         sdisplay.style.flex="1";
                         swrite.style.flex="0";
                         clearInterval(mama);
                     });
                
                 
                   
                 
                
                }
            

            }
            
            
        }
        
        
    }
    
    if (barvalues.message=="infogets") {
        if (barvalues.title=="none") {
           
        }
        else
        {
            var hello='';
            for (const title of barvalues.title) {
                hello=title;
                collector +='<div style="width:150px;height:170px;text-align:center;margin:10px;display:inline-block;"  class="blocks hide-on-small-only">'+
                                    '<i class="material-icons black-text " style="font-size:8rem;">note</i>'+
                                    
                                    '<br>'+hello+
                                    '</div>'+
                                    '<div style="width:100px;height:120px;text-align:center;margin:10px;display:inline-block;"  class="blocks hide-on-med-and-up">'+
                                    '<i class="material-icons black-text " style="font-size:6rem;">note</i>'+
                                    
                                    '<br>'+hello+
                                    '</div>';
                                    
               
            }
            var notesarea=document.getElementById('notesarea');
            notesarea.innerHTML=collector;
            var blocks=document.getElementsByClassName('blocks');
            for (const block of blocks) {
                //block.addEventListener('mouseover',over);
                block.addEventListener('click',function (e) {
                    data={};
                    //alert('help');
                    data.type="contentcollector";
                    var titlecard=block.textContent.substring(4);
                    //console.log(titlecard);
                    data.title=titlecard;
                    datas=JSON.stringify(data);
                    sends(datas);
                });
                
               
                
            }
            
        }
        
    }
   
    if (barvalues.message=="dinfogets") {
        if (barvalues.desire=="none") {
           
        }
        else
        {
            var checks=document.getElementsByClassName('checks');
            var poppop=document.getElementById('poppop');
            var hello='';
            
            for (const desires of barvalues.desire) {
                hello=desires.points;
                //console.log(desires.checkornot);
                var help=(desires.checkornot==1)?"checked":'';
                var help2=(desires.checkornot==1)?"line-through":'none';
                //console.log(help);
               
                collector +='<div style="max-width:100%;height:50px;background-color:grey;margin:10px;">'+
                                '<input type="checkbox" class="reset-checkbox checks"'+help+' style="width:20px;margin-left:10px;height:60%;position:relative;top:-10px;">'+
                                '<a href="#contentpop" class="modal-trigger"><span  style="font-size:1.5rem;display:inline-block;width:65%;margin-left:10px;margin-top:20px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;color:black;position:relative;top:-10px;text-decoration:'+help2+'" class="spam">'+hello+'</span></a>'+
                                '<i class="material-icons right black-text pdels" style="font-size:2rem;margin-top:10px;"  >delete</i>'+
                            '</div>'; 
                           
                
                           
                           
               
            }
            var pdels=document.getElementsByClassName('pdels');
            //console.log(pdels);
            var notesarea2=document.getElementById('notesarea2');
           var spam=document.getElementsByClassName('spam');
            notesarea2.innerHTML=collector;
            var checks=document.getElementsByClassName('checks');
            for (const check of checks) {
            
            
                check.addEventListener('click',function (e) {
                    var datas={};
                    datas.type="checkbox";

                    if(check.checked == true)
                    {
                        datas.check=1;
                    }
                    else
                    {
                        datas.check=0;
                    }
                    
                    var node=check.nextElementSibling;
                    console.log(node.textContent);
                    datas.points=node.textContent;
                    var datass=JSON.stringify(datas);
                    sends(datass);
                    
                    
                });
                
                
                
                
            }
            for (const spams of spam) {
                spams.addEventListener('click',function (e) {
                    poppop.innerText=spams.textContent;
                });
            }
            for (const pdel of pdels) {
                var logs={};
                logs.type="pdelete"
                pdel.addEventListener('click',function (e) {
                    console.log('sddf');
                    logs.content=pdel.previousElementSibling.textContent;
                    var logss=JSON.stringify(logs);
                    sends(logss);
                });
            }
                    
                                
          
        }
        
    }
    
    if (barvalues.message=="nologin") {
        window.location="login.php";
    }
    if (barvalues.type=="error") {
        console.log(barvalues.message);
        mcomment.style.visibility="visible";
        lcomment.style.visibility="visible";
        mcomment.innerText=barvalues.message;
        lcomment.innerText=barvalues.message;
        setTimeout(() => {
            mcomment.style.visibility="hidden";
            lcomment.style.visibility="hidden";
        }, 2000);
    }
    if (barvalues.type=="saved") {
        console.log(barvalues.message);
        mcomment.style.visibility="visible";
        lcomment.style.visibility="visible";
        mcomment.innerText=barvalues.message;
        lcomment.innerText=barvalues.message;
        setTimeout(() => {
            mcomment.style.visibility="hidden";
            lcomment.style.visibility="hidden";
        }, 2000);
        display.style.flex="1";
        write.style.flex="0";

    }
    if (barvalues.type=="received") {
        display.style.flex="0";
        write.style.flex="1";
        console.log(barvalues.title);
        var bar=barvalues.title.replace(/\s/g,'_');
        write.innerHTML=
        
    
        ' <div style="height:10vh;background-color: #424242; display: flex;justify-content: space-between" >'+
        '<a href="" class=" " id="uppopp">'+
        '<i class="material-icons black-text"style="font-size:3.5rem;position:relative;top:10%;" id="uarrow">arrow_back</i>'+
        '</a>'+
            '<input  type="text" value='+bar+' placeholder="Title" style="position:relative;top:15%; min-width: 100px;max-width:250px;color: black;text-align:center;font-size: 2.5rem;" id="upheader"/>'+    
            '<div style="display:flex;justify-content:space-between">'+
            '<i class="material-icons black-text" style="font-size:3rem;position:relative;top:16%; "id="deletebtn">delete</i>'+
            '<i class="material-icons black-text" style="font-size:3rem;position:relative;top:16%; "id="updatebtn">save</i>'+
            '</div>'+
            '</div>'+
            
    
        '<textarea rows="10" cols="100" style="resize:none;border:none; width: 100%; height: 70vh;font-size: 1.5rem;color:white;outline: none;position:relative;"id="main2">'+barvalues.content+'</textarea>'+
        '<i class="material-icons" style="position:relative;left:50%;font-size:3rem;cursor:pointer;" id="mic2" >mic</i>';     
        var mic2=document.getElementById('mic2');
        var main2=document.getElementById('main2');    
        var SpeechRecognition=window.SpeechRecognition||window.webkitSpeechRecognition;

        var recognition2 =new SpeechRecognition();  

        recognition2.onstart=function(){
        
            console.log('recognition started');
        };
        recognition2.onend=function(event) {
            console.log('end');
        }
        recognition2.onerror=function () {
            console.log("error");
        }
        recognition2.onresult=function(event)
        {
            
            console.log("i am result bro");
            var transcript1 = event.results[0][0].transcript;
            console.log(transcript1);
            main2.value +=' ' +transcript1;
            

            
        }
        mic2.addEventListener('click',function (e) {
            recognition2.start();
        });
 
        var updatebtn=document.getElementById('updatebtn');
        var deletebtn=document.getElementById('deletebtn');
        var upheader=document.getElementById('upheader');
        
     
        updatebtn.addEventListener('click',update);
        function update(e) {
           // console.log('ip');
            var tvalue=upheader.value;
            var mvalue=main2.value;
            //console.log(mvalue);
           var datas={};
           datas.type="update";
           datas.title=tvalue;
           datas.oldtitle=bar;
           //console.log(bar);
           datas.notes=mvalue;
           var datass=JSON.stringify(datas);
           sends(datass);
           up2.classList.add('modal-close');
     
        }
       deletebtn.addEventListener('click',function (e) {
            
            console.log('delete');
            
                var datas={};
               datas.type="delete";
               datas.oldtitle=bar;
               var datass=JSON.stringify(datas);
               sends(datass);
               
        });
    }
    
}