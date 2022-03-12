<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="try.css">
    <!-- Compiled and minified JavaScript -->
   <style>
       ::-webkit-scrollbar
       {
           width:10px;
       }
       ::-webkit-scrollbar-track{
            box-shadow:inset 0 0 5px black;
            border-radius:10px;
       }
       ::-webkit-scrollbar-thumb
       {
           background-color:grey;

           border-radius:10px;
       }
       
      @media only screen and (max-width:600px) {
            #main,#header    
            {
                width:100vw;
            }
        }
        input[type="text"]
        {
            border-bottom: none!important;
            box-shadow: none!important;
        }
        [type="checkbox"].reset-checkbox,
        [type="checkbox"].reset-checkbox:checked,
        [type="checkbox"].reset-checkbox:not(checked) {
            opacity: 1;
            position: relative;
            pointer-events:auto;
        }
        [type="checkbox"].reset-checkbox:checked
        {
            accent-color:black;
        }

        [type="checkbox"].reset-checkbox+span::before,
        [type="checkbox"].reset-checkbox+span::after,
        [type="checkbox"].reset-checkbox:checked+span::before,
        [type="checkbox"].reset-checkbox:checked+span::after {
            display: none;
        }

        [type="checkbox"].reset-checkbox+span:not(.lever) {
            padding-left: 10px;
        }
       
       th,td
       {
           text-align:left;
           padding:8px;
       }


   </style>
            
    <title>Document</title>
</head>
<body style="background-color: #202020;">
    <nav class="nav-wrapper" style="background-color: #181818;min-height:10vh;">
        <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
       <div class="row center-align" style="font-size:3rem;width: 50%;color: white; ">overWrite</div>
      
    </nav>
    <div class="sidenav" id="slide-out" style="width: 50%;background-color: black">
        <div style="color:white ;width:99.5%;min-height: 12%; padding: 8%;" id="phome">
           <i class="material-icons" style="position: relative;top:5px;">inbox</i> &nbsp;&nbsp;Notes
        </div>
        <div style="color:white;width:99.5%;min-height: 12%; padding: 8%;opacity: 0.5;" id="pnotes">
            <i class="material-icons" style="position: relative;top:5px;">check_box</i>&nbsp;&nbsp;Desire list
        </div>
        <div style="color:white;width:99.5%;min-height: 12%; padding: 8%;opacity: 0.5;" id="pshop">
            <i class="material-icons" style="position: relative;top:5px;">shop</i>&nbsp;&nbsp;Shopping list
        </div>
        <div style="color:white;width:99.5%;min-height: 12%; padding: 8%;opacity: 0.5;" id="plogout">
            <a href="#log" class="modal-trigger white-text">
                <i class="material-icons" style="position: relative;top:5px;">input</i>&nbsp;&nbsp;Log out
            </a>
        </div>
    </div>
    <div id="container" style="width: 100vw;height: 90vh;background-color:black;display: flex;">
        <div class="hide-on-med-and-down" id="left_container" style="width: 20vw;background-color: black">
            <div style="color:white ;width:99.5%;min-height: 12%; padding: 8%;" id="home">
               <i class="material-icons" style="position: relative;top:5px;">inbox</i> &nbsp;&nbsp;Notes
            </div>
            <div style="color:white;width:99.5%;min-height: 12%; padding: 8%;opacity: 0.5;" id="notes">
                <i class="material-icons" style="position: relative;top:5px;">check_box</i>&nbsp;&nbsp;Desire list
            </div>
            <div style="color:white;width:99.5%;min-height: 12%; padding: 8%;opacity: 0.5;" id="shop">
                <i class="material-icons" style="position: relative;top:5px;">shop</i>&nbsp;&nbsp;Shopping list
            </div>
            <div style="color:white;width:99.5%;min-height: 12%; padding: 8%;opacity: 0.5;" id="logout">
                <a href="#log" class="modal-trigger white-text">
                    <i class="material-icons" style="position: relative;top:5px;">input</i>&nbsp;&nbsp;Log out
                </a>
            </div>
        </div>
        <div id="right_container" class="white-text" style="width:100vw;background-color:black;display: flex;">
           
            <div style="background-color:#424242;flex: 1;margin:0;display:flex;overflow:hidden;" id="homepage">
            
                <div style="flex:1;overflow:hidden" id="display">
                    
                    <div style="overflow-y:scroll;max-width:100%;height:80vh;" id="notesarea">
                   
                    <!-- <div style="width:150px;height:170px;text-align:center;display:inline-block;">
                            <i class="material-icons black-text " style="font-size:8rem;">note</i>
                            <span>Hellow world</span>
                        </div>-->
           

                    </div>
                    <div>
                        <i class="material-icons medium hide-on-large-only right" style="position:relative;top:80%;left:-8%;" id="mopen">add_circle</i>
                        <i class="material-icons hide-on-med-and-down right" style="font-size:5.5rem;position:relative;left:-5%;" id="open">add_circle</i>
                    </div>
                    
                </div>
                <div style="flex:0;background-color:#424242;overflow:hidden;" id="write">
                   


                </div>
                <div class="center-align hide-on-med-and-down" style="position:absolute;top:90vh;font-size:2rem;left: 18vw;background-color:white;color:black;width:80vw;height:40px;visibility:hidden;opacity:0.5;" id="mcomment">Hello world</div>
                <div class="center-align hide-on-large-only" style="position:absolute;top:90vh;font-size:2rem;left: 10vw;background-color:white;color:black;width:80vw;height:40px;visibility:hidden;opacity:0.5;" id="lcomment">Hello world</div>
            </div>
            <div style="background-color: #424242;flex: 0;overflow:hidden;display:flex;" id="notespage">
                <div style="flex:1;overflow:hidden" id="display2">
                    
                    <div style="overflow-y:scroll;max-width:100%;height:80vh;" id="notesarea2">
                              
                                
                    </div>
                    
                    <div>
                        <a href="#getter" class="modal-trigger white-text"><i class="material-icons medium hide-on-large-only right" style="position:relative;top:80%;left:-8%;" id="dopen1">add_circle</i></a>
                        <a href="#getter" class="modal-trigger white-text"><i class="material-icons hide-on-med-and-down right" style="font-size:5.5rem;position:relative;left:-5%;" id="dopen2">add_circle</i></a>
                    </div>
                    
                </div>
                
               
            </div>
            <div style="background-color: #424242;flex: 0;overflow:hidden;display:flex;" id="shoppage">
                
                <div style="flex:1;overflow:hidden" id="sdisplay">
                        
                        <div style="overflow-y:scroll;max-width:100%;height:80vh;" id="sarea">
                    
                        <!-- <div style="width:150px;height:170px;text-align:center;display:inline-block;">
                                <i class="material-icons black-text " style="font-size:8rem;">note</i>
                                <span>Hellow world</span>
                            </div>-->
            

                        </div>
                        <div>
                            <i class="material-icons medium hide-on-large-only right" style="position:relative;top:80%;left:-8%;" id="shoppen">add_circle</i>
                            <i class="material-icons hide-on-med-and-down right" style="font-size:5.5rem;position:relative;left:-5%;" id="mshoppen">add_circle</i>
                        </div>
                        
                </div>
                <div style="flex:0;background-color:#424242;overflow:hidden;" id="swrite">
                    
                </div>
                
               
            </div>
            <div class="modal" id="log" style="background-color: #424242;" tabindex="0">
                <div class="modal-content" style="background-color: #424242;">
                    <h3 class="flow-text center-align white-text">Do you really want to log out</h3>
                    
                </div>
                <div class="modal-footer" style="background-color: #424242;">
                    <div class="btn black  white-text left" onclick="logout2" id="logout2">Logout</div>
                    <div class="btn black  waves-effect waves-light white-text right modal-close">Cancel</div>            
                </div>
            </div>
            <div class="modal" id="savepop" style="background-color: #424242;" tabindex="0">
                <div class="modal-content" style="background-color: #424242;">
                    <h3 class="flow-text center-align white-text">Do you want to save it?</h3>
                    
                </div>
                <div class="modal-footer" style="background-color: #424242;">
                    <div class="btn black  white-text left" id="save2">Save</div>
                    <div class="btn black  waves-effect waves-light white-text right modal-close" id="scancel">Cancel</div>            
                </div>
            </div>
            
            <div class="modal" id="contentpop" style="background-color: #424242;" tabindex="0">
                <div class="modal-content" style="background-color: #424242;">
                    <div style="overflow:hidden;text-overflow:ellipsis;" id="poppop"></div>
                    
                </div>
               
            </div>
            <div class="modal" id="getter" style="background-color: #424242;" tabindex="0">
                <div class="modal-content" style="background-color: #424242;">
                    <input type="text" class="white-text" style="font-size:1.5rem;" placeholder="enter your desire" id="dinput">
                    
                    
                </div>
                <div class="modal-footer" style="background-color: #424242;">
                <div class="btn black white-text left" style="position:relative;left:38%;" id="ok">Submit</div>
                   
                </div>
               
            </div>
            <div class="modal" id="listpop" style="background-color: #424242;" tabindex="0">
                <a href="#infos" class="modal-trigger"><i class="material-icons right black-text ">info</i></a>
                <div class="modal" id="infos" style="background-color:#424242;" tabindex="0">
                    <p style="margin:10px;color:white;">All fields are required <br><br>Commodity length should be less than 15<br><br>Quantity length should be less than 5<br><br>Price length should be less than 5</p>
                </div>
                <div class="modal-content" style="background-color: #424242;">
                <input type="text" title="length should be less than 15" placeholder="Commodity" id="Commodity" style="text-align:center;font-size:1.5rem">
                <input type="text" placeholder="Quantity" id="Quantity" style="text-align:center;font-size:1.5rem">
                <input type="text" placeholder="Price" id="Price" style="text-align:center;font-size:1.5rem">
                    
                </div>
                <div class="modal-footer" style="background-color: #424242;display:flex;justify-content:space-between">
                    <div class="btn black  white-text left" id="save3">Save</div>
                    <p id="differ" style="color:black;position:relative;top:-30%;color:white;font-size:1rem;" class="hide-on-med-and-up"></p>
                    <p id="differ2" style="color:black;position:relative;top:-30%;color:white;font-size:1.5rem;" class="hide-on-small-only"></p>
                    <div class="btn black  waves-effect waves-light white-text right modal-close">Cancel</div>            
                </div>
            </div>
        </div>

    </div>
    
   
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
          $(document).ready(function(){
                $('.sidenav').sidenav();
            });
            $(document).ready(function(){
                $('.modal').modal();
            });
      

    </script> 
     <script src="index.js"></script>

    



<div class="sidenav-overlay"></div><div class="drag-target"></div></body></html>