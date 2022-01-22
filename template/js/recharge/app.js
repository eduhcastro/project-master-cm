//<![CDATA[
  (function(factory){if(typeof define==='function'&&define.amd){define(['jquery'],factory);}else if(typeof module==='object'&&module.exports){factory(require('jquery'));}else{factory(jQuery);}}(function($){var debugMode=false;var isOperaMini=Object.prototype.toString.call(window.operamini)==='[object OperaMini]';var isInputSupported='placeholder'in document.createElement('input')&&!isOperaMini&&!debugMode;var isTextareaSupported='placeholder'in document.createElement('textarea')&&!isOperaMini&&!debugMode;var valHooks=$.valHooks;var propHooks=$.propHooks;var hooks;var placeholder;var settings={};if(isInputSupported&&isTextareaSupported){placeholder=$.fn.placeholder=function(){return this;};placeholder.input=true;placeholder.textarea=true;}else{placeholder=$.fn.placeholder=function(options){var defaults={customClass:'placeholder'};settings=$.extend({},defaults,options);return this.filter((isInputSupported?'textarea':':input')+'['+(debugMode?'placeholder-x':'placeholder')+']').not('.'+settings.customClass).not(':radio, :checkbox, :hidden').bind({'focus.placeholder':clearPlaceholder,'blur.placeholder':setPlaceholder}).data('placeholder-enabled',true).trigger('blur.placeholder');};placeholder.input=isInputSupported;placeholder.textarea=isTextareaSupported;hooks={'get':function(element){var $element=$(element);var $passwordInput=$element.data('placeholder-password');if($passwordInput){return $passwordInput[0].value;}
  return $element.data('placeholder-enabled')&&$element.hasClass(settings.customClass)?'':element.value;},'set':function(element,value){var $element=$(element);var $replacement;var $passwordInput;if(value!==''){$replacement=$element.data('placeholder-textinput');$passwordInput=$element.data('placeholder-password');if($replacement){clearPlaceholder.call($replacement[0],true,value)||(element.value=value);$replacement[0].value=value;}else if($passwordInput){clearPlaceholder.call(element,true,value)||($passwordInput[0].value=value);element.value=value;}}
  if(!$element.data('placeholder-enabled')){element.value=value;return $element;}
  if(value===''){element.value=value;if(element!=safeActiveElement()){setPlaceholder.call(element);}}else{if($element.hasClass(settings.customClass)){clearPlaceholder.call(element);}
  element.value=value;}
  return $element;}};if(!isInputSupported){valHooks.input=hooks;propHooks.value=hooks;}
  if(!isTextareaSupported){valHooks.textarea=hooks;propHooks.value=hooks;}
  $(function(){$(document).delegate('form','submit.placeholder',function(){var $inputs=$('.'+settings.customClass,this).each(function(){clearPlaceholder.call(this,true,'');});setTimeout(function(){$inputs.each(setPlaceholder);},10);});});$(window).bind('beforeunload.placeholder',function(){var clearPlaceholders=true;try{if(document.activeElement.toString()==='javascript:void(0)'){clearPlaceholders=false;}}catch(exception){}
  if(clearPlaceholders){$('.'+settings.customClass).each(function(){this.value='';});}});}
  function args(elem){var newAttrs={};var rinlinejQuery=/^jQuery\d+$/;$.each(elem.attributes,function(i,attr){if(attr.specified&&!rinlinejQuery.test(attr.name)){newAttrs[attr.name]=attr.value;}});return newAttrs;}
  function clearPlaceholder(event,value){var input=this;var $input=$(this);if(input.value===$input.attr((debugMode?'placeholder-x':'placeholder'))&&$input.hasClass(settings.customClass)){input.value='';$input.removeClass(settings.customClass);if($input.data('placeholder-password')){$input=$input.hide().nextAll('input[type="password"]:first').show().attr('id',$input.removeAttr('id').data('placeholder-id'));if(event===true){$input[0].value=value;return value;}
  $input.focus();}else{input==safeActiveElement()&&input.select();}}}
  function setPlaceholder(event){var $replacement;var input=this;var $input=$(this);var id=input.id;if(event&&event.type==='blur'&&$input.hasClass(settings.customClass)){return;}
  if(input.value===''){if(input.type==='password'){if(!$input.data('placeholder-textinput')){try{$replacement=$input.clone().prop({'type':'text'});}catch(e){$replacement=$('<input>').attr($.extend(args(this),{'type':'text'}));}
  $replacement.removeAttr('name').data({'placeholder-enabled':true,'placeholder-password':$input,'placeholder-id':id}).bind('focus.placeholder',clearPlaceholder);$input.data({'placeholder-textinput':$replacement,'placeholder-id':id}).before($replacement);}
  input.value='';$input=$input.removeAttr('id').hide().prevAll('input[type="text"]:first').attr('id',$input.data('placeholder-id')).show();}else{var $passwordInput=$input.data('placeholder-password');if($passwordInput){$passwordInput[0].value='';$input.attr('id',$input.data('placeholder-id')).show().nextAll('input[type="password"]:last').hide().removeAttr('id');}}
  $input.addClass(settings.customClass);$input[0].value=$input.attr((debugMode?'placeholder-x':'placeholder'));}else{$input.removeClass(settings.customClass);}}
  function safeActiveElement(){try{return document.activeElement;}catch(exception){}}}));
  
  $(function(){$("nav > ul > li > a").on("mouseenter",function(){$("nav > ul li").removeClass("on");$(this).parent("li").addClass("on");$("nav > ul li").find(".depth").stop(true,true).slideUp("fast");$(this).next(".depth").stop(true,true).slideDown("fast");});$("nav").on("mouseleave",function(){$("nav > ul li").removeClass("on");$("nav > ul li").find(".depth").stop(true,true).slideUp("fast");});$("header .lang > a").on("click",function(){$(this).toggleClass("on");$(this).next("ul").stop(true,true).slideToggle("fast");return false;});$("#layer_pop .btns a").on("click",function(){$("#layer_pop").hide();return false;});$("header .my_profile > a").on("mouseenter",function(){$(this).next("ul").stop(true,true).slideDown("fast");})
  $("header .my_profile").on("mouseleave",function(){$(this).find("ul").stop(true,true).slideUp("fast");});$("input, textarea").placeholder();$("footer .btn_top a").on("click",function(){$("html, body").animate({scrollTop:0},500,"easeInOutExpo");return false;});$(".pb_brandbar .common > ul > li > a").on("mouseenter",function(){$(".pb_brandbar .common > ul > li").removeClass("on");$(this).parent("li").addClass("on");$(".pb_brandbar .common > ul > li").find(".depth").stop(true,true).slideUp("fast");$(this).next(".depth").stop(true,true).slideDown("fast");});$(".pb_brandbar").on("mouseleave",function(){$(".pb_brandbar .common > ul > li").removeClass("on");$(".pb_brandbar .common > ul > li").find(".depth").stop(true,true).slideUp("fast");});});
  
  var logger={log:function(format){var arg=arguments;var str="";try{if(arg.length>0)
  str=arg[0];for(var i=1;i<arg.length;i++){str=str.replace("{"+(i-1)+"}",arg[i]);}
  window.console.log(str);}
  catch(e){}},trace:function(format){var arg=arguments;var str="";try{if(arg.length>0)
  str=arg[0];for(var i=1;i<arg.length;i++){str=str.replace("{"+(i-1)+"}",arg[i]);}
  window.console.trace(str);}
  catch(e){}}};
  
  String.prototype.trim=function(){return this.replace(/(^\s*)|(\s*$)/g,"");}
  function isBlank(obj,strMsg,useFocus){if(obj.val().trim().length>0){return false;}else{alert(strMsg);if(useFocus=="Y"){obj.focus();}
  return true;}}
  function isTextBlank(obj,strMsg,useFocus){if(obj.text().trim().length>0){return false;}else{alert(strMsg);if(useFocus=="Y"){obj.focus();}
  return true;}}
  function isCheckRadio(strName,strMsg,useFocus,nIndex){if($("input[name="+strName+"]:radio:checked").length>0){return false;}else{alert(strMsg);if(useFocus=="Y"){if(nIndex&&nIndex!=null&&nIndex!=""&&nIndex!="undefined"){$("input[name="+strName+"]")[nIndex].focus();}else{$("input[name="+strName+"]")[0].focus();}}
  return true;}}
  function isCheckEmail(obj){var str=obj.val();return isCheckEmailStr(str);}
  function isCheckEmailStr(str){if(str.trim().length>0){if(str.match(/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/)){return true;}else{return false;}}}
  function hasNum(obj,strMsg,useFocus){var rtn=hasNumStr(obj.val());if(!rtn){alert(strMsg);if(useFocus=='Y')obj.focus();}
  return rtn;}
  function hasNumStr(str){return str.match(/[0-9]/gi);}
  function hasSpecialChar(obj,strMsg,useFocus){var rtn=hasSpecialCharStr(obj.val());if(!rtn){alert(strMsg);if(useFocus=='Y')obj.focus();}
  return rtn;}
  function hasSpecialCharStr(str){return str.match(/[\{\}\[\]\/?.,;:|\)*~`!^\-_+┼<>@\#$%&\'\"\\\(\=]/gi);}
  function hasEngChar(obj,strMsg,useFocus){var rtn=hasEngCharStr(obj.val());if(!rtn){alert(strMsg);if(useFocus=='Y')obj.focus();}
  return rtn;}
  function hasEngCharStr(str){return str.match(/[a-zA-Z]/gi);}
  function validEngNum(obj,strMsg,useFocus){var rtn=validEngNumStr(obj.val());if(!rtn){alert(strMsg);if(useFocus=='Y')obj.focus();}
  return rtn;}
  function validEngNumStr(str){return str.match(/^[a-zA-Z0-9]+$/);}
  function validNum(obj,strMsg,useFocus){var rtn=validNumStr(obj.val());if(!rtn){alert(strMsg);if(useFocus=='Y')obj.focus();}
  return rtn;}
  function validNumStr(str){return str.match(/^[0-9]+$/);}
  function getCKEditorObj(objID){return eval("CKEDITOR.instances."+objID);}
  function getCKEditorContents(objID){return getCKEditorObj(objID).getData().trim();}
  function setCookie(name,value,expiredays){var todayDate=new Date();if(expiredays&&expiredays!=0){todayDate.setDate(todayDate.getDate()+expiredays);document.cookie=name+"="+escape(value)+"; path=/; expires="+todayDate.toGMTString()+";"}else{document.cookie=name+"="+escape(value)+"; path=/;"}}
  function GetFileName(str){var rtn="";var temp=null;temp=str.split("/");rtn=temp[temp.length-1];return rtn;}
  function GetFilePath(str){var rtn=[];var temp=null;temp=str.split("/");for(var i=0;i<temp.length-1;i++){rtn[i]=temp[i];}
  return rtn.join("/");}
  function IsNullOrEmpty(str){var strData=str+"";if(strData!=null&&strData!=undefined&&strData!="undefined"&&strData.length>0){return false;}else{return true;}}
  function IsNullOrEmptyObj(obj){if(obj!=null&&obj!=undefined&&obj!="undefined"&&obj){return false;}else{return true;}}
  function SendAjaxDFSuccess(data){}
  function SendAjaxDFError(){}
  function SendAjaxDFBeforeSubmit(){return true;}
  function SendAjax(p){var targetUrl=p.url;var sendParam=p.parammeters;var sendType=p.requestMethod;var cbTarget=p.fnTarget;var cbComplete=IsNullOrEmptyObj(p.completeHandler)?null:p.completeHandler;var cbSucess=p.successHandler;var cbError=p.failHandler;var date=new Date();if(IsNullOrEmpty(sendType)){sendType="GET";}
  if(!p.formsend||p.formsend==null||p.formsend==undefined){if(sendParam){sendParam.Dummy=date.getTime();sendParam.mobile="";}else{sendParam={"Dummy":date.getTime(),"mobile":""};}}
  if(IsNullOrEmptyObj(cbTarget)){cbTarget=null;}
  if(IsNullOrEmptyObj(cbSucess)){cbSucess=SendAjaxDFSuccess;}
  if(IsNullOrEmptyObj(cbError)){cbError=SendAjaxDFError;}
  $.ajax({type:sendType,url:targetUrl,data:sendParam,dataType:"json",timeout:30000,async:true,cache:false,beforeSubmit:SendAjaxDFBeforeSubmit,success:function(xhr){if(cbComplete!=null){cbComplete.apply(cbTarget,[true,xhr]);}
  cbSucess.apply(cbTarget,[xhr]);},error:function(){if(cbComplete!=null){cbComplete.apply(cbTarget,[false]);}
  cbError.apply(cbTarget);}});}
  function layer_open(ml,el){$('.'+ml).fadeIn();var temp=$('#'+el);if(temp.outerHeight()<$(document).height())temp.css('margin-top','-'+temp.outerHeight()/2+'px');else temp.css('top','0px');if(temp.outerWidth()<$(document).width())temp.css('margin-left','-'+temp.outerWidth()/2+'px');else temp.css('left','0px');$('body').css("position","fixed");}
  $(document).ready(function(){$(".dev_check_enter").bind("keyup",function(e){if(e.keyCode==13){try{var fn="cbEnter";var target=null;var evtType="";if($(this).attr("cbFn")&&$(this).attr("cbFn").length>0){fn=$(this).attr("cbFn");}
  if($(this).attr("cbTarget")&&$(this).attr("cbTarget").length>0){target=eval($(this).attr("cbTarget"));}
  if($(this).attr("cbEvtType")&&$(this).attr("cbEvtType").length>0){evtType=$(this).attr("cbEvtType");}
  eval(fn).apply(target,[$(this).attr("id"),evtType]);}catch(e){}}});$(".image_over_dy").each(function(){var obj=$(this);obj.bind("mouseover",function(){try{var src=$(this).attr("src");var temp=src.split("/");var img=temp[temp.length-1];temp.pop();var path=temp.join("/");temp=img.split(".");var target=temp[0];var ext=temp[1];if(target.length>3){if(target.substr(target.length-3,3)!="_on"){target+="_on";}}
  img=path+"/"+target+"."+ext;$(this).attr("src",img);}catch(e){}});obj.bind("mouseout",function(){try{var src=$(this).attr("src");var temp=src.split("/");var img=temp[temp.length-1];temp.pop();var path=temp.join("/");temp=img.split(".");var target=temp[0];var ext=temp[1];if(target.length>3){if(target.substr(target.length-3,3)=="_on"){target=target.substr(0,target.length-3);}}
  img=path+"/"+target+"."+ext;$(this).attr("src",img);}catch(e){}});});});var landing={noview:function(n,url){var day=n?n:1;setCookie("landing","noview",day);if(url){document.location.href=url;}},gohome:function(url){setCookie("landingHome",true,0);logger.log(document.cookie);var strUrl=url?url:"/";document.location.href=strUrl;}}
  //]]></script>
  //<![CDATA[
  var isLogin = true;
  var url_loginform = "/account/loginform.do";
  var zpCommon = {
      login : function (strUseridID, strPasswordID, strRef, strLoginType, recaptcha_response, strMessage) {
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
              if (isBlank(userid, "Please enter E-Mail address.", "Y")) {return;}
              if (isBlank(password, "Please enter your password.", "Y")) {return;}
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
          html += "<input type='text' id='devTempLoginFormUserid' name='userid' value='"+userid.val()+"' />";
          html += "<input type='password' id='devTempLoginFormPassword' name='userpassword' value='"+password.val()+"' />";
          if (ref && ref != null && ref != undefined) {
              html += "<input type='hidden' id='devTempLoginFormRef' name='ref' value='"+ref.val()+"' />";
          }
          if (strLoginType && strLoginType != null && strLoginType != undefined) {
              html += "<input type='hidden' id='loginType' name='loginType' value='"+$( "input[name='loginType']" ).val()+"' />";
          }
          if (recaptcha_response && recaptcha_response != null && recaptcha_response != undefined) {
              html += "<input type='hidden' id='g-recaptcha-response' name='g-recaptcha-response' value='"+$( "#g-recaptcha-response" ).val()+"' />";
          }
          
          html += "</form>";
          span.append(html);
  
          frm = $("#devTempLoginForm");
          frm.attr("method", "POST");
          frm.attr("action", "/account/login.do");
          frm.submit();
      },
      cbEnter : function (id, evtType) {
          switch (evtType) {
              case "login":
                  zpCommon.login("login_userid", "login_userpassword");
                  break;
              case "login_form":
                  zpCommon.login('login_userid_form', 'login_userpassword_form', 'login_referer_form', 'loginType', 'recaptcha_challenge_field', 'recaptcha_response_field', 'login_form_msg');
                  break;
          }
      }
  };
  
  function PaymentCharge() {
      document.location.href = isLogin ? "/payment/cash.do" : url_loginform;
  }
  function PaymentCoupon() {
      document.location.href = isLogin ? "/payment/coupon.do" : url_loginform;
  }
  function PaymentHisgory() {
      document.location.href = isLogin ? "/payment/history.do" : url_loginform;
  }
  //]]>

  var zptRcvMessage = {
      receiveMessage : function (event) {
          var regPayletter = /.payletter_/g;
          var regTamgame = /.tamgame_/g;
  
          var data = $.parseJSON(event.data);
  
          if (regPayletter.test(event.data)) {
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
          else if (regTamgame.test(event.data)) {
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
          else {
              return false;
          }
      }
  };
  
  if(window.addEventListener) {
      window.addEventListener ("message", zptRcvMessage.receiveMessage, false);
  } else {
      if(window.attachEvent) {  
          window.attachEvent("onmessage", zptRcvMessage.receiveMessage);
      }
  }

  function openLayerPopup(type) {
      var url = "";
      if ($.trim(type) == "sign") {
          var url = "<p class=\"dimmed\"></p><iframe src=\"/account/popup/register.do\" width=\"700\" height=\"752\" style=\"border:none;\" frameborder=\"0\" scrolling=\"no\"></iframe>";
      } else {
          var url = "/sso/login";
          window.location.href = url;
          return;
      }
      $("#layer_reg").html(url).fadeIn("fast");
      //return false;
  }

  function drawMsg(key, str) {
  if ($.trim(str)!="") $("#notice_txt_"+key).html(str).show();
  else $("#notice_txt_"+key).html("").hide();
}

  function phoneCheck() {
      if ($.trim($("#phone").val()) == $.trim($("#oldphone").val())) {
          formSubmit();
          return;
      }

    var phone = $("#phone").val();
    var p = new Object();
    p.url = "/account/member/PhoneCheck.do";
    p.parammeters = { "phone": phone, "mode" : 1 }; //log count check
    p.requestMethod = "POST";
    p.successHandler = function (rs) {
      if (rs == null || rs == undefined) {
        alert("Network error.");
          $("#btnSubmit").removeAttr("disabled");
      } else {
        if (rs.success == true) {
            formSubmit();
        }
        else {
            if (rs.message.length > 0) {
                alert(rs.message);
            }
            $("#btnSubmit").removeAttr("disabled");
        }
      }
    };

    SendAjax(p);
  }

function SelectChange(str){
  if(str == 255){
    $('#etc_txt').css('display','block');
  } else {
    $('#etc_txt').css('display','none').val('');
  }
}

function changeCountry() {
  var country = $("#countryCode option:selected").val();

  clearSelectbox("locationCode");

  if (parseInt(country) > 5 || parseInt(country) == 0) {
    $('#locationDiv').css('display','none');
  }
  else {
    $('#locationDiv').css('display','');
  }

  var p = new Object();
  p.url = "/account/getCodeToList.do";
  p.parammeters = {"name" : "Location", "code" : country};
  p.requestMethod = "POST";
  p.successHandler = function (rs) {
    if (rs == null || rs == undefined) {
      alert("Network error.");
    } else {
      if (rs.success == true) {
        $.each(rs.data, function(key, val) {
          if ($.trim(val.code)=="0")
            $('#locationCode').append('<option value=\"0\">Others</option>');
          else
            $('#locationCode').append('<option value=\"'+val.code+'\">'+val.value+'</option>');
        });
      }
    }
  };

  SendAjax(p);
}

function emailSend(){
  var uid = "M3ZWZ01RelQ2MW00alE0RmxUd1pyUTJGRU9NWFNpTXczZFoycWZuTlNTRSUzRA==";

  if (uid == "") {
    alert("The wrong approach.");
    return;
  }

  $("#btnSend").unbind("click");

  var p = new Object();
  p.url = "/account/email/SendAuthMail.do";
  p.parammeters = {"uid" : uid, "mailkind": 13};
  p.requestMethod = "POST";
  p.completeHandler = function (isSuccess, rs) {
    if (rs == null || rs == undefined) {
      alert("Network error.");
    } else {
      if (rs.message.length > 0) {
        alert(rs.message);
      }
    }

    if (isSuccess) {
      $("#btnSend").hide();
    } //else {
    //	//bindClick();
    //}
  };
  SendAjax(p);
}

function clearSelectbox(id) {
  var obj = $("#"+id);
  $("#"+id+" option").remove();
  obj.append("<option value=''>===Select===</option>");
}

$(document).ready(function () {
  $('.notice_txt').hide();
  $('input:radio[name=secretQuestion]').click(function() {
    SelectChange($(this).val());
  });
  $("#oldpassword").focus();
  $('#countryCode').change(function() {
    changeCountry();
  });
   $('#phone').keyup(function () {
           $(this).val($(this).val().replace(/[^0-9-]/gi, ""));
       }).change(function () {
           $(this).val($(this).val().replace(/[^0-9-]/gi, ""));
       });
   $('#phone').focusout(function () {
    if ($.trim($('#phone').val())!="" && $.trim($('#phone').val()) != $.trim($('#oldphone').val())) {
      $('#phoneAgree').show();
    }
   });
  if (parseInt($('#countryCode').val()) > 5 || parseInt($('#countryCode').val()) == 0) {
    $("#locationDiv").css('display','none');
  }
  $('#year').change(function () {
    setDay("year","month","day");
  });
  $('#month').change(function () {
    setDay("year","month","day");
  });
  if ($.trim($('#year').val())!="" && $.trim($('#month').val())!="") {
    setDay("year","month","day");
  }
  $('#day').val('');
});



function rtnLstDay(year,month)
{
  var total_days

  if(month==1) total_days=31
  else if(month==2) {

    if (((year%4 == 0) && (year%100 != 0)) || (year%400 == 0))
      total_days=29
    else
      total_days=28
  }
  else if(month==3) total_days=31
  else if(month==4) total_days=30
  else if(month==5) total_days=31
  else if(month==6) total_days=30
  else if(month==7) total_days=31
  else if(month==8) total_days=31
  else if(month==9) total_days=30
  else if(month==10) total_days=31
  else if(month==11) total_days=30
  else if(month==12) total_days=31

  return total_days;
}

function setDay(yearId, monthId, dayId)
{
  lstDay = rtnLstDay($("#"+yearId).val() ,$("#"+monthId).val())
  var selDay = $('#'+dayId).val();

  $("#"+dayId+" option").remove();
  $("#"+dayId).append("<option value=\"\">Day</option>");

  for(var i=1; i < lstDay + 1  ;i++){
    $('#'+dayId).append('<option value="'+leadingZeros(i,2)+'">'+leadingZeros(i,2)+'</option>');
  }
  if (lstDay >= parseInt(selDay)) $('#'+dayId).val(selDay);
}
function leadingZeros(n, digits) {
    var zero = '';
    n = n.toString();

    if (n.length < digits) {
      for (var i = 0; i < digits - n.length; i++)
        zero += '0';
    }
    return zero + n;
  }

        //<![CDATA[
    $(function() {
      $(".change_link a").on("click", function() {
        $(this).parent("p").css("display","none");
        $(this).parent().next("div").css("display","block");
        return false;
      });
      $(".cancel_btn a").on("click", function() {
        $(this).parent("div").css("display","none");
        $(this).parent().prev("p").css("display","block");
        return false;
      });
      $(".close_link a").on("click", function() {
        $(this).parent().parent("div").css("display","none");
        $(this).parent().parent("div").prev("p").css("display","block");
        return false;
      });
      $(".change_link > img, .link > img").on("mouseenter", function() {
        $(this).next(".bubble").stop(true,true).fadeIn();
      }).on("mouseleave", function() {
        $(this).next(".bubble").stop(true,true).fadeOut();
      });
    });
    //]]>