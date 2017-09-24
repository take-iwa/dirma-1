$(function(){
  //selectタグ（親） が変更された場合
  $('[name=job_category]').on('change', function(){
    var job_val = $(this).val();

    //maker_val値 を select.php へ渡す
    $.ajax({
      url: "job_select.php",
      type: "POST",
      dataType: 'json',
      data: {
        job_id: job_val
      }
    })
      .done(function(data){
      //selectタグ（子） の option値 を一旦削除
      $('.jobtype_detail option').remove();
      //job_select.php から戻って来た data の値をそれそれ optionタグ として生成し、
      // .jobtype_detail に optionタグ を追加する
      $.each(data, function(id, job_detail){
        $('.jobtype_detail').append($('<option>').text(job_detail).attr('value', job_detail));
      });
    })
      .fail(function(){
      console.log("失敗");
    });

  });



//検索をクリックされたら
  $('#job_submit').on('click',function(e){
    var job_val = $("#detaile").val();
    var place_val = $("#place").val();
    var salary_val = $("#salary").val();

    //maker_val値 を select.php へ渡す
    $.ajax({
      url: "searchresult.php",
      type: "POST",
      dataType: 'json',
      data: {
        jobtype_detail: job_val,
        pref_id: place_val,
        salary: salary_val
      }
    })
    .done(function(data){
      $('#result-view').remove();
      $('#divtable').append('<div id="result-view"><p>件の求人情報が該当しました。</p><table><tr><th>社名・募集ポジション</th><th>仕事内容</th><th>求める人物・経験</th><th>想定年収</th><th>勤務地</th><th>詳細情報</th></tr></div>');
      $('#result-view').append(data);
    })
    .fail(function(){
      console.log("失敗");
    });
    return e.preventDefault();
  });
});