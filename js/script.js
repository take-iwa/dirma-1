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
      $('.jobtype_detail').append($('<option>').text('指定なし').attr('value', 'none'));
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
    var category = $("#category").val();
    var job_val = $("#detaile").val();
    var place_val = $("#place").val();
    var salary_val = $("#salary").val();

    //maker_val値 を select.php へ渡す
    $.ajax({
      url: "searchresult.php",
      type: "POST",
      dataType: 'json',
      data: {
        job_category: category,
        jobtype_detail: job_val,
        pref_id: place_val,
        salary: salary_val
      }
    })
    .done(function(data){
      $('#result-view').remove();
      $('#divtable').append('<div class="container"><div id="result-view"></div></div>');
      $('#result-view').append('<table class="table"><thead><tr><th class="col-md-2">社名・募集ポジション</th><th class="col-md-3">仕事内容</th><th class="col-md-3">求める人物・経験</th><th class="col-md-2">想定年収</th><th class="col-md-1">勤務地</th><th class="col-md-1">詳細情報</th></tr></thead><tbody id="job_table_body"></tbody></table>');
      $('#job_table_body').append(data);
    })
    .fail(function(){
      console.log("失敗");
    });
    return e.preventDefault();
  });
});