
// Làm bài tập tại đây
// Làm bài tập tại đây
// Làm bài tập tại đây

function Validator(options){
	function validate(inputElement,rule){
		var errorElement=inputElement.parentElement.querySelector(options.errorSelector);
		var errorMessage=rule.test(inputElement.value);
		if (errorMessage){
				errorElement.innerText=errorMessage;
				return false;
			//	inputElemet.parentElement.classList.add('invalid');
			} else {return true}
	}
	var formElement=document.querySelector(options.form);
	formElement.onsubmit=function(e){
	
	 	var formValid=true;
	 	options.rules.forEach(function(rule){
	 		var inputElement=formElement.querySelector(rule.selector);
	 		var valid=validate(inputElement,rule);
	 		if (valid==false) formValid=false;
	 	})
	 	if (formValid==false) { 
		
			e.preventDefault() ;
	}

	 }
	options.rules.forEach(function(rule){
		var inputElement=formElement.querySelector(rule.selector);

		var errorElement=inputElement.parentElement.querySelector(options.errorSelector);
		inputElement.onblur= function (){
			validate(inputElement,rule)
		}
		inputElement.oninput=function(){
				errorElement.innerText='';
			//	inputElemet.parentElement.classList.remove('invalid');
		}
	});
	
}
Validator.isRequired=function(selector,errmessage){
	return {
		selector:selector,
		test: function (value){
			return value.trim() ? undefined :errmessage;
		}
	};
	
}
Validator.minLength=function(selector,min){
	return {
		selector:selector,
		test: function (value){
			return value.trim().length>=min ? undefined :`Vui lòng nhập mật khẩu tối thiểu ${min} kí tự`;
		}
	};
	
}
Validator.isEmail=function(selector,errmessage){
	return {
		selector:selector,
		test: function (value){
			var regex=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
			return regex.test(value)? undefined:errmessage;
		}
	};
}
Validator.isPhone=function(selector,errmessage){
	return {
		selector:selector,
		test: function (value){
			var regex= /^0\d{9,10}$/;
			
			return regex.test(value)? undefined:errmessage;
		}
	};
}

Validator.confirm=function(selector,password){
	return {
		selector:selector,
		test: function (value){
			
			return value===password() ?undefined:'Mật khẩu nhập lại không đúng'
			
		}
	};
	
}
function addCart(w,y){
if (y==0){ alert('Hiện tại sản phẩm đã hết hàng');}
else{
	$.post('cart.php',{
		id:$('#id').html(),
		image:$('#image_product').attr('src'),
		name:$('#name-product').html(),
		price:$('#price-new').html(),
		price_old:$('#price-old').html()
	}, function(result){ // Success
		if ( $('#header__cart-product-number').html()!=result)
		 {
			var text="<li class='header__cart-product-item'><img src='"+
			$('#image_product').attr('src') +"' alt='' class='header__cart-product-img'><span class='header__cart-product-name'>"
			+$('#name-product').html()+"</span><span class='header__cart-product-price'>"+$('#price-new').html()+"đx"+1+"</span></li>";
			$('#header__cart-product-number').html(result);
			if (result==1) {
				var cha=document.getElementById("header__cart-no-product");
				var con = document.getElementById("header__cart-no-product-img");
				cha.removeChild(con);
		}
		 	$('#header__cart-product-list').html($('#header__cart-product-list').html()+text);
		}
		if (w==1)alert('Đã thêm vào giỏ hàng') 
		else window.location="index.php?page=cart-product";
	},'text')
}
	// <li class='header__cart-product-item'><img src='".$_SESSION['cart'][$i][0]
	// 									."' alt='' class='header__cart-product-img'><span class='header__cart-product-name'>".
	// 									$_SESSION['cart'][$i][1]."</span><span class='header__cart-product-price'>".$_SESSION['cart'][$i][2]."đx".$_SESSION['number'][$i]."</span></li>
}
function minusNumber(value){
	//alert(value);
	var number=document.getElementById('cart-product-page__modify-number'+value).innerText;
	if (number>0)
	{document.getElementById('cart-product-page__modify-number'+value).innerText=number-1;
	$.post('cart.php',{
	index:value,
	
	modify:-1
	})

	var total=document.getElementById('total').innerText.slice(0,document.getElementById('total').innerText.length-2)
	document.getElementById('total').innerText=total-document.getElementById('product-item__price-new'+value).innerText+' đ'}
	
}
function addNumber(value,id){
	//alert(value);
	var number=document.getElementById('cart-product-page__modify-number'+value).innerText;

	$.post('cart.php',{
	index:value,
	id:id,
	modify:1
	},function(data){
		if (Number(number)<Number(data)){
	
		document.getElementById('cart-product-page__modify-number'+value).innerText=number-1+2;
		var total=document.getElementById('total').innerText.slice(0,document.getElementById('total').innerText.length-2)
	document.getElementById('total').innerText=Number(total)+Number(document.getElementById('product-item__price-new'+value).innerText)+' đ'
		}
	})
}
function removeNumber(value,id){
	number=document.getElementById('cart-product-page__modify-number'+value).innerText;

		var total=document.getElementById('total').innerText.slice(0,document.getElementById('total').innerText.length-2)
		document.getElementById('total').innerText=Number(total) - Number(number)*Number(document.getElementById('product-item__price-new'+value).innerText)+' đ'
		var cha=document.getElementsByClassName('cart-product-page__list')[0],
		con=document.getElementById('cart-product-page__item'+value);
		cha.removeChild(con);
	  $.post('cart.php',{
	  id:id,
	
	  modify:0
	  })
	 
}
function payCart(){
	
	var address=document.getElementsByClassName('cart-product-page__pay-address')[0].value;
	var retVal = confirm("Xác nhận đặt mua đơn hàng ?");
    if( retVal == true ){
	  $.post('cart.php',{
	  	address:address,
	  pay:0
	  },function(result){

		if (result==1){
			alert('Đặt hàng thành công')
			window.location="index.php";
		}
		else {
			alert('Bạn cần phải đăng nhập để thanh toán')
			window.location="index.php?page=log&value=log-in";
		}
	  })
	}
	 
}
function phanTrang_product(page,num){
	x=$(".list__select").val();

	
	$.post("selected.php",{page:page,
	num3:num,
species3:x},function(data){
		x=data.split('???')
		$(".table_body").html(x[0]);
		$(".phantrang").html(x[1])
		
	})
}
function phanTrang_productweb(page,num){
	var x='all';
	if ( document.getElementsByClassName('btn--primary').length>0) x=document.getElementsByClassName('btn--primary')[0].innerText;
	if (document.getElementsByClassName("home-filter__price-label")[0].innerText!="Giá") x=document.getElementsByClassName("home-filter__price-label")[0].innerText
	$.post("selected.php",{page:page,
	num3:num,
species3:x},function(data){
		x=data.split('???')
		$(".list_product").html(x[0]);
		$(".phantrang").html(x[1])
		
		
	})
}
function phanTrang_firm(page,num){
	x=$(".list__select").val();

	
	$.post("selected.php",{page:page,
	num4:num,
species4:x},function(data){
		x=data.split('???')
		$(".table_body").html(x[0]);
		$(".phantrang").html(x[1])
		
	})
}
function phanTrang_user(page,num){	
	var value1=$(".user-sort").val(),
	x=document.getElementsByName("sort_user"),
	value2='lowhigh'
	for (var i = 0; i < x.length; i++){
		if (x[i].checked === true){
			value2=x[i].value
		}
	}
	$.post("sort.php",{page:page,
	num5:num,sort:value2,species5:value1
},function(data){
		x=data.split('???')
		$(".table_body").html(x[0]);
		$(".phantrang").html(x[1])
		
	})
}
function checkedOrder(id){
	$.post("selected.php",{id_order:id})
}
function thanhToan(id){
	var retVal = confirm("Xác nhận thanh toán đơn hàng ?");
    if( retVal == true ){
                               
		$.post("selected.php",{delete_order:id})
		window.location="home.php?page=order";
	   }
}
function submitComment(id,id_rep,user_name){
	var comment=$(".comment_input").val()
		

	$.post("send.php",{comment:comment,id_product:id,id_rep:id_rep,user_name:user_name},
	
		)
		var today = new Date();
		var date = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear();
		var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
		var dateTime = date+' '+time;
		$(".comment_product-header").html( "<input class='comment_input' placeholder='Bình luận tại đây' type='text'>   <i class='fas fa-paper-plane' onclick=submitComment("+id+",0,'"+user_name+"')></i>" );
		$("#comment-list").html("<ul class='comment-text'><li class='account_comment'>"+user_name+"</li><li class='time_comment'>"+dateTime+"</li><li class='content_comment'><div>"+comment+"</div></li></ul>"+$("#comment-list").html())
}
function loadComment(id){
	setInterval(function(){
		$.post("loadcomment.php",{id_product:id},
		function(data){
			$('.list_comment_1').html(data)
		})
	},300)
}
function filterProduct(value,index){
	if (!!document.getElementsByClassName('category-item__current')[0])
	species=document.getElementsByClassName('category-item__current')[0].innerText
	else species=''
	x=document.getElementsByClassName('btn');
	for (i=0;i<x.length;i++){
	
		if (x[i].classList[1]=="btn--primary") 
			{
			
				if (index==i){
					index=-1
					value=-1;	
				}
				x[i].classList.remove('btn--primary')
			}
	}
	if (index>=0)
	{
		x[index].classList.add('btn--primary')
}
value1=document.getElementsByClassName('header__search-input')[0].value
document.getElementsByClassName("home-filter__price-label")[0].innerText="Giá"
	$.post("filterProduct.php",{value:value,species2:species,search1:value1},
	function(data){
		x=data.split('???')
		$(".list_product").html(x[0]);
		$(".phantrang").html(x[1])
	})	
}
function sort_price(x)
{
	var value=document.getElementsByClassName("home-filter__price-item")[x].innerText
	document.getElementsByClassName("home-filter__price-label")[0].innerText=value
	y=document.getElementsByClassName('btn');
	for (i=0;i<y.length;i++){
		if (y[i].classList[1]=="btn--primary") 
			y[i].classList.remove('btn--primary')
	}
	$.post("filterProduct.php",{value:value},
	function(data){
		x=data.split('???')
		$(".list_product").html(x[0]);
		$(".phantrang").html(x[1])
	})	
}

function filterProducts(value){
	species=value.innerText;
	document.getElementsByClassName('header__search-input')[0].value=""
	if (!!document.getElementsByClassName('btn--primary')[0]){
		x=document.getElementsByClassName('btn--primary')[0]
		x.classList.remove('btn--primary')
	}
	if (!!value.classList[1]){
	value.classList.remove('category-item__current')
	species='';
}
	else {
		listItem=value.parentElement.getElementsByClassName('category-item');
		for (i=0;i<listItem.length;i++){
			listItem[i].classList.remove('category-item__current')
		}

		value.classList.add('category-item__current')
	}
	$.post("filterProduct.php",{species1:species},
	function(data){
		x=data.split('???')
		$(".list_product").html(x[0]);
		$(".phantrang").html(x[1])
	})	
}
//-------------------------------------------------TÌM KIẾM SẢN PHẨM-----------------------------------------------------------  
function searchProduct(user,value){

if (value==''){
	
	value=document.getElementsByClassName('header__search-input')[0].value

}
if (!value==''){
	if (!!document.getElementsByClassName('btn--primary')[0]){
		x=document.getElementsByClassName('btn--primary')[0]
		x.classList.remove('btn--primary')
	}
	listItem=document.getElementsByClassName('category-item');
		for (i=0;i<listItem.length;i++){
			listItem[i].classList.remove('category-item__current')
		}
		$.post("search.php",{search:value,user:user},
	function(data){
		x=data.split('???')
		$(".list_product").html(x[0]);
		$(".phantrang").html(x[1])
		$(".header__search-items").html(x[2])
	})
}
}

$(document).click(function(){
	var e=document.getElementsByClassName('header__search-history')[0];
	e.style.display="none";
});

$('.header__search-input').click(function(event){
	var e=document.getElementsByClassName('header__search-history')[0];
	e.style.display="block";
    event.stopPropagation();
});