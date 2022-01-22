<?php include('src/includes/Header.include.php'); ?>
<script src="https://www.google.com/recaptcha/api.js?render=<?php echo RECAPTCHA_PUBLICV3 ?>"></script>


<link rel="stylesheet" href="/template/css/recharge/purchase.css?id=26" />
<script type="text/javascript" src="/template/js/recharge/app.js"> </script>
<div class="contents">
  <section class="sub_purchase" style="padding: 0 0">
    <div class="coupon_entry" style='
    background-size: 100% 100%; background-blend-mode: darken'>
      <div style='height: 200px'>
        <h2>DONATE</h2>
        <p class="txt">Obtenha dinheiro ou itens inserindo o código do cupom abaixo!</p>
        <div id="ErrorMsg" style='
        height: 2%;
        position: absolute;
        width: 600px;
        left: 355px;
        top: 277px;
        background-color: #5a0000;
        display: none'><span id="TextErrorMsg" style='
        text-align: center;
        font-size: 17px;
        color: #fff;
        font-weight: 300'></span></div>
        <p class="input"><label id="coupon" style='display:"block"'></label><input type="text" placeholder="ENTER CODE" id="couponno" class="basic" /><button type="button" type="button" id="btnCouponReg">APPLY</button></p>
      </div>
    </div>
  </section>
  <table class="bbs_list_rank" style='background: #efe7e7 url(/Front/Commom/cont_div_line.png) bottom left no-repeat'>
    <colgroup>
      <col style='width:"114px"' />
      <col style='width:"238px"' />
      <col style='width:"218px"' />
      <col style='width:"100px"' />
    </colgroup>
    <thead>
      <tr>
        <th class="TrThRed">Id</th>
        <th class="TrThRed">Tipo</th>
        <th class="TrThRed">Detalhes</th>
        <th class="last" style='background-blend-mode: darken;     border-right: 1px solid #a41100'>Data</th>
      </tr>
    </thead>
    <tbody id="myitemslist">

      <?php 
      $UserMore = new $Init["UserMore"];
      $UserMore->getRecharges(); ?>
    </tbody>
  </table>
</div>
</div>
<script>
  class PopUP {

    reCAPTCHA(e, Filter, self) {
      e.preventDefault();
      grecaptcha.ready(function() {
        grecaptcha.execute('<?php echo RECAPTCHA_PUBLICV3 ?>', {
          action: 'submit'
        }).then(function(token) {
          return self.Apis[Filter[1]]($("#couponno").val(), token, self)
        });
      });
    }

    Template(data) {
      if (typeof data[1]?.value !== 'undefined') {
        return `<tr data-target="Item-1">
        <td class="rank">
          ${data[0]}
        </td>
        <td class="nick">PIN CASH</td>
        <td class="rank_class">${data[1].value} CASH POINTS</td>
        <td class="gray" style="color: red;">${data[2]}</td>
      </tr>`
      }

      let Items = []

      data.code[1].items.forEach((elemento) => {
        Items.push(`${elemento.name.toUpperCase()} (${elemento.count / 86400 }D), `)
      })

      return `<tr data-target="Item-1">
        <td class="rank">
          ${data.code[0]}
        </td>
        <td class="nick">CUPOM ITENS</td>
        <td class="rank_class">${Items}</td>
        <td class="gray" style="color: red;">${data.code[2]}</td>
      </tr>`
    }

    Apis = {

      Pin(Code, token, self) {
        $.ajax({
          url: '/pop-up/pin',
          type: 'POST',
          data: {
            code: Code,
            g_recaptcha_response: token
          },
          success: function(data) {
            if (data.status) {
              //$('#coupon').html(data.code);
              $('#couponno').val('');
              $('#ErrorMsg').css('display', 'none');
              $('#TextErrorMsg').html('');
              $('#myitemslist').prepend(self.Template(data.code))
            } else {
              $('#ErrorMsg').css('display', 'block');
              $('#TextErrorMsg').html(data.error);
            }
          }
        });
      },

      Coupon(Code, token, self) {
        $.ajax({
          url: '/pop-up/coupon',
          type: 'POST',
          data: {
            code: Code,
            g_recaptcha_response: token
          },
          success: function(data) {
            if (data.status) {
              //$('#coupon').html(data.code);
              $('#couponno').val('');
              $('#ErrorMsg').css('display', 'none');
              $('#TextErrorMsg').html('');
              $('#myitemslist').prepend(self.Template(data))
            } else {
              $('#ErrorMsg').css('display', 'block');
              $('#TextErrorMsg').html(data.error);
            }
          }
        });
      }

    }

    Filters(Coupon) {

      if (Coupon == "" || Coupon == null) {
        $("#ErrorMsg").show();
        $("#TextErrorMsg").text("Insira um cupom/pin valido");
        return [false];
      }

      if (Coupon.length < 5) {
        $("#ErrorMsg").show();
        $("#TextErrorMsg").text("Insira um cupom/pin valido");
        return [false];
      }

      var regEng = /[a-zA-Z]/g;
      var regExp = /^[A-Za-z0-9]{1}([-_.]|[A-Za-z0-9]){5,30}$/;

      if (!Coupon.match(regExp)) {
        $("#ErrorMsg").show();
        $("#TextErrorMsg").text("Insira um cupom/pin valido");
        return [false];
      }

      $("#ErrorMsg").hide();
      if (/^[a-z]+$/i.test(Coupon)) {
        return [true, "Coupon"];
      } else {
        return [true, "Pin"];
      }

    }

    Responsive = {

      active(self) {
        $("#btnCouponReg").click(function(e) {
          const Filter = self.Filters($("#couponno").val());
          if (Filter[0]) {
            self.reCAPTCHA(e, Filter, self);
          }else{
            $("#couponno").val("");
          }
        });
      }

    }

    init() {
      this.Responsive.active(this)
    }
  }

  const popUP = new PopUP().init();
</script>
<?php include('src/includes/Footer.include.php'); ?>