//GNB_LANGUAGE
$('.lang_select').click(function(){
  $(this).toggleClass('open');
  $('.options',this).toggleClass('open');
});

$('.options li').click(function(){
  var selection = $(this).text();
  var dataValue = $(this).attr('data_value');
  $('.selected_option span').text(selection);
  $('.lang_select').attr('data_selected_value',dataValue);
});