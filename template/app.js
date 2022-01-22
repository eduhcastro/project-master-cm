class App {

  Responsive = {

    clicks: () => {

      $(document).on("click","#logout", function () {
        $.ajax({
          url:   "/user/logout",
          type: 'GET',
          success: function (data) {
            if(typeof data.status === 'undefined') return alert('Erro interno.');
            if (data.status){ 
              return location.reload();
            }
            alert("Erro interno.")
          }
        });
      })


      $(document).on("click","#dailycash", function () {
        $.ajax({
          url:   "/pop-up/dailycash",
          type: 'GET',
          success: function (data) {
            if(typeof data.status === 'undefined') return alert('Erro interno.');
            if (data.status){ 
              alert("Cash retirado com sucesso")
              return location.reload();
            }
            alert("Erro interno.")
          }
        });
      })



    }
  }

  init = () => {
    this.Responsive.clicks();
  }
}

const app = new App().init();