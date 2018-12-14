$(document).ready(function () {
  $("#sel").change(function () {
    //var str = $(this).val();
    window.location.href = $(this).val();
    //alert(str);
  });
});
function delChk(str) {
  /* 確認ダイアログ表示 */
  var flag = confirm(str + "の情報を削除してもよろしいですか？\n\n削除したくない場合は[キャンセル]ボタンを押して下さい");
  return flag;
}