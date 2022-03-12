var bt=document.getElementById("login");
bt.addEventListener('click',process);
function process(ev){
    console.log("helckjd");
    var form=document.getElementById("forms");
    var input=form.getElementsByTagName("input");
    var length=(input.length)-1;
    //alert(length);
    datas={};
    for (var i =0; i <=length; i++) {
        
        var key=input[i].name;
        var value=input[i].value;
        switch (key) {
            case "email":
                datas.email=value;
                break;
        
            case "password":
                datas.password=value;
                break;
        }
        
        
    }
    datas.type="login";
    var datass=JSON.stringify(datas);
    sends();
    //alert(datass);

    function sends() {
        var xhr= new XMLHttpRequest();
        console.log(xhr);
       
        xhr.onload=function () {
            if(xhr.readyState==4 || xhr.status==200){
                receive(xhr.responseText);
            }
        }
        xhr.open('POST','api.php',true);
        xhr.send(datass);
    }
   
    function receive(info){       
        //var text=document.getElementById('textfield');
        //alert(info);
        var infos=JSON.parse(info);
        //alert(infos);
        var type=infos.type; 

        if(infos.type=="true"){
            window.location='index.php'; 
        }
        else{
            var logcomment=document.getElementById('logcomment');
            logcomment.innerHTML=infos.message;

        }
    }

    
    //alert(datass)
    //}
}