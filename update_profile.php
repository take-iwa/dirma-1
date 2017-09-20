<?php
require_once 'init.php';
include 'ChromePhp.php';

//プロフィール更新
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $db = connectDb();

	//エスケープ処理
	$_POST = escape($_POST);

  //echo "<pre>";
  //print_r($_POST);
  //echo "</pre>";
  //exit;

  //パスワード確認
  if($_POST["password"] !== $_POST["repassword"]){
    $profile_url = "./user_page.php?page=user_profile&r=2";
    header("Location: {$profile_url}");
    exit;
  }

	//以下、個別の処理
	//パスワード　password
	if(isset($_POST["password"])){
	  $password = trim($_POST["password"]);//文頭と文末にある半角スペースを除去。
    $hash = password_hash($password, PASSWORD_DEFAULT);
		$sql = 'UPDATE user_table SET lpw=:password WHERE id='.$_SESSION['user_id'];
		$statement = $db->prepare($sql);
		$statement->bindValue(':password', $hash, PDO::PARAM_STR);

    if(!$statement->execute()){
      rbegistrationFailure('パスワード');
    }
    //echo 'パスワード<br>';
	}

  //パスワード以外
  //メールアドレス　email
  if(isset($_POST["email"])){
    $email = trim($_POST["email"]);//文頭と文末にある半角スペースを除去。
    $sql = 'UPDATE user_table SET email=:email WHERE id='.$_SESSION['user_id'];
    $statement = $db->prepare($sql);
    $statement->bindValue(':email', $email, PDO::PARAM_STR);

    if(!$statement->execute()){
      rbegistrationFailure('メールアドレス');
    }
    //echo 'メールアドレス<br>';
  }

  //姓	family_name
  if(isset($_POST["family_name"])){
    $family_name = trim($_POST["family_name"]);//文頭と文末にある半角スペースを除去。
    $sql = 'UPDATE user_table SET family_name=:family_name WHERE id='.$_SESSION['user_id'];
    $statement = $db->prepare($sql);
    $statement->bindValue(':family_name', $family_name, PDO::PARAM_STR);

    if(!$statement->execute()){
      rbegistrationFailure('姓');
    }
    //echo '姓<br>';
  }

  //名	first_name
  if(isset($_POST["first_name"])){
    $first_name = trim($_POST["first_name"]);//文頭と文末にある半角スペースを除去。
    $sql = 'UPDATE user_table SET first_name=:first_name WHERE id='.$_SESSION['user_id'];
    $statement = $db->prepare($sql);
    $statement->bindValue(':first_name', $first_name, PDO::PARAM_STR);

    if(!$statement->execute()){
      rbegistrationFailure('名');
    }
    //echo '名<br>';
  }

  //セイ	family_kana
  if(isset($_POST["family_kana"])){
    $family_kana = trim($_POST["family_kana"]);//文頭と文末にある半角スペースを除去。
    $sql = 'UPDATE user_table SET family_kana=:family_kana WHERE id='.$_SESSION['user_id'];
    $statement = $db->prepare($sql);
    $statement->bindValue(':family_kana', $family_kana, PDO::PARAM_STR);

    if(!$statement->execute()){
      rbegistrationFailure('セイ');
    }
    //echo 'セイ<br>';
  }

  //メイ	first_kana
  if(isset($_POST["first_kana"])){
    $first_kana = trim($_POST["first_kana"]);//文頭と文末にある半角スペースを除去。
    $sql = 'UPDATE user_table SET first_kana=:first_kana WHERE id='.$_SESSION['user_id'];
    $statement = $db->prepare($sql);
    $statement->bindValue(':first_kana', $first_kana, PDO::PARAM_STR);

    if(!$statement->execute()){
      rbegistrationFailure('メイ');
    }
    //echo 'メイ<br>';
  }

  //生年月日	birthday
  if(isset($_POST["birthday"])){
    $birthday = trim($_POST["birthday"]);//文頭と文末にある半角スペースを除去。
    $sql = 'UPDATE user_table SET birthday=:birthday WHERE id='.$_SESSION['user_id'];
    $statement = $db->prepare($sql);
    $statement->bindValue(':birthday', $birthday, PDO::PARAM_STR);

    if(!$statement->execute()){
      rbegistrationFailure('生年月日');
    }
    //echo '生年月日<br>';
  }

  //性別	gender
  if(isset($_POST["gender"])){
    $gender = trim($_POST["gender"]);//文頭と文末にある半角スペースを除去。
    $sql = 'UPDATE user_table SET gender=:gender WHERE id='.$_SESSION['user_id'];
    $statement = $db->prepare($sql);
    $statement->bindValue(':gender', $gender, PDO::PARAM_INT);

    if(!$statement->execute()){
      rbegistrationFailure('性別');
    }
    //echo '性別<br>';
  }

  //電話番号	phone_num
  if(isset($_POST["tel1"])){
    $phone_num = trim($_POST["tel1"]);//文頭と文末にある半角スペースを除去。
    $sql = 'UPDATE user_table SET phone_num=:phone_num WHERE id='.$_SESSION['user_id'];
    $statement = $db->prepare($sql);
    $statement->bindValue(':phone_num', $phone_num, PDO::PARAM_INT);

    if(!$statement->execute()){
      rbegistrationFailure('電話番号');
    }
    //echo '電話番号<br>';
  }

  //郵便番号	postal_code
  if(isset($_POST["zip11"])){
    $postal_code = trim($_POST["zip11"]);//文頭と文末にある半角スペースを除去。
    $sql = 'UPDATE user_table SET postal_code=:postal_code WHERE id='.$_SESSION['user_id'];
    $statement = $db->prepare($sql);
    $statement->bindValue(':postal_code', $postal_code, PDO::PARAM_INT);

    if(!$statement->execute()){
      rbegistrationFailure('郵便番号');
    }
    //echo '郵便番号<br>';
  }

  //都道府県	prefectures
  if(isset($_POST["prefectures"])){
    $prefectures = trim($_POST["prefectures"]);//文頭と文末にある半角スペースを除去。
    $sql = 'UPDATE user_table SET prefectures=:prefectures WHERE id='.$_SESSION['user_id'];
    $statement = $db->prepare($sql);
    $statement->bindValue(':prefectures', $prefectures, PDO::PARAM_STR);

    if(!$statement->execute()){
      rbegistrationFailure('都道府県');
    }
    //echo '都道府県<br>';
  }

  //住所1	addr01
  if(isset($_POST["addr01"])){
    $address_before = trim($_POST["addr01"]);//文頭と文末にある半角スペースを除去。
    $sql = 'UPDATE user_table SET address_before=:address_before WHERE id='.$_SESSION['user_id'];
    $statement = $db->prepare($sql);
    $statement->bindValue(':address_before', $address_before, PDO::PARAM_STR);

    if(!$statement->execute()){
      rbegistrationFailure('住所1');
    }
    //echo '住所1<br>';
  }

  //住所2	addr02
  if(isset($_POST["addr02"])){
    $address_after = trim($_POST["addr02"]);//文頭と文末にある半角スペースを除去。
    $sql = 'UPDATE user_table SET address_after=:address_after WHERE id='.$_SESSION['user_id'];
    $statement = $db->prepare($sql);
    $statement->bindValue(':address_after', $address_after, PDO::PARAM_STR);

    if(!$statement->execute()){
      rbegistrationFailure('住所2');
    }
    //echo '住所2<br>';
  }

  //在籍企業	company
  if(isset($_POST["company"])){
    $company = trim($_POST["company"]);//文頭と文末にある半角スペースを除去。
    $sql = 'UPDATE user_table SET company=:company WHERE id='.$_SESSION['user_id'];
    $statement = $db->prepare($sql);
    $statement->bindValue(':company', $company, PDO::PARAM_STR);

    if(!$statement->execute()){
      rbegistrationFailure('在籍企業');
    }
    //echo '在籍企業<br>';
  }

  //経験年数	year
  if(isset($_POST["year"])){
    $year = trim($_POST["year"]);//文頭と文末にある半角スペースを除去。
    $sql = 'UPDATE user_table SET year=:year WHERE id='.$_SESSION['user_id'];
    $statement = $db->prepare($sql);
    $statement->bindValue(':year', $year, PDO::PARAM_INT);

    if(!$statement->execute()){
      rbegistrationFailure('経験年数');
    }
    //echo '経験年数<br>';
  }

  //現年収	annual_income
  if(isset($_POST["annual_income"])){
    $annual_income = trim($_POST["annual_income"]);//文頭と文末にある半角スペースを除去。
    $sql = 'UPDATE user_table SET annual_income=:annual_income WHERE id='.$_SESSION['user_id'];
    $statement = $db->prepare($sql);
    $statement->bindValue(':annual_income', $annual_income, PDO::PARAM_INT);

    if(!$statement->execute()){
      rbegistrationFailure('現年収');
    }
    //echo '現年収<br>';
  }

  //担当職種	job_title
  if(isset($_POST["job_title"])){
    $job_title = getJobCategory($_POST["job_title"]);
    $sql = 'UPDATE user_table SET job_title=:job_title WHERE id='.$_SESSION['user_id'];
    $statement = $db->prepare($sql);
    $statement->bindValue(':job_title', $job_title, PDO::PARAM_STR);

    if(!$statement->execute()){
      rbegistrationFailure('担当職種');
    }
    //echo '担当職種<br>';
  }
  
  //担当職種詳細	job_detail
  if(isset($_POST["job_detail"])){
    $job_detail = $_POST["job_detail"];
    $sql = 'UPDATE user_table SET job_detail=:job_detail WHERE id='.$_SESSION['user_id'];
    $statement = $db->prepare($sql);
    $statement->bindValue(':job_detail', $job_detail, PDO::PARAM_STR);

    if(!$statement->execute()){
      rbegistrationFailure('担当職種詳細');
    }
    //echo '担当職種詳細<br>';
  }

  //経験社数	experience_num
  if(isset($_POST["experience_num"])){
    $experience_num = trim($_POST["experience_num"]);//文頭と文末にある半角スペースを除去。
    $sql = 'UPDATE user_table SET experience_num=:experience_num WHERE id='.$_SESSION['user_id'];
    $statement = $db->prepare($sql);
    $statement->bindValue(':experience_num', $experience_num, PDO::PARAM_INT);

    if(!$statement->execute()){
      rbegistrationFailure('経験社数');
    }
    //echo '経験社数<br>';
  }

  //職務経歴	career
  if(isset($_POST["career"])){
    $career = trim($_POST["career"]);//文頭と文末にある半角スペースを除去。
    $sql = 'UPDATE user_table SET career=:career WHERE id='.$_SESSION['user_id'];
    $statement = $db->prepare($sql);
    $statement->bindValue(':career', $career, PDO::PARAM_STR);

    if(!$statement->execute()){
      rbegistrationFailure('職務経歴');
    }
    //echo '職務経歴<br>';
  }

  //学校名	school
  if(isset($_POST["school"])){
    $school = trim($_POST["school"]);//文頭と文末にある半角スペースを除去。
    $sql = 'UPDATE user_table SET school=:school WHERE id='.$_SESSION['user_id'];
    $statement = $db->prepare($sql);
    $statement->bindValue(':school', $school, PDO::PARAM_STR);

    if(!$statement->execute()){
      rbegistrationFailure('学校名');
    }
    //echo '学校名<br>';
  }

  //学部・学科・専攻	department
  if(isset($_POST["department"])){
    $department = trim($_POST["department"]);//文頭と文末にある半角スペースを除去。
    $sql = 'UPDATE user_table SET department=:department WHERE id='.$_SESSION['user_id'];
    $statement = $db->prepare($sql);
    $statement->bindValue(':department', $department, PDO::PARAM_STR);

    if(!$statement->execute()){
      rbegistrationFailure('学部・学科・専攻');
    }
    //echo '学部・学科・専攻<br>';
  }

  //卒業年	graduation_date
  if(isset($_POST["graduation_date"])){
    $graduation_date = trim($_POST["graduation_date"]);//文頭と文末にある半角スペースを除去。
    $sql = 'UPDATE user_table SET graduation_date=:graduation_date WHERE id='.$_SESSION['user_id'];
    $statement = $db->prepare($sql);
    $statement->bindValue(':graduation_date', $graduation_date, PDO::PARAM_INT);

    if(!$statement->execute()){
      rbegistrationFailure('卒業年月');
    }
    //echo '卒業年月<br>';
  }

  //卒業有無	graduated
  if($_POST["graduated"]){
    $graduated = trim($_POST["graduated"]);//文頭と文末にある半角スペースを除去。
    $sql = 'UPDATE user_table SET graduated=:graduated WHERE id='.$_SESSION['user_id'];
    $statement = $db->prepare($sql);
    $statement->bindValue(':graduated', $graduated, PDO::PARAM_STR);

    if(!$statement->execute()){
      rbegistrationFailure('卒業有無');
    }
    //echo '卒業有無<br>';
  }else{
    $graduated = 'off';//文頭と文末にある半角スペースを除去。
    $sql = 'UPDATE user_table SET graduated=:graduated WHERE id='.$_SESSION['user_id'];
    $statement = $db->prepare($sql);
    $statement->bindValue(':graduated', $graduated, PDO::PARAM_STR);

    if(!$statement->execute()){
      rbegistrationFailure('卒業有無');
    }
  }

  //希望職種	desired_job
  if(isset($_POST["desired_job"])){
    $desired_job = getJobCategory($_POST["desired_job"]);
    $sql = 'UPDATE user_table SET desired_job=:desired_job WHERE id='.$_SESSION['user_id'];
    $statement = $db->prepare($sql);
    $statement->bindValue(':desired_job', $desired_job, PDO::PARAM_STR);

    if(!$statement->execute()){
      rbegistrationFailure('希望職種');
    }
    //echo '希望職種<br>';
  }
  
  //希望職種詳細	desired_detail
  if(isset($_POST["desired_detail"])){
    $desired_detail = $_POST["desired_detail"];
    $sql = 'UPDATE user_table SET desired_detail=:desired_detail WHERE id='.$_SESSION['user_id'];
    $statement = $db->prepare($sql);
    $statement->bindValue(':desired_detail', $desired_detail, PDO::PARAM_STR);

    if(!$statement->execute()){
      rbegistrationFailure('希望職種詳細');
    }
    //echo '希望職種詳細<br>';
  }

  //希望年収	desired_income
  if(isset($_POST["desired_income"])){
    $desired_income = trim($_POST["desired_income"]);//文頭と文末にある半角スペースを除去。
    $sql = 'UPDATE user_table SET desired_income=:desired_income WHERE id='.$_SESSION['user_id'];
    $statement = $db->prepare($sql);
    $statement->bindValue(':desired_income', $desired_income, PDO::PARAM_INT);

    if(!$statement->execute()){
      rbegistrationFailure('希望年収');
    }
    //echo '希望年収<br>';
  }

  //希望勤務地	desired_region
  if(isset($_POST["desired_region"])){
    $desired_region = trim($_POST["desired_region"]);//文頭と文末にある半角スペースを除去。
    $sql = 'UPDATE user_table SET desired_region=:desired_region WHERE id='.$_SESSION['user_id'];
    $statement = $db->prepare($sql);
    $statement->bindValue(':desired_region', $desired_region, PDO::PARAM_STR);

    if(!$statement->execute()){
      rbegistrationFailure('希望勤務地');
    }
    //echo '希望勤務地<br>';
  }

  //希望内容	desired_contents
  if(isset($_POST["desired_contents"])){
    $desired_contents = trim($_POST["desired_contents"]);//文頭と文末にある半角スペースを除去。
    $sql = 'UPDATE user_table SET desired_contents=:desired_contents WHERE id='.$_SESSION['user_id'];
    $statement = $db->prepare($sql);
    $statement->bindValue(':desired_contents', $desired_contents, PDO::PARAM_STR);

    if(!$statement->execute()){
      rbegistrationFailure('希望内容');
    }
    //echo '希望内容<br>';
  }

  $profile_url = "./user_page.php?page=user_profile&r=1";
  header("Location: {$profile_url}");
  exit;
}

function rbegistrationFailure($str){
  $profile_url = "./user_page.php?page=user_profile&r=0";
  header("Location: {$profile_url}");
  exit;
}

function getJobCategory($key){
  $db = connectDb();
  $sql = "SELECT job FROM job_category WHERE id = :id";
  $statement = $db->prepare($sql);
  $statement->bindValue(':id', $key, PDO::PARAM_INT);
  $statement->execute();
  $row = $statement->fetch();
  return $row['job'];
}

?>
