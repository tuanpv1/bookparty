<?php

use yii\web\Controller;

class ShoppingcartController extends BaseController
{
	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionAddCart(){
		$productId = $this->getParameter('productid');
		echo "<pre>"; print_r($productId); die();
		cartShop::addCart($productId);
		$tong = 0; 			
		$data = Yii::$app->session['cart'];
		foreach ($data as $item) 
		{
			$tong += (int)$item["sl"];
		}

		echo $tong;
		//khởi tạo giỏ hàng viết trong components	
	}

	public function actiondsspmua(){
		$spmua = Yii::$app->session['cart'];
		$this->render("dsspmua",array('data' => $spmua));
	}

	public function actiondonhangcuatoi($id){
		$data = Donhang::getDonHangMaKH($id);
		$this->render("donhangcuatoi",array('data' => $data));
	}

	public function actionchitietdonhangcuatoi($id){
		$data = Chitietdonhang::getDonHangTheoMaDH($id);
		$this->render("chitietdonhangcuatoi",array('data' => $data));
	}


	public function actionUpdateCart(){
		$productId = Yii::$app->request->getParam("productid"); 
		$sl = Yii::$app->request->getParam("sl");
		if($sl==0){
			cartShop::actionDelete($productId);
		}else
		{
			cartShop::updateCart($productId,$sl);
		}	
		$tong = 0; 			
		$data = Yii::$app->session['cart'];
		foreach ($data as $item) 
		{
			$tong += (int)$item["sl"];
		}

		echo $tong;
	}

	public function actionDeleteCart(){
		$productId = Yii::$app->request->getParam("productid");
		cartShop::actionDelete($productId);
		$tong = 0; 			
		$data = Yii::$app->session['cart'];
		foreach ($data as $item) 
		{
			$tong += (int)$item["sl"];
		}

		echo $tong;
	}

	public function actionCheckOut(){
		$spmua = Yii::$app->session['cart'];
		if(isset($_POST["checkout"])){
			$tong = 0;
			foreach ($spmua as $key => $value) {
				$tong += (int)$value["sl"]*(int)$value["GiaSP"];
			}
			$user = $_POST["userName"];
			$email = $_POST["email"];
			$dc = $_POST["adress"];
			$phone = $_POST["phone"];
			$user2 = $_POST["user_Name"];
			$email2 = $_POST["user_email"];
			$dc2 = $_POST["user_adress"];
			$phone2 = $_POST["user_phone"];
			// if(str_word_count($user)>0&&str_word_count($email)>0&&str_word_count($dc)>0&&str_word_count($phone)>0&&str_word_count($user2)>0&&str_word_count($email2)>0&&str_word_count($dc2)>0&&str_word_count($phone2)>0){
			$modelDonhang = new Donhang;
			$modelDonhang->MaKH = !(Yii::$app->user->isGuest)?Yii::$app->user->userInfo["MaKH"]:0;
			$modelDonhang->NgayTaoDH = date("y-m-d H:i:s");
			$modelDonhang->TongTien = $tong;
			$modelDonhang->TrangThai = 1;
			$modelDonhang->NguoiShip = $_POST["userName"];
			$modelDonhang->EmailShip  = $_POST["email"];
			$modelDonhang->DcShip = $_POST["adress"];
			$modelDonhang->SdtShip = $_POST["phone"];
			$modelDonhang->NguoiMua = $_POST["user_Name"];
			$modelDonhang->EmailMua = $_POST["user_email"];
			$modelDonhang->DiaChiNguoiMua = $_POST["user_adress"];
			$modelDonhang->SdtNguoiMua = $_POST["user_phone"];
			if($modelDonhang->save()){
				$DonhangId = $modelDonhang->MaDH;
				$txtTable="Thông tin đơn hàng bạn vừa đặt tại TPShop Mã đơn hàng của bạn ";
				$txtTable.="<table boder=\"1\" class=\"table table-border\">";
				$txtTable.="<tbody class=\"site_header\">";
				$txtTable.="<tr>
					<td>Hình Ảnh</td>
					<td>Tên Sản Phẩm</td>
					<td>Số Lượng</td>
					<td>Giá</td>
					<td>Thành Tiền</td>				
				</tr>
				</tbody>";
				$maChiTietDonHang = $modelDonhang->MaDH;
				foreach ($spmua as $key => $value) {
					$modelChitietdonhang = new Chitietdonhang;
					$modelChitietdonhang->MaDH = $DonhangId;
					$modelChitietdonhang->MaSP = $key;
					$modelChitietdonhang->Gia = $value["GiaSP"];
					$modelChitietdonhang->NgayTao = date("y-m-d H:i:s");
					$modelChitietdonhang->SoLuong = $value["sl"];
					$txtTable.="<tr>";
					$txtTable.="<td class=\"size_sp\"><img width=100px src=\""."http://shoptp.top/DATN_Tuan/".$value["image"]."\"></td>";
					$txtTable.= "<td>".$value["TenSanPham"]."</td>";
					$txtTable.="<td>".$value["sl"]."</td>";
					$txtTable.="<td>".number_format($value["GiaSP"],0,",",".")." vnd</td>";
					$txtTable.="<td>".number_format((int)$value["GiaSP"]*(int)$value["sl"],0,",",".")." vnd</td>";
					$txtTable.="</tr>";
					$txtTable.="Cám ơn bạn đã tin tưởng và sử dụng dịch vụ của TPShop";
					if(!$modelChitietdonhang->save()){
						//lỗi
					}
				}
				// Yii::import('application.extensions.mailer.smtp.php');
				$mail = new PHPMailer;
				$mail->isSMTP();
				$mail->CharSet = "UTF-8";
				$mail->Host = 'smtp.gmail.com';
				$mail->SMTPAuth=true;
				$mail->Username='phptest102@gmail.com';
				$mail->Password='102phptest';
				$mail->SMTPSecure = 'tls';
				$mail->Port = 587;
				$mail->isHTML(true);
				$mail->setFrom('shoptp.top','TPShop');
				$mail->addAddress($_POST["user_email"],'Joe User');
				// echo "<pre>";
				// print_r($_POST["user_email"]);
				// die();
				$mail->addCC($_POST["email"],'J User');
				$mail->Subject = "Thông tin đặt hàng";
				$mail->Body=$txtTable;
				$mail->SMTPDebug=0;
				if(!$mail->send()) {
					echo '<script type="text/javascript"> alert("Không gửi được Email");</script>';
				} else {
					echo '<script type="text/javascript"> alert("Đã gửi Email đơn hàng");</script>';
				}
			}else{
				//lỗi
			}
			// }
			// else{
			// 	echo '<script type="text/javascript"> alert("Vui lòng điền đầy đủ thông tin");</script>';
			// }
		}
		$this->render("checkOut", array('data' => $spmua));
	}
}