// 모든자료가 로드가되면 자동으로 이함수를 작동시켜주세요
$(document).ready(function(){
  var inputId = $("#inputId"),
      idSubMsg = $("#idSubMsg");

  inputId.blur(function(){
    var idValue = inputId.val();
    var exp = /^[a-zA-Z0-9]{6,12}$/;

    if(idValue === ""){
      idSubMsg.html("<span style='color:red'>아이디를 입력해주세요.</span>");
    }else if(!exp.test(idValue)){
      idSubMsg.html("<span style='color:red'>아이디는 6~12자의 영문자와 숫자만 사용할 수 있습니다.</span>");
    }else{
      $.ajax({
        url: 'member_checkId.php',
        type: 'POST',
        data: {"inputId":idValue},
        success: function(data){
          console.log(data);
          if(data === "1"){
            idSubMsg.html("<span style='color:red'>중복된 아이디입니다. 다른 아이디를 입력해주세요.</span>");
          }else if(data === "0"){
            idSubMsg.html("<span style='color:red'>사용 가능한 아이디입니다.</span>");
          }else{
            idSubMsg.html("<span style='color:red'>오류입니다. 다시 확인해주세요.</span>");
          }
        }
      })
      .done(function() {
        console.log("done");
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });
    }
  }); //inputId.blur end

});//document ready end
