<?php
include("php/query.php");
include("components/header.php");
?>


	<!-- Product -->
	<div class="bg0 m-t-23 p-b-140">
		<div class="container p-5 mt-5">
			
			<div class="row isotope-grid pt-5">
                    <?php
                    if(isset($_GET['cId'])){
                        $categoryId = $_GET['cId'];
                        $query  = $pdo->prepare("select * from products where c_id = :catId");
                        $query->bindParam('catId',$categoryId);
                        $query->execute();
                        $allProducts = $query->fetchAll(PDO::FETCH_ASSOC);
                        foreach($allProducts as $product){
                    ?>
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="adminPanel/images/<?php echo $product['image']?>" alt="IMG-PRODUCT">

							<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
								Quick View
							</a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="product-detail.php?id=<?php echo $product['id']?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
								<?php echo $product['name']?>
								</a>

								<span class="stext-105 cl3">
									$<?php echo $product['price']?>
								</span>
							</div>

							<div class="block2-txt-child2 flex-r p-t-3">
								<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
									<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
									<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
								</a>
							</div>
						</div>
					</div>
				</div>
                <?php
                    }
                }
                ?>




			</div>

			<!-- Load more -->
			<div class="flex-c-m flex-w w-full p-t-45">
				<a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Load More
				</a>
			</div>
		</div>
	</div>
		


    <?php
include("components/footer.php");
?>