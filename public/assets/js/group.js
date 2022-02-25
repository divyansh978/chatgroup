
var inputs = document.getElementsByTagName('input');
var askname = $("askmyname");
var parent = document.getElementById("parent");
var doingwork = false;

function copylink(button){
    let link = inputs[0].value;
    inputs[0].select();
    navigator.clipboard.writeText(link);

    button.innerText = "copied";
}
function removename(){
    
    document.getElementById('askmyname').style.visibility = "hidden";
}

setInterval(function(){

    if(!doingwork){

        $.post("/getmessages",
        {
            group: window.location.href.split('/')[4],
            _token: inputs[3].value,
            offset: parent.childElementCount
        },
        function(data,status){

            if(status != 'success'){
                alert("something went wrong");
            }else{
                data = JSON.parse(data);
                usedata(data);
            }
        })
    }

},1500);

function usedata(data){

    doingwork = true;

    for(let i=0;i<data.length;i++){

        let element = document.createElement('div');
        element.innerHTML = '<div class="px-2 d-inline-block bg-light text-dark fw-bold py-1" style="border-top-left-radius: 10px;text-transform:capitalize;">'+data[i].uname+'</div><div class="p-2 d-inline-block text-small text-muted bg-light">ip '+data[i].userip+'</div><p class="bg-light text-dark p-2 mb-3">'+data[i].message+'</p>';
        
        parent.appendChild(element);
        parent.scrollBy(0,parent.scrollHeight);
    }

    doingwork = false;
}

function sendmessage(){
    if(inputs[2].value.length > 0){
        
        $.post('/sendmessage',{
            group: window.location.href.split('/')[4],
            _token: inputs[1].value,
            message: inputs[2].value
        },
        function(data){
            data = JSON.parse(data);

            if(data.response == 0){
                alert("something went wrong couldn't send your message");
            }else{
                inputs[2].value = '';
            }
        });
    }
}
