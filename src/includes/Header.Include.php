<!doctype html>
<html xmlns="//www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta http-equiv="pragma" content="no-cache" />
  <meta http-equiv="cache-control" content="no-cache" />
  <meta name="description" content="The Official site for the Free to play First Person Shooter, Point Blank TAM with Turkish, English and Arabic contents and support. Point Blank TAM features hundreds of guns, knives, and items. It’s the best free multiplayer action game that’s competitive for eSports tournaments  and its free to download. With realistic, multiple game modes and dozens of maps, this is not your typical console shooter." />
  <meta name="keywords" content="Point Blank, Free To Play, Online FPS Game, Free FPS Game, FPS, First Person Shooter, Free To Play FPS, Download Free PC FPS, pb, download games, download free games, free game, fun, pc, exciting, fps, first person shooter, free fps, shoot, online game, multiplayer, free to play, freetoplay, ak47, gun." />
  <meta property="og:title" content="Point Blank" />
  <meta property="og:description" content="Point Blank" />
  <title>Point Blank</title>
  <link href='//fonts.googleapis.com/css?family=Anton|Open+Sans:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link media='all' href='/template/css/default.css' type='text/css' rel='stylesheet' />
  <link media='all' href='/template/css/layout.css' type='text/css' rel='stylesheet' />
  <link media='all' href='/template/css/main.css' type='text/css' rel='stylesheet' />
  <link media='all' href='/template/css/sub.css' type='text/css' rel='stylesheet' />
  <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
  <script src="/template/app.js" type="text/javascript"></script>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-QL5J3QQZH5"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-QL5J3QQZH5');
  </script>
  <script type="text/javascript">
    var isLogin = false;
    var url_loginform = "https://www.tamgame.com/account/loginform.do";
    var zpCommon = {
      login: function(strUseridID, strPasswordID, strRef, strRememberId, strLoginType, recaptcha_response, strMessage) {
        var userid = $("#" + strUseridID);
        var password = $("#" + strPasswordID);
        var ref = null;
        var rememberId = null;
        var msg = null;
        var span = $("#devTempLoginFormSpan");

        if (strMessage && strMessage != null && strMessage != undefined) {
          msg = $("#" + strMessage);
          if (msg.length <= 0) msg = null;
        }

        if (msg == null) {
          if (isBlank(userid, "Please enter E-Mail address.", "Y")) {
            return;
          }
          if (isBlank(password, "Please enter your password.", "Y")) {
            return;
          }
        } else {
          if (userid.val().trim().length <= 0) {
            msg.html("Please enter E-Mail address.");
            userid.focus();
            return;
          }
          if (password.val().trim().length <= 0) {
            msg.html("Please enter your password.");
            password.focus();
            return;
          }
        }

        if (strRef && strRef != null && strRef != undefined) {
          ref = $("#" + strRef);
          if (ref.length <= 0) ref = null;
        }

        if (span.length <= 0) {
          $("body").append("<span id='devTempLoginFormSpan' style='width:0px; height:0px; display:none;'></span>");
          span = $("#devTempLoginFormSpan");
        }
        span.html("");

        var html = "<form id='devTempLoginForm'>";
        html += "<input type='text' id='devTempLoginFormUserid' name='userid' value='" + userid.val() + "' />";
        html += "<input type='password' id='devTempLoginFormPassword' name='userpassword' value='" + password.val() + "' />";
        if (ref && ref != null && ref != undefined) {
          html += "<input type='hidden' id='devTempLoginFormRef' name='ref' value='" + ref.val() + "' />";
        }
        if (strRememberId && strRememberId != null && strRememberId != undefined) {
          var chkRememberId = "0";

          if ($("input:checkbox[id='" + strRememberId + "']").is(":checked")) chkRememberId = "1";
          html += "<input type='hidden' id='chkRememberId' name='chkRememberId' value='" + chkRememberId + "' />";
        }
        if (strLoginType && strLoginType != null && strLoginType != undefined) {
          html += "<input type='hidden' id='loginType' name='loginType' value='" + $("input[name='loginType']").val() + "' />";
        }
        if (recaptcha_response && recaptcha_response != null && recaptcha_response != undefined) {
          html += "<input type='hidden' id='g-recaptcha-response' name='g-recaptcha-response' value='" + $("#g-recaptcha-response").val() + "' />";
        }

        html += "</form>";
        span.append(html);

        frm = $("#devTempLoginForm");
        frm.attr("method", "POST");
        frm.attr("action", "/account/login.do");
        frm.submit();
      },
      cbEnter: function(id, evtType) {
        switch (evtType) {
          case "login":
            zpCommon.login("login_userid", "login_userpassword");
            break;
          case "login_form":
            //zpCommon.login("login_userid_form", "login_userpassword_form", "login_referer_form", "login_form_msg");
            zpCommon.login("login_userid_form", "login_userpassword_form", "login_referer_form", "login_chkRememberId_form", "loginType", "g-recaptcha-response", "login_form_msg");
            break;
        }
      }
    };

    function PaymentCharge() {
      document.location.href = "https://www.tamgame.com/payment/cash.do";
    }

    function PaymentCoupon() {
      document.location.href = "https://www.tamgame.com/payment/coupon.do";
    }

    function PaymentHisgory() {
      document.location.href = "https://www.tamgame.com/payment/history.do";
    }
  </script>
  <script type="text/javascript">
    var zptRcvMessage = {
      receiveMessage: function(event) {
        var regData = /.payletter_/g;

        if (!regData.test(event.data)) return false;

        var data = $.parseJSON(event.data);

        if (event.origin != "https://bill.tamgame.com") {
          //			return;
        }

        switch (data.type) {
          case "payletter_charge_iframe_resize":
            var frame = $("#iframe_payletter");
            if (frame.length > 0) {
              if (data.width) {
                frame.css("width", data.width);
              }
              if (data.height) {
                frame.css("height", data.height);
              }
            }
            break;
          case "payletter_location_change":
            if (data.location) {
              document.location.href = data.location;
            }
            break;
        }
      }
    };

    if (window.addEventListener) {
      window.addEventListener("message", zptRcvMessage.receiveMessage, false);
    } else {
      if (window.attachEvent) {
        window.attachEvent("onmessage", zptRcvMessage.receiveMessage);
      }
    }
  </script>
  <script type="text/javascript">
    //<![CDATA[
    var logger = {
      log: function(format) {
        var arg = arguments;
        var str = "";
        try {
          if (arg.length > 0)
            str = arg[0];
          for (var i = 1; i < arg.length; i++) {
            str = str.replace("{" + (i - 1) + "}", arg[i]);
          }
          window.console.log(str);
        } catch (e) {}
      },
      trace: function(format) {
        var arg = arguments;
        var str = "";
        try {
          if (arg.length > 0)
            str = arg[0];
          for (var i = 1; i < arg.length; i++) {
            str = str.replace("{" + (i - 1) + "}", arg[i]);
          }
          window.console.trace(str);
        } catch (e) {}
      }
    };

    String.prototype.trim = function() {
      return this.replace(/(^\s*)|(\s*$)/g, "");
    }

    function isBlank(obj, strMsg, useFocus) {
      if (obj.val().trim().length > 0) {
        return false;
      } else {
        alert(strMsg);
        if (useFocus == "Y") {
          obj.focus();
        }
        return true;
      }
    }

    function isTextBlank(obj, strMsg, useFocus) {
      if (obj.text().trim().length > 0) {
        return false;
      } else {
        alert(strMsg);
        if (useFocus == "Y") {
          obj.focus();
        }
        return true;
      }
    }

    function isCheckRadio(strName, strMsg, useFocus, nIndex) {
      if ($("input[name=" + strName + "]:radio:checked").length > 0) {
        return false;
      } else {
        alert(strMsg);
        if (useFocus == "Y") {
          if (nIndex && nIndex != null && nIndex != "" && nIndex != "undefined") {
            $("input[name=" + strName + "]")[nIndex].focus();
          } else {
            $("input[name=" + strName + "]")[0].focus();
          }
        }
        return true;
      }
    }

    function isCheckEmail(obj) {
      var str = obj.val();
      return isCheckEmailStr(str);
    }

    function isCheckEmailStr(str) {
      if (str.trim().length > 0) {
        if (str.match(/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/)) {
          return true;
        } else {
          return false;
        }
      }
    }

    function hasNum(obj, strMsg, useFocus) {
      var rtn = hasNumStr(obj.val());
      if (!rtn) {
        alert(strMsg);
        if (useFocus == 'Y') obj.focus();
      }
      return rtn;
    }

    function hasNumStr(str) {
      return str.match(/[0-9]/gi);
    }

    function hasSpecialChar(obj, strMsg, useFocus) {
      var rtn = hasSpecialCharStr(obj.val());
      if (!rtn) {
        alert(strMsg);
        if (useFocus == 'Y') obj.focus();
      }
      return rtn;
    }

    function hasSpecialCharStr(str) {
      return str.match(/[\{\}\[\]\/?.,;:|\)*~`!^\-_+┼<>@\#$%&\'\"\\\(\=]/gi);
    }

    function hasEngChar(obj, strMsg, useFocus) {
      var rtn = hasEngCharStr(obj.val());
      if (!rtn) {
        alert(strMsg);
        if (useFocus == 'Y') obj.focus();
      }
      return rtn;
    }

    function hasEngCharStr(str) {
      return str.match(/[a-zA-Z]/gi);
    }

    function validEngNum(obj, strMsg, useFocus) {
      var rtn = validEngNumStr(obj.val());
      if (!rtn) {
        alert(strMsg);
        if (useFocus == 'Y') obj.focus();
      }
      return rtn;
    }

    function validEngNumStr(str) {
      return str.match(/^[a-zA-Z0-9]+$/);
    }

    function validNum(obj, strMsg, useFocus) {
      var rtn = validNumStr(obj.val());
      if (!rtn) {
        alert(strMsg);
        if (useFocus == 'Y') obj.focus();
      }
      return rtn;
    }

    function validNumStr(str) {
      return str.match(/^[0-9]+$/);
    }

    function getCKEditorObj(objID) {
      return eval("CKEDITOR.instances." + objID);
    }

    function getCKEditorContents(objID) {
      return getCKEditorObj(objID).getData().trim();
    }

    function setCookie(name, value, expiredays) {
      var todayDate = new Date();
      if (expiredays && expiredays != 0) {
        todayDate.setDate(todayDate.getDate() + expiredays);
        document.cookie = name + "=" + escape(value) + "; path=/; expires=" + todayDate.toGMTString() + ";"
      } else {
        document.cookie = name + "=" + escape(value) + "; path=/;"
      }
    }

    function GetFileName(str) {
      var rtn = "";
      var temp = null;
      temp = str.split("/");
      rtn = temp[temp.length - 1];
      return rtn;
    }

    function GetFilePath(str) {
      var rtn = [];
      var temp = null;
      temp = str.split("/");
      for (var i = 0; i < temp.length - 1; i++) {
        rtn[i] = temp[i];
      }
      return rtn.join("/");
    }

    function IsNullOrEmpty(str) {
      var strData = str + "";
      if (strData != null && strData != undefined && strData != "undefined" && strData.length > 0) {
        return false;
      } else {
        return true;
      }
    }

    function IsNullOrEmptyObj(obj) {
      if (obj != null && obj != undefined && obj != "undefined" && obj) {
        return false;
      } else {
        return true;
      }
    }

    function SendAjaxDFSuccess(data) {}

    function SendAjaxDFError() {}

    function SendAjaxDFBeforeSubmit() {
      return true;
    }

    function SendAjax(p) {
      var targetUrl = p.url;
      var sendParam = p.parammeters;
      var sendType = p.requestMethod;
      var cbTarget = p.fnTarget;
      var cbComplete = IsNullOrEmptyObj(p.completeHandler) ? null : p.completeHandler;
      var cbSucess = p.successHandler;
      var cbError = p.failHandler;
      var date = new Date();
      if (IsNullOrEmpty(sendType)) {
        sendType = "GET";
      }
      if (!p.formsend || p.formsend == null || p.formsend == undefined) {
        if (sendParam) {
          sendParam.Dummy = date.getTime();
          sendParam.mobile = "";
        } else {
          sendParam = {
            "Dummy": date.getTime(),
            "mobile": ""
          };
        }
      }
      if (IsNullOrEmptyObj(cbTarget)) {
        cbTarget = null;
      }
      if (IsNullOrEmptyObj(cbSucess)) {
        cbSucess = SendAjaxDFSuccess;
      }
      if (IsNullOrEmptyObj(cbError)) {
        cbError = SendAjaxDFError;
      }
      $.ajax({
        type: sendType,
        url: targetUrl,
        data: sendParam,
        dataType: "json",
        timeout: 30000,
        async: true,
        cache: false,
        beforeSubmit: SendAjaxDFBeforeSubmit,
        success: function(xhr) {
          if (cbComplete != null) {
            cbComplete.apply(cbTarget, [true, xhr]);
          }
          cbSucess.apply(cbTarget, [xhr]);
        },
        error: function() {
          if (cbComplete != null) {
            cbComplete.apply(cbTarget, [false]);
          }
          cbError.apply(cbTarget);
        }
      });
    }

    function layer_open(ml, el) {
      $('.' + ml).fadeIn();
      var temp = $('#' + el);
      if (temp.outerHeight() < $(document).height()) temp.css('margin-top', '-' + temp.outerHeight() / 2 + 'px');
      else temp.css('top', '0px');
      if (temp.outerWidth() < $(document).width()) temp.css('margin-left', '-' + temp.outerWidth() / 2 + 'px');
      else temp.css('left', '0px');
      $('body').css("position", "fixed");
    }
    $(document).ready(function() {
      $(".dev_check_enter").bind("keyup", function(e) {
        if (e.keyCode == 13) {
          try {
            var fn = "cbEnter";
            var target = null;
            var evtType = "";
            if ($(this).attr("cbFn") && $(this).attr("cbFn").length > 0) {
              fn = $(this).attr("cbFn");
            }
            if ($(this).attr("cbTarget") && $(this).attr("cbTarget").length > 0) {
              target = eval($(this).attr("cbTarget"));
            }
            if ($(this).attr("cbEvtType") && $(this).attr("cbEvtType").length > 0) {
              evtType = $(this).attr("cbEvtType");
            }
            eval(fn).apply(target, [$(this).attr("id"), evtType]);
          } catch (e) {}
        }
      });
      $(".image_over_dy").each(function() {
        var obj = $(this);
        obj.bind("mouseover", function() {
          try {
            var src = $(this).attr("src");
            var temp = src.split("/");
            var img = temp[temp.length - 1];
            temp.pop();
            var path = temp.join("/");
            temp = img.split(".");
            var target = temp[0];
            var ext = temp[1];
            if (target.length > 3) {
              if (target.substr(target.length - 3, 3) != "_on") {
                target += "_on";
              }
            }
            img = path + "/" + target + "." + ext;
            $(this).attr("src", img);
          } catch (e) {}
        });
        obj.bind("mouseout", function() {
          try {
            var src = $(this).attr("src");
            var temp = src.split("/");
            var img = temp[temp.length - 1];
            temp.pop();
            var path = temp.join("/");
            temp = img.split(".");
            var target = temp[0];
            var ext = temp[1];
            if (target.length > 3) {
              if (target.substr(target.length - 3, 3) == "_on") {
                target = target.substr(0, target.length - 3);
              }
            }
            img = path + "/" + target + "." + ext;
            $(this).attr("src", img);
          } catch (e) {}
        });
      });
    });
    var landing = {
      noview: function(n, url) {
        var day = n ? n : 1;
        setCookie("landing", "noview", day);
        if (url) {
          document.location.href = url;
        }
      },
      gohome: function(url) {
        setCookie("landingHome", true, 0);
        logger.log(document.cookie);
        var strUrl = url ? url : "/";
        document.location.href = strUrl;
      }
    }

    function Close_Promotion() {
      document.getElementById("promotion").style.display = 'none';
    }
    $(window).scroll(function() {
      var scrollTop = $(document).scrollTop();
      if (scrollTop < 383) {
        scrollTop = 383;
      }
      $(".left_banner").stop();
      $(".left_banner").animate({
        "top": scrollTop
      });
    });
    $(window).scroll(function() {
      var scrollTop = $(document).scrollTop();
      if (scrollTop < 383) {
        scrollTop = 383;
      }
      $(".quick_menu").stop();
      $(".quick_menu").animate({
        "top": scrollTop
      });
    });

    function close_layer_pop() {
      document.getElementById("layer_popup_block").style.display = 'none';
    }

    function layer_popup_open_w550(el) {
      var temp = $('#' + el);
      var layer_bg_dim = temp.prev().hasClass('layer_bg_dim');
      if (layer_bg_dim) {
        $('.layer_popup').fadeIn();
      } else {
        temp.fadeIn();
      }
      if (temp.outerHeight() < $(document).height()) temp.css('margin-top', '-' + temp.outerHeight() / 2 + 'px');
      else temp.css('top', '0px');
      if (temp.outerWidth() < $(document).width()) temp.css('margin-left', '-' + temp.outerWidth() / 4.2 + 'px');
      else temp.css('left', '0px');
      temp.find('a.close_btn').click(function(e) {
        if (layer_bg_dim) {
          $('.layer_popup').fadeOut();
        } else {
          temp.fadeOut();
        }
        e.preventDefault();
      });
      $('.layer_popup .layer_bg_dim').click(function(e) {
        $('.layer_popup').fadeOut();
        e.preventDefault();
      });
    }

    function layer_popup_open_w600(el) {
      var temp = $('#' + el);
      var layer_bg_dim = temp.prev().hasClass('layer_bg_dim');
      if (layer_bg_dim) {
        $('.layer_popup').fadeIn();
        $(document).bind("keyup", function(e) {
          if (e.keyCode == 27) {
            $('.layer_popup').fadeOut();
            $(document).unbind("keyup");
          }
        });
      } else {
        temp.fadeIn();
        $(document).bind("keyup", function(e) {
          if (e.keyCode == 27) {
            $('.layer_popup').fadeOut();
            $(document).unbind("keyup");
          }
        });
      }
      if (temp.outerHeight() < $(document).height()) temp.css('margin-top', '-' + temp.outerHeight() / 2 + 'px');
      else temp.css('top', '0px');
      if (temp.outerWidth() < $(document).width()) temp.css('margin-left', '-' + temp.outerWidth() / 3.85 + 'px');
      else temp.css('left', '0px');
      temp.find('a.close_btn').click(function(e) {
        if (layer_bg_dim) {
          $('.layer_popup').fadeOut();
          $(document).unbind("keyup");
        } else {
          temp.fadeOut();
          $(document).unbind("keyup");
        }
        e.preventDefault();
      });
      $('.layer_popup .layer_bg_dim').click(function(e) {
        $('.layer_popup').fadeOut();
        $(document).unbind("keyup");
        e.preventDefault();
      });
    }

    function View_week_list_more() {
      document.getElementById("week_list_more").style.display = 'inline'
    }

    function Close_week_list_more() {
      document.getElementById("week_list_more").style.display = 'none';
    }

    function tab_show(main_ranking) {
      document.all.tab_klan.style.display = "none";
      document.all.tab_Bire.style.display = "none";
      switch (main_ranking) {
        case '2':
          document.all.tab_klan.style.display = "";
          break;
        case '1':
          document.all.tab_Bire.style.display = "";
          break;
      }
    }

    function get_season(season) {
      var value = season.value;
      location.href = '/ranking/individual/list.do?ranktype=elo&season=' + value;
    }

    function cont_tab_show(signup) {
      document.all.tab_Kull.style.display = "none";
      document.all.tab_Gizl.style.display = "none";
      document.all.tab_Hile.style.display = "none";
      switch (signup) {
        case '1':
          document.all.tab_Kull.style.display = "";
          break;
        case '2':
          document.all.tab_Gizl.style.display = "";
          break;
        case '3':
          document.all.tab_Hile.style.display = "";
          break;
      }
    }

    function tab_menu_two(tab_two) {
      document.all.tab_two_first.style.display = "none";
      document.all.tab_two_second.style.display = "none";
      switch (tab_two) {
        case '1':
          document.all.tab_two_first.style.display = "";
          break;
        case '2':
          document.all.tab_two_second.style.display = "";
          break;
      }
    }

    function tab_menu_five(tab_five) {
      document.all.tab_five_first.style.display = "none";
      document.all.tab_five_second.style.display = "none";
      document.all.tab_five_third.style.display = "none";
      document.all.tab_five_fourth.style.display = "none";
      document.all.tab_five_fifth.style.display = "none";
      document.all.tab_five_sixth.style.display = "none";
      switch (tab_five) {
        case '1':
          document.all.tab_five_first.style.display = "";
          break;
        case '2':
          document.all.tab_five_second.style.display = "";
          break;
        case '3':
          document.all.tab_five_third.style.display = "";
          break;
        case '4':
          document.all.tab_five_fourth.style.display = "";
          break;
        case '5':
          document.all.tab_five_fifth.style.display = "";
          break;
        case '6':
          document.all.tab_five_sixth.style.display = "";
          break;
      }
    }

    function tab_menu_five_dn(tab_five_dn) {
      document.all.tab_five_dn_first.style.display = "none";
      document.all.tab_five_dn_second.style.display = "none";
      document.all.tab_five_dn_third.style.display = "none";
      document.all.tab_five_dn_fourth.style.display = "none";
      document.all.tab_five_dn_fifth.style.display = "none";
      document.all.tab_five_dn_sixth.style.display = "none";
      switch (tab_five_dn) {
        case '1':
          document.all.tab_five_dn_first.style.display = "";
          break;
        case '2':
          document.all.tab_five_dn_second.style.display = "";
          break;
        case '3':
          document.all.tab_five_dn_third.style.display = "";
          break;
        case '4':
          document.all.tab_five_dn_fourth.style.display = "";
          break;
        case '5':
          document.all.tab_five_dn_fifth.style.display = "";
          break;
        case '6':
          document.all.tab_five_dn_sixth.style.display = "";
          break;
      }
    }

    $(document).ready(function() {});
    $(document).ready(function() {
      var current = 0;
      var slide_length = $('.main_event_slide li').length;
      var btn = '<ul class="main_event_slide_btn"></ul>';
      $('.main_event_slide li').hide();
      $('.main_event_slide li').first().show();
      $(btn).prependTo($('.event'))
      for (var i = 0; i < slide_length; i++) {
        var child = '<li><a href="#none">' + i + '</a></li>';
        $(child).appendTo($('.main_event_slide_btn'));
      }
      $('.main_event_slide_btn li a').first().addClass('active');
      $('.main_event_slide_btn li a').on('click', slide_stop);

      function autoplay() {
        if (current == slide_length - 1) {
          current = 0;
        } else {
          current++;
        }
        $('.main_event_slide li').stop().fadeOut(200);
        $('.main_event_slide li').eq(current).stop().fadeIn(200);
        $('.main_event_slide_btn li a').removeClass('active');
        $('.main_event_slide_btn li a').eq(current).addClass('active');
      }
      setInterval(autoplay, 2800);

      function slide_stop() {
        var fade_idx = $(this).parent().index();
        current = $(this).parent().index();
        if ($('.main_event_slide li:animated').length >= 1) return false;
        $('.main_event_slide li').fadeOut(200);
        $('.main_event_slide li').eq(fade_idx).fadeIn(200);
        $('.main_event_slide_btn li a').removeClass('active');
        $(this).addClass('active');
      }
    });
    //]]>
  </script>
  <!--[if lt IE 9]><script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js" type="text/javascript" charset="utf-8"></script><![endif]-->
</head>

<body>




  <script type="text/javascript">
    //<![CDATA[
    function selLanguage(lng) {
      var loc = "/common/ChangeLanguage.do?lang=" + lng + "&ref=%2F";
      document.location.href = loc;
    }

    //]]>
  </script>
  <script type="text/javascript">
    //<![CDATA[


    function openLayerPopup(type) {
      var url = "";
      if ($.trim(type) == "sign") {
        var url = "<p class=\"dimmed\"></p><iframe src=\"https://www.tamgame.com/account/popup/register.do\" width=\"700\" height=\"752\" style=\"border:none;\" frameborder=\"0\" scrolling=\"no\"></iframe>";
      } else {
        var url = "/authenticate/login";
        window.location.href = url;
        return;
      }
      $("#layer_reg").html(url).fadeIn("fast");
      return false;
    }

    var zptRcvMessage = {
      receiveMessage: function(event) {
        var regData = /.tamgame_/g;

        if (!regData.test(event.data)) return false;

        var data = $.parseJSON(event.data);

        switch (data.type) {
          case "tamgame_charge_iframe_resize":
            var frame = $("#layer_reg").find("iframe");
            if (frame.length > 0) {
              if (data.width) {
                frame.attr("width", data.width);
              }
              if (data.height) {
                frame.attr("height", data.height);
              }
            }
            break;
          case "tamgame_location_change":
            if (data.location) {
              document.location.href = data.location;
            }
            break;
          case "tamgame_layer_popup_close":
            $("#layer_reg").html("").fadeOut("fast");
            break;
          case "tamgame_page_reload":
            window.location.href = window.location;
            break;
        }
      }
    };

    if (window.addEventListener) {
      window.addEventListener("message", zptRcvMessage.receiveMessage, false);
    } else {
      if (window.attachEvent) {
        window.attachEvent("onmessage", zptRcvMessage.receiveMessage);
      }
    }
    $(document).ready(function() {
      //  $("#layer_reg").fadeIn("fast");
    });
    //]]>
  </script>

  <div id="layer_reg"></div>


  <!-- <div id="promotion">
    <div class="banner">
      <p class="close"><a href="javascript:Close_Promotion();"><img src="/images/common/btn_close.png" /></a></p>
      <p><a href="https://pb.tamgame.com/news/notice/view.do?page=1&idx=2501" target='_blank'><img src="https://pb.tamgame.com/Common/ViewImage.do?filepath=JTJGcGIlMkZCYW5uZXIlMkYyJTJGMCUyRjIlMkYxJTJGMCUyRjElMkYxJTJGNCUyRjElMkYxJTJGMSUyRjIlMkY0JTJGNiUyRjIwMjEwMTE0MTExMjQ2LmpwZw==&filename=am9pbnVzX3VzdGJhbm5lci5qcGc=" alt="Join Us" /></a></p>
    </div>
  </div> -->

  <div id="wrap">

    <div class="GNB">
      <div class="gnb_cont">
        <p class="logo"><a href="/"><img src="/template/images/comum/logo_gnb_pb.png" /></a></p>
        <script type="text/javascript" src="/template/js/select_design.js"></script>

        <div class="gnb_menu">
          <ul>
            <li class="menu">
              <p class="depth1_1st"><a href="#" class="depth1_on"><span>haberler</span></a></p>
              <ul class="depth2">
                <li><a href="/notices/news">Notice</a></li>
                <li><a href="/notices/patch">Patch Note</a></li>
                <li><a href="/notices/events">Event Note</a></li>
              </ul>
            </li>
            <li class="menu">
              <p class="depth1_2nd"><a href="/game/introducao" class="depth1_on"><span>pb kilavuzu</span></a></p>
              <ul class="depth2">
                <li><a href="/game/introducao"> Introdução</a></li>
                <!-- <li><a href="/guide/character.do">Characters</a></li>
                <li><a href="/guide/map/list.do">Map</a></li>
                <li><a href="/guide/weapons/list.do">Weapons</a></li>
                <li><a href="/guide/mode/bomb.do">Game Mode</a></li>
                <li><a href="/guide/system/missioncards.do">System</a></li>
                <li><a href="/guide/start/interface.do">Game Start</a></li>
                <li><a href="https://landing.tamgame.com/en/name-cards" target="_blank">Name Cards</a></li> -->
              </ul>
            </li>
            <li class="menu">
              <p class="depth1_3rd"><a href="/download" class="depth1_on"><span>İndir</span></a></p>

            </li>
            <li class="menu">
              <p class="depth1_4th"><a href="/ranking/individual" class="depth1_on"><span>sıralama</span></a></p>
              <ul class="depth2">
                <li><a href="/ranking/individual">Individual Ranking</a></li>
                <li><a href="/ranking/clan">Clan Ranking</a></li>

              </ul>
            </li>
            <li class="menu">
              <p class="depth1_6th"><a href="https://www.tamgame.com/support/customer/write.do" class="depth1_on"><span>destek</span></a></p>
              <ul class="depth2">
                <li><a href="javascript:alert('Log-in required to see the page');document.location.href='/account/loginform.do';">Contact us</a></li>
                <li><a href="javascript:alert('Log-in required to see the page');document.location.href='/account/loginform.do';">History</a></li>
                <li><a href="https://www.tamgame.com/support/faq/list.do">FAQ</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
      <p class="gnb_bg"></p>
    </div>
    <div class="substance">

      <div class="LNB">

        <script src='/template/js/Script.js' type='text/javascript' charset='utf-8'></script>
        <script src='/template/js/ScriptOther.js' type='text/javascript' charset='utf-8'></script>

        <div class="section_common">
          <div class="gamestart ">
            <div class="bg"></div>
            <div class="btn_default"></div>
            <a href="/download" class="btn_gamestart">play for free</a>
          </div>
        </div>

        <script type="text/javascript">
          function loginSubmit() {
            if ($.trim($('#login_userid').val()) == "E-Mail") {
              alert("Please enter E-Mail address.");
              $('#login_userid').focus();
              return false;
            } else if ($.trim($('#login_userpassword').val()) == "PASSWORD") {
              alert("Please enter your password.");
              $('#login_userpassword').focus();
              return false;
            }
            zpCommon.login('login_userid', 'login_userpassword');
          }

          $(function() {
            $("#login_userpassword").keyup(function(key) {
              if (key.keyCode == 13) {

                loginSubmit();
                //zpCommon.login('login_userid', 'login_userpassword');
              }
            });
            $("#login_userid").focus(function() {
              if ($.trim(this.value) == "E-Mail") this.value = "";
              this.style.color = "white";
            });

          });
          //
        </script>
        <?php
        include('./src/models/Authenticate.Modal.php');
        ?>





        <ul class="cs">


          <?php
          if (isset($UserDetails)) {
            if (date_format(date_create($UserDetails["cmweb_dailycash"]), 'd/m/Y') != date("d/m/Y")) {
              echo '<li class="m_b2"><a href="#" id="dailycash"><img src="/template/images/comum/cash-diario.png"></a></li>';
            }
          } ?>


          <li class="m_r2 m_b2"><a href="/guide/intro.do"><img src="/template/images/comum/lnb_cs_first.jpg" /></a></li>
          <li class="m_b2"><a href="javascript:PaymentCharge();"><img src="/template/images/comum/lnb_cs_how.jpg" /></a></li>
          <li class="m_r2"><a href="/recharge/pin-code"><img src="/template/images/comum/lnb_cs_coupon.jpg" /></a></li>
          <li><a href="https://www.tamgame.com/support/faq/list.do?service=3"><img src="/template/images/comum/lnb_cs_faq.jpg" /></a></li>
        </ul>


        <div class="ranking">
          <p class="main_tit"><a href="/ranking/individual">RANKING</a><span class="more"><a href="/ranking/individual"><img src="/template/images/comum/btn_tit_more_rotate.png" /></a></span></p>

          <div id="tab_Bire">
            <ul class="tab_tit">
              <li class="tit_first_on">Individual</li>
              <li class="tit_last"><a href="javascript:tab_show('2');" class="btn">Clan</a></li>
            </ul>
            <?php
            $FeaturesRanks = new $Init["FeaturesRanks"]();
            $FeaturesRanks->bestFivePlayers();
            ?>
          </div>
          <div id="tab_klan" style="display:none;">
            <ul class="tab_tit">
              <li class="tit_first"><a href="javascript:tab_show('1');" class="btn">Individual</a></li>
              <li class="tit_last_on">Clan</li>
            </ul>
            <?php
            $FeaturesRanks->bestFiveClans();
            ?>
          </div>
        </div>

      </div>