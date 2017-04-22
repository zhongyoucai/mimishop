var carArray = new Array();
var productName  = "无"; //产品名称
var productPrice = 0; //产品单价
var productId    = "0"; //产品id

/** 加入购物车 **/
function addToCart(goods_id, isfrom){
	
	var goods_number 	= parseInt($("#goods_number").val());
	var goods_price 	= $("#goods_price").val();
	var goods_name		= $("#goods_name").html();
	
	
	productName = goods_name;
	productPrice = parseFloat(goods_price);
	productId = goods_id;
	
	
	var tempArray = [];
	tempArray.push(productId); 		// 商品id
	tempArray.push(productName);	//商品名称
	tempArray.push(productPrice);	//商品价格
	tempArray.push(goods_number); 	//商品数量
	carArray.push(tempArray);

	
	//alert(JSON.stringify(carArray));
	//保存到cookie1天
	$.cookie("mini_car", JSON.stringify(carArray),{expires:1, path: "/" }); 
	if(isfrom == 1){
		location.href = '../cart';
	}else if(isfrom == 0){
		layer.open({
			content: '该商品已添加到购物车，您现在还需要继续购物吗？'
			,btn: ['确定', '取消']
			,yes: function(index){
				location.href = '../cart';
				layer.close(index);
			}
		});
	}
	
}
