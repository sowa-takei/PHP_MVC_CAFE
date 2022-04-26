var validate = function() {

	var flag = true;

	removeElementsByClass("error");
	removeClass("error-form");

	// お名前の入力をチェック
	if(document.form.name.value == ""){
		errorElement(document.form.name, "名前が入力されていません ");
		flag = false;
	}

	// ふりがなの入力をチェック
	if(document.form.kana.value == ""){
		errorElement(document.form.kana, "ふりがなが入力されていません");
    flag = false;
	} else {
		// メールアドレスの形式をチェック
		if(!validateKana(document.form.kana.value)){
			errorElement(document.form.kana, "カタカナ以外の文字が入っています");
      flag = false;
		}
	}

	// メールアドレスの入力をチェック
	if(document.form.email.value == ""){
		errorElement(document.form.email, "メールアドレスが入力されていません");
		flag = false;
	} else {
		// メールアドレスの形式をチェック
		if(!validateMail(document.form.email.value)){
			errorElement(document.form.email, "メールアドレスが正しくありません");
			flag = false;
		}
	}

	// 電話番号の入力をチェック
	if(document.form.tel.value == ""){
		errorElement(document.form.tel, "電話番号が入力されていません");
		flag = false;
	} else {
		// 電話番号の形式をチェック
		if(!validateNumber(document.form.tel.value)){
			errorElement(document.form.tel, "半角数字のみを入力してください");
			flag = false;
		} else {
			if(!validateTel(document.form.tel.value)){
				errorElement(document.form.tel, "電話番号が正しくありません");
				flag = false;
			}
		}
	}
  
	// お問い合わせ内容の入力をチェック
	if(document.form.content.value == ""){
		errorElement(document.form.content, "お問い合わせ内容が入力されていません");
		flag = false;
	}

	return flag;
}



var errorElement = function(form, msg) {
	form.className = "error-form";
	var newElement = document.createElement("div");
	newElement.className = "error";
	var newText = document.createTextNode(msg);
	newElement.appendChild(newText);
	form.parentNode.insertBefore(newElement, form.nextSibling);
}


var removeElementsByClass = function(className){
	var elements = document.getElementsByClassName(className);
	while (elements.length > 0){ 
		elements[0].parentNode.removeChild(elements[0]);
	}
}

var removeClass = function(className){
	var elements = document.getElementsByClassName(className);
	while (elements.length > 0) {
		elements[0].className = "";
	}
}

var validateMail = function (val){
	if (val.match(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/)==null) {
		return false;
	} else {
		return true;
	}
}


var validateNumber = function (val){
	if (val.match(/[^0-9]+/)) {
		return false;
	} else {
		return true;
	}
}


var validateTel = function (val){
	if (val.match(/^[0-9-]{6,13}$/) == null) {
		return false;
	} else {
		return true;
	}
}


var validateKana = function (val){
	if (val.match(/^[ァ-ロワヲンー]+$/) == null) {
		return false;
	} else {
		return true;
	}
}