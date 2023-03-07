// フォームの入力値をチェックするJavaScript
// 参考サイト：https://www.webdesignleaves.com/pr/php/php_contact_form_02.php

document.addEventListener('DOMContentLoaded', () => {
	const form = document.getElementsByClassName('main-form-form')[0];

	// 送信時及び送信後にエラーがでたら、false
	// 最初なのでエラーなし
	let validateAfterFirstSubmit = true;
	const errorClassName = 'error-js';

	if(!form)
		return;

	// 各チェックをする必要があるクラスの要素を取得
	// required：必須入力
	// pattern：パターン検証。mail、tel
	// equal-to：値が一致するか検証
	const requiredElems = document.querySelectorAll('.required');
	const patternElems = document.querySelectorAll('.pattern');
	const equalToElems = document.querySelectorAll('.equal-to');

	// エラーメッセージを表示するspan要素を生成して、親要素に追加する関数
	const addError = (elem, className, defaultMessage) => {
		let errorMessage = defaultMessage;

		// data-errorの要素を取得して、エラーメッセージを代入する
		if(elem.hasAttribute('data-error-' + className)) {
			const dataError = elem.getAttribute('data-error-' + className);
			if(dataError) {
				errorMessage = dataError;
			}
		}

		if(!validateAfterFirstSubmit) {
			const errorSpan = document.createElement('span');
			errorSpan.classList.add(errorClassName, className);
			errorSpan.setAttribute('aria-live', 'polite');
			errorSpan.textContent = errorMessage;
			elem.parentNode.appendChild(errorSpan);
		}
	}

	// 値が空かどうかを検証及びエラーを表示する関数(空の場合はtrueを返す)
	const isValueMissing = (elem) => {
		const className = 'required';
		const parent = elem.parentElement.parentElement;
		const errorSpan = parent.querySelector('.' + errorClassName + "." + className);
		if(elem.value.trim().length === 0) {
			if(!errorSpan) {
				addError(elem, className, '入力は必須です');
			}
			return true;
		}
		else {
			if(errorSpan) {
				elem.parentNode.removeChild(errorSpan);
			}
			return false;
		}
	}

	// requiredを指定された要素にinputイベントを設定
	requiredElems.forEach((elem) => {
		elem.addEventListener('input', () => {
			isValueMissing(elem);
		})
	});

	// 指定されたパターンにマッチしているかを検証(マッチしていない場合はtrueを返す)
	const isPatternMisMatch = (elem) => {
		const className = 'pattern';
		const attributeName = 'data-' + className;

		let pattern = new RegExp('^' + elem.getAttribute(attributeName) + '$');
		
		// data-patternの属性がmailの場合
		if(elem.getAttribute(attributeName) === 'mail') {
			pattern = /^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ui;
		}
		// data-patternの属性がtelの場合
		else if(elem.getAttribute(attributeName) === 'tel') {
			pattern = /^\(?\d{2,5}\)?[-(\.\s]{0,2}\d{1,4}[-)\.\s]{0,2}\d{3,4}$/;
		}

		const errorSpan = elem.parentElement.parentElement.querySelector('.' + errorClassName + '.' + className);
		// 対象の要素の値が空でないなら、パターンにマッチするか検証
		if(elem.value.trim() !== '') {
			if(!pattern.test(elem.value)) {
				if(!errorSpan) {
					addError(elem, className, '入力された値が正しくありません');
				}
				return true;
			}
			else {
				if(errorSpan) {
					elem.parentNode.removeChild(errorSpan);
				}
				return false;
			}
		}
		else if(elem.value === '' && errorSpan) {
			elem.parentNode.removeChild(errorSpan);
		}
	}

	// patternクラスを指定された要素にinputイベントを設定(値が変更される度に検証する)
	patternElems.forEach((elem) => {
		elem.addEventListener('input', () => {
			isPatternMisMatch(elem);
		});
	});

	// 指定された要素と値が一致するかどうかを検証する関数
	const isNotEqualTo = (elem) => {
		const className = 'equal-to';
		const attributeName = 'data-' + className;
		const equalTo = elem.getAttribute(attributeName);
		const equalToElem = document.getElementById(equalTo);

		// エラーを表示するspan要素が存在すれば取得
		const errorSpan = elem.parentElement.parentElement.querySelector('.' + errorClassName + '.' + className);
		if(elem.value.trim() !== '' && equalToElem.value.trim !== '') {
			if(equalToElem.value !== elem.value) {
				if(!errorSpan) {
					addError(elem, className, '入力された値が一致しません');
				}
				return true;
			}
			else {
				if(errorSpan) {
					elem.parentNode.removeChild(errorSpan);
				}

				return false;
			}
		}
	}

	// equal-toクラスを指定された要素にinputイベントを設定(値が変更されるたびに検証)
	equalToElems.forEach((elem) => {
		elem.addEventListener('input', () => {
			isNotEqualTo(elem);
		});

		const compareTarget = document.getElementById(elem.getAttribute('data-equal-to'));
		if(compareTarget) {
			compareTarget.addEventListener('input', () => {
				isNotEqualTo(elem);
			});
		}
	});

	// 送信時の処理(デフォルト要素を消す)
	form.addEventListener('submit', e => {
		validateAfterFirstSubmit = false;

		// 必須
		requiredElems.forEach((elem => {
			if(isValueMissing(elem)) {
				e.preventDefault();
			}
		}));

		// パターン検証
		patternElems.forEach((elem) => {
				if(isPatternMisMatch(elem)) {
					e.preventDefault();
				}
		});

		// メールアドレスが一致するか検証
		equalToElems.forEach((elem) => {
			if(isNotEqualTo(elem)) {
				e.preventDefault();
			}
		});

		// エラーの位置へスクロールする
//		const errorElem = document.querySelector('.' + errorClassName);
//		if(!errorElem) {
//			return;
//		}
//		const errorElemOffsetTop = errorElem.offsetTop;
//		window.scrollTo({top: errorElemOffsetTop - 40, behavior: 'smooth'});
	});
});