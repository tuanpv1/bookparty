<?phpuse common\models\Food;class CartShop{	static function addCart($id,$q=1){		$cart = Yii::$app->session['cart'];		$foodInfo = Food::findOne(['id'=>$id]);		if(empty($cart)){			$cart[$id]=array(				"sl" => $q, 				"GiaSP" => $foodInfo->price,				"image" => $foodInfo ->image,				"TenSanPham" =>$foodInfo->name				);		}		else		{			if(array_key_exists($id, $cart)){				$cart[$id]=array(					"sl" => (int)$cart[$id]["sl"]+(int)$q, 					"GiaSP" => $proInfo->GiaBan,					"image" => $proInfo ->Image,					"TenSanPham" =>$proInfo->TenSP					);			}			else			{				$cart[$id]=array(					"sl" => $q, 					"GiaSP" => $proInfo->GiaBan,					"image" => $proInfo ->Image,					"TenSanPham" =>$proInfo->TenSP					);			}		}		Yii::$app->session['cart'] = $cart;	}	public function updateCart($id,$q){		$cart = Yii::$app->session['cart'];		$proInfo = Sanpham::getChiTietSanPham($id);		if($q || $q > 0){			if(array_key_exists($id, $cart)){				$cart[$id]=array(					"sl" =>(int)$q, 					"GiaSP" => $proInfo->GiaBan,					"image" => $proInfo ->Image,					"TenSanPham" =>$proInfo->TenSP					);			}		}else		{			unset($cart[$id]);		}		Yii::$app->session['cart'] = $cart;	}	public function actionDelete($id){		$cart = Yii::$app->session['cart'];		if(array_key_exists($id, $cart)){			unset($cart[$id]);		}		Yii::$app->session['cart'] = $cart;	}}?>