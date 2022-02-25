
var error = document.getElementById('error');
var process = document.getElementById('process');
var inputs = document.getElementsByTagName('input');
var groupwarning = document.getElementById('groupwarning');
var inputgrouptxt = document.getElementById('inputgrouptxt');

function checkgroup(button){

  if(inputs[1].value.length > 1){

  $.post('/',
  {
    _token: inputs[0].value,
    name: inputs[1].value
  },
  function(data,status){
    console.log(data);
    let jsondata = JSON.parse(data);

    if(jsondata.response == 1){

        window.location.href = 'http://localhost/group/'+inputs[1].value;

    }else{
      groupwarning.style.visibility = 'visible';
      inputs[1].value = '';
    }
  }
  );
}else{
  alert("group name can not be empty");
}

}