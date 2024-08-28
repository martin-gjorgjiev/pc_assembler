var jsonData;
const api_url=base_url+'index.php/api/';
var the_token = document.head.querySelector("[name~=X-CSRF-TOKEN][content]").content;
var columnoptions;
var chatdata;
const bottalk=["Hello, I'm your PC assistant.","Please pick the category you want to choose from."];
/*var questions=['CPU','Motherboard','RAM','GPU','Power Supply','Storage','Case'];
var cpuquestions=['Select CPU socket','Select CPU series','Do you want integrated graphics?'];
var moboquestions=['Select CPU socket','Select motherboard chipset','Select RAM type','Do you want M.2 slot?'];
var ramquestions=['Select RAM type','Select RAM speed (MHz)', 'Select RAM size (GB)'];
var gpuquestions=['Select GPU series'];
var psuquestions=['Select PSU wattage'];
var storagequestions=['Select storage type','Select storage size (GB)'];*/
const questionsObj={
    "CPU":['Select maker','Select CPU socket','Select CPU series','Do you want integrated graphics?','Your options are:'],
    "Motherboard":['Select CPU socket','Select motherboard chipset','Select RAM type','Do you want M.2 slot?','Your options are:'],
    "RAM":['Select RAM type','Select RAM speed (MHz)', 'Select RAM size (GB)','Your options are:'],
    "GPU":['Select GPU series','Your options are:'],
    "Power Supply":['Select PSU wattage','Your options are:'],
    "Storage":['Select storage type','Select storage size (GB)','Your options are:']
};
const endpointObj={ //could have accomodated them in questionsObj but requires restructuring
    "CPU":"cpuquery",
    "Motherboard":"motherboardquery",
    "RAM":"ramquery",
    "GPU":"gpuquery",
    "Power Supply":"psuquery",
    "Storage":"storagequery"
};
const buildMessage={
    critical:{chipset:"CPU isn't compatible with the chipset or vice-versa.",
            socket:"Motherboard socket isn't compatible with CPU socket.",
            ramtype:"This type of RAM memory isn't compatible with the motherboard slots.",
            wattage:"Power supply's wattage is below GPU's recommended wattage.",
            storagetype:"It appears that you have picked a M.2 storage for a motherboard that doesn't feature a M.2 slot.",
            lackinggpu:"Your build lacks a GPU and your CPU lacks integrated graphics.",
            ramsize:"The selected RAM memory surpasses the amount that your motherboard can support."},
    alert:{ramspeed:"RAM memory and motherboard supported RAM speed don't match. Actual speed would be determined by the lowest of both.",
            removedpart:"It appears that you have removed a component from your list, refresh your page in order to recalculate.",
            incompletebuild:"It appears that your build is incomplete.",
            ramslots:"The selected RAM memory has more sticks than slots on motherboard."}
};
var i=0,totalSum=0;
var questionsselected=[];
var temppart='';
var mytable,response_status;
var issettable=false;

//title and table data
switch(document.title){
    case 'CPU':
        apiCall(api_url+'cpu');
        columnoptions=[
            { 'data': 'imgloc', 
                render: function (data,type,row){
                    return '<img src="' + base_url + 'img/'+ data + '" heignt="100" width="100">';
                } 
            },
            { title:'Maker', 'data': 'maker name' },
            { title:'Name', 'data': 'name' },
            { title:'Series', 'data': 'series name' },
            { title:'Socket', 'data': 'socket name' },
            { title:'Price', 'data': 'price' },
            { 'data': 'id',
                render: function (data,type,row){
                    return `<button type="button" onclick="addToBuild(&#39;${Object.keys(questionsObj)[0]}&#39;,${data})">Add to build</button>`;
                }
            }
        ];
        break;
    case 'Motherboard':
        apiCall(api_url+'motherboard');
        columnoptions=[
            { 'data': 'imgloc', 
                render: function (data,type,row){
                    return '<img src="' + base_url + 'img/'+ data + '" heignt="100" width="100">';
                } 
            },
            { title:'Maker', 'data': 'maker name' },
            { title:'Name', 'data': 'name' },
            { title:'Chipset', 'data': 'chipset name' },
            { title:'Socket', 'data': 'socket name' },
            { title:'Price', 'data': 'price' },
            { 'data': 'id',
                render: function (data,type,row){
                    return `<button type="button" onclick="addToBuild(&#39;${Object.keys(questionsObj)[1]}&#39;,${data})">Add to build</button>`;
                }
            }
        ];
        break;
    case 'RAM':
        apiCall(api_url+'ram');
        columnoptions=[
            { 'data': 'imgloc', 
                render: function (data,type,row){
                    return '<img src="' + base_url + 'img/'+ data + '" heignt="100" width="100">';
                } 
            },
            { title:'Maker', 'data': 'maker name' },
            { title:'Name', 'data': 'name' },
            { title:'Type', 'data': 'ram type' },
            { title:'Speed (MHz)', 'data': 'speed' },
            { title:'Size (GB)', 'data': 'size' },
            { title:'Price', 'data': 'price' },
            { 'data': 'id',
                render: function (data,type,row){
                    return `<button type="button" onclick="addToBuild(&#39;${Object.keys(questionsObj)[2]}&#39;,${data})">Add to build</button>`;
                }
            }
        ];
        break;
    case 'GPU':
        apiCall(api_url+'gpu');
        columnoptions=[
            { 'data': 'imgloc', 
                render: function (data,type,row){
                    return '<img src="' + base_url + 'img/'+ data + '" heignt="100" width="100">';
                } 
            },
            { title:'Maker', 'data': 'maker name' },
            { title:'Name', 'data': 'name' },
            { title:'Series', 'data': 'series name' },
            { title:'Price', 'data': 'price' },
            { 'data': 'id',
                render: function (data,type,row){
                    return `<button type="button" onclick="addToBuild(&#39;${Object.keys(questionsObj)[3]}&#39;,${data})">Add to build</button>`;
                }
            }
        ];
        break;
    case 'Power Supply':
        apiCall(api_url+'psu');
        columnoptions=[
            { 'data': 'imgloc', 
                render: function (data,type,row){
                    return '<img src="' + base_url + 'img/'+ data + '" heignt="100" width="100">';
                } 
            },
            { title:'Maker', 'data': 'maker name' },
            { title:'Name', 'data': 'name' },
            { title:'Wattage (W)', 'data': 'wattage' },
            { title:'Price', 'data': 'price' },
            { 'data': 'id',
                render: function (data,type,row){
                    return `<button type="button" onclick="addToBuild(&#39;${Object.keys(questionsObj)[4]}&#39;,${data})">Add to build</button>`;
                }
            }
        ];
        break;
    case 'Storage':
        apiCall(api_url+'storage');
        columnoptions=[
            { 'data': 'imgloc', 
                render: function (data,type,row){
                    return '<img src="' + base_url + 'img/'+ data + '" heignt="100" width="100">';
                } 
            },
            { title:'Maker', 'data': 'maker name' },
            { title:'Name', 'data': 'name' },
            { title:'Type', 'data': 'storage type' },
            { title:'Size (GB)', 'data': 'storagesize' },
            { title:'Price', 'data': 'price' },
            { 'data': 'id',
                render: function (data,type,row){
                    return `<button type="button" onclick="addToBuild(&#39;${Object.keys(questionsObj)[5]}&#39;,${data})">Add to build</button>`;
                }
            }
        ];
        break;
    case 'PC Case':
        apiCall(api_url+'pccase');
        columnoptions=[
            { 'data': 'imgloc', 
                render: function (data,type,row){
                    return '<img src="' + base_url + 'img/'+ data + '" heignt="100" width="100">';
                } 
            },
            { title:'Maker', 'data': 'maker name' },
            { title:'Name', 'data': 'name' },
            { title:'Price', 'data': 'price' },
            { 'data': 'id',
                render: function (data,type,row){
                    return `<button type="button" onclick="addToBuild(&#39;pccase&#39;,${data})">Add to build</button>`;
                }
            }
        ];
        break;
    default:
        break;
}

function createDatatable(){
    if(issettable){
        mytable.clear().rows.add(jsonData).draw();
    }else{
        mytable = new DataTable('#example', {
            data: jsonData,
            columns: columnoptions,
            columnDefs: [{ orderable: false, targets: [0,-1] }],
            order: [[1, 'asc']]
        });
        issettable = true;
    }
}

//handle for button to add items to build
function addToBuild(pcpart,idnum){
    var cookieObj;
    jsonData.forEach(element => {
        if(element.id==idnum){
            cookieObj=JSON.stringify(element);
        }
    });
    Cookies.set(pcpart,cookieObj,{path:'/',sameSite:'lax',secure: true});
    readItems();
}

function readItems(){
    document.getElementById("cartbody").innerHTML='';
    Object.keys(questionsObj).forEach(element => {
        readItem(element);
    });
    //old
    /*readItem('cpu');
    readItem('mobo');
    readItem('ram');
    readItem('gpu');
    readItem('psu');
    readItem('storage');*/
    readItem('pccase');
}

function readItem(pcpart){
    if(pcpart!=null&&Cookies.get(pcpart)!=null){
        pcpart=JSON.parse(Cookies.get(pcpart));
        var cartbody= document.getElementById("cartbody");
        var partitem= document.createElement("div");
        partitem.innerHTML=pcpart['maker name']+" "+pcpart['name'];
        partitem.setAttribute("class","");      
        cartbody.appendChild(partitem);
    }
}

document.addEventListener('DOMContentLoaded', function() {
    if(window.location.href.includes('components')){
        var chatbody=document.getElementById("chatbody");
        readItems();
        document.getElementById('chatbody').style.display = "none";
        appendBot(bottalk[0]);
        //console.log('components open');
    }

    if(window.location.href.includes('yourbuild')){
        yourBuild();
        calculateMessages();
    }

}, false);

//chattroom handles
function onStart(){
    //it will execute when chat is started clicked to open
    appendBot(bottalk[1]);
    //appendQuestion(questions);
    appendQuestion(Object.keys(questionsObj));
}

function showChat(){
    var elem=document.getElementById('chatbody'); 
    if(elem.style.display === "none"){
        //show
        elem.style.display = "block";
        removeBubbles();
        onStart();
        document.getElementById('chattail').innerHTML="Hide chat";
        scrollDown();
    }else{
        //hide
        elem.style.display = "none";
        document.getElementById('chattail').innerHTML="Show chat";
        scrollDown();
    }
}

function bubbleSelect(){
    //save selection
    questionsselected[i]=this.innerHTML;
    appendUser(questionsselected[i]);

    //remove former options
    //console.log(questionsselected[i]);
    removeBubbles();

    if(i>=0 && i<questionsObj[questionsselected[0]].length){
        //print selection
        appendBot(questionsObj[questionsselected[0]][i]);

        //send selection to server
        sendQuery(endpointObj[questionsselected[0]],questionsselected);

        /*old while testing
        switch(questionsselected[i]){
            case 'CPU':
                appendBot(cpuquestions[1]);
                break;
            default:
                break;
        }*/
    }
    
    if(i>0 && i>=questionsObj[questionsselected[0]].length){
        //save option
        sendQuery(endpointObj[questionsselected[0]],questionsselected);
        temppart=questionsselected[0];
        //print saved message
        appendBot('The component has been saved.');
        //back from start
        startOver();

    }else{
        //proceed with next question
        i++;
    }
}

function appendText(tekst){
    var chatbody=document.getElementById("chatbody");
    var bubblediv=document.getElementById("bubblediv");
    if (bubblediv==null){
        bubblediv=document.createElement("div");
        bubblediv.setAttribute('id','bubblediv')
    }
    tekst.forEach(element => {
        var bubble=document.createElement("span");
        bubble.innerHTML=element.name;
        bubble.setAttribute("class","bubble");        
        bubble.addEventListener("click", bubbleSelect);
        bubblediv.appendChild(bubble);
    });
    chatbody.appendChild(bubblediv);    
}

function appendQuestion(tekst){
    var chatbody=document.getElementById("chatbody");
    var bubblediv=document.getElementById("bubblediv");
    if (bubblediv==null){
        bubblediv=document.createElement("div");
        bubblediv.setAttribute('id','bubblediv')
    }
    tekst.forEach(element => {
        var bubble=document.createElement("span");
        bubble.innerHTML=element;
        bubble.setAttribute("class","bubble");        
        bubble.addEventListener("click", bubbleSelect);
        bubblediv.appendChild(bubble);
    });
    chatbody.appendChild(bubblediv);      
}

function appendBot(botstring){
    var chatbody=document.getElementById("chatbody");
    var bottalk=document.createElement("span");
    bottalk.innerHTML=botstring;
    bottalk.setAttribute("class","bot msg");        
    chatbody.appendChild(bottalk);
}

function appendUser(userstring){
    var chatbody=document.getElementById("chatbody");
    var usertalk=document.createElement("span");
    usertalk.innerHTML=userstring;
    usertalk.setAttribute("class","user msg");     
    chatbody.appendChild(usertalk);
}

function appendStartOver(tekst){
    var chatbody=document.getElementById("chatbody");
    var bubblediv=document.getElementById("bubblediv");
    if (bubblediv==null){
        bubblediv=document.createElement("div");
        bubblediv.setAttribute('id','bubblediv')
    }
    var bubble=document.createElement("span");
    bubble.innerHTML=tekst;
    bubble.setAttribute("class","bubble");
    bubble.addEventListener("click", startOver);        
    bubblediv.appendChild(bubble);
    chatbody.appendChild(bubblediv);  
}

function startOver(){
    i=0;
    questionsselected=[];
    removeBubbles();
    onStart();
}

function scrollDown(){
    setTimeout(() => {var element = document.getElementById('chatbody');
    element.scrollTop=element.scrollHeight;},200);
}

function printNewLine(){
    document.getElementById("chatbody").innerHTML += "<br>";
}

function removeBubbles(){
    //document.querySelectorAll(".bubble").remove();
    var varbubble=document.getElementById('bubblediv');
    if(varbubble!=null){
        varbubble.remove();
    }
}

function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
      let c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
}

//fetch for table
function apiCall(urlendpoint){
    var requestOptions = {
        method: "POST",
        mode: "cors",
        cache: "no-cache",
        credentials: "same-origin",
        headers: {
            "Content-Type": "application/json",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-Token":the_token
        },
        redirect: "follow",
        referrerPolicy: "no-referrer"
    };

    fetch(urlendpoint, requestOptions)
    .then(response => {
            if(!response.ok){
                document.getElementsByClassName('itemdiv')[0].innerHTML=`Error has occured: ${response.status} ${response.statusText}`;
            }else{
                return response.json();
            }
    })
    .then(data=>{
        if (typeof data !== 'undefined') {
            jsonData = data;
            createDatatable();
        }
    })
    .catch(error => console.log('error', error));
}

//fetch for chatroom
function sendQuery(urlendpoint,selectiondata){
    var sendingdata={"questionsselected":selectiondata};
    var requestOptions = {
        method: "POST",
        mode: "cors",
        cache: "no-cache",
        credentials: "same-origin",
        headers: {
            "Content-Type": "application/json",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-Token":the_token
        },
        redirect: "follow",
        referrerPolicy: "no-referrer",
        body: JSON.stringify(sendingdata)
    };

    fetch(api_url+urlendpoint, requestOptions)
    .then(response => {
        if(!response.ok){
            appendBot(`Error has occured: ${response.status} ${response.statusText}`);
            appendStartOver("⟳Start over");
        }else{
            return response.json();
        }
    })
    .then(data => {
        if (typeof data !== 'undefined') {
            resultReslover(data);
        }
    })
    .catch(error => console.log('error', error));
}

//handle fetch result
function resultReslover(thisresult){
    //check response code, outdated
    /*if(response_status==200){
        //when response is success
        if(thisresult.length>0){
            if(Object.keys(thisresult[0])[0]=='id'){
                sessionStorage.setItem(temppart,JSON.stringify(thisresult[0]));
                readItems();
            }else{
                setTimeout(() => {appendQuestion(thisresult)},200);
                //appendQuestion(thisresult);
                appendStartOver("⟳Start over");
            }       
        }else{
            appendBot("It appears that there are no results.");
            appendStartOver("⟳Start over");
        }*/
    /*}else{
        appendBot("Error has occured");
        appendStartOver("⟳Start over");
    }*/
   

    if(thisresult.length>0){
        if(Object.keys(thisresult[0])[0]=='id'){
            Cookies.set(temppart,JSON.stringify(thisresult[0]),{path:'/',sameSite:'lax',secure: true});
            readItems();
        }else{
            setTimeout(() => {appendQuestion(thisresult)},200);
            appendStartOver("⟳Start over");
        }       
    }else{
        appendBot("It appears that there are no results.");
        appendStartOver("⟳Start over");
    }
    //return to start button
    scrollDown();
}

function yourBuild(){
    var j=0;
    Object.keys(questionsObj).forEach(element => {
        appendToBuild(element,j);
        calculateSum(element);
        j++;
    });
    appendToBuild('pccase',j);
    calculateSum('pccase');
    //append errors
    //print total sum
    document.getElementById('totalSum').textContent=totalSum;
}

//build page onwards
function appendToBuild(pcpart,iterator){
    if(pcpart!=null&&Cookies.get(pcpart)!=null){
        iterator=3*iterator;
        var pcpartname=pcpart;
        pcpart=JSON.parse(Cookies.get(pcpart));
        var divcontainer=document.getElementsByClassName('grid-container2');

        var divbody=document.createElement("div");
        divbody.setAttribute("class","card2");
        divbody.setAttribute("id",iterator);
        var imagepart=document.createElement("img");
        imagepart.setAttribute('src',base_url+'img/'+pcpart['imgloc']);
        imagepart.setAttribute('height','100px');
        imagepart.setAttribute('width','100px');
        divbody.appendChild(imagepart);
        divcontainer[0].appendChild(divbody);

        divbody=document.createElement("div");
        divbody.setAttribute("class","card2");
        divbody.setAttribute("id",iterator+1);
        divbody.innerHTML=customPartParagraph(pcpartname,pcpart);
        divcontainer[0].appendChild(divbody);

        divbody=document.createElement("div");
        divbody.setAttribute("class","card2");
        divbody.setAttribute("id",iterator+2);
        var buttonpart=document.createElement('button');
        buttonpart.addEventListener('click',() => {removeFromBuild(iterator,pcpartname);});
        buttonpart.innerText='Remove'; 
        divbody.appendChild(buttonpart);
        divcontainer[0].appendChild(divbody);
    }
}

function customPartParagraph(pcpartname, pcpart){
    if(pcpartname==Object.keys(questionsObj)[0]){
        return `<h3>CPU</h3>
            <p>${pcpart['maker name']} ${pcpart['name']}</p>
            <p>Socket: ${pcpart['socket name']}</p>
            <p>Series: ${pcpart['series name']}</p>
            <p>Integrated graphics: ${boolToWord(pcpart['integrated_gpu'])}</p>
            <p>Price: ${pcpart['price']}</p>`;
    }else

    if(pcpartname==Object.keys(questionsObj)[1]){
        return `<h3>Motherboard</h3>
            <p>${pcpart['maker name']} ${pcpart['name']}</p>
            <p>Chipset: ${pcpart['chipset name']}</p>
            <p>Socket: ${pcpart['socket name']}</p>
            <p>Ram type: ${pcpart['ram type']}</p>
            <p>Ram memory slots: ${pcpart['maxmemslots']}</p>
            <p>M.2 slots: ${pcpart['maxm2slots']}</p>
            <p>Price: ${pcpart['price']}</p>`;
    }

    if(pcpartname==Object.keys(questionsObj)[2]){
        return `<h3>RAM memory</h3>
            <p>${pcpart['maker name']} ${pcpart['name']}</p>
            <p>Ram type: ${pcpart['ram type']}</p>
            <p>Ram capacity (GB): ${pcpart['size']}</p>
            <p>Clock speed(MHz): ${pcpart['speed']}</p>
            <p>Slots: ${pcpart['slots']}</p>
            <p>Price: ${pcpart['price']}</p>`;
    }else

    if(pcpartname==Object.keys(questionsObj)[3]){
        return `<h3>Graphics card</h3>
            <p>${pcpart['maker name']} ${pcpart['name']}</p>
            <p>Series: ${pcpart['series name']}</p>
            <p>Recommended PSU: ${pcpart['rec_wattage']}</p>
            <p>Price: ${pcpart['price']}</p>`;
    }else

    if(pcpartname==Object.keys(questionsObj)[4]){
        return `<h3>Power supply unit</h3>
            <p>${pcpart['maker name']} ${pcpart['name']}</p>
            <p>Wattage: ${pcpart['wattage']}</p>
            <p>Price: ${pcpart['price']}</p>`;
    }else

    if(pcpartname==Object.keys(questionsObj)[5]){
        return `<h3>Storage</h3>
            <p>${pcpart['maker name']} ${pcpart['name']}</p>
            <p>Storage capacity (GB): ${pcpart['storagesize']}</p>
            <p>Storage type: ${pcpart['storage type']}</p>
            <p>Price: ${pcpart['price']}</p>`;
    }else

    if(pcpartname=='pccase'){
        return `<h3>PC case</h3>
            <p>${pcpart['maker name']} ${pcpart['name']}</p>
            <p>Price: ${pcpart['price']}</p>`;
    }
}

function removeFromBuild(iterator,pcpart){
    for(j=0;j<3;j++){
        document.getElementById(iterator+j).remove();
    }
    Cookies.remove(pcpart);
    recalculateSum();
    document.getElementById('totalSum').textContent=totalSum;
    appendBuildMessage('alert','removedpart');
}

function boolToWord(boolvar){
    if(boolvar==1){
        return 'Yes';
    }
    return 'No';
}

function calculateSum(pcpart){
    if(pcpart!=null&&Cookies.get(pcpart)!=null){
        pcpart=JSON.parse(Cookies.get(pcpart));
        totalSum+=parseFloat(pcpart['price']);
    }
}

function recalculateSum(){
    totalSum=0;
    Object.keys(questionsObj).forEach(element => {
        calculateSum(element);
    });
    calculateSum('pccase');
}

function appendBuildMessage(type,message){
    var element=document.createElement('div');
    element.textContent=buildMessage[type][message];
    document.getElementById(type).appendChild(element);
}

function calculateMessages(){
    var checkparts=endpointObj;
    Object.keys(checkparts).forEach(element => {
        checkparts[element]=null;
        if(Cookies.get(element)!=null){
            checkparts[element]=JSON.parse(Cookies.get(element));
        }
    });

    //critical
    //chipset
    if(Object.values(checkparts)[0]!=null&&Object.values(checkparts)[1]!=null){
        checkchipset('chipsetcompare',Object.values(checkparts)[0]['id'],Object.values(checkparts)[1]['chipset name']);
    }

    //socket, if CPU.socket name is not equal to Motherboard.socket name
    if(Object.values(checkparts)[0]!=null&&Object.values(checkparts)[1]!=null&&Object.values(checkparts)[0]['socket name']!=Object.values(checkparts)[1]['socket name']){
        appendBuildMessage('critical','socket');
    }

    //ram type, Motherboard.ram type is not equal to RAM.ram type
    if(Object.values(checkparts)[1]!=null&&Object.values(checkparts)[2]!=null&&Object.values(checkparts)[1]['ram type']!=Object.values(checkparts)[2]['ram type']){
        appendBuildMessage('critical','ramtype');
    }
    
    //wattage, if PSU.wattage is less than GPU.rec_wattage
    if(Object.values(checkparts)[3]!=null&&Object.values(checkparts)[4]!=null&&parseFloat(Object.values(checkparts)[3]['rec_wattage'])>=parseFloat(Object.values(checkparts)[4]['wattage'])){
        appendBuildMessage('critical','wattage');
    }
    
    //storage type
    if(Object.values(checkparts)[1]!=null&&Object.values(checkparts)[5]!=null&&(Object.values(checkparts)[5]['storage type'].includes('M.2')
        ||Object.values(checkparts)[5]['storage type'].includes('M 2'))&&Object.values(checkparts)[1]['maxm2slots']<1){
        appendBuildMessage('critical','storagetype');
    }

    //lacking gpu
    if(Object.values(checkparts)[0]!=null&&Object.values(checkparts)[3]==null&&Object.values(checkparts)[0]['integrated_gpu']=='0'){
        appendBuildMessage('critical','lackinggpu');
    }

    //ramsize
    if(Object.values(checkparts)[1]!=null&&Object.values(checkparts)[2]!=null&&parseFloat(Object.values(checkparts)[1]['maxmemsize'])<parseFloat(Object.values(checkparts)[2]['size'])){
        appendBuildMessage('critical','ramsize');
    }

    //alert
    //ramslots
    if(Object.values(checkparts)[1]!=null&&Object.values(checkparts)[2]!=null&&parseFloat(Object.values(checkparts)[1]['maxmemslots'])<parseFloat(Object.values(checkparts)[2]['slots'])){
        appendBuildMessage('alert','ramslots');
    }

    //ram speed
    if(Object.values(checkparts)[1]!=null&&Object.values(checkparts)[2]!=null&&parseFloat(Object.values(checkparts)[1]['maxmemspeed'])<parseFloat(Object.values(checkparts)[2]['speed'])){
        appendBuildMessage('alert','ramspeed');
    }

    //incomplete build
    if(Object.values(checkparts)[0]==null||Object.values(checkparts)[1]==null||Object.values(checkparts)[2]==null||Object.values(checkparts)[4]==null){
        appendBuildMessage('alert','incompletebuild');
    }
    
}

function checkchipset(urlendpoint,cpuid,chipset){
    var requestOptions = {
        method: "GET",
        mode: "cors",
        cache: "no-cache",
        credentials: "same-origin",
        headers: {
            "Content-Type": "application/json",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-Token":the_token
        },
        redirect: "follow",
        referrerPolicy: "no-referrer"
    };

    fetch(api_url+urlendpoint+"/"+cpuid+"/"+chipset, requestOptions)
    .then(response => {
        if(!response.ok){
            console.log('error', response.status, response.statusText);
        }else{
            return response.json();
        }
    })
    .then(data => {
        if(typeof data=='boolean'&&data==false){
            //console.log('chipset')
            appendBuildMessage('critical','chipset');
        }
    })
    .catch(error => console.log('error', error));
}
//Cookies.set('name','value',{path:'/',sameSite:'lax',secure: true});