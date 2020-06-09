$(function(){
    $.ajax({
        url: 'http://127.0.0.1:8090/api/v1/album',
        type: 'GET',
        beforeSend: ()=>{

        }
    })
    .done((data)=>{

    })
    .fail((err)=>{
        
    })
})