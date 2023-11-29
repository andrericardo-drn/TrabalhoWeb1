const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});

$(function(){
    $("#form-test").on("submit",function(){
      let nome_input = $("input[name='nome']");
  
      if(nome_input.val() == "" || nome_input.val() == null)
      {
        $("#erro-nome").html("O nome eh obrigatorio");
        return(false);
      }
  
      return(true);
    });
  });
  
  $(function(){
    $("#form-test").on("submit",function(){
      let mail_input = $("input[name='mail']");
  
      if(mail_input.val() == "" || mail_input.val() == null)
      {
        $("#erro-mail").html("O E-mail eh obrigatorio");
        return(false);
      }
  
      return(true);
    });
  });
  
  $(function(){
    $("#form-data").on("submit",function(){
      let data_input = $("input[name='data']");
  
      if(data_input.val() == "" || data_input.val() == null)
      {
        $("#erro-data").html("A data de Nascimento eh obrigatorio");
        return(false);
      }
  
      return(true);
    });
  });
  
  $(function(){
    $("#form-test").on("submit",function(){
      let senha_input = $("input[name='senha']");
  
      if(senha_input.val() == "" || senha_input.val() == null)
      {
        $("#erro-senha").html("A senha eh obrigatoria");
        return(false);
      }
  
      return(true);
    });
  });
  