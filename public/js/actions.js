$(function(){
    
    
});


function NextQuestion($type, $index, $num){
    debugger;
    $(".question").css("display", "none");
    if($type == "back"){
        if($index == 0){
            $(".question").eq(0).toggle();
        }
        else{
            $(".question").eq($index - 1).toggle();
        }
    }
    else if($index == $num){
        $(".question").eq($index-1).toggle();
    }
    else{
        // $index++;
        $(".question").eq($index+1).toggle();
    }


    if($index+2 == $num && $type != "back"){
        $(".hideable").css('display', 'none');
        $(".submitReponseBtn").css('display', 'inline-block');
        
    }
    else{
        $(".hideable").css('display', 'inline-block');
        $(".submitReponseBtn").css('display', 'none');
    }
}

function DeleteQuestion($id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url:'/DeleteQuestion',
        type:"post",
        data:({id:$id}),
        success:function(response){
            window.location.href="/Admin";
        }
    });
}

function GoBack(){
    window.history.back();
}